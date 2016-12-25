<?php

use Mockery as m;
use Recca0120\Twzipcode\Moskytw\Helper;

class MoskytwHelperTest extends PHPUnit_Framework_TestCase
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

        $strArray = array_flip(Helper::$fullCaseCharMap);

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
            $this->assertSame((string) $half, Helper::half($full));
        }
    }

    public function test_full_case()
    {
        /*
        |------------------------------------------------------------
        | Arrange
        |------------------------------------------------------------
        */

        $strArray = Helper::$fullCaseCharMap;

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
            $this->assertSame((string) $full, Helper::full($half));
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

        $this->assertSame('八德路', Helper::normalizeAddress('八德路'));
        $this->assertSame('三元街', Helper::normalizeAddress('三元街'));

        $this->assertSame('3號', Helper::normalizeAddress('三號'));
        $this->assertSame('18號', Helper::normalizeAddress('十八號'));
        $this->assertSame('38號', Helper::normalizeAddress('三十八號'));

        $this->assertSame('3段', Helper::normalizeAddress('三段'));
        $this->assertSame('18路', Helper::normalizeAddress('十八路'));
        $this->assertSame('38街', Helper::normalizeAddress('三十八街'));

        $this->assertSame('信義路1段', Helper::normalizeAddress('信義路一段'));
        $this->assertSame('敬業1路', Helper::normalizeAddress('敬業一路'));
        $this->assertSame('愛富3街', Helper::normalizeAddress('愛富三街'));
    }
}
