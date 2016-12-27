<?php

namespace Recca0120\Twzipcode;

class Address
{
    const NO = 0;
    const SUBNO = 1;
    const NAME = 2;
    const UNIT = 3;

    public $address;

    public $tokens = [];

    public function __construct($address = '')
    {
        if (empty($address) === false) {
            $this->set($address);
        }
    }

    public function set($address)
    {
        $address = preg_replace('/^\d+/', '', $address);
        $this->address = Normalizer::make($address, true)->value();

        $this->tokens = $this->tokenize();

        return $this;
    }

    public function value()
    {
        return $this->address;
    }

    public function getTokens()
    {
        return $this->tokens;
    }

    public function getPoint($index)
    {
        if (isset($this->tokens[$index]) === false) {
            return new Point(0, 0);
        }

        $token = $this->tokens[$index];

        return new Point(
            isset($token[static::NO]) === true ? (int) $token[static::NO] : 0,
            isset($token[static::SUBNO]) === true ? (int) str_replace('之', '', $token[static::SUBNO]) : 0
        );
    }

    public function flat($length = null)
    {
        $length = is_null($length) === true ? count($length) : $length;

        return implode('', array_map(function ($token) {
            return implode('', $token);
        }, array_slice($this->tokens, 0, $length)));
    }

    protected function tokenize()
    {
        $tokens = [];

        $units = [
            static::NO => 'no',
            static::SUBNO => 'subno',
            static::NAME => 'name',
            static::UNIT => 'unit',
        ];

        $patterns = implode('', [
            '(?:(?P<no>\d+)(?P<subno>之\d+)?(?=[巷弄號樓]|$)|(?P<name>.+?))',
            '(?:(?P<unit>[縣市鄉鎮市區村里道鄰路街段巷弄號樓])|(?=\d+(?:之\d+)?[巷弄號樓]|$))',
        ]);

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

        $trickies = [
            '鄉' => md5('鄉'),
            '市' => md5('市'),
            '鎮' => md5('鎮'),
            '區' => md5('區'),
            '村' => md5('村'),
            '里' => md5('里'),
            '新市' => md5('新市'),
            '阿里山' => md5('阿里山'),
            '鎮興里平' => md5('鎮興里平'),
        ];

        $map = [
            '村鄉' => $trickies['村'].'鄉',
            '里鄉' => $trickies['里'].'鄉',
            '村市' => $trickies['村'].'市',
            '里區' => $trickies['里'].'區',
            '鎮區' => $trickies['鎮'].'區',
            '里鎮' => $trickies['里'].'鎮',
            '里村' => $trickies['里'].'村',
            '鄉村' => $trickies['鄉'].'村',
            '新市區' => $trickies['新市'].'區',
            '阿里山鄉' => $trickies['阿里山'].'鄉',
            '鎮興里平鎮' => $trickies['鎮興里平'].'鎮',
        ];

        $flip = [
            $trickies['鄉'] => '鄉',
            $trickies['市'] => '市',
            $trickies['鎮'] => '鎮',
            $trickies['區'] => '區',
            $trickies['村'] => '村',
            $trickies['里'] => '里',
            $trickies['新市'] => '新市',
            $trickies['阿里山'] => '阿里山',
            $trickies['鎮興里平'] => '鎮興里平',
        ];

        $address = strtr($this->address, $map);

        if (preg_match_all('/'.$patterns.'/u', $address, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $values) {
                $temp = [];
                foreach ($units as $key => $unit) {
                    $temp[$key] = isset($values[$unit]) === true ? $values[$unit] : '';
                }
                $temp[static::NAME] = strtr($temp[static::NAME], $flip);
                $tokens[] = $temp;
            }
        }

        return $tokens;
    }

    public function __toString()
    {
        return $this->value();
    }
}
