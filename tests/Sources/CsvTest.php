<?php

namespace Recca0120\Twzipcode\Tests\Sources;

use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Sources\Csv;

class CsvTest extends TestCase
{
    public function test_csv_contents()
    {
        $source = new StubCsv('test.csv');
        $source->setContents('10058,臺北市,中正區,八德路１段,全
10079,臺北市,中正區,三元街,單全
');

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

class StubCsv extends Csv
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
