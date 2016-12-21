<?php

use Mockery as m;
use Recca0120\Twzipcode\Str;

class StrTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_half_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $strArray = array_flip(Str::$fullCaseCharMap);

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

        foreach ($strArray as $half => $full) {
            $this->assertSame((string) $half, Str::half($full));
        }
    }

    public function test_full_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $strArray = Str::$fullCaseCharMap;

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

        foreach ($strArray as $full => $half) {
            $this->assertSame((string) $full, Str::full($half));
        }
    }

    public function test_address_init_normalization_chinese_number()
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

        $this->assertSame('八德路', Str::normalizeAddress('八德路'));
        $this->assertSame('三元街', Str::normalizeAddress('三元街'));

        $this->assertSame('3號', Str::normalizeAddress('三號'));
        $this->assertSame('18號', Str::normalizeAddress('十八號'));
        $this->assertSame('38號', Str::normalizeAddress('三十八號'));

        $this->assertSame('3段', Str::normalizeAddress('三段'));
        $this->assertSame('18路', Str::normalizeAddress('十八路'));
        $this->assertSame('38街', Str::normalizeAddress('三十八街'));

        $this->assertSame('信義路1段', Str::normalizeAddress('信義路一段'));
        $this->assertSame('敬業1路', Str::normalizeAddress('敬業一路'));
        $this->assertSame('愛富3街', Str::normalizeAddress('愛富三街'));
    }
}
