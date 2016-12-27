<?php

namespace Recca0120\Twzipcode;

class Str
{
    public static $fullCaseMap = [
        '　' => ' ',
        '！' => '!',
        '＂' => '"',
        '＃' => '#',
        '＄' => '$',
        '％' => '%',
        '＆' => '&',
        '＇' => "'",
        '（' => '(',
        '）' => ')',
        '＊' => '*',
        '＋' => '+',
        '，' => ',',
        '－' => '-',
        '．' => '.',
        '／' => '/',
        '０' => '0',
        '１' => '1',
        '２' => '2',
        '３' => '3',
        '４' => '4',
        '５' => '5',
        '６' => '6',
        '７' => '7',
        '８' => '8',
        '９' => '9',
        '：' => ':',
        '；' => ';',
        '＜' => '<',
        '＝' => '=',
        '＞' => '>',
        '？' => '?',
        '＠' => '@',
        'Ａ' => 'A',
        'Ｂ' => 'B',
        'Ｃ' => 'C',
        'Ｄ' => 'D',
        'Ｅ' => 'E',
        'Ｆ' => 'F',
        'Ｇ' => 'G',
        'Ｈ' => 'H',
        'Ｉ' => 'I',
        'Ｊ' => 'J',
        'Ｋ' => 'K',
        'Ｌ' => 'L',
        'Ｍ' => 'M',
        'Ｎ' => 'N',
        'Ｏ' => 'O',
        'Ｐ' => 'P',
        'Ｑ' => 'Q',
        'Ｒ' => 'R',
        'Ｓ' => 'S',
        'Ｔ' => 'T',
        'Ｕ' => 'U',
        'Ｖ' => 'V',
        'Ｗ' => 'W',
        'Ｘ' => 'X',
        'Ｙ' => 'Y',
        'Ｚ' => 'Z',
        '［' => '[',
        '＼' => '\\',
        '］' => ']',
        '＾' => '^',
        '＿' => '_',
        '｀' => '`',
        'ａ' => 'a',
        'ｂ' => 'b',
        'ｃ' => 'c',
        'ｄ' => 'd',
        'ｅ' => 'e',
        'ｆ' => 'f',
        'ｇ' => 'g',
        'ｈ' => 'h',
        'ｉ' => 'i',
        'ｊ' => 'j',
        'ｋ' => 'k',
        'ｌ' => 'l',
        'ｍ' => 'm',
        'ｎ' => 'n',
        'ｏ' => 'o',
        'ｐ' => 'p',
        'ｑ' => 'q',
        'ｒ' => 'r',
        'ｓ' => 's',
        'ｔ' => 't',
        'ｕ' => 'u',
        'ｖ' => 'v',
        'ｗ' => 'w',
        'ｘ' => 'x',
        'ｙ' => 'y',
        'ｚ' => 'z',
        '｛' => '{',
        '｜' => '|',
        '｝' => '}',
        '～' => '~',
    ];

    public static $chineseNumberUnits = [
        '個' => 1,
        '十' => 10,
        '百' => 100,
        '千' => 1000,
        '萬' => 10000,
    ];

    public $string;

    public function __construct($string = '')
    {
        $this->string = $string;
    }

    public function set($string)
    {
        $this->string = $string;

        return $this;
    }

    public function trim()
    {
        return new static(trim($this->string));
    }

    public function toHalfCase()
    {
        return $this->replace(static::$fullCaseMap);
    }

    public function toFullCase()
    {
        return $this->replace(array_flip(static::$fullCaseMap));
    }

    public function toLowerCase()
    {
        return new static(strtolower($this->string));
    }

    public function toUpperCase()
    {
        return new static(strtoupper($this->string));
    }

    public function replace($pattern, $replacement = null)
    {
        if (is_array($pattern) === true && is_null($replacement) === true) {
            return new static(strtr($this->string, $pattern));
        }

        if (is_callable($replacement) === true) {
            return new static(preg_replace_callback($pattern, $replacement, $this->string));
        }

        return new static(preg_replace($pattern, $replacement, $this->string));
    }

    public function match($pattern, $flags = PREG_PATTERN_ORDER, $offset = 0)
    {
        if (!preg_match_all($pattern, $this->string, $matches, $flags, $offset))
        {
            return false;
        }

        return $matches;
    }

    public function chineseToNumber()
    {
        $matches = $this->match('/(?P<number>[一二三四五六七八九]+)?(?P<unit>[萬千百十])?/u', PREG_SET_ORDER);

        if ($matches === false) {
            return false;
        }

        $sum = 0;
        foreach ($matches as $token) {
            $unit = empty($token['unit']) === false ? $token['unit'] : '個';
            $unit = static::$chineseNumberUnits[$unit];
            if (empty($token['number']) === true) {
                $sum = ($sum === 0 ? 1 : $sum) * $unit;

                continue;
            }

            $number = $token['number'];
            $number = strtr($number, [
                '零' => 0,
                '一' => 1,
                '二' => 2,
                '三' => 3,
                '四' => 4,
                '五' => 5,
                '六' => 6,
                '七' => 7,
                '八' => 8,
                '九' => 9,
            ]);

            if ($unit >= 10000) {
                $sum = $sum * $unit;
            }

            $sum += ($number * $unit);
        }

        return $sum;
    }

    public function value()
    {
        return $this->string;
    }

    public function __toString()
    {
        return $this->value();
    }

    public static function make($string)
    {
        return new static($string);
    }
}
