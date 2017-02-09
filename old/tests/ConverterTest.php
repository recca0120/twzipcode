<?php

use Mockery as m;
use Recca0120\Twzipcode\Converter;

class ConverterTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_to_full_width()
    {
        $this->assertSame(Converter::toFull('A'), 'Ａ');
        $this->assertSame(Converter::toFull('Ａ'), 'Ａ');
    }

    public function test_to_half_width()
    {
        $this->assertSame(Converter::toHalf('Ａ'), 'A');
        $this->assertSame(Converter::toHalf('A'), 'A');
    }
}
