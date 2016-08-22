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

    public function test_taipei_datong_district_civic_blvd()
    {
        $normalizer = new Normalizer('台北市大同區市民大道一段209號5樓');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '臺北市',
            'district' => '大同區',
            'town'     => '',
            'lin'      => '',
            'road'     => '市民大道',
            'sec'      => '一段',
            'len'      => '',
            'non'      => '',
            'no'       => '209號',
            'floor'    => '5樓',
            'at'       => null,
        ]);
    }

    public function test_district_only_two_words()
    {
        $normalizer = new Normalizer('新竹市東區西大路323號8樓');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '新竹市',
            'district' => '東區',
            'town'     => '',
            'lin'      => '',
            'road'     => '西大路',
            'sec'      => '',
            'len'      => '',
            'non'      => '',
            'no'       => '323號',
            'floor'    => '8樓',
            'at'       => null,
        ]);
    }

    public function test_kaohsiung_qianzhen()
    {
        $normalizer = new Normalizer('高雄市前鎮區中華五路789號');
        $this->assertSame($normalizer->toArray(), [
            'county'   => '高雄市',
            'district' => '前鎮區',
            'town'     => '',
            'lin'      => '',
            'road'     => '中華五路',
            'sec'      => '',
            'len'      => '',
            'non'      => '',
            'no'       => '789號',
            'floor'    => null,
            'at'       => null,
        ]);
    }
}
