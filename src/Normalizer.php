<?php

namespace Recca0120\Twzipcode;

class Normalizer
{
    public $attribute;

    public function __construct($attribute = '')
    {
        $this->attribute = $attribute;
    }

    public function set($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function value()
    {
        return $this->attribute;
    }

    public function regularize()
    {
        return new static(trim(strtr(Str::half($this->attribute), [
            ' ' => '',
            ',' => '',
            '~' => '之',
            '-' => '之',
            '台' => '臺',
        ])));
    }

    public function digitize()
    {
        return new static(preg_replace_callback('/[一二三四五六七八九十百千]+(?=[段路街巷弄號樓])/u', function ($m) {
            $chineseNumber = &$m[0];

            return strtr(strtr($chineseNumber, [
                '十' => mb_strlen($chineseNumber) === 2 ? '1' : '',
                '百' => '',
                '千' => '',
            ]), [
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
        }, $this->attribute));
    }

    public function normalize()
    {
        return $this
            ->regularize()
            ->digitize()
            ->value();
    }

    public static function make($attribute)
    {
        return new static($attribute);
    }

    public function __toString()
    {
        return $this->value();
    }
}
