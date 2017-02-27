<?php

namespace Recca0120\Twzipcode\Tests;

use Mockery as m;
use org\bovigo\vfs\vfsStream;
use Recca0120\Twzipcode\Rules;
use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Zipcode;
use Recca0120\Twzipcode\Storages\File;

class ZipcodeTest extends TestCase
{
    protected $rules = null;

    protected function tearDown()
    {
        m::close();
    }

    protected function setUp()
    {
        $root = vfsStream::setup();
        $storage = new File($root->url());
        $this->rules = new Rules($storage);
        $storage->flush()->load('
10043,臺北市,中正區,中華路１段,單  25之   3號以下
10042,臺北市,中正區,中華路１段,單  27號以上
10065,臺北市,中正區,中華路２段,單  79號以下
10066,臺北市,中正區,中華路２段,單  81號至 101號
10068,臺北市,中正區,中華路２段,單 103號至 193號
10069,臺北市,中正區,中華路２段,單 195號至 315號
10067,臺北市,中正區,中華路２段,單 317號至 417號
10072,臺北市,中正區,中華路２段,單 419號以上
26044,宜蘭縣,宜蘭市,慶和街同興巷,全
26044,宜蘭縣,宜蘭市,慶和街慶和巷,全
26060,宜蘭縣,壯圍鄉,環市東路１段,連 374號以下
26341,宜蘭縣,壯圍鄉,土圍路,全
26341,宜蘭縣,壯圍鄉,大福路,全
26341,宜蘭縣,壯圍鄉,大福路１段,全
26341,宜蘭縣,壯圍鄉,大福路２段,全
26345,宜蘭縣,壯圍鄉,大福路３段,全
26343,宜蘭縣,壯圍鄉,中央路１段,全
26344,宜蘭縣,壯圍鄉,中央路２段,全
26341,宜蘭縣,壯圍鄉,中央路３段,全
41274,臺中市,大里區,塗城路,單 505號以下
41271,臺中市,大里區,塗城路,單 507號以上
41274,臺中市,大里區,塗城路,雙 274號以下
41275,臺中市,大里區,塗城路,雙 276號以上
        ');
    }

    public function testZipcode()
    {
        $address = '台中市大里區金城里14鄰塗城路9478巷9478弄9478號';
        $zipcode = Zipcode::parse($address, $this->rules ?: new Rules());

        $this->assertSame('412', $zipcode->zip3());
        $this->assertSame('41275', $zipcode->zip5());
        $this->assertSame('臺中市', $zipcode->county());
        $this->assertSame('大里區', $zipcode->district());
        $this->assertSame('臺中市大里區金城里14鄰塗城路9478巷9478弄9478號', $zipcode->address());
        $this->assertSame('金城里14鄰塗城路9478巷9478弄9478號', $zipcode->shortAddress());
    }

    public function testZipcode2()
    {
        $address = '宜蘭縣宜蘭市金城里14鄰慶和街同興巷9478弄9478號';
        $zipcode = Zipcode::parse($address, $this->rules ?: new Rules());

        $this->assertSame('260', $zipcode->zip3());
        $this->assertSame('26044', $zipcode->zip5());
        $this->assertSame('宜蘭縣', $zipcode->county());
        $this->assertSame('宜蘭市', $zipcode->district());
        $this->assertSame('宜蘭縣宜蘭市金城里14鄰慶和街同興巷9478弄9478號', $zipcode->address());
        $this->assertSame('金城里14鄰慶和街同興巷9478弄9478號', $zipcode->shortAddress());
    }

    public function testZipcode3()
    {
        $address = '台北市中正區中華路１段25號';
        $zipcode = Zipcode::parse($address, $this->rules ?: new Rules());

        $this->assertSame('100', $zipcode->zip3());
        $this->assertSame('10043', $zipcode->zip5());
        $this->assertSame('臺北市', $zipcode->county());
        $this->assertSame('中正區', $zipcode->district());
        $this->assertSame('臺北市中正區中華路1段25號', $zipcode->address());
        $this->assertSame('中華路1段25號', $zipcode->shortAddress());
    }

    public function testZipcode4()
    {
        $address = '宜蘭縣壯圍鄉環市東路１段374號';
        $zipcode = Zipcode::parse($address, $this->rules ?: new Rules());

        $this->assertSame('260', $zipcode->zip3());
        $this->assertSame('26060', $zipcode->zip5());
        $this->assertSame('宜蘭縣', $zipcode->county());
        $this->assertSame('壯圍鄉', $zipcode->district());
        $this->assertSame('宜蘭縣壯圍鄉環市東路1段374號', $zipcode->address());
        $this->assertSame('環市東路1段374號', $zipcode->shortAddress());
    }
}
