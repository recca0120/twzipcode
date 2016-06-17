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
        $this->assertSame($normalizer->getAddress(), '新北市萬里區龜港村中正路100號');
    }

    public function test_normailize_taichung()
    {
        $normalizer = new Normalizer('中縣　大里 市龜港村中正路100號');
        $this->assertSame($normalizer->getAddress(), '台中市大里區龜港里中正路100號');
    }

    public function test_normailize_taitung()
    {
        $normalizer = new Normalizer('台東縣　台東 市中正路100號');
        $this->assertSame($normalizer->getAddress(), '台東縣臺東市中正路100號');
    }
}
