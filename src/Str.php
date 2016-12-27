<?php

namespace Recca0120\Twzipcode;

class Str
{
    public static $fullCaseCharMap = [
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

    public static function full($string)
    {
        return strtr($string, array_flip(static::$fullCaseCharMap));
    }

    public static function half($string)
    {
        return strtr($string, static::$fullCaseCharMap);
    }

    public static function digitize($chineseNumber)
    {
        $map = [
            '個' => 1,
            '十' => 10,
            '百' => 100,
            '千' => 1000,
            '萬' => 10000,
        ];

        $sum = 0;
        if (preg_match_all('/(?P<number>[一二三四五六七八九]+)?(?P<unit>[萬千百十])?/u', $chineseNumber, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $token) {
                $unit = empty($token['unit']) === false ? $token['unit'] : '個';
                $unit = $map[$unit];
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

                $sum += ($number*$unit);
            }
        }

        return $sum;
    }
}
