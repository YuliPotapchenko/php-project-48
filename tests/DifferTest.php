<?phpnamespace Gendiff\Tests;use PHPUnit\Framework\TestCase;use function Differ\Differ\gendiff;class DifferTest extends TestCase{    public function testGendiff($firstFilePath, $secondFilePath): void    {        $expected = file_get_contents("tests/fixtures/SucsessDiffer.txt");        $this->assertEquals($expected, gendiff($firstFilePath, $secondFilePath));    }}