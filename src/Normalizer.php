<?php

namespace Recca0120\Twzipcode;

use Closure;

class Normalizer
{
    public $attribute;

    public function __construct($attribute = '')
    {
        $this->attribute = $attribute;
    }

    public function value()
    {
        return $this->attribute;
    }

    public function trim()
    {
        return new static(trim($this->attribute));
    }

    public function strtr($parameters)
    {
        return new static(strtr($this->attribute, $parameters));
    }

    public function half()
    {
        return new static(Str::half($this->attribute));
    }

    public function replace($re, $to)
    {
        if (is_callable($to) === true) {
            return new static(preg_replace_callback($re, $to, $this->attribute));
        } else {
            return new static(preg_replace($re, $to, $this->attribute));
        }
    }

    public function regularize()
    {
        return $this
            ->half()
            ->strtr([
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
            $chineseNumber = &$m[0];

            return (new static($chineseNumber))
                ->strtr([
                    '十' => mb_strlen($chineseNumber) === 2 ? '1' : '',
                    '百' => '',
                    '千' => '',
                ])
                ->strtr([
                    '一' => '1',
                    '二' => '2',
                    '三' => '3',
                    '四' => '4',
                    '五' => '5',
                    '六' => '6',
                    '七' => '7',
                    '八' => '8',
                    '九' => '9',
                ]);
        });
    }

    public static function make($attribute, $default = false)
    {
        $object = new static($attribute);

        if ($default === true) {
            $object = $object
                ->trim()
                ->regularize()
                ->digitize();
        }

        return $object;
    }

    public function __toString()
    {
        return $this->value();
    }

    public function normalizeAddress()
    {
        return $this
            ->strtr([
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
}
