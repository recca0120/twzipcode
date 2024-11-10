<?php

namespace Recca0120\Twzipcode\Tests;

use PHPUnit\Framework\TestCase;
use Recca0120\Twzipcode\Normalizer;

class NormalizerKaohsiungTest extends TestCase
{
    public function testNormalizeKaohsiungAddress()
    {
        $this->assertSame('高雄市鹽埕區藍橋里', (string) Normalizer::factory('高雄市鹽埕區藍橋里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區慈愛里', (string) Normalizer::factory('高雄市鹽埕區慈愛里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區博愛里', (string) Normalizer::factory('高雄市鹽埕區博愛里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區壽星里', (string) Normalizer::factory('高雄市鹽埕區壽星里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區中山里', (string) Normalizer::factory('高雄市鹽埕區中山里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區教仁里', (string) Normalizer::factory('高雄市鹽埕區教仁里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區新樂里', (string) Normalizer::factory('高雄市鹽埕區新樂里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區中原里', (string) Normalizer::factory('高雄市鹽埕區中原里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區光明里', (string) Normalizer::factory('高雄市鹽埕區光明里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區育仁里', (string) Normalizer::factory('高雄市鹽埕區育仁里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區河濱里', (string) Normalizer::factory('高雄市鹽埕區河濱里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區沙地里', (string) Normalizer::factory('高雄市鹽埕區沙地里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區南端里', (string) Normalizer::factory('高雄市鹽埕區南端里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區港都里', (string) Normalizer::factory('高雄市鹽埕區港都里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區江西里', (string) Normalizer::factory('高雄市鹽埕區江西里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區新豐里', (string) Normalizer::factory('高雄市鹽埕區新豐里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區府北里', (string) Normalizer::factory('高雄市鹽埕區府北里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區陸橋里', (string) Normalizer::factory('高雄市鹽埕區陸橋里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區瀨南里', (string) Normalizer::factory('高雄市鹽埕區瀨南里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區新化里', (string) Normalizer::factory('高雄市鹽埕區新化里')->normalizeAddress());
        $this->assertSame('高雄市鹽埕區江南里', (string) Normalizer::factory('高雄市鹽埕區江南里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區鼓峰里', (string) Normalizer::factory('高雄市鼓山區鼓峰里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區雄峰里', (string) Normalizer::factory('高雄市鼓山區雄峰里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區前峰里', (string) Normalizer::factory('高雄市鼓山區前峰里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區光榮里', (string) Normalizer::factory('高雄市鼓山區光榮里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區民族里', (string) Normalizer::factory('高雄市鼓山區民族里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區內惟里', (string) Normalizer::factory('高雄市鼓山區內惟里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區建國里', (string) Normalizer::factory('高雄市鼓山區建國里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區忠正里', (string) Normalizer::factory('高雄市鼓山區忠正里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區自強里', (string) Normalizer::factory('高雄市鼓山區自強里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區龍井里', (string) Normalizer::factory('高雄市鼓山區龍井里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區正德里', (string) Normalizer::factory('高雄市鼓山區正德里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區平和里', (string) Normalizer::factory('高雄市鼓山區平和里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區民強里', (string) Normalizer::factory('高雄市鼓山區民強里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區厚生里', (string) Normalizer::factory('高雄市鼓山區厚生里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區龍子里', (string) Normalizer::factory('高雄市鼓山區龍子里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區龍水里', (string) Normalizer::factory('高雄市鼓山區龍水里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區明誠里', (string) Normalizer::factory('高雄市鼓山區明誠里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區華豐里', (string) Normalizer::factory('高雄市鼓山區華豐里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區裕興里', (string) Normalizer::factory('高雄市鼓山區裕興里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區裕豐里', (string) Normalizer::factory('高雄市鼓山區裕豐里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區鼓岩里', (string) Normalizer::factory('高雄市鼓山區鼓岩里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區樹德里', (string) Normalizer::factory('高雄市鼓山區樹德里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區寶樹里', (string) Normalizer::factory('高雄市鼓山區寶樹里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區興宗里', (string) Normalizer::factory('高雄市鼓山區興宗里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區光化里', (string) Normalizer::factory('高雄市鼓山區光化里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區山下里', (string) Normalizer::factory('高雄市鼓山區山下里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區河邊里', (string) Normalizer::factory('高雄市鼓山區河邊里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區綠川里', (string) Normalizer::factory('高雄市鼓山區綠川里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區登山里', (string) Normalizer::factory('高雄市鼓山區登山里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區峰南里', (string) Normalizer::factory('高雄市鼓山區峰南里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區麗興里', (string) Normalizer::factory('高雄市鼓山區麗興里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區新民里', (string) Normalizer::factory('高雄市鼓山區新民里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區延平里', (string) Normalizer::factory('高雄市鼓山區延平里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區維生里', (string) Normalizer::factory('高雄市鼓山區維生里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區惠安里', (string) Normalizer::factory('高雄市鼓山區惠安里')->normalizeAddress());
        $this->assertSame('高雄市鼓山區壽山里', (string) Normalizer::factory('高雄市鼓山區壽山里')->normalizeAddress());
        $this->assertSame(
            '高雄市鼓山區哨船頭里',
            (string) Normalizer::factory('高雄市鼓山區哨船頭里')->normalizeAddress()
        );
        $this->assertSame('高雄市鼓山區桃源里', (string) Normalizer::factory('高雄市鼓山區桃源里')->normalizeAddress());
        $this->assertSame('高雄市左營區進學里', (string) Normalizer::factory('高雄市左營區進學里')->normalizeAddress());
        $this->assertSame('高雄市左營區尾西里', (string) Normalizer::factory('高雄市左營區尾西里')->normalizeAddress());
        $this->assertSame('高雄市左營區頂北里', (string) Normalizer::factory('高雄市左營區頂北里')->normalizeAddress());
        $this->assertSame('高雄市左營區中北里', (string) Normalizer::factory('高雄市左營區中北里')->normalizeAddress());
        $this->assertSame('高雄市左營區中南里', (string) Normalizer::factory('高雄市左營區中南里')->normalizeAddress());
        $this->assertSame('高雄市左營區廟東里', (string) Normalizer::factory('高雄市左營區廟東里')->normalizeAddress());
        $this->assertSame('高雄市左營區廟北里', (string) Normalizer::factory('高雄市左營區廟北里')->normalizeAddress());
        $this->assertSame('高雄市左營區尾南里', (string) Normalizer::factory('高雄市左營區尾南里')->normalizeAddress());
        $this->assertSame('高雄市左營區尾北里', (string) Normalizer::factory('高雄市左營區尾北里')->normalizeAddress());
        $this->assertSame('高雄市左營區屏山里', (string) Normalizer::factory('高雄市左營區屏山里')->normalizeAddress());
        $this->assertSame('高雄市左營區祥和里', (string) Normalizer::factory('高雄市左營區祥和里')->normalizeAddress());
        $this->assertSame('高雄市左營區永清里', (string) Normalizer::factory('高雄市左營區永清里')->normalizeAddress());
        $this->assertSame('高雄市左營區復興里', (string) Normalizer::factory('高雄市左營區復興里')->normalizeAddress());
        $this->assertSame('高雄市左營區莒光里', (string) Normalizer::factory('高雄市左營區莒光里')->normalizeAddress());
        $this->assertSame('高雄市左營區光輝里', (string) Normalizer::factory('高雄市左營區光輝里')->normalizeAddress());
        $this->assertSame('高雄市左營區合群里', (string) Normalizer::factory('高雄市左營區合群里')->normalizeAddress());
        $this->assertSame('高雄市左營區明建里', (string) Normalizer::factory('高雄市左營區明建里')->normalizeAddress());
        $this->assertSame('高雄市左營區頂西里', (string) Normalizer::factory('高雄市左營區頂西里')->normalizeAddress());
        $this->assertSame('高雄市左營區聖后里', (string) Normalizer::factory('高雄市左營區聖后里')->normalizeAddress());
        $this->assertSame('高雄市左營區聖西里', (string) Normalizer::factory('高雄市左營區聖西里')->normalizeAddress());
        $this->assertSame('高雄市左營區聖南里', (string) Normalizer::factory('高雄市左營區聖南里')->normalizeAddress());
        $this->assertSame('高雄市左營區城南里', (string) Normalizer::factory('高雄市左營區城南里')->normalizeAddress());
        $this->assertSame('高雄市左營區路東里', (string) Normalizer::factory('高雄市左營區路東里')->normalizeAddress());
        $this->assertSame('高雄市左營區廍北里', (string) Normalizer::factory('高雄市左營區廍北里')->normalizeAddress());
        $this->assertSame('高雄市左營區廍南里', (string) Normalizer::factory('高雄市左營區廍南里')->normalizeAddress());
        $this->assertSame('高雄市左營區埤西里', (string) Normalizer::factory('高雄市左營區埤西里')->normalizeAddress());
        $this->assertSame('高雄市左營區埤北里', (string) Normalizer::factory('高雄市左營區埤北里')->normalizeAddress());
        $this->assertSame('高雄市左營區埤東里', (string) Normalizer::factory('高雄市左營區埤東里')->normalizeAddress());
        $this->assertSame('高雄市左營區海勝里', (string) Normalizer::factory('高雄市左營區海勝里')->normalizeAddress());
        $this->assertSame('高雄市左營區崇實里', (string) Normalizer::factory('高雄市左營區崇實里')->normalizeAddress());
        $this->assertSame('高雄市左營區自助里', (string) Normalizer::factory('高雄市左營區自助里')->normalizeAddress());
        $this->assertSame('高雄市左營區果貿里', (string) Normalizer::factory('高雄市左營區果貿里')->normalizeAddress());
        $this->assertSame('高雄市左營區果惠里', (string) Normalizer::factory('高雄市左營區果惠里')->normalizeAddress());
        $this->assertSame('高雄市左營區果峰里', (string) Normalizer::factory('高雄市左營區果峰里')->normalizeAddress());
        $this->assertSame('高雄市左營區新下里', (string) Normalizer::factory('高雄市左營區新下里')->normalizeAddress());
        $this->assertSame('高雄市左營區新上里', (string) Normalizer::factory('高雄市左營區新上里')->normalizeAddress());
        $this->assertSame('高雄市左營區新中里', (string) Normalizer::factory('高雄市左營區新中里')->normalizeAddress());
        $this->assertSame('高雄市左營區新光里', (string) Normalizer::factory('高雄市左營區新光里')->normalizeAddress());
        $this->assertSame('高雄市左營區菜公里', (string) Normalizer::factory('高雄市左營區菜公里')->normalizeAddress());
        $this->assertSame('高雄市左營區福山里', (string) Normalizer::factory('高雄市左營區福山里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區清豐里', (string) Normalizer::factory('高雄市楠梓區清豐里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區東寧里', (string) Normalizer::factory('高雄市楠梓區東寧里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區五常里', (string) Normalizer::factory('高雄市楠梓區五常里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區享平里', (string) Normalizer::factory('高雄市楠梓區享平里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區中陽里', (string) Normalizer::factory('高雄市楠梓區中陽里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區惠楠里', (string) Normalizer::factory('高雄市楠梓區惠楠里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區惠民里', (string) Normalizer::factory('高雄市楠梓區惠民里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區惠豐里', (string) Normalizer::factory('高雄市楠梓區惠豐里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區錦屏里', (string) Normalizer::factory('高雄市楠梓區錦屏里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區玉屏里', (string) Normalizer::factory('高雄市楠梓區玉屏里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區金田里', (string) Normalizer::factory('高雄市楠梓區金田里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區稔田里', (string) Normalizer::factory('高雄市楠梓區稔田里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區瑞屏里', (string) Normalizer::factory('高雄市楠梓區瑞屏里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區翠屏里', (string) Normalizer::factory('高雄市楠梓區翠屏里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區宏南里', (string) Normalizer::factory('高雄市楠梓區宏南里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區宏毅里', (string) Normalizer::factory('高雄市楠梓區宏毅里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區宏榮里', (string) Normalizer::factory('高雄市楠梓區宏榮里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區廣昌里', (string) Normalizer::factory('高雄市楠梓區廣昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區久昌里', (string) Normalizer::factory('高雄市楠梓區久昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區大昌里', (string) Normalizer::factory('高雄市楠梓區大昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區福昌里', (string) Normalizer::factory('高雄市楠梓區福昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區盛昌里', (string) Normalizer::factory('高雄市楠梓區盛昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區泰昌里', (string) Normalizer::factory('高雄市楠梓區泰昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區興昌里', (string) Normalizer::factory('高雄市楠梓區興昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區建昌里', (string) Normalizer::factory('高雄市楠梓區建昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區宏昌里', (string) Normalizer::factory('高雄市楠梓區宏昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區和昌里', (string) Normalizer::factory('高雄市楠梓區和昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區慶昌里', (string) Normalizer::factory('高雄市楠梓區慶昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區隆昌里', (string) Normalizer::factory('高雄市楠梓區隆昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區秀昌里', (string) Normalizer::factory('高雄市楠梓區秀昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區裕昌里', (string) Normalizer::factory('高雄市楠梓區裕昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區國昌里', (string) Normalizer::factory('高雄市楠梓區國昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區加昌里', (string) Normalizer::factory('高雄市楠梓區加昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區仁昌里', (string) Normalizer::factory('高雄市楠梓區仁昌里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區藍田里', (string) Normalizer::factory('高雄市楠梓區藍田里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區中興里', (string) Normalizer::factory('高雄市楠梓區中興里')->normalizeAddress());
        $this->assertSame('高雄市楠梓區中和里', (string) Normalizer::factory('高雄市楠梓區中和里')->normalizeAddress());
        $this->assertSame(
            '高雄市三民區第一安東里',
            (string) Normalizer::factory('高雄市三民區第一安東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一安和里',
            (string) Normalizer::factory('高雄市三民區第一安和里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一達德里',
            (string) Normalizer::factory('高雄市三民區第一達德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一達明里',
            (string) Normalizer::factory('高雄市三民區第一達明里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一達仁里',
            (string) Normalizer::factory('高雄市三民區第一達仁里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一達勇里',
            (string) Normalizer::factory('高雄市三民區第一達勇里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一同德里',
            (string) Normalizer::factory('高雄市三民區第一同德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德智里',
            (string) Normalizer::factory('高雄市三民區第一德智里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德仁里',
            (string) Normalizer::factory('高雄市三民區第一德仁里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一安生里',
            (string) Normalizer::factory('高雄市三民區第一安生里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德東里',
            (string) Normalizer::factory('高雄市三民區第一德東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德行里',
            (string) Normalizer::factory('高雄市三民區第一德行里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一精華里',
            (string) Normalizer::factory('高雄市三民區第一精華里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一民享里',
            (string) Normalizer::factory('高雄市三民區第一民享里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一安宜里',
            (string) Normalizer::factory('高雄市三民區第一安宜里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一安泰里',
            (string) Normalizer::factory('高雄市三民區第一安泰里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一安邦里',
            (string) Normalizer::factory('高雄市三民區第一安邦里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一十全里',
            (string) Normalizer::factory('高雄市三民區第一十全里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一十美里',
            (string) Normalizer::factory('高雄市三民區第一十美里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德北里',
            (string) Normalizer::factory('高雄市三民區第一德北里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一立誠里',
            (string) Normalizer::factory('高雄市三民區第一立誠里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一立業里',
            (string) Normalizer::factory('高雄市三民區第一立業里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一港東里',
            (string) Normalizer::factory('高雄市三民區第一港東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一港新里',
            (string) Normalizer::factory('高雄市三民區第一港新里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一港西里',
            (string) Normalizer::factory('高雄市三民區第一港西里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一博愛里',
            (string) Normalizer::factory('高雄市三民區第一博愛里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一博惠里',
            (string) Normalizer::factory('高雄市三民區第一博惠里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一長明里',
            (string) Normalizer::factory('高雄市三民區第一長明里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一建東里',
            (string) Normalizer::factory('高雄市三民區第一建東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一興德里',
            (string) Normalizer::factory('高雄市三民區第一興德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一鳳南里',
            (string) Normalizer::factory('高雄市三民區第一鳳南里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一鳳北里',
            (string) Normalizer::factory('高雄市三民區第一鳳北里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一德西里',
            (string) Normalizer::factory('高雄市三民區第一德西里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一豐裕里',
            (string) Normalizer::factory('高雄市三民區第一豐裕里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一川東里',
            (string) Normalizer::factory('高雄市三民區第一川東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一裕民里',
            (string) Normalizer::factory('高雄市三民區第一裕民里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一力行里',
            (string) Normalizer::factory('高雄市三民區第一力行里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一千歲里',
            (string) Normalizer::factory('高雄市三民區第一千歲里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一立德里',
            (string) Normalizer::factory('高雄市三民區第一立德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一千北里',
            (string) Normalizer::factory('高雄市三民區第一千北里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第一千秋里',
            (string) Normalizer::factory('高雄市三民區第一千秋里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎金里',
            (string) Normalizer::factory('高雄市三民區第二鼎金里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎盛里',
            (string) Normalizer::factory('高雄市三民區第二鼎盛里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎強里',
            (string) Normalizer::factory('高雄市三民區第二鼎強里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎力里',
            (string) Normalizer::factory('高雄市三民區第二鼎力里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎西里',
            (string) Normalizer::factory('高雄市三民區第二鼎西里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎中里',
            (string) Normalizer::factory('高雄市三民區第二鼎中里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二鼎泰里',
            (string) Normalizer::factory('高雄市三民區第二鼎泰里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本館里',
            (string) Normalizer::factory('高雄市三民區第二本館里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本和里',
            (string) Normalizer::factory('高雄市三民區第二本和里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本文里',
            (string) Normalizer::factory('高雄市三民區第二本文里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本武里',
            (string) Normalizer::factory('高雄市三民區第二本武里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本元里',
            (string) Normalizer::factory('高雄市三民區第二本元里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本安里',
            (string) Normalizer::factory('高雄市三民區第二本安里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本上里',
            (string) Normalizer::factory('高雄市三民區第二本上里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二本揚里',
            (string) Normalizer::factory('高雄市三民區第二本揚里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶獅里',
            (string) Normalizer::factory('高雄市三民區第二寶獅里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶德里',
            (string) Normalizer::factory('高雄市三民區第二寶德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶泰里',
            (string) Normalizer::factory('高雄市三民區第二寶泰里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶興里',
            (string) Normalizer::factory('高雄市三民區第二寶興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶中里',
            (string) Normalizer::factory('高雄市三民區第二寶中里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶華里',
            (string) Normalizer::factory('高雄市三民區第二寶華里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶國里',
            (string) Normalizer::factory('高雄市三民區第二寶國里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶民里',
            (string) Normalizer::factory('高雄市三民區第二寶民里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶慶里',
            (string) Normalizer::factory('高雄市三民區第二寶慶里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶業里',
            (string) Normalizer::factory('高雄市三民區第二寶業里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶盛里',
            (string) Normalizer::factory('高雄市三民區第二寶盛里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶安里',
            (string) Normalizer::factory('高雄市三民區第二寶安里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶龍里',
            (string) Normalizer::factory('高雄市三民區第二寶龍里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶珠里',
            (string) Normalizer::factory('高雄市三民區第二寶珠里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二寶玉里',
            (string) Normalizer::factory('高雄市三民區第二寶玉里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣子里',
            (string) Normalizer::factory('高雄市三民區第二灣子里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣愛里',
            (string) Normalizer::factory('高雄市三民區第二灣愛里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣中里',
            (string) Normalizer::factory('高雄市三民區第二灣中里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣華里',
            (string) Normalizer::factory('高雄市三民區第二灣華里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣勝里',
            (string) Normalizer::factory('高雄市三民區第二灣勝里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣利里',
            (string) Normalizer::factory('高雄市三民區第二灣利里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣復里',
            (string) Normalizer::factory('高雄市三民區第二灣復里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二正興里',
            (string) Normalizer::factory('高雄市三民區第二正興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二正順里',
            (string) Normalizer::factory('高雄市三民區第二正順里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣興里',
            (string) Normalizer::factory('高雄市三民區第二灣興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二灣成里',
            (string) Normalizer::factory('高雄市三民區第二灣成里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二安康里',
            (string) Normalizer::factory('高雄市三民區第二安康里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二安寧里',
            (string) Normalizer::factory('高雄市三民區第二安寧里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二安吉里',
            (string) Normalizer::factory('高雄市三民區第二安吉里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市三民區第二安發里',
            (string) Normalizer::factory('高雄市三民區第二安發里')->normalizeAddress()
        );
        $this->assertSame('高雄市新興區浩然里', (string) Normalizer::factory('高雄市新興區浩然里')->normalizeAddress());
        $this->assertSame('高雄市新興區振成里', (string) Normalizer::factory('高雄市新興區振成里')->normalizeAddress());
        $this->assertSame('高雄市新興區德生里', (string) Normalizer::factory('高雄市新興區德生里')->normalizeAddress());
        $this->assertSame('高雄市新興區振華里', (string) Normalizer::factory('高雄市新興區振華里')->normalizeAddress());
        $this->assertSame('高雄市新興區正氣里', (string) Normalizer::factory('高雄市新興區正氣里')->normalizeAddress());
        $this->assertSame('高雄市新興區德政里', (string) Normalizer::factory('高雄市新興區德政里')->normalizeAddress());
        $this->assertSame('高雄市新興區仁聲里', (string) Normalizer::factory('高雄市新興區仁聲里')->normalizeAddress());
        $this->assertSame('高雄市新興區德望里', (string) Normalizer::factory('高雄市新興區德望里')->normalizeAddress());
        $this->assertSame('高雄市新興區華聲里', (string) Normalizer::factory('高雄市新興區華聲里')->normalizeAddress());
        $this->assertSame('高雄市新興區蕉園里', (string) Normalizer::factory('高雄市新興區蕉園里')->normalizeAddress());
        $this->assertSame('高雄市新興區永寧里', (string) Normalizer::factory('高雄市新興區永寧里')->normalizeAddress());
        $this->assertSame('高雄市新興區玉衡里', (string) Normalizer::factory('高雄市新興區玉衡里')->normalizeAddress());
        $this->assertSame('高雄市新興區順昌里', (string) Normalizer::factory('高雄市新興區順昌里')->normalizeAddress());
        $this->assertSame('高雄市新興區文昌里', (string) Normalizer::factory('高雄市新興區文昌里')->normalizeAddress());
        $this->assertSame('高雄市新興區光耀里', (string) Normalizer::factory('高雄市新興區光耀里')->normalizeAddress());
        $this->assertSame('高雄市新興區興昌里', (string) Normalizer::factory('高雄市新興區興昌里')->normalizeAddress());
        $this->assertSame('高雄市新興區開平里', (string) Normalizer::factory('高雄市新興區開平里')->normalizeAddress());
        $this->assertSame('高雄市新興區成功里', (string) Normalizer::factory('高雄市新興區成功里')->normalizeAddress());
        $this->assertSame('高雄市新興區新江里', (string) Normalizer::factory('高雄市新興區新江里')->normalizeAddress());
        $this->assertSame('高雄市新興區黎明里', (string) Normalizer::factory('高雄市新興區黎明里')->normalizeAddress());
        $this->assertSame('高雄市新興區愛平里', (string) Normalizer::factory('高雄市新興區愛平里')->normalizeAddress());
        $this->assertSame('高雄市新興區南港里', (string) Normalizer::factory('高雄市新興區南港里')->normalizeAddress());
        $this->assertSame('高雄市新興區中東里', (string) Normalizer::factory('高雄市新興區中東里')->normalizeAddress());
        $this->assertSame('高雄市新興區明莊里', (string) Normalizer::factory('高雄市新興區明莊里')->normalizeAddress());
        $this->assertSame('高雄市新興區大明里', (string) Normalizer::factory('高雄市新興區大明里')->normalizeAddress());
        $this->assertSame('高雄市新興區秋山里', (string) Normalizer::factory('高雄市新興區秋山里')->normalizeAddress());
        $this->assertSame('高雄市新興區長驛里', (string) Normalizer::factory('高雄市新興區長驛里')->normalizeAddress());
        $this->assertSame('高雄市新興區建興里', (string) Normalizer::factory('高雄市新興區建興里')->normalizeAddress());
        $this->assertSame('高雄市新興區建華里', (string) Normalizer::factory('高雄市新興區建華里')->normalizeAddress());
        $this->assertSame('高雄市新興區漢民里', (string) Normalizer::factory('高雄市新興區漢民里')->normalizeAddress());
        $this->assertSame('高雄市新興區榮治里', (string) Normalizer::factory('高雄市新興區榮治里')->normalizeAddress());
        $this->assertSame('高雄市新興區東坡里', (string) Normalizer::factory('高雄市新興區東坡里')->normalizeAddress());
        $this->assertSame('高雄市前金區三川里', (string) Normalizer::factory('高雄市前金區三川里')->normalizeAddress());
        $this->assertSame('高雄市前金區草江里', (string) Normalizer::factory('高雄市前金區草江里')->normalizeAddress());
        $this->assertSame('高雄市前金區長城里', (string) Normalizer::factory('高雄市前金區長城里')->normalizeAddress());
        $this->assertSame('高雄市前金區北金里', (string) Normalizer::factory('高雄市前金區北金里')->normalizeAddress());
        $this->assertSame('高雄市前金區東金里', (string) Normalizer::factory('高雄市前金區東金里')->normalizeAddress());
        $this->assertSame('高雄市前金區新生里', (string) Normalizer::factory('高雄市前金區新生里')->normalizeAddress());
        $this->assertSame('高雄市前金區後金里', (string) Normalizer::factory('高雄市前金區後金里')->normalizeAddress());
        $this->assertSame('高雄市前金區長興里', (string) Normalizer::factory('高雄市前金區長興里')->normalizeAddress());
        $this->assertSame('高雄市前金區青山里', (string) Normalizer::factory('高雄市前金區青山里')->normalizeAddress());
        $this->assertSame('高雄市前金區民生里', (string) Normalizer::factory('高雄市前金區民生里')->normalizeAddress());
        $this->assertSame('高雄市前金區復元里', (string) Normalizer::factory('高雄市前金區復元里')->normalizeAddress());
        $this->assertSame('高雄市前金區林投里', (string) Normalizer::factory('高雄市前金區林投里')->normalizeAddress());
        $this->assertSame('高雄市前金區國民里', (string) Normalizer::factory('高雄市前金區國民里')->normalizeAddress());
        $this->assertSame('高雄市前金區社東里', (string) Normalizer::factory('高雄市前金區社東里')->normalizeAddress());
        $this->assertSame('高雄市前金區社西里', (string) Normalizer::factory('高雄市前金區社西里')->normalizeAddress());
        $this->assertSame('高雄市前金區博孝里', (string) Normalizer::factory('高雄市前金區博孝里')->normalizeAddress());
        $this->assertSame('高雄市前金區長生里', (string) Normalizer::factory('高雄市前金區長生里')->normalizeAddress());
        $this->assertSame('高雄市前金區榮復里', (string) Normalizer::factory('高雄市前金區榮復里')->normalizeAddress());
        $this->assertSame('高雄市前金區文西里', (string) Normalizer::factory('高雄市前金區文西里')->normalizeAddress());
        $this->assertSame('高雄市前金區文東里', (string) Normalizer::factory('高雄市前金區文東里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區博仁里', (string) Normalizer::factory('高雄市苓雅區博仁里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區苓洲里', (string) Normalizer::factory('高雄市苓雅區苓洲里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區苓昇里', (string) Normalizer::factory('高雄市苓雅區苓昇里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區苓中里', (string) Normalizer::factory('高雄市苓雅區苓中里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區苓雅里', (string) Normalizer::factory('高雄市苓雅區苓雅里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區苓東里', (string) Normalizer::factory('高雄市苓雅區苓東里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區城北里', (string) Normalizer::factory('高雄市苓雅區城北里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區城西里', (string) Normalizer::factory('高雄市苓雅區城西里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區城東里', (string) Normalizer::factory('高雄市苓雅區城東里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區意誠里', (string) Normalizer::factory('高雄市苓雅區意誠里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區鼓中里', (string) Normalizer::factory('高雄市苓雅區鼓中里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區田西里', (string) Normalizer::factory('高雄市苓雅區田西里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區人和里', (string) Normalizer::factory('高雄市苓雅區人和里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區仁政里', (string) Normalizer::factory('高雄市苓雅區仁政里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區廣澤里', (string) Normalizer::factory('高雄市苓雅區廣澤里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區美田里', (string) Normalizer::factory('高雄市苓雅區美田里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區華堂里', (string) Normalizer::factory('高雄市苓雅區華堂里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區日中里', (string) Normalizer::factory('高雄市苓雅區日中里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區普照里', (string) Normalizer::factory('高雄市苓雅區普照里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區和煦里', (string) Normalizer::factory('高雄市苓雅區和煦里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區晴朗里', (string) Normalizer::factory('高雄市苓雅區晴朗里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區普天里', (string) Normalizer::factory('高雄市苓雅區普天里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林富里', (string) Normalizer::factory('高雄市苓雅區林富里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林圍里', (string) Normalizer::factory('高雄市苓雅區林圍里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林安里', (string) Normalizer::factory('高雄市苓雅區林安里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區光華里', (string) Normalizer::factory('高雄市苓雅區光華里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林興里', (string) Normalizer::factory('高雄市苓雅區林興里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林華里', (string) Normalizer::factory('高雄市苓雅區林華里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林西里', (string) Normalizer::factory('高雄市苓雅區林西里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林中里', (string) Normalizer::factory('高雄市苓雅區林中里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林泉里', (string) Normalizer::factory('高雄市苓雅區林泉里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林南里', (string) Normalizer::factory('高雄市苓雅區林南里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區中正里', (string) Normalizer::factory('高雄市苓雅區中正里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區尚義里', (string) Normalizer::factory('高雄市苓雅區尚義里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區同慶里', (string) Normalizer::factory('高雄市苓雅區同慶里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區凱旋里', (string) Normalizer::factory('高雄市苓雅區凱旋里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區安祥里', (string) Normalizer::factory('高雄市苓雅區安祥里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區奏捷里', (string) Normalizer::factory('高雄市苓雅區奏捷里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福壽里', (string) Normalizer::factory('高雄市苓雅區福壽里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福南里', (string) Normalizer::factory('高雄市苓雅區福南里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區五權里', (string) Normalizer::factory('高雄市苓雅區五權里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區民主里', (string) Normalizer::factory('高雄市苓雅區民主里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林德里', (string) Normalizer::factory('高雄市苓雅區林德里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林貴里', (string) Normalizer::factory('高雄市苓雅區林貴里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林榮里', (string) Normalizer::factory('高雄市苓雅區林榮里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區英明里', (string) Normalizer::factory('高雄市苓雅區英明里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區林靖里', (string) Normalizer::factory('高雄市苓雅區林靖里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區朝陽里', (string) Normalizer::factory('高雄市苓雅區朝陽里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福隆里', (string) Normalizer::factory('高雄市苓雅區福隆里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福祥里', (string) Normalizer::factory('高雄市苓雅區福祥里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福海里', (string) Normalizer::factory('高雄市苓雅區福海里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福康里', (string) Normalizer::factory('高雄市苓雅區福康里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福人里', (string) Normalizer::factory('高雄市苓雅區福人里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福地里', (string) Normalizer::factory('高雄市苓雅區福地里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福居里', (string) Normalizer::factory('高雄市苓雅區福居里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福東里', (string) Normalizer::factory('高雄市苓雅區福東里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區福西里', (string) Normalizer::factory('高雄市苓雅區福西里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區永康里', (string) Normalizer::factory('高雄市苓雅區永康里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正文里', (string) Normalizer::factory('高雄市苓雅區正文里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正言里', (string) Normalizer::factory('高雄市苓雅區正言里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正大里', (string) Normalizer::factory('高雄市苓雅區正大里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區五福里', (string) Normalizer::factory('高雄市苓雅區五福里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正心里', (string) Normalizer::factory('高雄市苓雅區正心里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正道里', (string) Normalizer::factory('高雄市苓雅區正道里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正義里', (string) Normalizer::factory('高雄市苓雅區正義里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區正仁里', (string) Normalizer::factory('高雄市苓雅區正仁里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區文昌里', (string) Normalizer::factory('高雄市苓雅區文昌里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區建軍里', (string) Normalizer::factory('高雄市苓雅區建軍里')->normalizeAddress());
        $this->assertSame('高雄市苓雅區衛武里', (string) Normalizer::factory('高雄市苓雅區衛武里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區草衙里', (string) Normalizer::factory('高雄市前鎮區草衙里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區明孝里', (string) Normalizer::factory('高雄市前鎮區明孝里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區明正里', (string) Normalizer::factory('高雄市前鎮區明正里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區明義里', (string) Normalizer::factory('高雄市前鎮區明義里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區仁愛里', (string) Normalizer::factory('高雄市前鎮區仁愛里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區德昌里', (string) Normalizer::factory('高雄市前鎮區德昌里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區平等里', (string) Normalizer::factory('高雄市前鎮區平等里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區平昌里', (string) Normalizer::factory('高雄市前鎮區平昌里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區明禮里', (string) Normalizer::factory('高雄市前鎮區明禮里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區信義里', (string) Normalizer::factory('高雄市前鎮區信義里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區信德里', (string) Normalizer::factory('高雄市前鎮區信德里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區明道里', (string) Normalizer::factory('高雄市前鎮區明道里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區興化里', (string) Normalizer::factory('高雄市前鎮區興化里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區興仁里', (string) Normalizer::factory('高雄市前鎮區興仁里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區前鎮里', (string) Normalizer::factory('高雄市前鎮區前鎮里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮東里', (string) Normalizer::factory('高雄市前鎮區鎮東里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮榮里', (string) Normalizer::factory('高雄市前鎮區鎮榮里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮昌里', (string) Normalizer::factory('高雄市前鎮區鎮昌里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮海里', (string) Normalizer::factory('高雄市前鎮區鎮海里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮陽里', (string) Normalizer::factory('高雄市前鎮區鎮陽里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區興邦里', (string) Normalizer::factory('高雄市前鎮區興邦里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮中里', (string) Normalizer::factory('高雄市前鎮區鎮中里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區鎮北里', (string) Normalizer::factory('高雄市前鎮區鎮北里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區忠純里', (string) Normalizer::factory('高雄市前鎮區忠純里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區忠誠里', (string) Normalizer::factory('高雄市前鎮區忠誠里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區西山里', (string) Normalizer::factory('高雄市前鎮區西山里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區民權里', (string) Normalizer::factory('高雄市前鎮區民權里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區建隆里', (string) Normalizer::factory('高雄市前鎮區建隆里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區振興里', (string) Normalizer::factory('高雄市前鎮區振興里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區良和里', (string) Normalizer::factory('高雄市前鎮區良和里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區西甲里', (string) Normalizer::factory('高雄市前鎮區西甲里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區盛興里', (string) Normalizer::factory('高雄市前鎮區盛興里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區盛豐里', (string) Normalizer::factory('高雄市前鎮區盛豐里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區興中里', (string) Normalizer::factory('高雄市前鎮區興中里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區興東里', (string) Normalizer::factory('高雄市前鎮區興東里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區忠孝里', (string) Normalizer::factory('高雄市前鎮區忠孝里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區復國里', (string) Normalizer::factory('高雄市前鎮區復國里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹內里', (string) Normalizer::factory('高雄市前鎮區竹內里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹東里', (string) Normalizer::factory('高雄市前鎮區竹東里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹南里', (string) Normalizer::factory('高雄市前鎮區竹南里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹北里', (string) Normalizer::factory('高雄市前鎮區竹北里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹西里', (string) Normalizer::factory('高雄市前鎮區竹西里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區竹中里', (string) Normalizer::factory('高雄市前鎮區竹中里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞竹里', (string) Normalizer::factory('高雄市前鎮區瑞竹里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞南里', (string) Normalizer::factory('高雄市前鎮區瑞南里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞豐里', (string) Normalizer::factory('高雄市前鎮區瑞豐里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞祥里', (string) Normalizer::factory('高雄市前鎮區瑞祥里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞東里', (string) Normalizer::factory('高雄市前鎮區瑞東里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞和里', (string) Normalizer::factory('高雄市前鎮區瑞和里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞平里', (string) Normalizer::factory('高雄市前鎮區瑞平里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞隆里', (string) Normalizer::factory('高雄市前鎮區瑞隆里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞北里', (string) Normalizer::factory('高雄市前鎮區瑞北里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞西里', (string) Normalizer::factory('高雄市前鎮區瑞西里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞崗里', (string) Normalizer::factory('高雄市前鎮區瑞崗里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞興里', (string) Normalizer::factory('高雄市前鎮區瑞興里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞誠里', (string) Normalizer::factory('高雄市前鎮區瑞誠里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞文里', (string) Normalizer::factory('高雄市前鎮區瑞文里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞華里', (string) Normalizer::factory('高雄市前鎮區瑞華里')->normalizeAddress());
        $this->assertSame('高雄市前鎮區瑞昌里', (string) Normalizer::factory('高雄市前鎮區瑞昌里')->normalizeAddress());
        $this->assertSame('高雄市旗津區旗下里', (string) Normalizer::factory('高雄市旗津區旗下里')->normalizeAddress());
        $this->assertSame('高雄市旗津區永安里', (string) Normalizer::factory('高雄市旗津區永安里')->normalizeAddress());
        $this->assertSame('高雄市旗津區振興里', (string) Normalizer::factory('高雄市旗津區振興里')->normalizeAddress());
        $this->assertSame('高雄市旗津區慈愛里', (string) Normalizer::factory('高雄市旗津區慈愛里')->normalizeAddress());
        $this->assertSame('高雄市旗津區復興里', (string) Normalizer::factory('高雄市旗津區復興里')->normalizeAddress());
        $this->assertSame('高雄市旗津區中華里', (string) Normalizer::factory('高雄市旗津區中華里')->normalizeAddress());
        $this->assertSame('高雄市旗津區實踐里', (string) Normalizer::factory('高雄市旗津區實踐里')->normalizeAddress());
        $this->assertSame('高雄市旗津區北汕里', (string) Normalizer::factory('高雄市旗津區北汕里')->normalizeAddress());
        $this->assertSame('高雄市旗津區南汕里', (string) Normalizer::factory('高雄市旗津區南汕里')->normalizeAddress());
        $this->assertSame('高雄市旗津區上竹里', (string) Normalizer::factory('高雄市旗津區上竹里')->normalizeAddress());
        $this->assertSame('高雄市旗津區中洲里', (string) Normalizer::factory('高雄市旗津區中洲里')->normalizeAddress());
        $this->assertSame('高雄市旗津區安順里', (string) Normalizer::factory('高雄市旗津區安順里')->normalizeAddress());
        $this->assertSame('高雄市旗津區中興里', (string) Normalizer::factory('高雄市旗津區中興里')->normalizeAddress());
        $this->assertSame('高雄市小港區小港里', (string) Normalizer::factory('高雄市小港區小港里')->normalizeAddress());
        $this->assertSame('高雄市小港區港口里', (string) Normalizer::factory('高雄市小港區港口里')->normalizeAddress());
        $this->assertSame('高雄市小港區港正里', (string) Normalizer::factory('高雄市小港區港正里')->normalizeAddress());
        $this->assertSame('高雄市小港區港墘里', (string) Normalizer::factory('高雄市小港區港墘里')->normalizeAddress());
        $this->assertSame('高雄市小港區港明里', (string) Normalizer::factory('高雄市小港區港明里')->normalizeAddress());
        $this->assertSame('高雄市小港區港后里', (string) Normalizer::factory('高雄市小港區港后里')->normalizeAddress());
        $this->assertSame('高雄市小港區港南里', (string) Normalizer::factory('高雄市小港區港南里')->normalizeAddress());
        $this->assertSame('高雄市小港區港興里', (string) Normalizer::factory('高雄市小港區港興里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳宮里', (string) Normalizer::factory('高雄市小港區鳳宮里')->normalizeAddress());
        $this->assertSame('高雄市小港區店鎮里', (string) Normalizer::factory('高雄市小港區店鎮里')->normalizeAddress());
        $this->assertSame('高雄市小港區大苓里', (string) Normalizer::factory('高雄市小港區大苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區二苓里', (string) Normalizer::factory('高雄市小港區二苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區三苓里', (string) Normalizer::factory('高雄市小港區三苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區正苓里', (string) Normalizer::factory('高雄市小港區正苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區順苓里', (string) Normalizer::factory('高雄市小港區順苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區六苓里', (string) Normalizer::factory('高雄市小港區六苓里')->normalizeAddress());
        $this->assertSame('高雄市小港區宏亮里', (string) Normalizer::factory('高雄市小港區宏亮里')->normalizeAddress());
        $this->assertSame('高雄市小港區山東里', (string) Normalizer::factory('高雄市小港區山東里')->normalizeAddress());
        $this->assertSame('高雄市小港區青島里', (string) Normalizer::factory('高雄市小港區青島里')->normalizeAddress());
        $this->assertSame('高雄市小港區濟南里', (string) Normalizer::factory('高雄市小港區濟南里')->normalizeAddress());
        $this->assertSame('高雄市小港區泰山里', (string) Normalizer::factory('高雄市小港區泰山里')->normalizeAddress());
        $this->assertSame('高雄市小港區山明里', (string) Normalizer::factory('高雄市小港區山明里')->normalizeAddress());
        $this->assertSame('高雄市小港區高松里', (string) Normalizer::factory('高雄市小港區高松里')->normalizeAddress());
        $this->assertSame('高雄市小港區松金里', (string) Normalizer::factory('高雄市小港區松金里')->normalizeAddress());
        $this->assertSame('高雄市小港區松山里', (string) Normalizer::factory('高雄市小港區松山里')->normalizeAddress());
        $this->assertSame('高雄市小港區大坪里', (string) Normalizer::factory('高雄市小港區大坪里')->normalizeAddress());
        $this->assertSame('高雄市小港區坪頂里', (string) Normalizer::factory('高雄市小港區坪頂里')->normalizeAddress());
        $this->assertSame('高雄市小港區孔宅里', (string) Normalizer::factory('高雄市小港區孔宅里')->normalizeAddress());
        $this->assertSame('高雄市小港區廈莊里', (string) Normalizer::factory('高雄市小港區廈莊里')->normalizeAddress());
        $this->assertSame('高雄市小港區合作里', (string) Normalizer::factory('高雄市小港區合作里')->normalizeAddress());
        $this->assertSame('高雄市小港區桂林里', (string) Normalizer::factory('高雄市小港區桂林里')->normalizeAddress());
        $this->assertSame('高雄市小港區中厝里', (string) Normalizer::factory('高雄市小港區中厝里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳鳴里', (string) Normalizer::factory('高雄市小港區鳳鳴里')->normalizeAddress());
        $this->assertSame('高雄市小港區龍鳳里', (string) Normalizer::factory('高雄市小港區龍鳳里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳森里', (string) Normalizer::factory('高雄市小港區鳳森里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳林里', (string) Normalizer::factory('高雄市小港區鳳林里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳興里', (string) Normalizer::factory('高雄市小港區鳳興里')->normalizeAddress());
        $this->assertSame('高雄市小港區鳳源里', (string) Normalizer::factory('高雄市小港區鳳源里')->normalizeAddress());
        $this->assertSame(
            '高雄市鳳山區第一縣口里',
            (string) Normalizer::factory('高雄縣鳳山市第一縣口里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一成功里',
            (string) Normalizer::factory('高雄縣鳳山市第一成功里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一光明里',
            (string) Normalizer::factory('高雄縣鳳山市第一光明里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一興中里',
            (string) Normalizer::factory('高雄縣鳳山市第一興中里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一南興里',
            (string) Normalizer::factory('高雄縣鳳山市第一南興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一和德里',
            (string) Normalizer::factory('高雄縣鳳山市第一和德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一鳳崗里',
            (string) Normalizer::factory('高雄縣鳳山市第一鳳崗里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一中和里',
            (string) Normalizer::factory('高雄縣鳳山市第一中和里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一鎮北里',
            (string) Normalizer::factory('高雄縣鳳山市第一鎮北里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一縣衙里',
            (string) Normalizer::factory('高雄縣鳳山市第一縣衙里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文英里',
            (string) Normalizer::factory('高雄縣鳳山市第一文英里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一鎮西里',
            (string) Normalizer::factory('高雄縣鳳山市第一鎮西里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一鎮東里',
            (string) Normalizer::factory('高雄縣鳳山市第一鎮東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一埤頂里',
            (string) Normalizer::factory('高雄縣鳳山市第一埤頂里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一中正里',
            (string) Normalizer::factory('高雄縣鳳山市第一中正里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一瑞竹里',
            (string) Normalizer::factory('高雄縣鳳山市第一瑞竹里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一忠義里',
            (string) Normalizer::factory('高雄縣鳳山市第一忠義里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一誠義里',
            (string) Normalizer::factory('高雄縣鳳山市第一誠義里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一新興里',
            (string) Normalizer::factory('高雄縣鳳山市第一新興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一海光里',
            (string) Normalizer::factory('高雄縣鳳山市第一海光里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一海風里',
            (string) Normalizer::factory('高雄縣鳳山市第一海風里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一忠誠里',
            (string) Normalizer::factory('高雄縣鳳山市第一忠誠里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一東門里',
            (string) Normalizer::factory('高雄縣鳳山市第一東門里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一瑞興里',
            (string) Normalizer::factory('高雄縣鳳山市第一瑞興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一鳳東里',
            (string) Normalizer::factory('高雄縣鳳山市第一鳳東里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文德里',
            (string) Normalizer::factory('高雄縣鳳山市第一文德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一曹公里',
            (string) Normalizer::factory('高雄縣鳳山市第一曹公里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一興仁里',
            (string) Normalizer::factory('高雄縣鳳山市第一興仁里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一忠孝里',
            (string) Normalizer::factory('高雄縣鳳山市第一忠孝里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一生明里',
            (string) Normalizer::factory('高雄縣鳳山市第一生明里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一和興里',
            (string) Normalizer::factory('高雄縣鳳山市第一和興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一協和里',
            (string) Normalizer::factory('高雄縣鳳山市第一協和里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文山里',
            (string) Normalizer::factory('高雄縣鳳山市第一文山里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一誠德里',
            (string) Normalizer::factory('高雄縣鳳山市第一誠德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一三民里',
            (string) Normalizer::factory('高雄縣鳳山市第一三民里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一誠正里',
            (string) Normalizer::factory('高雄縣鳳山市第一誠正里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一北門里',
            (string) Normalizer::factory('高雄縣鳳山市第一北門里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文華里',
            (string) Normalizer::factory('高雄縣鳳山市第一文華里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一武松里',
            (string) Normalizer::factory('高雄縣鳳山市第一武松里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文衡里',
            (string) Normalizer::factory('高雄縣鳳山市第一文衡里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一文福里',
            (string) Normalizer::factory('高雄縣鳳山市第一文福里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一誠信里',
            (string) Normalizer::factory('高雄縣鳳山市第一誠信里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第一誠智里',
            (string) Normalizer::factory('高雄縣鳳山市第一誠智里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二鎮南里',
            (string) Normalizer::factory('高雄縣鳳山市第二鎮南里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二老爺里',
            (string) Normalizer::factory('高雄縣鳳山市第二老爺里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新甲里',
            (string) Normalizer::factory('高雄縣鳳山市第二新甲里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二武漢里',
            (string) Normalizer::factory('高雄縣鳳山市第二武漢里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二正義里',
            (string) Normalizer::factory('高雄縣鳳山市第二正義里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二一甲里',
            (string) Normalizer::factory('高雄縣鳳山市第二一甲里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二福興里',
            (string) Normalizer::factory('高雄縣鳳山市第二福興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二天興里',
            (string) Normalizer::factory('高雄縣鳳山市第二天興里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新強里',
            (string) Normalizer::factory('高雄縣鳳山市第二新強里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二國泰里',
            (string) Normalizer::factory('高雄縣鳳山市第二國泰里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新富里',
            (string) Normalizer::factory('高雄縣鳳山市第二新富里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二國光里',
            (string) Normalizer::factory('高雄縣鳳山市第二國光里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二國隆里',
            (string) Normalizer::factory('高雄縣鳳山市第二國隆里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二過埤里',
            (string) Normalizer::factory('高雄縣鳳山市第二過埤里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二五福里',
            (string) Normalizer::factory('高雄縣鳳山市第二五福里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二福誠里',
            (string) Normalizer::factory('高雄縣鳳山市第二福誠里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二富甲里',
            (string) Normalizer::factory('高雄縣鳳山市第二富甲里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二南成里',
            (string) Normalizer::factory('高雄縣鳳山市第二南成里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二大德里',
            (string) Normalizer::factory('高雄縣鳳山市第二大德里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二國富里',
            (string) Normalizer::factory('高雄縣鳳山市第二國富里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二武慶里',
            (string) Normalizer::factory('高雄縣鳳山市第二武慶里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二海洋里',
            (string) Normalizer::factory('高雄縣鳳山市第二海洋里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新武里',
            (string) Normalizer::factory('高雄縣鳳山市第二新武里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新樂里',
            (string) Normalizer::factory('高雄縣鳳山市第二新樂里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二新泰里',
            (string) Normalizer::factory('高雄縣鳳山市第二新泰里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二中崙里',
            (string) Normalizer::factory('高雄縣鳳山市第二中崙里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二中榮里',
            (string) Normalizer::factory('高雄縣鳳山市第二中榮里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二中民里',
            (string) Normalizer::factory('高雄縣鳳山市第二中民里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二二甲里',
            (string) Normalizer::factory('高雄縣鳳山市第二二甲里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二龍成里',
            (string) Normalizer::factory('高雄縣鳳山市第二龍成里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二富榮里',
            (string) Normalizer::factory('高雄縣鳳山市第二富榮里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二善美里',
            (string) Normalizer::factory('高雄縣鳳山市第二善美里')->normalizeAddress()
        );
        $this->assertSame('高雄市鳳山區第二南和里', (string) Normalizer::factory('高雄縣鳳山市第二南和里')
            ->normalizeAddress());
        $this->assertSame(
            '高雄市鳳山區第二福祥里',
            (string) Normalizer::factory('高雄縣鳳山市第二福祥里')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市鳳山區第二保安里',
            (string) Normalizer::factory('高雄縣鳳山市第二保安里')->normalizeAddress()
        );
        $this->assertSame('高雄市林園區東林里', (string) Normalizer::factory('高雄縣林園鄉東林村')->normalizeAddress());
        $this->assertSame('高雄市林園區林園里', (string) Normalizer::factory('高雄縣林園鄉林園村')->normalizeAddress());
        $this->assertSame('高雄市林園區溪州里', (string) Normalizer::factory('高雄縣林園鄉溪州村')->normalizeAddress());
        $this->assertSame('高雄市林園區潭頭里', (string) Normalizer::factory('高雄縣林園鄉潭頭村')->normalizeAddress());
        $this->assertSame('高雄市林園區中厝里', (string) Normalizer::factory('高雄縣林園鄉中厝村')->normalizeAddress());
        $this->assertSame('高雄市林園區中門里', (string) Normalizer::factory('高雄縣林園鄉中門村')->normalizeAddress());
        $this->assertSame('高雄市林園區頂厝里', (string) Normalizer::factory('高雄縣林園鄉頂厝村')->normalizeAddress());
        $this->assertSame('高雄市林園區港埔里', (string) Normalizer::factory('高雄縣林園鄉港埔村')->normalizeAddress());
        $this->assertSame('高雄市林園區西溪里', (string) Normalizer::factory('高雄縣林園鄉西溪村')->normalizeAddress());
        $this->assertSame('高雄市林園區港嘴里', (string) Normalizer::factory('高雄縣林園鄉港嘴村')->normalizeAddress());
        $this->assertSame('高雄市林園區北汕里', (string) Normalizer::factory('高雄縣林園鄉北汕村')->normalizeAddress());
        $this->assertSame('高雄市林園區林內里', (string) Normalizer::factory('高雄縣林園鄉林內村')->normalizeAddress());
        $this->assertSame('高雄市林園區王公里', (string) Normalizer::factory('高雄縣林園鄉王公村')->normalizeAddress());
        $this->assertSame('高雄市林園區林家里', (string) Normalizer::factory('高雄縣林園鄉林家村')->normalizeAddress());
        $this->assertSame('高雄市林園區龔厝里', (string) Normalizer::factory('高雄縣林園鄉龔厝村')->normalizeAddress());
        $this->assertSame('高雄市林園區鳳芸里', (string) Normalizer::factory('高雄縣林園鄉鳳芸村')->normalizeAddress());
        $this->assertSame('高雄市林園區中芸里', (string) Normalizer::factory('高雄縣林園鄉中芸村')->normalizeAddress());
        $this->assertSame('高雄市林園區東汕里', (string) Normalizer::factory('高雄縣林園鄉東汕村')->normalizeAddress());
        $this->assertSame('高雄市林園區西汕里', (string) Normalizer::factory('高雄縣林園鄉西汕村')->normalizeAddress());
        $this->assertSame('高雄市林園區仁愛里', (string) Normalizer::factory('高雄縣林園鄉仁愛村')->normalizeAddress());
        $this->assertSame('高雄市林園區文賢里', (string) Normalizer::factory('高雄縣林園鄉文賢村')->normalizeAddress());
        $this->assertSame('高雄市林園區廣應里', (string) Normalizer::factory('高雄縣林園鄉廣應村')->normalizeAddress());
        $this->assertSame('高雄市林園區五福里', (string) Normalizer::factory('高雄縣林園鄉五福村')->normalizeAddress());
        $this->assertSame('高雄市林園區中汕里', (string) Normalizer::factory('高雄縣林園鄉中汕村')->normalizeAddress());
        $this->assertSame('高雄市大寮區拷潭里', (string) Normalizer::factory('高雄縣大寮鄉拷潭村')->normalizeAddress());
        $this->assertSame('高雄市大寮區內坑里', (string) Normalizer::factory('高雄縣大寮鄉內坑村')->normalizeAddress());
        $this->assertSame('高雄市大寮區大寮里', (string) Normalizer::factory('高雄縣大寮鄉大寮村')->normalizeAddress());
        $this->assertSame('高雄市大寮區上寮里', (string) Normalizer::factory('高雄縣大寮鄉上寮村')->normalizeAddress());
        $this->assertSame('高雄市大寮區三隆里', (string) Normalizer::factory('高雄縣大寮鄉三隆村')->normalizeAddress());
        $this->assertSame('高雄市大寮區琉球里', (string) Normalizer::factory('高雄縣大寮鄉琉球村')->normalizeAddress());
        $this->assertSame('高雄市大寮區翁園里', (string) Normalizer::factory('高雄縣大寮鄉翁園村')->normalizeAddress());
        $this->assertSame('高雄市大寮區前庄里', (string) Normalizer::factory('高雄縣大寮鄉前庄村')->normalizeAddress());
        $this->assertSame('高雄市大寮區中庄里', (string) Normalizer::factory('高雄縣大寮鄉中庄村')->normalizeAddress());
        $this->assertSame('高雄市大寮區後庄里', (string) Normalizer::factory('高雄縣大寮鄉後庄村')->normalizeAddress());
        $this->assertSame('高雄市大寮區義仁里', (string) Normalizer::factory('高雄縣大寮鄉義仁村')->normalizeAddress());
        $this->assertSame('高雄市大寮區新厝里', (string) Normalizer::factory('高雄縣大寮鄉新厝村')->normalizeAddress());
        $this->assertSame('高雄市大寮區過溪里', (string) Normalizer::factory('高雄縣大寮鄉過溪村')->normalizeAddress());
        $this->assertSame('高雄市大寮區潮寮里', (string) Normalizer::factory('高雄縣大寮鄉潮寮村')->normalizeAddress());
        $this->assertSame('高雄市大寮區會結里', (string) Normalizer::factory('高雄縣大寮鄉會結村')->normalizeAddress());
        $this->assertSame('高雄市大寮區會社里', (string) Normalizer::factory('高雄縣大寮鄉會社村')->normalizeAddress());
        $this->assertSame('高雄市大寮區山頂里', (string) Normalizer::factory('高雄縣大寮鄉山頂村')->normalizeAddress());
        $this->assertSame('高雄市大寮區忠義里', (string) Normalizer::factory('高雄縣大寮鄉忠義村')->normalizeAddress());
        $this->assertSame('高雄市大寮區永芳里', (string) Normalizer::factory('高雄縣大寮鄉永芳村')->normalizeAddress());
        $this->assertSame('高雄市大寮區義和里', (string) Normalizer::factory('高雄縣大寮鄉義和村')->normalizeAddress());
        $this->assertSame('高雄市大寮區溪寮里', (string) Normalizer::factory('高雄縣大寮鄉溪寮村')->normalizeAddress());
        $this->assertSame('高雄市大寮區江山里', (string) Normalizer::factory('高雄縣大寮鄉江山村')->normalizeAddress());
        $this->assertSame('高雄市大寮區昭明里', (string) Normalizer::factory('高雄縣大寮鄉昭明村')->normalizeAddress());
        $this->assertSame('高雄市大寮區光武里', (string) Normalizer::factory('高雄縣大寮鄉光武村')->normalizeAddress());
        $this->assertSame('高雄市大寮區中興里', (string) Normalizer::factory('高雄縣大寮鄉中興村')->normalizeAddress());
        $this->assertSame('高雄市大樹區竹寮里', (string) Normalizer::factory('高雄縣大樹鄉竹寮村')->normalizeAddress());
        $this->assertSame('高雄市大樹區九曲里', (string) Normalizer::factory('高雄縣大樹鄉九曲村')->normalizeAddress());
        $this->assertSame('高雄市大樹區久堂里', (string) Normalizer::factory('高雄縣大樹鄉久堂村')->normalizeAddress());
        $this->assertSame('高雄市大樹區水安里', (string) Normalizer::factory('高雄縣大樹鄉水安村')->normalizeAddress());
        $this->assertSame('高雄市大樹區水寮里', (string) Normalizer::factory('高雄縣大樹鄉水寮村')->normalizeAddress());
        $this->assertSame('高雄市大樹區檨腳里', (string) Normalizer::factory('高雄縣大樹鄉檨腳村')->normalizeAddress());
        $this->assertSame('高雄市大樹區興山里', (string) Normalizer::factory('高雄縣大樹鄉興山村')->normalizeAddress());
        $this->assertSame('高雄市大樹區和山里', (string) Normalizer::factory('高雄縣大樹鄉和山村')->normalizeAddress());
        $this->assertSame('高雄市大樹區姑山里', (string) Normalizer::factory('高雄縣大樹鄉姑山村')->normalizeAddress());
        $this->assertSame('高雄市大樹區大坑里', (string) Normalizer::factory('高雄縣大樹鄉大坑村')->normalizeAddress());
        $this->assertSame('高雄市大樹區井腳里', (string) Normalizer::factory('高雄縣大樹鄉井腳村')->normalizeAddress());
        $this->assertSame('高雄市大樹區小坪里', (string) Normalizer::factory('高雄縣大樹鄉小坪村')->normalizeAddress());
        $this->assertSame('高雄市大樹區龍目里', (string) Normalizer::factory('高雄縣大樹鄉龍目村')->normalizeAddress());
        $this->assertSame('高雄市大樹區大樹里', (string) Normalizer::factory('高雄縣大樹鄉大樹村')->normalizeAddress());
        $this->assertSame('高雄市大樹區三和里', (string) Normalizer::factory('高雄縣大樹鄉三和村')->normalizeAddress());
        $this->assertSame('高雄市大樹區溪埔里', (string) Normalizer::factory('高雄縣大樹鄉溪埔村')->normalizeAddress());
        $this->assertSame('高雄市大樹區興田里', (string) Normalizer::factory('高雄縣大樹鄉興田村')->normalizeAddress());
        $this->assertSame('高雄市大樹區統嶺里', (string) Normalizer::factory('高雄縣大樹鄉統嶺村')->normalizeAddress());
        $this->assertSame('高雄市大社區嘉誠里', (string) Normalizer::factory('高雄縣大社鄉嘉誠村')->normalizeAddress());
        $this->assertSame('高雄市大社區保社里', (string) Normalizer::factory('高雄縣大社鄉保社村')->normalizeAddress());
        $this->assertSame('高雄市大社區大社里', (string) Normalizer::factory('高雄縣大社鄉大社村')->normalizeAddress());
        $this->assertSame('高雄市大社區翠屏里', (string) Normalizer::factory('高雄縣大社鄉翠屏村')->normalizeAddress());
        $this->assertSame('高雄市大社區三奶里', (string) Normalizer::factory('高雄縣大社鄉三奶村')->normalizeAddress());
        $this->assertSame('高雄市大社區觀音里', (string) Normalizer::factory('高雄縣大社鄉觀音村')->normalizeAddress());
        $this->assertSame('高雄市大社區神農里', (string) Normalizer::factory('高雄縣大社鄉神農村')->normalizeAddress());
        $this->assertSame('高雄市大社區中里里', (string) Normalizer::factory('高雄縣大社鄉中里村')->normalizeAddress());
        $this->assertSame('高雄市大社區保安里', (string) Normalizer::factory('高雄縣大社鄉保安村')->normalizeAddress());
        $this->assertSame('高雄市仁武區大灣里', (string) Normalizer::factory('高雄縣仁武鄉大灣村')->normalizeAddress());
        $this->assertSame('高雄市仁武區灣內里', (string) Normalizer::factory('高雄縣仁武鄉灣內村')->normalizeAddress());
        $this->assertSame('高雄市仁武區考潭里', (string) Normalizer::factory('高雄縣仁武鄉考潭村')->normalizeAddress());
        $this->assertSame('高雄市仁武區烏林里', (string) Normalizer::factory('高雄縣仁武鄉烏林村')->normalizeAddress());
        $this->assertSame('高雄市仁武區仁福里', (string) Normalizer::factory('高雄縣仁武鄉仁福村')->normalizeAddress());
        $this->assertSame('高雄市仁武區仁武里', (string) Normalizer::factory('高雄縣仁武鄉仁武村')->normalizeAddress());
        $this->assertSame('高雄市仁武區文武里', (string) Normalizer::factory('高雄縣仁武鄉文武村')->normalizeAddress());
        $this->assertSame('高雄市仁武區竹後里', (string) Normalizer::factory('高雄縣仁武鄉竹後村')->normalizeAddress());
        $this->assertSame('高雄市仁武區八卦里', (string) Normalizer::factory('高雄縣仁武鄉八卦村')->normalizeAddress());
        $this->assertSame('高雄市仁武區高楠里', (string) Normalizer::factory('高雄縣仁武鄉高楠村')->normalizeAddress());
        $this->assertSame('高雄市仁武區後安里', (string) Normalizer::factory('高雄縣仁武鄉後安村')->normalizeAddress());
        $this->assertSame('高雄市仁武區中華里', (string) Normalizer::factory('高雄縣仁武鄉中華村')->normalizeAddress());
        $this->assertSame('高雄市仁武區五和里', (string) Normalizer::factory('高雄縣仁武鄉五和村')->normalizeAddress());
        $this->assertSame('高雄市仁武區仁和里', (string) Normalizer::factory('高雄縣仁武鄉仁和村')->normalizeAddress());
        $this->assertSame('高雄市仁武區赤山里', (string) Normalizer::factory('高雄縣仁武鄉赤山村')->normalizeAddress());
        $this->assertSame('高雄市仁武區仁慈里', (string) Normalizer::factory('高雄縣仁武鄉仁慈村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區鳥松里', (string) Normalizer::factory('高雄縣鳥松鄉鳥松村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區夢裡里', (string) Normalizer::factory('高雄縣鳥松鄉夢裡村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區大華里', (string) Normalizer::factory('高雄縣鳥松鄉大華村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區坔埔里', (string) Normalizer::factory('高雄縣鳥松鄉坔埔村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區仁美里', (string) Normalizer::factory('高雄縣鳥松鄉仁美村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區大竹里', (string) Normalizer::factory('高雄縣鳥松鄉大竹村')->normalizeAddress());
        $this->assertSame('高雄市鳥松區華美里', (string) Normalizer::factory('高雄縣鳥松鄉華美村')->normalizeAddress());
        $this->assertSame('高雄市岡山區平安里', (string) Normalizer::factory('高雄縣岡山鎮平安里')->normalizeAddress());
        $this->assertSame('高雄市岡山區岡山里', (string) Normalizer::factory('高雄縣岡山鎮岡山里')->normalizeAddress());
        $this->assertSame('高雄市岡山區壽天里', (string) Normalizer::factory('高雄縣岡山鎮壽天里')->normalizeAddress());
        $this->assertSame('高雄市岡山區維仁里', (string) Normalizer::factory('高雄縣岡山鎮維仁里')->normalizeAddress());
        $this->assertSame('高雄市岡山區後紅里', (string) Normalizer::factory('高雄縣岡山鎮後紅里')->normalizeAddress());
        $this->assertSame('高雄市岡山區大遼里', (string) Normalizer::factory('高雄縣岡山鎮大遼里')->normalizeAddress());
        $this->assertSame('高雄市岡山區忠孝里', (string) Normalizer::factory('高雄縣岡山鎮忠孝里')->normalizeAddress());
        $this->assertSame('高雄市岡山區和平里', (string) Normalizer::factory('高雄縣岡山鎮和平里')->normalizeAddress());
        $this->assertSame('高雄市岡山區前峰里', (string) Normalizer::factory('高雄縣岡山鎮前峰里')->normalizeAddress());
        $this->assertSame('高雄市岡山區劉厝里', (string) Normalizer::factory('高雄縣岡山鎮劉厝里')->normalizeAddress());
        $this->assertSame('高雄市岡山區協和里', (string) Normalizer::factory('高雄縣岡山鎮協和里')->normalizeAddress());
        $this->assertSame('高雄市岡山區後協里', (string) Normalizer::factory('高雄縣岡山鎮後協里')->normalizeAddress());
        $this->assertSame('高雄市岡山區信義里', (string) Normalizer::factory('高雄縣岡山鎮信義里')->normalizeAddress());
        $this->assertSame('高雄市岡山區潭底里', (string) Normalizer::factory('高雄縣岡山鎮潭底里')->normalizeAddress());
        $this->assertSame('高雄市岡山區三和里', (string) Normalizer::factory('高雄縣岡山鎮三和里')->normalizeAddress());
        $this->assertSame('高雄市岡山區仁壽里', (string) Normalizer::factory('高雄縣岡山鎮仁壽里')->normalizeAddress());
        $this->assertSame('高雄市岡山區碧紅里', (string) Normalizer::factory('高雄縣岡山鎮碧紅里')->normalizeAddress());
        $this->assertSame('高雄市岡山區程香里', (string) Normalizer::factory('高雄縣岡山鎮程香里')->normalizeAddress());
        $this->assertSame('高雄市岡山區竹圍里', (string) Normalizer::factory('高雄縣岡山鎮竹圍里')->normalizeAddress());
        $this->assertSame('高雄市岡山區台上里', (string) Normalizer::factory('高雄縣岡山鎮台上里')->normalizeAddress());
        $this->assertSame('高雄市岡山區灣裡里', (string) Normalizer::factory('高雄縣岡山鎮灣裡里')->normalizeAddress());
        $this->assertSame('高雄市岡山區白米里', (string) Normalizer::factory('高雄縣岡山鎮白米里')->normalizeAddress());
        $this->assertSame('高雄市岡山區石潭里', (string) Normalizer::factory('高雄縣岡山鎮石潭里')->normalizeAddress());
        $this->assertSame('高雄市岡山區福興里', (string) Normalizer::factory('高雄縣岡山鎮福興里')->normalizeAddress());
        $this->assertSame('高雄市岡山區本洲里', (string) Normalizer::factory('高雄縣岡山鎮本洲里')->normalizeAddress());
        $this->assertSame('高雄市岡山區嘉興里', (string) Normalizer::factory('高雄縣岡山鎮嘉興里')->normalizeAddress());
        $this->assertSame('高雄市岡山區嘉峰里', (string) Normalizer::factory('高雄縣岡山鎮嘉峰里')->normalizeAddress());
        $this->assertSame('高雄市岡山區華崗里', (string) Normalizer::factory('高雄縣岡山鎮華崗里')->normalizeAddress());
        $this->assertSame('高雄市岡山區大莊里', (string) Normalizer::factory('高雄縣岡山鎮大莊里')->normalizeAddress());
        $this->assertSame('高雄市岡山區協榮里', (string) Normalizer::factory('高雄縣岡山鎮協榮里')->normalizeAddress());
        $this->assertSame('高雄市岡山區為隨里', (string) Normalizer::factory('高雄縣岡山鎮為隨里')->normalizeAddress());
        $this->assertSame('高雄市岡山區壽峰里', (string) Normalizer::factory('高雄縣岡山鎮壽峰里')->normalizeAddress());
        $this->assertSame('高雄市岡山區仁義里', (string) Normalizer::factory('高雄縣岡山鎮仁義里')->normalizeAddress());
        $this->assertSame('高雄市橋頭區橋頭里', (string) Normalizer::factory('高雄縣橋頭鄉橋頭村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區橋南里', (string) Normalizer::factory('高雄縣橋頭鄉橋南村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區仕隆里', (string) Normalizer::factory('高雄縣橋頭鄉仕隆村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區仕豐里', (string) Normalizer::factory('高雄縣橋頭鄉仕豐村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區芋寮里', (string) Normalizer::factory('高雄縣橋頭鄉芋寮村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區東林里', (string) Normalizer::factory('高雄縣橋頭鄉東林村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區西林里', (string) Normalizer::factory('高雄縣橋頭鄉西林村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區白樹里', (string) Normalizer::factory('高雄縣橋頭鄉白樹村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區筆秀里', (string) Normalizer::factory('高雄縣橋頭鄉筆秀村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區新莊里', (string) Normalizer::factory('高雄縣橋頭鄉新莊村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區甲北里', (string) Normalizer::factory('高雄縣橋頭鄉甲北村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區甲南里', (string) Normalizer::factory('高雄縣橋頭鄉甲南村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區頂鹽里', (string) Normalizer::factory('高雄縣橋頭鄉頂鹽村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區中崎里', (string) Normalizer::factory('高雄縣橋頭鄉中崎村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區仕和里', (string) Normalizer::factory('高雄縣橋頭鄉仕和村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區德松里', (string) Normalizer::factory('高雄縣橋頭鄉德松村')->normalizeAddress());
        $this->assertSame('高雄市橋頭區三德里', (string) Normalizer::factory('高雄縣橋頭鄉三德村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區尖山里', (string) Normalizer::factory('高雄縣燕巢鄉尖山村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區瓊林里', (string) Normalizer::factory('高雄縣燕巢鄉瓊林村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區安招里', (string) Normalizer::factory('高雄縣燕巢鄉安招村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區角宿里', (string) Normalizer::factory('高雄縣燕巢鄉角宿村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區鳳雄里', (string) Normalizer::factory('高雄縣燕巢鄉鳳雄村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區金山里', (string) Normalizer::factory('高雄縣燕巢鄉金山村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區東燕里', (string) Normalizer::factory('高雄縣燕巢鄉東燕村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區南燕里', (string) Normalizer::factory('高雄縣燕巢鄉南燕村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區西燕里', (string) Normalizer::factory('高雄縣燕巢鄉西燕村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區橫山里', (string) Normalizer::factory('高雄縣燕巢鄉橫山村')->normalizeAddress());
        $this->assertSame('高雄市燕巢區深水里', (string) Normalizer::factory('高雄縣燕巢鄉深水村')->normalizeAddress());
        $this->assertSame('高雄市田寮區鹿埔里', (string) Normalizer::factory('高雄縣田寮鄉鹿埔村')->normalizeAddress());
        $this->assertSame('高雄市田寮區南安里', (string) Normalizer::factory('高雄縣田寮鄉南安村')->normalizeAddress());
        $this->assertSame('高雄市田寮區大同里', (string) Normalizer::factory('高雄縣田寮鄉大同村')->normalizeAddress());
        $this->assertSame('高雄市田寮區田寮里', (string) Normalizer::factory('高雄縣田寮鄉田寮村')->normalizeAddress());
        $this->assertSame('高雄市田寮區七星里', (string) Normalizer::factory('高雄縣田寮鄉七星村')->normalizeAddress());
        $this->assertSame('高雄市田寮區崇德里', (string) Normalizer::factory('高雄縣田寮鄉崇德村')->normalizeAddress());
        $this->assertSame('高雄市田寮區西德里', (string) Normalizer::factory('高雄縣田寮鄉西德村')->normalizeAddress());
        $this->assertSame('高雄市田寮區三和里', (string) Normalizer::factory('高雄縣田寮鄉三和村')->normalizeAddress());
        $this->assertSame('高雄市田寮區古亭里', (string) Normalizer::factory('高雄縣田寮鄉古亭村')->normalizeAddress());
        $this->assertSame('高雄市田寮區新興里', (string) Normalizer::factory('高雄縣田寮鄉新興村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區石安里', (string) Normalizer::factory('高雄縣阿蓮鄉石安村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區中路里', (string) Normalizer::factory('高雄縣阿蓮鄉中路村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區峯山里', (string) Normalizer::factory('高雄縣阿蓮鄉峯山村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區港後里', (string) Normalizer::factory('高雄縣阿蓮鄉港後村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區崗山里', (string) Normalizer::factory('高雄縣阿蓮鄉崗山村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區阿蓮里', (string) Normalizer::factory('高雄縣阿蓮鄉阿蓮村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區清蓮里', (string) Normalizer::factory('高雄縣阿蓮鄉清蓮村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區和蓮里', (string) Normalizer::factory('高雄縣阿蓮鄉和蓮村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區青旗里', (string) Normalizer::factory('高雄縣阿蓮鄉青旗村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區復安里', (string) Normalizer::factory('高雄縣阿蓮鄉復安村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區玉庫里', (string) Normalizer::factory('高雄縣阿蓮鄉玉庫村')->normalizeAddress());
        $this->assertSame('高雄市阿蓮區南蓮里', (string) Normalizer::factory('高雄縣阿蓮鄉南蓮村')->normalizeAddress());
        $this->assertSame('高雄市路竹區竹滬里', (string) Normalizer::factory('高雄縣路竹鄉竹滬村')->normalizeAddress());
        $this->assertSame('高雄市路竹區頂寮里', (string) Normalizer::factory('高雄縣路竹鄉頂寮村')->normalizeAddress());
        $this->assertSame('高雄市路竹區新達里', (string) Normalizer::factory('高雄縣路竹鄉新達村')->normalizeAddress());
        $this->assertSame('高雄市路竹區後鄉里', (string) Normalizer::factory('高雄縣路竹鄉後鄉村')->normalizeAddress());
        $this->assertSame('高雄市路竹區北嶺里', (string) Normalizer::factory('高雄縣路竹鄉北嶺村')->normalizeAddress());
        $this->assertSame('高雄市路竹區社西里', (string) Normalizer::factory('高雄縣路竹鄉社西村')->normalizeAddress());
        $this->assertSame('高雄市路竹區甲北里', (string) Normalizer::factory('高雄縣路竹鄉甲北村')->normalizeAddress());
        $this->assertSame('高雄市路竹區甲南里', (string) Normalizer::factory('高雄縣路竹鄉甲南村')->normalizeAddress());
        $this->assertSame('高雄市路竹區下坑里', (string) Normalizer::factory('高雄縣路竹鄉下坑村')->normalizeAddress());
        $this->assertSame('高雄市路竹區竹園里', (string) Normalizer::factory('高雄縣路竹鄉竹園村')->normalizeAddress());
        $this->assertSame('高雄市路竹區竹東里', (string) Normalizer::factory('高雄縣路竹鄉竹東村')->normalizeAddress());
        $this->assertSame('高雄市路竹區竹西里', (string) Normalizer::factory('高雄縣路竹鄉竹西村')->normalizeAddress());
        $this->assertSame('高雄市路竹區文北里', (string) Normalizer::factory('高雄縣路竹鄉文北村')->normalizeAddress());
        $this->assertSame('高雄市路竹區文南里', (string) Normalizer::factory('高雄縣路竹鄉文南村')->normalizeAddress());
        $this->assertSame('高雄市路竹區三爺里', (string) Normalizer::factory('高雄縣路竹鄉三爺村')->normalizeAddress());
        $this->assertSame('高雄市路竹區鴨寮里', (string) Normalizer::factory('高雄縣路竹鄉鴨寮村')->normalizeAddress());
        $this->assertSame('高雄市路竹區社東里', (string) Normalizer::factory('高雄縣路竹鄉社東村')->normalizeAddress());
        $this->assertSame('高雄市路竹區社中里', (string) Normalizer::factory('高雄縣路竹鄉社中村')->normalizeAddress());
        $this->assertSame('高雄市路竹區竹南里', (string) Normalizer::factory('高雄縣路竹鄉竹南村')->normalizeAddress());
        $this->assertSame('高雄市路竹區社南里', (string) Normalizer::factory('高雄縣路竹鄉社南村')->normalizeAddress());
        $this->assertSame('高雄市湖內區海山里', (string) Normalizer::factory('高雄縣湖內鄉海山村')->normalizeAddress());
        $this->assertSame('高雄市湖內區劉家里', (string) Normalizer::factory('高雄縣湖內鄉劉家村')->normalizeAddress());
        $this->assertSame('高雄市湖內區太爺里', (string) Normalizer::factory('高雄縣湖內鄉太爺村')->normalizeAddress());
        $this->assertSame('高雄市湖內區公舘里', (string) Normalizer::factory('高雄縣湖內鄉公舘村')->normalizeAddress());
        $this->assertSame('高雄市湖內區葉厝里', (string) Normalizer::factory('高雄縣湖內鄉葉厝村')->normalizeAddress());
        $this->assertSame('高雄市湖內區大湖里', (string) Normalizer::factory('高雄縣湖內鄉大湖村')->normalizeAddress());
        $this->assertSame('高雄市湖內區田尾里', (string) Normalizer::factory('高雄縣湖內鄉田尾村')->normalizeAddress());
        $this->assertSame('高雄市湖內區湖內里', (string) Normalizer::factory('高雄縣湖內鄉湖內村')->normalizeAddress());
        $this->assertSame('高雄市湖內區海埔里', (string) Normalizer::factory('高雄縣湖內鄉海埔村')->normalizeAddress());
        $this->assertSame('高雄市湖內區文賢里', (string) Normalizer::factory('高雄縣湖內鄉文賢村')->normalizeAddress());
        $this->assertSame('高雄市湖內區中賢里', (string) Normalizer::factory('高雄縣湖內鄉中賢村')->normalizeAddress());
        $this->assertSame('高雄市湖內區逸賢里', (string) Normalizer::factory('高雄縣湖內鄉逸賢村')->normalizeAddress());
        $this->assertSame('高雄市湖內區忠興里', (string) Normalizer::factory('高雄縣湖內鄉忠興村')->normalizeAddress());
        $this->assertSame('高雄市湖內區湖東里', (string) Normalizer::factory('高雄縣湖內鄉湖東村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區福德里', (string) Normalizer::factory('高雄縣茄萣鄉福德村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區萬福里', (string) Normalizer::factory('高雄縣茄萣鄉萬福村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區白雲里', (string) Normalizer::factory('高雄縣茄萣鄉白雲村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉賜里', (string) Normalizer::factory('高雄縣茄萣鄉嘉賜村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉安里', (string) Normalizer::factory('高雄縣茄萣鄉嘉安村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉定里', (string) Normalizer::factory('高雄縣茄萣鄉嘉定村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區保定里', (string) Normalizer::factory('高雄縣茄萣鄉保定村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區光定里', (string) Normalizer::factory('高雄縣茄萣鄉光定村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區大定里', (string) Normalizer::factory('高雄縣茄萣鄉大定村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區吉定里', (string) Normalizer::factory('高雄縣茄萣鄉吉定村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉樂里', (string) Normalizer::factory('高雄縣茄萣鄉嘉樂村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉泰里', (string) Normalizer::factory('高雄縣茄萣鄉嘉泰村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區嘉福里', (string) Normalizer::factory('高雄縣茄萣鄉嘉福村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區和協里', (string) Normalizer::factory('高雄縣茄萣鄉和協村')->normalizeAddress());
        $this->assertSame('高雄市茄萣區崎漏里', (string) Normalizer::factory('高雄縣茄萣鄉崎漏村')->normalizeAddress());
        $this->assertSame('高雄市永安區永安里', (string) Normalizer::factory('高雄縣永安鄉永安村')->normalizeAddress());
        $this->assertSame('高雄市永安區永華里', (string) Normalizer::factory('高雄縣永安鄉永華村')->normalizeAddress());
        $this->assertSame('高雄市永安區新港里', (string) Normalizer::factory('高雄縣永安鄉新港村')->normalizeAddress());
        $this->assertSame('高雄市永安區鹽田里', (string) Normalizer::factory('高雄縣永安鄉鹽田村')->normalizeAddress());
        $this->assertSame('高雄市永安區保寧里', (string) Normalizer::factory('高雄縣永安鄉保寧村')->normalizeAddress());
        $this->assertSame('高雄市永安區維新里', (string) Normalizer::factory('高雄縣永安鄉維新村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區光和里', (string) Normalizer::factory('高雄縣彌陀鄉光和村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區彌靖里', (string) Normalizer::factory('高雄縣彌陀鄉彌靖村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區彌仁里', (string) Normalizer::factory('高雄縣彌陀鄉彌仁村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區彌壽里', (string) Normalizer::factory('高雄縣彌陀鄉彌壽村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區彌陀里', (string) Normalizer::factory('高雄縣彌陀鄉彌陀村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區舊港里', (string) Normalizer::factory('高雄縣彌陀鄉舊港村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區文安里', (string) Normalizer::factory('高雄縣彌陀鄉文安村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區鹽埕里', (string) Normalizer::factory('高雄縣彌陀鄉鹽埕村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區過港里', (string) Normalizer::factory('高雄縣彌陀鄉過港村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區海尾里', (string) Normalizer::factory('高雄縣彌陀鄉海尾村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區漯底里', (string) Normalizer::factory('高雄縣彌陀鄉漯底村')->normalizeAddress());
        $this->assertSame('高雄市彌陀區南寮里', (string) Normalizer::factory('高雄縣彌陀鄉南寮村')->normalizeAddress());
        $this->assertSame('高雄市梓官區梓信里', (string) Normalizer::factory('高雄縣梓官鄉梓信村')->normalizeAddress());
        $this->assertSame('高雄市梓官區梓義里', (string) Normalizer::factory('高雄縣梓官鄉梓義村')->normalizeAddress());
        $this->assertSame('高雄市梓官區梓和里', (string) Normalizer::factory('高雄縣梓官鄉梓和村')->normalizeAddress());
        $this->assertSame('高雄市梓官區梓平里', (string) Normalizer::factory('高雄縣梓官鄉梓平村')->normalizeAddress());
        $this->assertSame('高雄市梓官區中崙里', (string) Normalizer::factory('高雄縣梓官鄉中崙村')->normalizeAddress());
        $this->assertSame('高雄市梓官區赤崁里', (string) Normalizer::factory('高雄縣梓官鄉赤崁村')->normalizeAddress());
        $this->assertSame('高雄市梓官區禮蚵里', (string) Normalizer::factory('高雄縣梓官鄉禮蚵村')->normalizeAddress());
        $this->assertSame('高雄市梓官區智蚵里', (string) Normalizer::factory('高雄縣梓官鄉智蚵村')->normalizeAddress());
        $this->assertSame('高雄市梓官區信蚵里', (string) Normalizer::factory('高雄縣梓官鄉信蚵村')->normalizeAddress());
        $this->assertSame('高雄市梓官區同安里', (string) Normalizer::factory('高雄縣梓官鄉同安村')->normalizeAddress());
        $this->assertSame('高雄市梓官區大舍里', (string) Normalizer::factory('高雄縣梓官鄉大舍村')->normalizeAddress());
        $this->assertSame('高雄市梓官區赤東里', (string) Normalizer::factory('高雄縣梓官鄉赤東村')->normalizeAddress());
        $this->assertSame('高雄市梓官區赤西里', (string) Normalizer::factory('高雄縣梓官鄉赤西村')->normalizeAddress());
        $this->assertSame('高雄市梓官區茄苳里', (string) Normalizer::factory('高雄縣梓官鄉茄苳村')->normalizeAddress());
        $this->assertSame('高雄市梓官區典寶里', (string) Normalizer::factory('高雄縣梓官鄉典寶村')->normalizeAddress());
        $this->assertSame('高雄市旗山區太平里', (string) Normalizer::factory('高雄縣旗山鎮太平里')->normalizeAddress());
        $this->assertSame('高雄市旗山區大德里', (string) Normalizer::factory('高雄縣旗山鎮大德里')->normalizeAddress());
        $this->assertSame('高雄市旗山區湄洲里', (string) Normalizer::factory('高雄縣旗山鎮湄洲里')->normalizeAddress());
        $this->assertSame('高雄市旗山區圓富里', (string) Normalizer::factory('高雄縣旗山鎮圓富里')->normalizeAddress());
        $this->assertSame('高雄市旗山區中正里', (string) Normalizer::factory('高雄縣旗山鎮中正里')->normalizeAddress());
        $this->assertSame('高雄市旗山區大林里', (string) Normalizer::factory('高雄縣旗山鎮大林里')->normalizeAddress());
        $this->assertSame('高雄市旗山區上洲里', (string) Normalizer::factory('高雄縣旗山鎮上洲里')->normalizeAddress());
        $this->assertSame('高雄市旗山區新光里', (string) Normalizer::factory('高雄縣旗山鎮新光里')->normalizeAddress());
        $this->assertSame('高雄市旗山區南勝里', (string) Normalizer::factory('高雄縣旗山鎮南勝里')->normalizeAddress());
        $this->assertSame('高雄市旗山區中寮里', (string) Normalizer::factory('高雄縣旗山鎮中寮里')->normalizeAddress());
        $this->assertSame('高雄市旗山區東平里', (string) Normalizer::factory('高雄縣旗山鎮東平里')->normalizeAddress());
        $this->assertSame('高雄市旗山區東昌里', (string) Normalizer::factory('高雄縣旗山鎮東昌里')->normalizeAddress());
        $this->assertSame('高雄市旗山區竹峰里', (string) Normalizer::factory('高雄縣旗山鎮竹峰里')->normalizeAddress());
        $this->assertSame('高雄市旗山區瑞吉里', (string) Normalizer::factory('高雄縣旗山鎮瑞吉里')->normalizeAddress());
        $this->assertSame('高雄市旗山區永和里', (string) Normalizer::factory('高雄縣旗山鎮永和里')->normalizeAddress());
        $this->assertSame('高雄市旗山區三協里', (string) Normalizer::factory('高雄縣旗山鎮三協里')->normalizeAddress());
        $this->assertSame('高雄市旗山區鯤洲里', (string) Normalizer::factory('高雄縣旗山鎮鯤洲里')->normalizeAddress());
        $this->assertSame('高雄市旗山區大山里', (string) Normalizer::factory('高雄縣旗山鎮大山里')->normalizeAddress());
        $this->assertSame('高雄市旗山區中洲里', (string) Normalizer::factory('高雄縣旗山鎮中洲里')->normalizeAddress());
        $this->assertSame('高雄市旗山區南洲里', (string) Normalizer::factory('高雄縣旗山鎮南洲里')->normalizeAddress());
        $this->assertSame('高雄市旗山區廣福里', (string) Normalizer::factory('高雄縣旗山鎮廣福里')->normalizeAddress());
        $this->assertSame('高雄市美濃區福安里', (string) Normalizer::factory('高雄縣美濃鎮福安里')->normalizeAddress());
        $this->assertSame('高雄市美濃區合和里', (string) Normalizer::factory('高雄縣美濃鎮合和里')->normalizeAddress());
        $this->assertSame('高雄市美濃區祿興里', (string) Normalizer::factory('高雄縣美濃鎮祿興里')->normalizeAddress());
        $this->assertSame('高雄市美濃區中壇里', (string) Normalizer::factory('高雄縣美濃鎮中壇里')->normalizeAddress());
        $this->assertSame('高雄市美濃區德興里', (string) Normalizer::factory('高雄縣美濃鎮德興里')->normalizeAddress());
        $this->assertSame('高雄市美濃區龍山里', (string) Normalizer::factory('高雄縣美濃鎮龍山里')->normalizeAddress());
        $this->assertSame('高雄市美濃區獅山里', (string) Normalizer::factory('高雄縣美濃鎮獅山里')->normalizeAddress());
        $this->assertSame('高雄市美濃區龍肚里', (string) Normalizer::factory('高雄縣美濃鎮龍肚里')->normalizeAddress());
        $this->assertSame('高雄市美濃區廣德里', (string) Normalizer::factory('高雄縣美濃鎮廣德里')->normalizeAddress());
        $this->assertSame('高雄市美濃區興隆里', (string) Normalizer::factory('高雄縣美濃鎮興隆里')->normalizeAddress());
        $this->assertSame('高雄市美濃區中圳里', (string) Normalizer::factory('高雄縣美濃鎮中圳里')->normalizeAddress());
        $this->assertSame('高雄市美濃區東門里', (string) Normalizer::factory('高雄縣美濃鎮東門里')->normalizeAddress());
        $this->assertSame('高雄市美濃區泰安里', (string) Normalizer::factory('高雄縣美濃鎮泰安里')->normalizeAddress());
        $this->assertSame('高雄市美濃區瀰濃里', (string) Normalizer::factory('高雄縣美濃鎮瀰濃里')->normalizeAddress());
        $this->assertSame('高雄市美濃區清水里', (string) Normalizer::factory('高雄縣美濃鎮清水里')->normalizeAddress());
        $this->assertSame('高雄市美濃區吉洋里', (string) Normalizer::factory('高雄縣美濃鎮吉洋里')->normalizeAddress());
        $this->assertSame('高雄市美濃區吉和里', (string) Normalizer::factory('高雄縣美濃鎮吉和里')->normalizeAddress());
        $this->assertSame('高雄市美濃區吉東里', (string) Normalizer::factory('高雄縣美濃鎮吉東里')->normalizeAddress());
        $this->assertSame('高雄市美濃區廣林里', (string) Normalizer::factory('高雄縣美濃鎮廣林里')->normalizeAddress());
        $this->assertSame('高雄市六龜區新威里', (string) Normalizer::factory('高雄縣六龜鄉新威村')->normalizeAddress());
        $this->assertSame('高雄市六龜區新興里', (string) Normalizer::factory('高雄縣六龜鄉新興村')->normalizeAddress());
        $this->assertSame('高雄市六龜區新寮里', (string) Normalizer::factory('高雄縣六龜鄉新寮村')->normalizeAddress());
        $this->assertSame('高雄市六龜區新發里', (string) Normalizer::factory('高雄縣六龜鄉新發村')->normalizeAddress());
        $this->assertSame('高雄市六龜區荖濃里', (string) Normalizer::factory('高雄縣六龜鄉荖濃村')->normalizeAddress());
        $this->assertSame('高雄市六龜區六龜里', (string) Normalizer::factory('高雄縣六龜鄉六龜村')->normalizeAddress());
        $this->assertSame('高雄市六龜區義寶里', (string) Normalizer::factory('高雄縣六龜鄉義寶村')->normalizeAddress());
        $this->assertSame('高雄市六龜區興龍里', (string) Normalizer::factory('高雄縣六龜鄉興龍村')->normalizeAddress());
        $this->assertSame('高雄市六龜區中興里', (string) Normalizer::factory('高雄縣六龜鄉中興村')->normalizeAddress());
        $this->assertSame('高雄市六龜區寶來里', (string) Normalizer::factory('高雄縣六龜鄉寶來村')->normalizeAddress());
        $this->assertSame('高雄市六龜區文武里', (string) Normalizer::factory('高雄縣六龜鄉文武村')->normalizeAddress());
        $this->assertSame('高雄市六龜區大津里', (string) Normalizer::factory('高雄縣六龜鄉大津村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區東安里', (string) Normalizer::factory('高雄縣甲仙鄉東安村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區西安里', (string) Normalizer::factory('高雄縣甲仙鄉西安村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區和安里', (string) Normalizer::factory('高雄縣甲仙鄉和安村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區大田里', (string) Normalizer::factory('高雄縣甲仙鄉大田村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區寶隆里', (string) Normalizer::factory('高雄縣甲仙鄉寶隆村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區關山里', (string) Normalizer::factory('高雄縣甲仙鄉關山村')->normalizeAddress());
        $this->assertSame('高雄市甲仙區小林里', (string) Normalizer::factory('高雄縣甲仙鄉小林村')->normalizeAddress());
        $this->assertSame('高雄市杉林區杉林里', (string) Normalizer::factory('高雄縣杉林鄉杉林村')->normalizeAddress());
        $this->assertSame('高雄市杉林區木梓里', (string) Normalizer::factory('高雄縣杉林鄉木梓村')->normalizeAddress());
        $this->assertSame('高雄市杉林區集來里', (string) Normalizer::factory('高雄縣杉林鄉集來村')->normalizeAddress());
        $this->assertSame('高雄市杉林區新庄里', (string) Normalizer::factory('高雄縣杉林鄉新庄村')->normalizeAddress());
        $this->assertSame('高雄市杉林區上平里', (string) Normalizer::factory('高雄縣杉林鄉上平村')->normalizeAddress());
        $this->assertSame('高雄市杉林區月眉里', (string) Normalizer::factory('高雄縣杉林鄉月眉村')->normalizeAddress());
        $this->assertSame('高雄市杉林區月美里', (string) Normalizer::factory('高雄縣杉林鄉月美村')->normalizeAddress());
        $this->assertSame('高雄市內門區溝坪里', (string) Normalizer::factory('高雄縣內門鄉溝坪村')->normalizeAddress());
        $this->assertSame('高雄市內門區金竹里', (string) Normalizer::factory('高雄縣內門鄉金竹村')->normalizeAddress());
        $this->assertSame('高雄市內門區永富里', (string) Normalizer::factory('高雄縣內門鄉永富村')->normalizeAddress());
        $this->assertSame('高雄市內門區永吉里', (string) Normalizer::factory('高雄縣內門鄉永吉村')->normalizeAddress());
        $this->assertSame('高雄市內門區永興里', (string) Normalizer::factory('高雄縣內門鄉永興村')->normalizeAddress());
        $this->assertSame('高雄市內門區石坑里', (string) Normalizer::factory('高雄縣內門鄉石坑村')->normalizeAddress());
        $this->assertSame('高雄市內門區內門里', (string) Normalizer::factory('高雄縣內門鄉內門村')->normalizeAddress());
        $this->assertSame('高雄市內門區內豊里', (string) Normalizer::factory('高雄縣內門鄉內豊村')->normalizeAddress());
        $this->assertSame('高雄市內門區觀亭里', (string) Normalizer::factory('高雄縣內門鄉觀亭村')->normalizeAddress());
        $this->assertSame('高雄市內門區中埔里', (string) Normalizer::factory('高雄縣內門鄉中埔村')->normalizeAddress());
        $this->assertSame('高雄市內門區內東里', (string) Normalizer::factory('高雄縣內門鄉內東村')->normalizeAddress());
        $this->assertSame('高雄市內門區內南里', (string) Normalizer::factory('高雄縣內門鄉內南村')->normalizeAddress());
        $this->assertSame('高雄市內門區東埔里', (string) Normalizer::factory('高雄縣內門鄉東埔村')->normalizeAddress());
        $this->assertSame('高雄市內門區三平里', (string) Normalizer::factory('高雄縣內門鄉三平村')->normalizeAddress());
        $this->assertSame('高雄市內門區木柵里', (string) Normalizer::factory('高雄縣內門鄉木柵村')->normalizeAddress());
        $this->assertSame('高雄市內門區內興里', (string) Normalizer::factory('高雄縣內門鄉內興村')->normalizeAddress());
        $this->assertSame('高雄市內門區瑞山里', (string) Normalizer::factory('高雄縣內門鄉瑞山村')->normalizeAddress());
        $this->assertSame('高雄市內門區光興里', (string) Normalizer::factory('高雄縣內門鄉光興村')->normalizeAddress());
        $this->assertSame('高雄市茂林區茂林里', (string) Normalizer::factory('高雄縣茂林鄉茂林村')->normalizeAddress());
        $this->assertSame('高雄市茂林區萬山里', (string) Normalizer::factory('高雄縣茂林鄉萬山村')->normalizeAddress());
        $this->assertSame('高雄市茂林區多納里', (string) Normalizer::factory('高雄縣茂林鄉多納村')->normalizeAddress());
        $this->assertSame('高雄市桃源區桃源里', (string) Normalizer::factory('高雄縣桃源鄉桃源村')->normalizeAddress());
        $this->assertSame('高雄市桃源區寶山里', (string) Normalizer::factory('高雄縣桃源鄉寶山村')->normalizeAddress());
        $this->assertSame('高雄市桃源區建山里', (string) Normalizer::factory('高雄縣桃源鄉建山村')->normalizeAddress());
        $this->assertSame('高雄市桃源區高中里', (string) Normalizer::factory('高雄縣桃源鄉高中村')->normalizeAddress());
        $this->assertSame('高雄市桃源區勤和里', (string) Normalizer::factory('高雄縣桃源鄉勤和村')->normalizeAddress());
        $this->assertSame('高雄市桃源區復興里', (string) Normalizer::factory('高雄縣桃源鄉復興村')->normalizeAddress());
        $this->assertSame(
            '高雄市桃源區拉芙蘭里',
            (string) Normalizer::factory('高雄縣桃源鄉拉芙蘭村')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市桃源區梅山里',
            (string) Normalizer::factory('高雄縣桃源鄉梅山村')->normalizeAddress());
        $this->assertSame(
            '高雄市那瑪夏區達卡努瓦里',
            (string) Normalizer::factory('高雄縣那瑪夏鄉達卡努瓦村')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市那瑪夏區瑪雅里',
            (string) Normalizer::factory('高雄縣那瑪夏鄉瑪雅村')->normalizeAddress()
        );
        $this->assertSame(
            '高雄市那瑪夏區南沙魯里',
            (string) Normalizer::factory('高雄縣那瑪夏鄉南沙魯村')->normalizeAddress()
        );
    }
}
