<?php

namespace Recca0120\Twzipcode\Tests\Sources;

use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Sources\Json;

class JsonTest extends TestCase
{
    public function test_csv_contents()
    {
        $source = new StubJson('test.json');
        $source->setContents('[{"郵遞區號":"10058","縣市名稱":"臺北市","鄉鎮市區":"中正區","原始路名":"八德路１段","投遞範圍":"全"},{"郵遞區號":"10079","縣市名稱":"臺北市","鄉鎮市區":"中正區","原始路名":"三元街","投遞範圍":"單全"}]');

        $source->each(function ($zipcode, $county, $district, $rules) {
            self::assertEquals(100, $zipcode);
            self::assertEquals('臺北市', $county);
            self::assertEquals('中正區', $district);
            self::assertEquals([
                '10058,臺北市,中正區,八德路１段,全',
                '10079,臺北市,中正區,三元街,單全',
            ], $rules);
        });
    }
}

class StubJson extends Json
{
    private $contents = '';

    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    public function contents()
    {
        return $this->contents;
    }
}
