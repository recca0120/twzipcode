<?php

namespace Recca0120\Twzipcode\Tests;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Rules;
use Recca0120\Twzipcode\Storages\File;

class RulesTest extends TestCase
{
    private $rules;

    protected function setUp(): void
    {
        $root = vfsStream::setup();
        $storage = new File($root->url());
        $this->rules = new Rules($storage);
        $storage->flush()->load('
10058,臺北市,中正區,八德路１段,全
10079,臺北市,中正區,三元街,單全
10070,臺北市,中正區,三元街,雙  48號以下
10079,臺北市,中正區,三元街,雙  50號以上
10068,臺北市,中正區,大埔街,單  15號以上
10068,臺北市,中正區,大埔街,雙  36號以上
10051,臺北市,中正區,中山北路１段,單   3號以下
10041,臺北市,中正區,中山北路１段,雙  48號以下
10051,臺北市,中正區,中山南路,單   5號以下
10041,臺北市,中正區,中山南路,雙  18號以下
10002,臺北市,中正區,中山南路,　   7號
10051,臺北市,中正區,中山南路,　   9號
10048,臺北市,中正區,中山南路,單  11號以上
10001,臺北市,中正區,中山南路,　  20號
10043,臺北市,中正區,中華路１段,單  25之   3號以下
10042,臺北市,中正區,中華路１段,單  27號至  47號
10010,臺北市,中正區,中華路１段,　  49號
10042,臺北市,中正區,中華路１段,單  51號以上
10065,臺北市,中正區,中華路２段,單  79號以下
10066,臺北市,中正區,中華路２段,單  81號至 101號
10068,臺北市,中正區,中華路２段,單 103號至 193號
10069,臺北市,中正區,中華路２段,單 195號至 315號
10067,臺北市,中正區,中華路２段,單 317號至 417號
10072,臺北市,中正區,中華路２段,單 419號以上
10055,臺北市,中正區,丹陽街,全
10051,臺北市,中正區,仁愛路１段,　   1號
10052,臺北市,中正區,仁愛路１段,連   2之   4號以上
10055,臺北市,中正區,仁愛路２段,單  37號以下
10060,臺北市,中正區,仁愛路２段,雙  48號以下
10056,臺北市,中正區,仁愛路２段,單  39號至  49號
10056,臺北市,中正區,仁愛路２段,雙  48之   1號至  64號
10062,臺北市,中正區,仁愛路２段,單  51號以上
10063,臺北市,中正區,仁愛路２段,雙  66號以上
20201,基隆市,中正區,義一路,　   1號
20241,基隆市,中正區,義一路,連   2號以上
20250,基隆市,中正區,義二路,全
20241,基隆市,中正區,義三路,單全
20248,基隆市,中正區,漁港一街,全
20249,基隆市,中正區,漁港二街,全
20249,基隆市,中正區,漁港三街,全
20249,基隆市,中正區,調和街,全
20248,基隆市,中正區,環港街,全
20243,基隆市,中正區,豐稔街,全
20249,基隆市,中正區,觀海街,全
36046,苗栗縣,苗栗市,大埔街,全
81245,高雄市,小港區,豐田街,全
81245,高雄市,小港區,豐登街,全
81245,高雄市,小港區,豐善街,全
81245,高雄市,小港區,豐街,全
81245,高雄市,小港區,豐點街,全
81257,高雄市,小港區,寶山街,全
81362,高雄市,左營區,大中一路,單 331號以上
81362,高雄市,左營區,大中一路,雙 386號以上
81362,高雄市,左營區,大中二路,單 241號以下
81368,高雄市,左營區,大中二路,雙 200號以下
81369,高雄市,左營區,大中二路,雙 202號至 698號
81369,高雄市,左營區,大中二路,單 243號至 479號
81365,高雄市,左營區,大中二路,單 481號以上
81354,高雄市,左營區,大中二路,雙 700號以上
81357,高雄市,左營區,大順一路,單  91號至  95號
81357,高雄市,左營區,大順一路,雙  96號至 568號
81357,高雄市,左營區,大順一路,單 201號至 389巷
        ');
    }

    public function testMatch()
    {
        // 10043,臺北市,中正區,中華路１段,單  25之   3號以下
        $this->assertSame('10043', $this->rules->match('臺北市中正區中華路１段25號'));
        $this->assertSame('10043', $this->rules->match('臺北市中正區中華路１段25-2號'));
        $this->assertSame('10043', $this->rules->match('臺北市中正區中華路１段25-3號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段25-4號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段26號'));

        // # 10042,臺北市,中正區,中華路１段,單  27號至  47號
        $this->assertSame('10043', $this->rules->match('臺北市中正區中華路１段25號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段26號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段27號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段28號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段29號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段45號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段46號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段47號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段48號'));
        $this->assertSame('10010', $this->rules->match('臺北市中正區中華路１段49號'));

        // 10010,臺北市,中正區,中華路１段,　  49號
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段48號'));
        $this->assertSame('10010', $this->rules->match('臺北市中正區中華路１段49號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段50號'));

        // 10042,臺北市,中正區,中華路１段,單  51號以上
        $this->assertSame('10010', $this->rules->match('臺北市中正區中華路１段49號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段50號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段51號'));
        $this->assertSame('100', $this->rules->match('臺北市中正區中華路１段52號'));
        $this->assertSame('10042', $this->rules->match('臺北市中正區中華路１段53號'));
    }

    public function testMatchGradually()
    {
        $this->rules->match('臺北市');
        $this->assertSame('1', $this->rules->match('臺北市'));
        $this->assertSame('100', $this->rules->match('臺北市中正區'));
        $this->assertSame('100', $this->rules->match('臺北市中正區仁愛路１段'));
        $this->assertSame('10051', $this->rules->match('臺北市中正區仁愛路１段1號'));
    }

    public function testZip3North()
    {
        File::$cached = [
            'zip3' => null,
            'zip5' => null,
        ];
        $rules = new Rules();
        $this->assertSame('100', $rules->match('台北市中正區'.uniqid()));
        $this->assertSame('103', $rules->match('台北市大同區'.uniqid()));
        $this->assertSame('104', $rules->match('台北市中山區'.uniqid()));
        $this->assertSame('105', $rules->match('台北市松山區'.uniqid()));
        $this->assertSame('106', $rules->match('台北市大安區'.uniqid()));
        $this->assertSame('108', $rules->match('台北市萬華區'.uniqid()));
        $this->assertSame('110', $rules->match('台北市信義區'.uniqid()));
        $this->assertSame('111', $rules->match('台北市士林區'.uniqid()));
        $this->assertSame('112', $rules->match('台北市北投區'.uniqid()));
        $this->assertSame('114', $rules->match('台北市內湖區'.uniqid()));
        $this->assertSame('115', $rules->match('台北市南港區'.uniqid()));
        $this->assertSame('116', $rules->match('台北市文山區'.uniqid()));

        $this->assertSame('207', $rules->match('新北市萬里區'.uniqid()));
        $this->assertSame('208', $rules->match('新北市金山區'.uniqid()));
        $this->assertSame('220', $rules->match('新北市板橋區'.uniqid()));
        $this->assertSame('221', $rules->match('新北市汐止區'.uniqid()));
        $this->assertSame('222', $rules->match('新北市深坑區'.uniqid()));
        // $this->assertSame('223', $rules->match('新北市石碇區'.uniqid()));
        $this->assertSame('224', $rules->match('新北市瑞芳區'.uniqid()));
        $this->assertSame('226', $rules->match('新北市平溪區'.uniqid()));
        $this->assertSame('227', $rules->match('新北市雙溪區'.uniqid()));
        $this->assertSame('228', $rules->match('新北市貢寮區'.uniqid()));
        $this->assertSame('231', $rules->match('新北市新店區'.uniqid()));
        $this->assertSame('232', $rules->match('新北市坪林區'.uniqid()));
        $this->assertSame('233', $rules->match('新北市烏來區'.uniqid()));
        $this->assertSame('234', $rules->match('新北市永和區'.uniqid()));
        $this->assertSame('235', $rules->match('新北市中和區'.uniqid()));
        $this->assertSame('236', $rules->match('新北市土城區'.uniqid()));
        $this->assertSame('237', $rules->match('新北市三峽區'.uniqid()));
        $this->assertSame('238', $rules->match('新北市樹林區'.uniqid()));
        $this->assertSame('239', $rules->match('新北市鶯歌區'.uniqid()));
        $this->assertSame('241', $rules->match('新北市三重區'.uniqid()));
        $this->assertSame('242', $rules->match('新北市新莊區'.uniqid()));
        $this->assertSame('243', $rules->match('新北市泰山區'.uniqid()));
        $this->assertSame('244', $rules->match('新北市林口區'.uniqid()));
        $this->assertSame('247', $rules->match('新北市蘆洲區'.uniqid()));
        $this->assertSame('248', $rules->match('新北市五股區'.uniqid()));
        $this->assertSame('249', $rules->match('新北市八里區'.uniqid()));
        $this->assertSame('251', $rules->match('新北市淡水區'.uniqid()));
        $this->assertSame('252', $rules->match('新北市三芝區'.uniqid()));
        $this->assertSame('253', $rules->match('新北市石門區'.uniqid()));

        $this->assertSame('200', $rules->match('基隆市仁愛區'.uniqid()));
        $this->assertSame('201', $rules->match('基隆市信義區'.uniqid()));
        $this->assertSame('202', $rules->match('基隆市中正區'.uniqid()));
        $this->assertSame('203', $rules->match('基隆市中山區'.uniqid()));
        $this->assertSame('204', $rules->match('基隆市安樂區'.uniqid()));
        $this->assertSame('205', $rules->match('基隆市暖暖區'.uniqid()));
        $this->assertSame('206', $rules->match('基隆市七堵區'.uniqid()));

        $this->assertSame('320', $rules->match('桃園市中壢區'.uniqid()));
        $this->assertSame('324', $rules->match('桃園市平鎮區'.uniqid()));
        $this->assertSame('325', $rules->match('桃園市龍潭區'.uniqid()));
        $this->assertSame('326', $rules->match('桃園市楊梅區'.uniqid()));
        $this->assertSame('327', $rules->match('桃園市新屋區'.uniqid()));
        $this->assertSame('328', $rules->match('桃園市觀音區'.uniqid()));
        $this->assertSame('330', $rules->match('桃園市桃園區'.uniqid()));
        $this->assertSame('333', $rules->match('桃園市龜山區'.uniqid()));
        $this->assertSame('334', $rules->match('桃園市八德區'.uniqid()));
        $this->assertSame('335', $rules->match('桃園市大溪區'.uniqid()));
        $this->assertSame('336', $rules->match('桃園市復興區'.uniqid()));
        $this->assertSame('337', $rules->match('桃園市大園區'.uniqid()));
        $this->assertSame('338', $rules->match('桃園市蘆竹區'.uniqid()));

        // $this->assertSame('300', $rules->match('新竹市'.uniqid()));
        $this->assertSame('302', $rules->match('新竹縣竹北市'.uniqid()));
        $this->assertSame('303', $rules->match('新竹縣湖口鄉'.uniqid()));
        $this->assertSame('304', $rules->match('新竹縣新豐鄉'.uniqid()));
        $this->assertSame('305', $rules->match('新竹縣新埔鎮'.uniqid()));
        $this->assertSame('306', $rules->match('新竹縣關西鎮'.uniqid()));
        $this->assertSame('307', $rules->match('新竹縣芎林鄉'.uniqid()));
        $this->assertSame('308', $rules->match('新竹縣寶山鄉'.uniqid()));
        $this->assertSame('310', $rules->match('新竹縣竹東鎮'.uniqid()));
        $this->assertSame('311', $rules->match('新竹縣五峰鄉'.uniqid()));
        $this->assertSame('312', $rules->match('新竹縣橫山鄉'.uniqid()));
        $this->assertSame('313', $rules->match('新竹縣尖石鄉'.uniqid()));
        $this->assertSame('314', $rules->match('新竹縣北埔鄉'.uniqid()));
        $this->assertSame('315', $rules->match('新竹縣峨眉鄉'.uniqid()));

        $this->assertSame('350', $rules->match('苗栗縣竹南鎮'.uniqid()));
        $this->assertSame('351', $rules->match('苗栗縣頭份鎮'.uniqid()));
        $this->assertSame('352', $rules->match('苗栗縣三灣鄉'.uniqid()));
        $this->assertSame('353', $rules->match('苗栗縣南庄鄉'.uniqid()));
        $this->assertSame('354', $rules->match('苗栗縣獅潭鄉'.uniqid()));
        $this->assertSame('356', $rules->match('苗栗縣後龍鎮'.uniqid()));
        $this->assertSame('357', $rules->match('苗栗縣通霄鎮'.uniqid()));
        $this->assertSame('358', $rules->match('苗栗縣苑裡鎮'.uniqid()));
        $this->assertSame('360', $rules->match('苗栗縣苗栗市'.uniqid()));
        $this->assertSame('361', $rules->match('苗栗縣造橋鄉'.uniqid()));
        $this->assertSame('362', $rules->match('苗栗縣頭屋鄉'.uniqid()));
        $this->assertSame('363', $rules->match('苗栗縣公館鄉'.uniqid()));
        $this->assertSame('364', $rules->match('苗栗縣大湖鄉'.uniqid()));
        $this->assertSame('365', $rules->match('苗栗縣泰安鄉'.uniqid()));
        $this->assertSame('366', $rules->match('苗栗縣銅鑼鄉'.uniqid()));
        $this->assertSame('367', $rules->match('苗栗縣三義鄉'.uniqid()));
        $this->assertSame('368', $rules->match('苗栗縣西湖鄉'.uniqid()));
        $this->assertSame('369', $rules->match('苗栗縣卓蘭鎮'.uniqid()));

        $this->assertSame('400', $rules->match('台中市中　區'.uniqid()));
        $this->assertSame('401', $rules->match('台中市東　區'.uniqid()));
        $this->assertSame('402', $rules->match('台中市南　區'.uniqid()));
        $this->assertSame('403', $rules->match('台中市西　區'.uniqid()));
        $this->assertSame('404', $rules->match('台中市北　區'.uniqid()));
        $this->assertSame('406', $rules->match('台中市北屯區'.uniqid()));
        $this->assertSame('407', $rules->match('台中市西屯區'.uniqid()));
        $this->assertSame('408', $rules->match('台中市南屯區'.uniqid()));
        $this->assertSame('411', $rules->match('台中市太平區'.uniqid()));
        $this->assertSame('412', $rules->match('台中市大里區'.uniqid()));
        $this->assertSame('413', $rules->match('台中市霧峰區'.uniqid()));
        $this->assertSame('414', $rules->match('台中市烏日區'.uniqid()));
        $this->assertSame('420', $rules->match('台中市豐原區'.uniqid()));
        $this->assertSame('421', $rules->match('台中市后里區'.uniqid()));
        $this->assertSame('422', $rules->match('台中市石岡區'.uniqid()));
        $this->assertSame('423', $rules->match('台中市東勢區'.uniqid()));
        $this->assertSame('424', $rules->match('台中市和平區'.uniqid()));
        $this->assertSame('426', $rules->match('台中市新社區'.uniqid()));
        $this->assertSame('427', $rules->match('台中市潭子區'.uniqid()));
        $this->assertSame('428', $rules->match('台中市大雅區'.uniqid()));
        $this->assertSame('429', $rules->match('台中市神岡區'.uniqid()));
        $this->assertSame('432', $rules->match('台中市大肚區'.uniqid()));
        $this->assertSame('433', $rules->match('台中市沙鹿區'.uniqid()));
        $this->assertSame('434', $rules->match('台中市龍井區'.uniqid()));
        $this->assertSame('435', $rules->match('台中市梧棲區'.uniqid()));
        $this->assertSame('436', $rules->match('台中市清水區'.uniqid()));
        $this->assertSame('437', $rules->match('台中市大甲區'.uniqid()));
        $this->assertSame('438', $rules->match('台中市外埔區'.uniqid()));
        $this->assertSame('439', $rules->match('台中市大安區'.uniqid()));

        $this->assertSame('500', $rules->match('彰化縣彰化市'.uniqid()));
        $this->assertSame('502', $rules->match('彰化縣芬園鄉'.uniqid()));
        $this->assertSame('503', $rules->match('彰化縣花壇鄉'.uniqid()));
        $this->assertSame('504', $rules->match('彰化縣秀水鄉'.uniqid()));
        $this->assertSame('505', $rules->match('彰化縣鹿港鎮'.uniqid()));
        $this->assertSame('506', $rules->match('彰化縣福興鄉'.uniqid()));
        $this->assertSame('507', $rules->match('彰化縣線西鄉'.uniqid()));
        $this->assertSame('508', $rules->match('彰化縣和美鎮'.uniqid()));
        $this->assertSame('509', $rules->match('彰化縣伸港鄉'.uniqid()));
        $this->assertSame('510', $rules->match('彰化縣員林鎮'.uniqid()));
        $this->assertSame('511', $rules->match('彰化縣社頭鄉'.uniqid()));
        $this->assertSame('512', $rules->match('彰化縣永靖鄉'.uniqid()));
        $this->assertSame('513', $rules->match('彰化縣埔心鄉'.uniqid()));
        $this->assertSame('514', $rules->match('彰化縣溪湖鎮'.uniqid()));
        $this->assertSame('515', $rules->match('彰化縣大村鄉'.uniqid()));
        $this->assertSame('516', $rules->match('彰化縣埔鹽鄉'.uniqid()));
        $this->assertSame('520', $rules->match('彰化縣田中鎮'.uniqid()));
        $this->assertSame('521', $rules->match('彰化縣北斗鎮'.uniqid()));
        $this->assertSame('522', $rules->match('彰化縣田尾鄉'.uniqid()));
        $this->assertSame('523', $rules->match('彰化縣埤頭鄉'.uniqid()));
        $this->assertSame('524', $rules->match('彰化縣溪州鄉'.uniqid()));
        $this->assertSame('525', $rules->match('彰化縣竹塘鄉'.uniqid()));
        $this->assertSame('526', $rules->match('彰化縣二林鎮'.uniqid()));
        $this->assertSame('527', $rules->match('彰化縣大城鄉'.uniqid()));
        $this->assertSame('528', $rules->match('彰化縣芳苑鄉'.uniqid()));
        $this->assertSame('530', $rules->match('彰化縣二水鄉'.uniqid()));

        $this->assertSame('540', $rules->match('南投縣南投市'.uniqid()));
        $this->assertSame('541', $rules->match('南投縣中寮鄉'.uniqid()));
        $this->assertSame('542', $rules->match('南投縣草屯鎮'.uniqid()));
        $this->assertSame('544', $rules->match('南投縣國姓鄉'.uniqid()));
        $this->assertSame('545', $rules->match('南投縣埔里鎮'.uniqid()));
        $this->assertSame('546', $rules->match('南投縣仁愛鄉'.uniqid()));
        $this->assertSame('551', $rules->match('南投縣名間鄉'.uniqid()));
        $this->assertSame('552', $rules->match('南投縣集集鎮'.uniqid()));
        $this->assertSame('553', $rules->match('南投縣水里鄉'.uniqid()));
        $this->assertSame('555', $rules->match('南投縣魚池鄉'.uniqid()));
        $this->assertSame('556', $rules->match('南投縣信義鄉'.uniqid()));
        $this->assertSame('557', $rules->match('南投縣竹山鎮'.uniqid()));
        $this->assertSame('558', $rules->match('南投縣鹿谷鄉'.uniqid()));

        $this->assertSame('630', $rules->match('雲林縣斗南鎮'.uniqid()));
        $this->assertSame('631', $rules->match('雲林縣大埤鄉'.uniqid()));
        $this->assertSame('632', $rules->match('雲林縣虎尾鎮'.uniqid()));
        $this->assertSame('633', $rules->match('雲林縣土庫鎮'.uniqid()));
        $this->assertSame('634', $rules->match('雲林縣褒忠鄉'.uniqid()));
        $this->assertSame('635', $rules->match('雲林縣東勢鄉'.uniqid()));
        $this->assertSame('636', $rules->match('雲林縣臺西鄉'.uniqid()));
        $this->assertSame('637', $rules->match('雲林縣崙背鄉'.uniqid()));
        $this->assertSame('638', $rules->match('雲林縣麥寮鄉'.uniqid()));
        $this->assertSame('640', $rules->match('雲林縣斗六市'.uniqid()));
        $this->assertSame('643', $rules->match('雲林縣林內鄉'.uniqid()));
        $this->assertSame('646', $rules->match('雲林縣古坑鄉'.uniqid()));
        $this->assertSame('647', $rules->match('雲林縣莿桐鄉'.uniqid()));
        $this->assertSame('648', $rules->match('雲林縣西螺鎮'.uniqid()));
        $this->assertSame('649', $rules->match('雲林縣二崙鄉'.uniqid()));
        $this->assertSame('651', $rules->match('雲林縣北港鎮'.uniqid()));
        $this->assertSame('652', $rules->match('雲林縣水林鄉'.uniqid()));
        $this->assertSame('653', $rules->match('雲林縣口湖鄉'.uniqid()));
        $this->assertSame('654', $rules->match('雲林縣四湖鄉'.uniqid()));
        $this->assertSame('655', $rules->match('雲林縣元長鄉'.uniqid()));

        // $this->assertSame('600', $rules->match('嘉義市'.uniqid()));
        $this->assertSame('602', $rules->match('嘉義縣番路鄉'.uniqid()));
        $this->assertSame('603', $rules->match('嘉義縣梅山鄉'.uniqid()));
        $this->assertSame('604', $rules->match('嘉義縣竹崎鄉'.uniqid()));
        $this->assertSame('605', $rules->match('嘉義縣阿里山鄉'.uniqid()));
        $this->assertSame('606', $rules->match('嘉義縣中埔鄉'.uniqid()));
        $this->assertSame('607', $rules->match('嘉義縣大埔鄉'.uniqid()));
        $this->assertSame('608', $rules->match('嘉義縣水上鄉'.uniqid()));
        $this->assertSame('611', $rules->match('嘉義縣鹿草鄉'.uniqid()));
        $this->assertSame('612', $rules->match('嘉義縣太保市'.uniqid()));
        $this->assertSame('613', $rules->match('嘉義縣朴子市'.uniqid()));
        $this->assertSame('614', $rules->match('嘉義縣東石鄉'.uniqid()));
        $this->assertSame('615', $rules->match('嘉義縣六腳鄉'.uniqid()));
        $this->assertSame('616', $rules->match('嘉義縣新港鄉'.uniqid()));
        $this->assertSame('621', $rules->match('嘉義縣民雄鄉'.uniqid()));
        $this->assertSame('622', $rules->match('嘉義縣大林鎮'.uniqid()));
        $this->assertSame('623', $rules->match('嘉義縣溪口鄉'.uniqid()));
        $this->assertSame('624', $rules->match('嘉義縣義竹鄉'.uniqid()));
        $this->assertSame('625', $rules->match('嘉義縣布袋鎮'.uniqid()));

        $this->assertSame('700', $rules->match('台南市中　區'.uniqid()));
        $this->assertSame('701', $rules->match('台南市東　區'.uniqid()));
        $this->assertSame('702', $rules->match('台南市南　區'.uniqid()));
        $this->assertSame('700', $rules->match('台南市西　區'.uniqid()));
        $this->assertSame('704', $rules->match('台南市北　區'.uniqid()));
        $this->assertSame('708', $rules->match('台南市安平區'.uniqid()));
        $this->assertSame('709', $rules->match('台南市安南區'.uniqid()));
        $this->assertSame('710', $rules->match('台南市永康區'.uniqid()));
        $this->assertSame('711', $rules->match('台南市歸仁區'.uniqid()));
        $this->assertSame('712', $rules->match('台南市新化區'.uniqid()));
        $this->assertSame('713', $rules->match('台南市左鎮區'.uniqid()));
        $this->assertSame('714', $rules->match('台南市玉井區'.uniqid()));
        $this->assertSame('715', $rules->match('台南市楠西區'.uniqid()));
        $this->assertSame('716', $rules->match('台南市南化區'.uniqid()));
        $this->assertSame('717', $rules->match('台南市仁德區'.uniqid()));
        $this->assertSame('718', $rules->match('台南市關廟區'.uniqid()));
        $this->assertSame('719', $rules->match('台南市龍崎區'.uniqid()));
        $this->assertSame('720', $rules->match('台南市官田區'.uniqid()));
        $this->assertSame('721', $rules->match('台南市麻豆區'.uniqid()));
        $this->assertSame('722', $rules->match('台南市佳里區'.uniqid()));
        $this->assertSame('723', $rules->match('台南市西港區'.uniqid()));
        $this->assertSame('724', $rules->match('台南市七股區'.uniqid()));
        $this->assertSame('725', $rules->match('台南市將軍區'.uniqid()));
        $this->assertSame('726', $rules->match('台南市學甲區'.uniqid()));
        $this->assertSame('727', $rules->match('台南市北門區'.uniqid()));
        $this->assertSame('730', $rules->match('台南市新營區'.uniqid()));
        $this->assertSame('731', $rules->match('台南市後壁區'.uniqid()));
        $this->assertSame('732', $rules->match('台南市白河區'.uniqid()));
        $this->assertSame('733', $rules->match('台南市東山區'.uniqid()));
        $this->assertSame('734', $rules->match('台南市六甲區'.uniqid()));
        $this->assertSame('735', $rules->match('台南市下營區'.uniqid()));
        $this->assertSame('736', $rules->match('台南市柳營區'.uniqid()));
        $this->assertSame('737', $rules->match('台南市鹽水區'.uniqid()));
        $this->assertSame('741', $rules->match('台南市善化區'.uniqid()));
        $this->assertSame('742', $rules->match('台南市大內區'.uniqid()));
        $this->assertSame('743', $rules->match('台南市山上區'.uniqid()));
        $this->assertSame('744', $rules->match('台南市新市區'.uniqid()));
        $this->assertSame('745', $rules->match('台南市安定區'.uniqid()));

        $this->assertSame('800', $rules->match('高雄市新興區'.uniqid()));
        $this->assertSame('801', $rules->match('高雄市前金區'.uniqid()));
        $this->assertSame('802', $rules->match('高雄市苓雅區'.uniqid()));
        $this->assertSame('803', $rules->match('高雄市鹽埕區'.uniqid()));
        $this->assertSame('804', $rules->match('高雄市鼓山區'.uniqid()));
        $this->assertSame('805', $rules->match('高雄市旗津區'.uniqid()));
        $this->assertSame('806', $rules->match('高雄市前鎮區'.uniqid()));
        $this->assertSame('807', $rules->match('高雄市三民區'.uniqid()));
        $this->assertSame('811', $rules->match('高雄市楠梓區'.uniqid()));
        $this->assertSame('812', $rules->match('高雄市小港區'.uniqid()));
        $this->assertSame('813', $rules->match('高雄市左營區'.uniqid()));
        $this->assertSame('814', $rules->match('高雄市仁武區'.uniqid()));
        $this->assertSame('815', $rules->match('高雄市大社區'.uniqid()));
        $this->assertSame('820', $rules->match('高雄市岡山區'.uniqid()));
        $this->assertSame('821', $rules->match('高雄市路竹區'.uniqid()));
        $this->assertSame('822', $rules->match('高雄市阿蓮區'.uniqid()));
        $this->assertSame('823', $rules->match('高雄市田寮區'.uniqid()));
        $this->assertSame('824', $rules->match('高雄市燕巢區'.uniqid()));
        $this->assertSame('825', $rules->match('高雄市橋頭區'.uniqid()));
        $this->assertSame('826', $rules->match('高雄市梓官區'.uniqid()));
        $this->assertSame('827', $rules->match('高雄市彌陀區'.uniqid()));
        $this->assertSame('828', $rules->match('高雄市永安區'.uniqid()));
        $this->assertSame('829', $rules->match('高雄市湖內區'.uniqid()));
        $this->assertSame('830', $rules->match('高雄市鳳山區'.uniqid()));
        $this->assertSame('831', $rules->match('高雄市大寮區'.uniqid()));
        $this->assertSame('832', $rules->match('高雄市林園區'.uniqid()));
        $this->assertSame('833', $rules->match('高雄市鳥松區'.uniqid()));
        $this->assertSame('840', $rules->match('高雄市大樹區'.uniqid()));
        $this->assertSame('842', $rules->match('高雄市旗山區'.uniqid()));
        $this->assertSame('843', $rules->match('高雄市美濃區'.uniqid()));
        $this->assertSame('844', $rules->match('高雄市六龜區'.uniqid()));
        $this->assertSame('845', $rules->match('高雄市內門區'.uniqid()));
        $this->assertSame('846', $rules->match('高雄市杉林區'.uniqid()));
        $this->assertSame('847', $rules->match('高雄市甲仙區'.uniqid()));
        $this->assertSame('848', $rules->match('高雄市桃源區'.uniqid()));
        $this->assertSame('849', $rules->match('高雄市那瑪夏區'.uniqid()));
        $this->assertSame('851', $rules->match('高雄市茂林區'.uniqid()));
        $this->assertSame('852', $rules->match('高雄市茄萣區'.uniqid()));

        $this->assertSame('900', $rules->match('屏東縣屏東市'.uniqid()));
        $this->assertSame('901', $rules->match('屏東縣三地門鄉'.uniqid()));
        $this->assertSame('902', $rules->match('屏東縣霧臺鄉'.uniqid()));
        $this->assertSame('903', $rules->match('屏東縣瑪家鄉'.uniqid()));
        $this->assertSame('904', $rules->match('屏東縣九如鄉'.uniqid()));
        $this->assertSame('905', $rules->match('屏東縣里港鄉'.uniqid()));
        $this->assertSame('906', $rules->match('屏東縣高樹鄉'.uniqid()));
        $this->assertSame('907', $rules->match('屏東縣鹽埔鄉'.uniqid()));
        $this->assertSame('908', $rules->match('屏東縣長治鄉'.uniqid()));
        $this->assertSame('909', $rules->match('屏東縣麟洛鄉'.uniqid()));
        $this->assertSame('911', $rules->match('屏東縣竹田鄉'.uniqid()));
        $this->assertSame('912', $rules->match('屏東縣內埔鄉'.uniqid()));
        $this->assertSame('913', $rules->match('屏東縣萬丹鄉'.uniqid()));
        $this->assertSame('920', $rules->match('屏東縣潮州鎮'.uniqid()));
        $this->assertSame('921', $rules->match('屏東縣泰武鄉'.uniqid()));
        $this->assertSame('922', $rules->match('屏東縣來義鄉'.uniqid()));
        $this->assertSame('923', $rules->match('屏東縣萬巒鄉'.uniqid()));
        $this->assertSame('924', $rules->match('屏東縣崁頂鄉'.uniqid()));
        $this->assertSame('925', $rules->match('屏東縣新埤鄉'.uniqid()));
        $this->assertSame('926', $rules->match('屏東縣南州鄉'.uniqid()));
        $this->assertSame('927', $rules->match('屏東縣林邊鄉'.uniqid()));
        $this->assertSame('928', $rules->match('屏東縣東港鎮'.uniqid()));
        $this->assertSame('929', $rules->match('屏東縣琉球鄉'.uniqid()));
        $this->assertSame('931', $rules->match('屏東縣佳冬鄉'.uniqid()));
        $this->assertSame('932', $rules->match('屏東縣新園鄉'.uniqid()));
        $this->assertSame('940', $rules->match('屏東縣枋寮鄉'.uniqid()));
        $this->assertSame('941', $rules->match('屏東縣枋山鄉'.uniqid()));
        $this->assertSame('942', $rules->match('屏東縣春日鄉'.uniqid()));
        $this->assertSame('943', $rules->match('屏東縣獅子鄉'.uniqid()));
        $this->assertSame('944', $rules->match('屏東縣車城鄉'.uniqid()));
        $this->assertSame('945', $rules->match('屏東縣牡丹鄉'.uniqid()));
        $this->assertSame('946', $rules->match('屏東縣恆春鎮'.uniqid()));
        $this->assertSame('947', $rules->match('屏東縣滿州鄉'.uniqid()));

        $this->assertSame('260', $rules->match('宜蘭縣宜蘭市'.uniqid()));
        $this->assertSame('261', $rules->match('宜蘭縣頭城鎮'.uniqid()));
        $this->assertSame('262', $rules->match('宜蘭縣礁溪鄉'.uniqid()));
        $this->assertSame('263', $rules->match('宜蘭縣壯圍鄉'.uniqid()));
        $this->assertSame('264', $rules->match('宜蘭縣員山鄉'.uniqid()));
        $this->assertSame('265', $rules->match('宜蘭縣羅東鎮'.uniqid()));
        $this->assertSame('266', $rules->match('宜蘭縣三星鄉'.uniqid()));
        $this->assertSame('267', $rules->match('宜蘭縣大同鄉'.uniqid()));
        $this->assertSame('268', $rules->match('宜蘭縣五結鄉'.uniqid()));
        $this->assertSame('269', $rules->match('宜蘭縣冬山鄉'.uniqid()));
        $this->assertSame('270', $rules->match('宜蘭縣蘇澳鎮'.uniqid()));
        $this->assertSame('272', $rules->match('宜蘭縣南澳鄉'.uniqid()));

        $this->assertSame('970', $rules->match('花蓮縣花蓮市'.uniqid()));
        $this->assertSame('971', $rules->match('花蓮縣新城鄉'.uniqid()));
        $this->assertSame('972', $rules->match('花蓮縣秀林鄉'.uniqid()));
        $this->assertSame('973', $rules->match('花蓮縣吉安鄉'.uniqid()));
        $this->assertSame('974', $rules->match('花蓮縣壽豐鄉'.uniqid()));
        $this->assertSame('975', $rules->match('花蓮縣鳳林鎮'.uniqid()));
        $this->assertSame('976', $rules->match('花蓮縣光復鄉'.uniqid()));
        $this->assertSame('977', $rules->match('花蓮縣豐濱鄉'.uniqid()));
        $this->assertSame('978', $rules->match('花蓮縣瑞穗鄉'.uniqid()));
        $this->assertSame('979', $rules->match('花蓮縣萬榮鄉'.uniqid()));
        $this->assertSame('981', $rules->match('花蓮縣玉里鎮'.uniqid()));
        $this->assertSame('982', $rules->match('花蓮縣卓溪鄉'.uniqid()));
        $this->assertSame('983', $rules->match('花蓮縣富里鄉'.uniqid()));

        $this->assertSame('950', $rules->match('台東縣臺東市'.uniqid()));
        $this->assertSame('951', $rules->match('台東縣綠島鄉'.uniqid()));
        $this->assertSame('952', $rules->match('台東縣蘭嶼鄉'.uniqid()));
        $this->assertSame('953', $rules->match('台東縣延平鄉'.uniqid()));
        $this->assertSame('954', $rules->match('台東縣卑南鄉'.uniqid()));
        $this->assertSame('955', $rules->match('台東縣鹿野鄉'.uniqid()));
        $this->assertSame('956', $rules->match('台東縣關山鎮'.uniqid()));
        $this->assertSame('957', $rules->match('台東縣海端鄉'.uniqid()));
        $this->assertSame('958', $rules->match('台東縣池上鄉'.uniqid()));
        $this->assertSame('959', $rules->match('台東縣東河鄉'.uniqid()));
        $this->assertSame('961', $rules->match('台東縣成功鎮'.uniqid()));
        $this->assertSame('962', $rules->match('台東縣長濱鄉'.uniqid()));
        $this->assertSame('963', $rules->match('台東縣太麻里鄉'.uniqid()));
        $this->assertSame('964', $rules->match('台東縣金峰鄉'.uniqid()));
        $this->assertSame('965', $rules->match('台東縣大武鄉'.uniqid()));
        $this->assertSame('966', $rules->match('台東縣達仁鄉'.uniqid()));

        $this->assertSame('890', $rules->match('金門縣金沙鎮'.uniqid()));
        $this->assertSame('891', $rules->match('金門縣金湖鎮'.uniqid()));
        $this->assertSame('892', $rules->match('金門縣金寧鄉'.uniqid()));
        $this->assertSame('893', $rules->match('金門縣金城鎮'.uniqid()));
        $this->assertSame('894', $rules->match('金門縣烈嶼鄉'.uniqid()));
        $this->assertSame('896', $rules->match('金門縣烏坵鄉'.uniqid()));
        $this->assertSame('880', $rules->match('澎湖縣馬公市'.uniqid()));
        $this->assertSame('881', $rules->match('澎湖縣西嶼鄉'.uniqid()));
        $this->assertSame('882', $rules->match('澎湖縣望安鄉'.uniqid()));
        $this->assertSame('883', $rules->match('澎湖縣七美鄉'.uniqid()));
        $this->assertSame('884', $rules->match('澎湖縣白沙鄉'.uniqid()));
        $this->assertSame('885', $rules->match('澎湖縣湖西鄉'.uniqid()));
        $this->assertSame('209', $rules->match('連江縣南竿鄉'.uniqid()));
        $this->assertSame('210', $rules->match('連江縣北竿鄉'.uniqid()));
        $this->assertSame('211', $rules->match('連江縣莒光鄉'.uniqid()));
        $this->assertSame('212', $rules->match('連江縣東引鄉'.uniqid()));
        $this->assertSame('817', $rules->match('南海諸島東 沙'.uniqid()));
        $this->assertSame('819', $rules->match('南海諸島南 沙'.uniqid()));
        $this->assertSame('290', $rules->match('南海諸島釣魚台列嶼'.uniqid()));
    }

    // public function testMatchMiddleToken()
    // {
    //     $this->assertSame('813', $this->rules->match('左營區'));
    //     $this->assertSame('81362', $this->rules->match('大中一路'));
    //     $this->assertSame('813', $this->rules->match('大中二路'));
    //     $this->assertSame('81362', $this->rules->match('左營區大中一路'));
    //     $this->assertSame('813', $this->rules->match('左營區大中二路'));

    //     $this->assertSame('812', $this->rules->match('小港區'));
    //     $this->assertSame('81245', $this->rules->match('豐街'));
    //     $this->assertSame('81245', $this->rules->match('小港區豐街'));

    //     $this->assertSame('', $this->rules->match('中正區'));

    //     $this->assertSame('', $this->rules->match('大埔街'));
    //     $this->assertSame('10068', $this->rules->match('台北市大埔街'));
    //     $this->assertSame('36046', $this->rules->match('苗栗縣大埔街'));
    // }
}
