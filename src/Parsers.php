<?php

namespace Parsers;

use Symfony\Component\Yaml\Yaml;

function convertingFile(string $pathToFile, string $extension): object
{
    $fileContent = (string)file_get_contents($pathToFile, true);

    switch ($extension) {
        case 'json':
            return json_decode($fileContent);
        case 'yaml':
            return Yaml::parse($fileContent, Yaml::PARSE_OBJECT_FOR_MAP);
        case 'yml':
            return Yaml::parse($fileContent, Yaml::PARSE_OBJECT_FOR_MAP);
        default:
            throw new \Exception("Invalid extension. Extension must be in JSON, YAML or YML");
    }
}
