<?php

use Mockery as m;
use Recca0120\Twzipcode\Address;

class AddressTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_address_init()
    {
        $expected = [['', '', '臺北', '市'], ['', '', '大安', '區'], ['', '', '市府', '路'], ['1', '', '', '號']];
        $this->assertSame($expected, (new Address('臺北市大安區市府路1號'))->tokens());
    }

    public function test_address_init_subno()
    {
        $expected = [['','','臺北','市'],['','','大安','區'],['','','市府','路'],['1','之1','','號']];
        $this->assertSame($expected, (new Address('臺北市大安區市府路1之1號'))->tokens());
    }

    public function test_address_init_tricky_input()
    {
        $expected = [['','','桃園','縣'],['','','中壢','市'],['','','普義','']];
        $this->assertSame($expected, (new Address('桃園縣中壢市普義'))->tokens());

        $expected = [['','','桃園','縣'],['','','中壢','市'],['','','普義',''],['10','','','號']];
        $this->assertSame($expected, (new Address('桃園縣中壢市普義10號'))->tokens());

        $expected = [['','','臺北','市'],['','','中山','區'],['','','敬業1','路']];
        $this->assertSame($expected, (new Address('臺北市中山區敬業1路'))->tokens());

        $expected = [['','','臺北','市'],['','','中山','區'],['','','敬業1','路'],['10','','','號']];
        $this->assertSame($expected, (new Address('臺北市中山區敬業1路10號'))->tokens());
    }





    public function test_address_init_normalization()
    {
        $expected = [['','','臺北','市'],['','','大安','區'],['','','市府','路'],['1','之1','','號']];

        $this->assertSame($expected, (new Address('台北市大安區市府路1之1號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市大安區市府路１之１號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市　大安區　市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市，大安區，市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市，大安區，市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市, 大安區, 市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (new Address('臺北市, 大安區, 市府路 1 - 1 號'))->tokens());
    }
}

// echo (mb_convert_encoding(var_export($twzipcode->tokens(), true), 'big5', 'utf8'));
