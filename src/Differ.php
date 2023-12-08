<?php

namespace Differ\Differ;

use function Parses\parse;
use function Format\getTreeByFormat;

function getTree(array $arrOfFileDecode1, array $arrOfFileDecode2)
{
    $keys = array_unique(array_merge(array_keys($arrOfFileDecode1), array_keys($arrOfFileDecode2)));
    sort($keys);
    $map = array_map(function ($key) use ($arrOfFileDecode1, $arrOfFileDecode2) {
        if (!array_key_exists($key, $arrOfFileDecode1)) {
            return ['key' => $key, 'value' => $arrOfFileDecode2[$key], 'type' => '+'];
        }
        if (!array_key_exists($key, $arrOfFileDecode2)) {
            return ['key' => $key, 'value' => $arrOfFileDecode1[$key], 'type' => '-'];
        }
        if ($arrOfFileDecode1[$key] == $arrOfFileDecode2[$key]) {
            return ['key' => $key, 'value' => $arrOfFileDecode1[$key], 'type' => 'unchanged'];
        }
        return ['key' => $key, 'oldValue' => $arrOfFileDecode1[$key],
            'newValue' => $arrOfFileDecode2[$key], 'type' => '-+'];
    }, $keys);

    return $map;
}

function gendiff(string $pathToFile1, string $pathToFile2, string $format = 'stylish'): string
{
    $diff = '';

    $getFile1 = file_get_contents($pathToFile1);
    $getFile2 = file_get_contents($pathToFile2);

    $arrOfFileDecode1 = parse($getFile1, pathinfo($pathToFile1, PATHINFO_EXTENSION));
    $arrOfFileDecode2 = parse($getFile2, pathinfo($pathToFile2, PATHINFO_EXTENSION));

    $tree = getTree($arrOfFileDecode1, $arrOfFileDecode2);
    $formatedTree = getTreeByFormat($format, $tree);

    return $formatedTree;
}
