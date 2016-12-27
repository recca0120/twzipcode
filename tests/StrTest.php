<?php

use Mockery as m;
use Recca0120\Twzipcode\Str;

class StrTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_trim()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $string = ' foo  ';

        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        $string = new Str($string);

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        $this->assertSame('foo', (string) $string->trim());
    }

    public function test_replace()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $string = 'foo';

        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        $this->assertSame('baa', (string) (new Str($string))->replace(['f' => 'b', 'o' => 'a']));
        $this->assertSame('bar', (string) (new Str($string))->replace('/foo/', function($m) {
            $this->assertSame('foo', $m[0]);

            return 'bar';
        }));
        $this->assertSame('bar', (string) (new Str($string))->replace('/foo/', 'bar'));
    }


    public function test_to_full_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $map = Str::$fullCaseMap;

        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        foreach ($map as $full => $half) {
            $this->assertSame($full, (string) (new Str($half))->toFullCase());
        }
    }

    public function test_to_half_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $map = Str::$fullCaseMap;

        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        foreach ($map as $full => $half) {
            $this->assertSame($half, (string) (new Str($full))->toHalfCase());
        }
    }

    public function test_to_upper_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */



        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        $this->assertSame('FOO', (string) (new Str('foo'))->toUpperCase());
    }

    public function test_to_lower_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */



        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        $this->assertSame('foo', (string) (new Str('FOO'))->toLowerCase());
    }

    public function test_match()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $string = 'abcdef';
        $pattern = '/[a-z]?/';

        /*
        |------------------------------------------------------------
        | Act
        |------------------------------------------------------------
        */

        /*
        |------------------------------------------------------------
        | Assert
        |------------------------------------------------------------
        */

        $this->assertSame([['a', 'b', 'c', 'd', 'e', 'f', '']], (new Str($string))->match($pattern));
    }

    public function test_chinese_number_1()
    {
        $this->assertSame(1, (new Str('一'))->chineseToNumber());
    }

    public function test_chinese_number_10()
    {
        $this->assertSame(10, (new Str('十'))->chineseToNumber());
    }

    public function test_chinese_number_12()
    {
        $this->assertSame(12, (new Str('十二'))->chineseToNumber());
        $this->assertSame(12, (new Str('一十二'))->chineseToNumber());
    }

    public function test_chinese_number_123()
    {
        $this->assertSame(123, (new Str('一百二十三'))->chineseToNumber());
    }

    public function test_chinese_number_1234()
    {
        $this->assertSame(1234, (new Str('一千二百三十四'))->chineseToNumber());
    }

    public function test_chinese_number_12345()
    {
        $this->assertSame(12345, (new Str('一萬二千三百四十五'))->chineseToNumber());
    }

    public function test_chinese_number_123456()
    {
        $this->assertSame(123456, (new Str('十二萬三千四百五十六'))->chineseToNumber());
    }

    public function test_chinese_number_1234567()
    {
        $this->assertSame(1234567, (new Str('一百二十三萬四千五百六十七'))->chineseToNumber());
    }

    public function test_chinese_number_12345678()
    {
        $this->assertSame(12345678, (new Str('一千二百三十四萬五千六百七十八'))->chineseToNumber());
    }
}
