<?php

use Mockery as m;
use Recca0120\Twzipcode\Str;

class StrTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function test_chinese_number_1()
    {
        $this->assertSame(1, Str::digitize('一'));
    }

    public function test_chinese_number_10()
    {
        $this->assertSame(10, Str::digitize('十'));
    }

    public function test_chinese_number_12()
    {
        $this->assertSame(12, Str::digitize('十二'));
        $this->assertSame(12, Str::digitize('一十二'));
    }

    public function test_chinese_number_123()
    {
        $this->assertSame(123, Str::digitize('一百二十三'));
    }

    public function test_chinese_number_1234()
    {
        $this->assertSame(1234, Str::digitize('一千二百三十四'));
    }

    public function test_chinese_number_12345()
    {
        $this->assertSame(12345, Str::digitize('一萬二千三百四十五'));
    }

    public function test_chinese_number_123456()
    {
        $this->assertSame(123456, Str::digitize('十二萬三千四百五十六'));
    }

    public function test_chinese_number_1234567()
    {
        $this->assertSame(1234567, Str::digitize('一百二十三萬四千五百六十七'));
    }

    public function test_chinese_number_12345678()
    {
        $this->assertSame(12345678, Str::digitize('一千二百三十四萬五千六百七十八'));
    }

    public function test_a()
    {
        // $patterns = implode('', [
        //     '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
        //     '(?:(?P<unit>[縣市鄉鎮市區村里鄰路街段巷弄號樓])|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
        // ]);

        $patterns = implode('|', [
            '(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)',
            '(?P<name>.+?)(?P<unit>[縣市鄉鎮市區村里鄰路街段巷弄號樓])|(?=\d+(?:之\d+)?[巷弄號樓]|$)',
        ]);

        // |(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓])
        // $patterns = '(.*?[縣市]|.*?[鄉鎮市區]|.*?[村里]|.*?[鄰路街段巷弄號樓])';

        // $address = '臺中市大里區三民一街全';
        $address = '桃園市平鎮區鎮興里平鎮連123號至139號';

        preg_match_all('/'.$patterns.'/u', $address, $matches, PREG_SET_ORDER);

        // dump($matches);
    }
}
