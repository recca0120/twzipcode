<?php

namespace Recca0120\Twzipcode\Tests;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Address;

class AddressTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testGetTokens()
    {
        $address = new Address('臺北市大安區市府路1號');

        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '大安', '區'],
            ['', '', '市府', '路'],
            ['1', '', '', '號'],
        ], (array) $address->tokens());
    }

    public function testGetTokensWithZipcode()
    {
        $address = new Address('11008臺北市大安區市府路1號');

        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '大安', '區'],
            ['', '', '市府', '路'],
            ['1', '', '', '號'],
        ], (array) $address->tokens());
    }

    public function testGetTokensWithSubNo()
    {
        $address = new Address('臺北市大安區市府路1之1號');

        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '大安', '區'],
            ['', '', '市府', '路'],
            ['1', '之1', '', '號'],
        ], (array) $address->tokens());
    }

    public function testGetTokensWithTricky()
    {
        $address = new Address('桃園縣中壢市普義10號');

        $this->assertSame([
            ['', '', '桃園', '市'],
            ['', '', '中壢', '區'],
            ['', '', '普義', ''],
            ['10', '', '', '號'],
        ], (array) $address->tokens());
    }

    public function testGetTokensWithAddress()
    {
        // 20742,新北市,萬里區,二坪,全
        // 21042,連江縣,北竿鄉,坂里村,全
        // 24944,新北市,八里區,八里大道,全
        // 32058,桃園市,中壢區,華夏一村市場,全
        // 32464,桃園市,平鎮區,三和路,全
        // 32460,桃園市,平鎮區,鎮興里平鎮,連 123號至 139號
        // 41273,臺中市,大里區,三民一街,全
        // 42147,臺中市,后里區,七星街,全
        // 51547,彰化縣,大村鄉,大仁路１段,全
        // 52441,彰化縣,溪州鄉,村市路,全
        // 54544,南投縣,埔里鎮,一新一巷,全
        // 55347,南投縣,水里鄉,一廍路,全
        // 60541,嘉義縣,阿里山鄉,二萬平,全
        // 60845,嘉義縣,水上鄉,鄉村世界,全
        // 71342,臺南市,左鎮區,二寮,全
        // 72270,臺南市,佳里區,下廍,全
        // 74145,臺南市,新市區,大利一路,全
        // 80652,高雄市,前鎮區,一心一路,單 239號以下
        // 83043,高雄市,鳳山區,海光四村市場,全
        // 90542,屏東縣,里港鄉,八德路,全
        // 96341,臺東縣,太麻里鄉,千禧街,全
        // 98191,花蓮縣,玉里鎮,三民,全
        // 98342,花蓮縣,富里鄉,三台,全
        // 98392,花蓮縣,富里鄉,東里村復興,全

        $address = new Address('台中市大里區塗城路1號');

        $this->assertSame([
            ['', '', '臺中', '市'],
            ['', '', '大里', '區'],
            ['', '', '塗城', '路'],
            ['1', '', '', '號'],
        ], (array) $address->tokens());

        // dump((new Address('臺北市大同區市民大道１段'))->tokens());
    }
}
