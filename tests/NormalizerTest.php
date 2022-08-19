<?php

namespace Recca0120\Twzipcode\Tests;

use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Normalizer;

class NormalizerTest extends TestCase
{
    public function testNormalize()
    {
        $data = [
            '台北市大安區市府路1之1號',
            '臺北市大安區市府路１之１號',
            '臺北市　大安區　市府路 1 之 1 號',
            '臺北市，大安區，市府路 1 之 1 號',
            '臺北市，大安區，市府路 1 之 1 號',
            '臺北市, 大安區, 市府路 1 之 1 號',
            '臺北市, 大安區, 市府路 1 - 1 號',
        ];

        foreach ($data as $address) {
            $normalizer = new Normalizer($address);
            $this->assertSame('臺北市大安區市府路1之1號', (string) $normalizer->regularize());
        }
    }

    public function testDigitize9()
    {
        foreach ($this->units as $unit) {
            $normalizer = new Normalizer('臺北市大安區市府四'.$unit);
            $this->assertSame('臺北市大安區市府4'.$unit, (string) $normalizer->digitize());
        }
    }

    public function testDigitize14()
    {
        foreach ($this->units as $unit) {
            $normalizer = new Normalizer('臺北市大安區市府十四'.$unit);
            $this->assertSame('臺北市大安區市府14'.$unit, (string) $normalizer->digitize());
        }
    }

    public function testDigitize94()
    {
        foreach ($this->units as $unit) {
            $normalizer = new Normalizer('臺北市大安區市府九十四'.$unit);
            $this->assertSame('臺北市大安區市府94'.$unit, (string) $normalizer->digitize());
        }
    }

    public function testDigitize947()
    {
        foreach ($this->units as $unit) {
            $normalizer = new Normalizer('臺北市大安區市府九百四十七'.$unit);
            $this->assertSame('臺北市大安區市府947'.$unit, (string) $normalizer->digitize());
        }
    }

    public function testDigitize9478()
    {
        foreach ($this->units as $unit) {
            $normalizer = new Normalizer('臺北市大安區市府九千四百七十八'.$unit);
            $this->assertSame('臺北市大安區市府9478'.$unit, (string) $normalizer->digitize());
        }
    }

    public function testNormalizeAddress()
    {
        $this->assertSame('新北市板橋區', (string) Normalizer::factory('臺北縣板橋市')->normalizeAddress());
        $this->assertSame('臺中市豐原區', (string) Normalizer::factory('臺中縣豐原市')->normalizeAddress());
        $this->assertSame('高雄市鳳山區第一', (string) Normalizer::factory('高雄縣鳳山市第一')->normalizeAddress());
        $this->assertSame('臺南市新營區', (string) Normalizer::factory('臺南縣新營市')->normalizeAddress());
    }

    protected function setUp(): void
    {
        $this->units = ['段', '路', '街', '巷', '弄', '號', '樓'];
    }
}
