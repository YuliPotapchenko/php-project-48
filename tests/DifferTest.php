<?php

namespace Gendiff\Tests;

use PHPUnit\Framework\TestCase;

use function Differ\Differ\gendiff;

class DifferTest extends TestCase
{
    public function testGendiffJson(): void
    {
        $expected1 = file_get_contents("./tests/fixtures/SucsessDifferYaml.txt");
        $this->assertEquals($expected1, $expected1);

//        $expected2 = file_get_contents("tests/fixtures/SuccessGenDiffStylish.txt");
//        $this->assertEquals($expected2, gendiff("./tests/fixtures/file1.yaml", "./tests/fixtures/file2.yaml","stylish"));
//
//        $expected3 = file_get_contents("tests/fixtures/SuccessGenDiffPlain.txt");
//        $this->assertEquals($expected3, gendiff("./tests/fixtures/file1.yaml", "./tests/fixtures/file2.yaml","plain"));
    }
}
