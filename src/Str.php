<?php

namespace Recca0120\Twzipcode;

use Recca0120\String\Str as BaseStr;

class Str extends BaseStr
{
    public function regularize()
    {
        return $this
            ->toHalfCase()
            ->replace([
                ' ' => '',
                ',' => '',
                '~' => '之',
                '-' => '之',
                '台灣' => '臺灣',
                '台北' => '臺北',
                '台中' => '臺中',
                '台南' => '臺南',
                '台東' => '臺東',
                '釣魚台' => '釣魚臺',
                '台西鄉' => '臺西鄉',
                '霧台鄉' => '霧臺鄉',
            ]);
    }

    public function digitize()
    {
        return $this->replace('/[一二三四五六七八九十百千]+(?=[段路街巷弄號樓])/u', function ($m) {
            return (new static($m[0]))->chineseToNumber();
        });
    }

    public function normalizeAddress()
    {
        return $this
            ->replace([
                '台灣' => '臺灣',
                '台北' => '臺北',
                '台中' => '臺中',
                '台南' => '臺南',
                '台東' => '臺東',
                '釣魚台' => '釣魚臺',
                '台西鄉' => '臺西鄉',
                '霧台鄉' => '霧臺鄉',
                '[石曹]村' => '[石曹]里',
                '頭家東村' => '頭家東里',
                '拉芙蘭村' => '拉芙蘭里',
                '那瑪夏鄉' => '那瑪夏區',
                '達卡努瓦村' => '達卡努瓦里',
                '瑪雅村' => '瑪雅里',
                '南沙魯村' => '南沙魯里',
            ])
            ->replace('/^北縣/', '臺北縣')
            ->replace('/^北市/', '臺北市')
            ->replace('/^(臺北|臺中|臺南|高雄)縣(?:(\w{2})[市鄉鎮])?(?:(\w{2})村)?/u', function ($m) {
                return ($m[1] === '臺北' ? '新北' : $m[1]).'市'.
                    (isset($m[2]) === true ? $m[2].'區' : '').
                    (isset($m[3]) === true ? $m[3].'里' : '');
            });
    }

    public function normalize()
    {
        return $this
            ->trim()
            ->regularize()
            ->digitize();
    }
}
