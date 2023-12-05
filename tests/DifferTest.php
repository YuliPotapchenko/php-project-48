<?phpnamespace Gendiff\Tests;use PHPUnit\Framework\TestCase;use function Differ\Differ\gendiff;class DifferTest extends TestCase{    public function testGendiffJson(): void    {        $expected = file_get_contents("tests/fixtures/SucsessDiffer.txt");        $this->assertEquals($expected, gendiff("tests/fixtures/file1.json", "tests/fixtures/file2.json"));        $expected1 = file_get_contents("tests/fixtures/SucsessDifferYaml.txt");        $this->assertEquals($expected1, gendiff("tests/fixtures/file1.yml", "tests/fixtures/file2.yml"));        $expected2 = file_get_contents("tests/fixtures/SuccessGenDiffStylish.txt");        $this->assertEquals($expected2, gendiff("tests/fixtures/file1.yml", "tests/fixtures/file2.yml","stylish"));        $expected3 = file_get_contents("tests/fixtures/SuccessGenDiffPlain.txt");        $this->assertEquals($expected3, gendiff("tests/fixtures/file1.yml", "tests/fixtures/file2.yml","plain"));    }}