<?php

namespace Format;

use function Format\Stylish\makeStylishFormat;
use function Format\Plain\makePlainFormat;
use function Format\Json\makeJsonFormat;

function formatSelection(array $astTree, string $formatter): string
{
    switch ($formatter) {
        case 'stylish':
            return makeStylishFormat($astTree);
        case 'plain':
            return makePlainFormat($astTree);
        case 'json':
            return makeJsonFormat($astTree);
        default:
            throw new \Exception("Invalid formatter. The format should be 'stylish' , 'plain' or 'json'");
    }
}
