<?php

use Mockery as m;
use Recca0120\Twzipcode\Normalizer;

class NormalizerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_normailize_taipei()
    {
        $normalizer = new Normalizer('北 縣　萬里鄉龜港村中正路100號');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '新北市',
            'district' => '萬里區',
            'town'     => '龜港村',
            'lin'      => '',
            'road'     => '中正路',
            'sec'      => '',
            'len'      => '',
            'non'      => '',
            'no'       => '100號',
            'floor'    => null,
            'at'       => null,
        ]);
    }

    public function test_normailize_taichung()
    {
        $normalizer = new Normalizer('中縣　大里 市龜港村中正路100號');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '臺中市',
            'district' => '大里區',
            'town'     => '龜港里',
            'lin'      => '',
            'road'     => '中正路',
            'sec'      => '',
            'len'      => '',
            'non'      => '',
            'no'       => '100號',
            'floor'    => null,
            'at'       => null,
        ]);
    }

    public function test_normailize_taitung()
    {
        $normalizer = new Normalizer('台東縣　台東 市中正路100號');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '臺東縣',
            'district' => '臺東市',
            'town'     => '',
            'lin'      => '',
            'road'     => '中正路',
            'sec'      => '',
            'len'      => '',
            'non'      => '',
            'no'       => '100號',
            'floor'    => null,
            'at'       => null,
        ]);
    }
}
