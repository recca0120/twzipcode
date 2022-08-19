<?php

namespace Recca0120\Twzipcode\Tests\Moskytw;

require __DIR__.'/stubs/Address.php';

use Mockery as m;
use Moskytw\Address;
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class AddressTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function test_address_init()
    {
        $expected = [['', '', '臺北', '市'], ['', '', '大安', '區'], ['', '', '市府', '路'], ['1', '', '', '號']];
        $this->assertSame($expected, (array) (new Address('臺北市大安區市府路1號'))->tokens());
    }

    public function test_address_init_subno()
    {
        $expected = [['', '', '臺北', '市'], ['', '', '大安', '區'], ['', '', '市府', '路'], ['1', '之1', '', '號']];
        $this->assertSame($expected, (array) (new Address('臺北市大安區市府路1之1號'))->tokens());
    }

    public function test_address_init_tricky_input()
    {
        $expected = [['', '', '桃園', '縣'], ['', '', '中壢', '市'], ['', '', '普義', '']];
        $this->assertSame($expected, (array) (new Address('桃園縣中壢市普義'))->tokens());

        $expected = [['', '', '桃園', '縣'], ['', '', '中壢', '市'], ['', '', '普義', ''], ['10', '', '', '號']];
        $this->assertSame($expected, (array) (new Address('桃園縣中壢市普義10號'))->tokens());

        $expected = [['', '', '臺北', '市'], ['', '', '中山', '區'], ['', '', '敬業1', '路']];
        $this->assertSame($expected, (array) (new Address('臺北市中山區敬業1路'))->tokens());

        $expected = [['', '', '臺北', '市'], ['', '', '中山', '區'], ['', '', '敬業1', '路'], ['10', '', '', '號']];
        $this->assertSame($expected, (array) (new Address('臺北市中山區敬業1路10號'))->tokens());
    }

    public function test_address_init_normalization()
    {
        $expected = [['', '', '臺北', '市'], ['', '', '大安', '區'], ['', '', '市府', '路'], ['1', '之1', '', '號']];

        $this->assertSame($expected, (array) (new Address('台北市大安區市府路1之1號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市大安區市府路１之１號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市　大安區　市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市，大安區，市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市，大安區，市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市, 大安區, 市府路 1 之 1 號'))->tokens());
        $this->assertSame($expected, (array) (new Address('臺北市, 大安區, 市府路 1 - 1 號'))->tokens());
    }

    public function test_address_init_normalization_chinese_number()
    {
        $this->assertSame('八德路', (new Address('八德路'))->normalize());
        $this->assertSame('三元街', (new Address('三元街'))->normalize());

        $this->assertSame('3號', (new Address('三號'))->normalize());
        $this->assertSame('18號', (new Address('十八號'))->normalize());
        $this->assertSame('38號', (new Address('三十八號'))->normalize());

        $this->assertSame('3段', (new Address('三段'))->normalize());
        $this->assertSame('18路', (new Address('十八路'))->normalize());
        $this->assertSame('38街', (new Address('三十八街'))->normalize());

        $this->assertSame('信義路1段', (new Address('信義路一段'))->normalize());
        $this->assertSame('敬業1路', (new Address('敬業一路'))->normalize());
        $this->assertSame('愛富3街', (new Address('愛富三街'))->normalize());
    }

    public function test_address_flat()
    {
        $address = new Address('臺北市大安區市府路1之1號');
        $this->assertSame('臺北市', $address->flat(1));
        $this->assertSame('臺北市', $address->flat(-3));
        $this->assertSame('臺北市大安區', $address->flat(2));
        $this->assertSame('臺北市大安區', $address->flat(-2));
        $this->assertSame('臺北市大安區市府路', $address->flat(3));
        $this->assertSame('臺北市大安區市府路', $address->flat(-1));
        $this->assertSame('臺北市大安區市府路1之1號', $address->flat());
    }
}
