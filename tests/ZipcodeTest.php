<?php

namespace Recca0120\Twzipcode\Tests;

use Mockery as m;
use Recca0120\Twzipcode\Zipcode;
use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream;
use Recca0120\Twzipcode\Rules;
use Recca0120\Twzipcode\Storages\File;

class ZipcodeTest extends TestCase
{
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
26044,宜蘭縣,宜蘭市,慶和街同興巷,全
41274,臺中市,大里區,塗城路,單 505號以下
41271,臺中市,大里區,塗城路,單 507號以上
41274,臺中市,大里區,塗城路,雙 274號以下
41275,臺中市,大里區,塗城路,雙 276號以上
        ');
    }

    public function testZipcode()
    {
        $address = '臺中市大里區金城里14鄰塗城路735巷1弄509號';
        $zipcode = Zipcode::parse($address, $this->rules);

        $this->assertSame('412', $zipcode->zip3());
        $this->assertSame('41271', $zipcode->zip5());
        $this->assertSame('臺中市', $zipcode->county());
        $this->assertSame('大里區', $zipcode->district());
        $this->assertSame('金城里14鄰塗城路735巷1弄509號', $zipcode->shortAddress());
    }

    public function testZipcode2()
    {
        $address = '宜蘭縣宜蘭市金城里14鄰慶和街同興巷1弄509號';
        $zipcode = Zipcode::parse($address, $this->rules);

        $this->assertSame('260', $zipcode->zip3());
        $this->assertSame('26044', $zipcode->zip5());
        $this->assertSame('宜蘭縣', $zipcode->county());
        $this->assertSame('宜蘭市', $zipcode->district());
        $this->assertSame('金城里14鄰慶和街同興巷1弄509號', $zipcode->shortAddress());
    }
}
