<?php

use Mockery as m;
use Recca0120\Twzipcode\Normalizer;

class NormalizerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_normalize() {
        $expected = '臺北市大安區市府路1之1號';

        $rows = [
            '台北市大安區市府路1之1號',
            '臺北市大安區市府路１之１號',
            '臺北市　大安區　市府路 1 之 1 號',
            '臺北市，大安區，市府路 1 之 1 號',
            '臺北市，大安區，市府路 1 之 1 號',
            '臺北市, 大安區, 市府路 1 之 1 號',
            '臺北市, 大安區, 市府路 1 - 1 號',
        ];

        foreach ($rows as $address) {
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->regularize()->value());
        }
    }

    public function test_digitize_9() {
        foreach (['段', '路', '街', '巷', '弄', '號', '樓'] as $unit) {
            $address = '四'.$unit;
            $expected = '4'.$unit;
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->digitize()->value());
        }
    }

    public function test_digitize_14() {
        foreach (['段', '路', '街', '巷', '弄', '號', '樓'] as $unit) {
            $address = '十四'.$unit;
            $expected = '14'.$unit;
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->digitize()->value());
        }
    }

    public function test_digitize_94() {
        foreach (['段', '路', '街', '巷', '弄', '號', '樓'] as $unit) {
            $address = '九十四'.$unit;
            $expected = '94'.$unit;
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->digitize()->value());
        }
    }

    public function test_digitize_947() {
        foreach (['段', '路', '街', '巷', '弄', '號', '樓'] as $unit) {
            $address = '九百四十七'.$unit;
            $expected = '947'.$unit;
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->digitize()->value());
        }
    }

    public function test_digitize_9478() {
        foreach (['段', '路', '街', '巷', '弄', '號', '樓'] as $unit) {
            $address = '九千四百七十八'.$unit;
            $expected = '9478'.$unit;
            $normalizer = new Normalizer($address);
            $this->assertSame($expected, $normalizer->digitize()->value());
        }
    }
}
