<?php

use Mockery as m;
use Recca0120\Twzipcode\Twzipcode;

class TwzipcodeTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_zipcode()
    {
        $twzipcode = new Twzipcode('北 縣　萬里鄉中正路100號');
        $this->assertSame($twzipcode->getZipcode(), '207');
        $this->assertSame($twzipcode->getCounty(), '新北市');
        $this->assertSame($twzipcode->getDistrict(), '萬里區');
        $this->assertSame($twzipcode->getAddress(), '新北市萬里區中正路100號');
        $this->assertSame($twzipcode->getShortAddress(), '中正路100號');
    }

    public function test_taichung()
    {
        $twzipcode = new Twzipcode('中縣　大里 市中正路100號');
        $this->assertSame($twzipcode->getZipcode(), '412');
        $this->assertSame($twzipcode->getCounty(), '台中市');
        $this->assertSame($twzipcode->getDistrict(), '大里區');
        $this->assertSame($twzipcode->getAddress(), '台中市大里區中正路100號');
        $this->assertSame($twzipcode->getShortAddress(), '中正路100號');
    }

    public function test_taitung()
    {
        $twzipcode = new Twzipcode('台東縣　台東 市中正路100號');
        $this->assertSame($twzipcode->getZipcode(), '950');
        $this->assertSame($twzipcode->getCounty(), '台東縣');
        $this->assertSame($twzipcode->getDistrict(), '臺東市');
        $this->assertSame($twzipcode->getAddress(), '台東縣臺東市中正路100號');
        $this->assertSame($twzipcode->getShortAddress(), '中正路100號');
    }
}
