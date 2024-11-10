<?php

namespace Recca0120\Twzipcode\Tests;

use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Rule;

class RuleTest extends TestCase
{
    public function testGetTokensWithAll()
    {
        $rule = new Rule('10058,臺北市,中正區,八德路１段,全');

        $this->assertSame('10058', $rule->zip5());
        $this->assertSame(['全'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '八德', '路'],
            ['', '', '1', '段'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithSingleAll()
    {
        $rule = new Rule('10079,臺北市,中正區,三元街,單全');

        $this->assertSame('10079', $rule->zip5());
        $this->assertSame(['單', '全'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '三元', '街'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithDouble48Below()
    {
        $rule = new Rule('10070,臺北市,中正區,三元街,雙  48號以下');

        $this->assertSame('10070', $rule->zip5());
        $this->assertSame(['雙', '以下'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '三元', '街'],
            ['48', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithSingle15Above()
    {
        $rule = new Rule('10068,臺北市,中正區,大埔街,單  15號以上');

        $this->assertSame('10068', $rule->zip5());
        $this->assertSame(['單', '以上'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '大埔', '街'],
            ['15', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithSingle253Below()
    {
        $rule = new Rule('10043,臺北市,中正區,中華路１段,單  25之   3號以下');

        $this->assertSame('10043', $rule->zip5());
        $this->assertSame(['單', '以下'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '中華', '路'],
            ['', '', '1', '段'],
            ['25', '之3', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithSingle27To47()
    {
        $rule = new Rule('26142,宜蘭縣,頭城鎮,宜三路１段,單  27號至  47號');

        $this->assertSame('26142', $rule->zip5());
        $this->assertSame(['單', '至'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '宜蘭', '縣'],
            ['', '', '頭城', '鎮'],
            ['', '', '宜3', '路'],
            ['', '', '1', '段'],
            ['27', '', '', '號'],
            ['47', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithAnd24Above()
    {
        $rule = new Rule('10052,臺北市,中正區,仁愛路１段,連   2之   4號以上');

        $this->assertSame('10052', $rule->zip5());
        $this->assertSame(['以上'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '仁愛', '路'],
            ['', '', '1', '段'],
            ['2', '之4', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWith14SubNo()
    {
        $rule = new Rule('10060,臺北市,中正區,杭州南路１段,　  14號含附號');

        $this->assertSame('10060', $rule->zip5());
        $this->assertSame(['含附號'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '杭州南', '路'],
            ['', '', '1', '段'],
            ['14', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWith47SubNoAll()
    {
        $rule = new Rule('10371,臺北市,大同區,哈密街,　  47附號全');

        $this->assertSame('10371', $rule->zip5());
        $this->assertSame(['附號全'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '大同', '區'],
            ['', '', '哈密', '街'],
            ['47', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithDouble68Alley70SubNoAll()
    {
        $rule = new Rule('10367,臺北市,大同區,哈密街,雙  68巷至  70號含附號全');

        $this->assertSame('10367', $rule->zip5());
        $this->assertSame(['雙', '至', '含附號全'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '大同', '區'],
            ['', '', '哈密', '街'],
            ['68', '', '', '巷'],
            ['70', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWith49AndSubnoBelow()
    {
        $rule = new Rule('32083,桃園市,中壢區,普義,連  49號含附號以下');

        $this->assertSame('32083', $rule->zip5());
        $this->assertSame(['含附號以下'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '桃園', '市'],
            ['', '', '中壢', '區'],
            ['', '', '普義', ''],
            ['49', '', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWith13AndSubNoAbove()
    {
        $rule = new Rule('40763,臺中市,西屯區,西屯路３段西平南巷,　   1之   3號及以上附號');

        $this->assertSame('40763', $rule->zip5());
        $this->assertSame(['及以上附號'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺中', '市'],
            ['', '', '西屯', '區'],
            ['', '', '西屯', '路'],
            ['', '', '3', '段'],
            ['', '', '西平南', '巷'],
            ['1', '之3', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithTrickyDouble2681Below()
    {
        $rule = new Rule('23553,新北市,中和區,連城路,雙 268之   1號以下');

        $this->assertSame('23553', $rule->zip5());
        $this->assertSame(['雙', '以下'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '新北', '市'],
            ['', '', '中和', '區'],
            ['', '', '連城', '路'],
            ['268', '之1', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensWithTrickyFull()
    {
        $rule = new Rule('24341,新北市,泰山區,全興路,全');

        $this->assertSame('24341', $rule->zip5());
        $this->assertSame(['全'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '新北', '市'],
            ['', '', '泰山', '區'],
            ['', '', '全興', '路'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensToWithoutUnit()
    {
        $rule = new Rule('10017,臺北市,中正區,徐州路,　   5號 5至 9樓');

        $this->assertSame('10017', $rule->zip5());
        $this->assertSame(['至'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '臺北', '市'],
            ['', '', '中正', '區'],
            ['', '', '徐州', '路'],
            ['5', '', '', '號'],
            ['5', '', '', '樓'],
            ['9', '', '', '樓'],
        ], (array) $rule->address->tokens());
    }

    public function testGetTokensToSubnoWithoutUnit()
    {
        $rule = new Rule('26843,宜蘭縣,五結鄉,學進路,　  82之   1至之  20號');

        $this->assertSame('26843', $rule->zip5());
        $this->assertSame(['至'], (array) $rule->tokens());
        $this->assertSame([
            ['', '', '宜蘭', '縣'],
            ['', '', '五結', '鄉'],
            ['', '', '學進', '路'],
            ['82', '之1', '', '號'],
            ['82', '之20', '', '號'],
        ], (array) $rule->address->tokens());
    }

    public function testMatchTheSame()
    {
        $rule = new Rule('10087,臺北市,中正區,水源路臨,　   2號');

        $this->assertTrue($rule->match('臺北市中正區水源路臨2號'));
        $this->assertFalse($rule->match('臺北市中正區水源路臨3號'));
    }

    public function testMatchAll()
    {
        $rule = new Rule('10058,臺北市,中正區,八德路１段,全');

        $this->assertTrue($rule->match('臺北市中正區八德路１段1號'));
        $this->assertTrue($rule->match('臺北市中正區八德路１段9號'));

        $this->assertFalse($rule->match('臺北市中正區八德路２段1號'));
        $this->assertFalse($rule->match('臺北市中正區八德路２段9號'));
    }

    public function testMatchAlleyAll()
    {
        $rule = new Rule('10067,臺北市,中正區,汀州路１段,　  92巷全');

        $this->assertTrue($rule->match('臺北市中正區汀州路１段92巷1號'));
        $this->assertTrue($rule->match('臺北市中正區汀州路１段92巷1號'));

        $this->assertFalse($rule->match('臺北市中正區汀州路１段93巷1號'));
        $this->assertFalse($rule->match('臺北市中正區汀州路１段93巷1號'));
    }

    public function testMatchSingleAll()
    {
        $rule = new Rule('10079,臺北市,中正區,三元街,單全');

        $this->assertTrue($rule->match('臺北市中正區三元街5號'));
        $this->assertFalse($rule->match('臺北市中正區三元街6號'));
        $this->assertFalse($rule->match('臺北市中正區大埔街1號'));
    }

    public function testMatchDoubleAll()
    {
        $rule = new Rule('10051,臺北市,中正區,市民大道２段,雙全');

        $this->assertTrue($rule->match('臺北市中正區市民大道２段6號'));
        $this->assertFalse($rule->match('臺北市中正區市民大道２段5號'));
    }

    public function testMatchAbove()
    {
        $rule = new Rule('10055,臺北市,中正區,徐州路,　   5號10樓以上');

        $this->assertTrue($rule->match('臺北市中正區徐州路5號10樓'));
        $this->assertFalse($rule->match('臺北市中正區徐州路5號9樓'));
    }

    public function testMatchSingleAbove()
    {
        $rule = new Rule('10068,臺北市,中正區,大埔街,單  15號以上');

        $this->assertTrue($rule->match('臺北市中正區大埔街15號'));
        $this->assertTrue($rule->match('臺北市中正區大埔街17號'));

        $this->assertFalse($rule->match('臺北市中正區大埔街13號'));
        $this->assertFalse($rule->match('臺北市中正區大埔街14號'));
    }

    public function testMatchDoubleAbove()
    {
        $rule = new Rule('10079,臺北市,中正區,三元街,雙  50號以上');

        $this->assertTrue($rule->match('臺北市中正區三元街50號'));
        $this->assertTrue($rule->match('臺北市中正區三元街52號'));

        $this->assertFalse($rule->match('臺北市中正區三元街48號'));
        $this->assertFalse($rule->match('臺北市中正區三元街49號'));
        $this->assertFalse($rule->match('臺北市中正區三元街51號'));
    }

    public function testMatchBelow()
    {
        $rule = new Rule('10055,臺北市,中正區,徐州路,　   5號 4樓以下');

        $this->assertTrue($rule->match('臺北市中正區徐州路5號4樓'));
        $this->assertTrue($rule->match('臺北市中正區徐州路5號3樓'));

        $this->assertFalse($rule->match('臺北市中正區徐州路5號5樓'));
        $this->assertFalse($rule->match('臺北市中正區徐州路5號6樓'));
    }

    public function testMatchSingleBelow()
    {
        $rule = new Rule('10051,臺北市,中正區,中山南路,單   5號以下');

        $this->assertTrue($rule->match('臺北市中正區中山南路3號'));
        $this->assertTrue($rule->match('臺北市中正區中山南路5號'));

        $this->assertFalse($rule->match('臺北市大安區市府路4號'));
        $this->assertFalse($rule->match('臺北市大安區市府路6號'));
        $this->assertFalse($rule->match('臺北市大安區市府路7號'));
    }

    public function testMatchDoubleBelow()
    {
        $rule = new Rule('10070,臺北市,中正區,三元街,雙  48號以下');

        $this->assertTrue($rule->match('臺北市中正區三元街46號'));
        $this->assertTrue($rule->match('臺北市中正區三元街48號'));

        $this->assertFalse($rule->match('臺北市中正區三元街47號'));
        $this->assertFalse($rule->match('臺北市中正區三元街49號'));
    }

    public function testMatchSubNo()
    {
        $address = '臺北市大安區市府路5-1號';

        $this->assertTrue((new Rule('臺北市大安區市府路5號含附號'))->match($address));
    }

    public function testMatchSubNoAbove()
    {
        $address = '臺北市大安區市府路5-1號';

        $this->assertTrue((new Rule('臺北市大安區市府路5號及以上附號'))->match($address));
        $this->assertTrue((new Rule('臺北市大安區市府路4號及以上附號'))->match($address));
        $this->assertFalse((new Rule('臺北市大安區市府路6號及以上附號'))->match($address));
    }

    public function testMatchSubNoBelow()
    {
        $address = '臺北市大安區市府路5-1號';

        $this->assertTrue((new Rule('臺北市大安區市府路6號含附號以下'))->match($address));
        $this->assertTrue((new Rule('臺北市大安區市府路5號含附號以下'))->match($address));
        $this->assertFalse((new Rule('臺北市大安區市府路4號含附號以下'))->match($address));
    }

    public function testMatchTo()
    {
        $rule = new Rule('10017,臺北市,中正區,徐州路,　   5號 5至 9樓');

        $this->assertTrue($rule->match('臺北市中正區徐州路5號5樓'));
        $this->assertTrue($rule->match('臺北市中正區徐州路5號6樓'));
        $this->assertTrue($rule->match('臺北市中正區徐州路5號7樓'));
        $this->assertTrue($rule->match('臺北市中正區徐州路5號8樓'));
        $this->assertTrue($rule->match('臺北市中正區徐州路5號9樓'));

        $this->assertFalse($rule->match('臺北市中正區徐州路5號4樓'));
        $this->assertFalse($rule->match('臺北市中正區徐州路5號10樓'));
    }

    public function testMatchDoubleTo()
    {
        $rule = new Rule('10068,臺北市,中正區,汀州路１段,雙  20號至  80號');

        $this->assertTrue($rule->match('臺北市中正區汀州路１段20號'));
        $this->assertTrue($rule->match('臺北市中正區汀州路１段22號'));

        $this->assertFalse($rule->match('臺北市中正區汀州路１段18號'));
        $this->assertFalse($rule->match('臺北市中正區汀州路１段19號'));
        $this->assertFalse($rule->match('臺北市中正區汀州路１段21號'));
    }

    public function testMatchToSubNo()
    {
        $rule = new Rule('10508,臺北市,松山區,敦化北路,　 201之   1至之  39號');

        $this->assertTrue($rule->match('臺北市松山區敦化北路201-1號'));
        $this->assertTrue($rule->match('臺北市松山區敦化北路201-5號'));
        $this->assertTrue($rule->match('臺北市松山區敦化北路201-39號'));

        $this->assertFalse($rule->match('臺北市松山區敦化北路201-40號'));
        $this->assertFalse($rule->match('臺北市松山區敦化北路201-41號'));
    }

    public function testMatchAndSubNo()
    {
        $rule = new Rule('10060,臺北市,中正區,杭州南路１段,　  14號含附號');

        $this->assertTrue($rule->match('臺北市中正區杭州南路1段14號'));
        $this->assertTrue($rule->match('臺北市中正區杭州南路1段14-1號'));

        $this->assertFalse($rule->match('臺北市中正區杭州南路1段13號'));
        $this->assertFalse($rule->match('臺北市中正區杭州南路1段13-1號'));
        $this->assertFalse($rule->match('臺北市中正區杭州南路1段15號'));
        $this->assertFalse($rule->match('臺北市中正區杭州南路1段15-1號'));
    }

    public function testMatchSubNoAll()
    {
        $rule = new Rule('10371,臺北市,大同區,哈密街,　  47附號全');

        $this->assertTrue($rule->match('臺北市大同區哈密街47-1號'));

        $this->assertFalse($rule->match('臺北市大同區哈密街46號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街46-1號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街47號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街48號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街48-1號'));
    }

    public function testMatchDoubleToAndSubNoAll()
    {
        $rule = new Rule('10367,臺北市,大同區,哈密街,雙  68巷至  70號含附號全');

        $this->assertTrue($rule->match('臺北市大同區哈密街68巷'));
        $this->assertTrue($rule->match('臺北市大同區哈密街68-1號'));
        $this->assertTrue($rule->match('臺北市大同區哈密街70號'));
        $this->assertTrue($rule->match('臺北市大同區哈密街70-1號'));

        $this->assertFalse($rule->match('臺北市大同區哈密街66號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街66-1巷'));
        $this->assertFalse($rule->match('臺北市大同區哈密街67號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街67-1巷'));
        $this->assertFalse($rule->match('臺北市大同區哈密街69號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街69-1巷'));
        $this->assertFalse($rule->match('臺北市大同區哈密街71號'));
        $this->assertFalse($rule->match('臺北市大同區哈密街71-1號'));
    }

    public function testMatchAndSubNoAbove()
    {
        $rule = new Rule('32083,桃園市,中壢區,普義,連  49號含附號以下');

        $this->assertTrue($rule->match('桃園市中壢區普義48號'));
        $this->assertTrue($rule->match('桃園市中壢區普義48-1號'));
        $this->assertTrue($rule->match('桃園市中壢區普義49號'));
        $this->assertTrue($rule->match('桃園市中壢區普義49-1號'));
        $this->assertFalse($rule->match('桃園市中壢區普義50號'));
        $this->assertFalse($rule->match('桃園市中壢區普義50-1號'));
    }

    public function testMatchToAndSubNoAbove()
    {
        $rule = new Rule('40763,臺中市,西屯區,西屯路３段西平南巷,　   2之   3號及以上附號');

        $this->assertTrue($rule->match('臺中市西屯區西屯路3段西平南巷2-3號'));
        $this->assertTrue($rule->match('臺中市西屯區西屯路3段西平南巷3號'));
        $this->assertTrue($rule->match('臺中市西屯區西屯路3段西平南巷3-1號'));
        $this->assertTrue($rule->match('臺中市西屯區西屯路3段西平南巷4號'));
        $this->assertTrue($rule->match('臺中市西屯區西屯路3段西平南巷4-1號'));

        $this->assertFalse($rule->match('臺中市西屯區西屯路3段西平南巷1號'));
        $this->assertFalse($rule->match('臺中市西屯區西屯路3段西平南巷1-1號'));
        $this->assertFalse($rule->match('臺中市西屯區西屯路3段西平南巷2號'));
        $this->assertFalse($rule->match('臺中市西屯區西屯路3段西平南巷2-2號'));
    }

    public function testMatchGradual()
    {
        $rule = new Rule('10051,臺北市,中正區,仁愛路１段,　   1號');

        $this->assertTrue($rule->match('臺北市中正區仁愛路１段1號'));

        $this->assertFalse($rule->match('臺北市'));
        $this->assertFalse($rule->match('臺北市中正區'));
        $this->assertFalse($rule->match('臺北市中正區仁愛路１段'));
    }

    public function testMatchGradualFull()
    {
        $rule = new Rule('10055,臺北市,中正區,丹陽街,全');

        $this->assertFalse($rule->match('臺北市'));
        $this->assertFalse($rule->match('臺北市中正區'));
        $this->assertFalse($rule->match('臺北市中正區仁愛路１段'));
        $this->assertFalse($rule->match('臺北市中正區仁愛路１段1號'));
    }

    public function testMatchGradualDoubleFull()
    {
        $rule = new Rule('信義路一段雙全');

        $this->assertTrue($rule->match('信義路一段2號'));

        $this->assertFalse($rule->match('信義路一段'));
        $this->assertFalse($rule->match('信義路一段1號'));
    }

    public function testTricky()
    {
        $rule = new Rule('10884,臺北市,萬華區,艋舺大道,雙 382號至 396號');
        $this->assertTrue($rule->match('臺北市萬華區艋舺大道388號'));
    }
}
