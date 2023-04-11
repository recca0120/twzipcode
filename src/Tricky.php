<?php

namespace Recca0120\Twzipcode;

class Tricky
{
    /*
     * 20742,新北市,萬里區,二坪,全
     * 21042,連江縣,北竿鄉,坂里村,全
     * 24944,新北市,八里區,八里大道,全
     * 32058,桃園市,中壢區,華夏一村市場,全
     * 32464,桃園市,平鎮區,三和路,全
     * 32460,桃園市,平鎮區,鎮興里平鎮,連 123號至 139號
     * 41273,臺中市,大里區,三民一街,全
     * 42147,臺中市,后里區,七星街,全
     * 51547,彰化縣,大村鄉,大仁路１段,全
     * 52441,彰化縣,溪州鄉,村市路,全
     * 54544,南投縣,埔里鎮,一新一巷,全
     * 55347,南投縣,水里鄉,一廍路,全
     * 60243,嘉義縣,番路鄉,三橋仔,全
     * 60541,嘉義縣,阿里山鄉,二萬平,全
     * 60845,嘉義縣,水上鄉,鄉村世界,全
     * 71342,臺南市,左鎮區,二寮,全
     * 72270,臺南市,佳里區,下廍,全
     * 74145,臺南市,新市區,大利一路,全
     * 80652,高雄市,前鎮區,一心一路,單 239號以下
     * 83043,高雄市,鳳山區,海光四村市場,全
     * 90542,屏東縣,里港鄉,八德路,全
     * 96341,臺東縣,太麻里鄉,千禧街,全
     * 98191,花蓮縣,玉里鎮,三民,全
     * 98342,花蓮縣,富里鄉,三台,全
     * 98392,花蓮縣,富里鄉,東里村復興,全
     * 89442,金門縣,烈嶼鄉,二擔,全
     */

    private static $cached = [];

    public function __construct()
    {
        if (! array_key_exists('tricky', self::$cached)) {
            $this->init();
        }
    }

    /**
     * @return void
     */
    private function init()
    {
        $tricky = ['島', '嶼', '鄉', '市', '鎮', '區', '村', '里', '路', '新市', '阿里山', '鎮興里平'];
        self::$cached['hash'] = array_reduce($tricky, static function ($acc, $unit) {
            return $acc + [$unit => md5($unit)];
        }, []);
        self::$cached['flip'] = array_flip(self::$cached['hash']);

        self::$cached['replace'] = [
            '島鄉' => self::$cached['hash']['島'].'鄉',
            '嶼鄉' => self::$cached['hash']['嶼'].'鄉',
            '村鄉' => self::$cached['hash']['村'].'鄉',
            '里鄉' => self::$cached['hash']['里'].'鄉',
            '村市' => self::$cached['hash']['村'].'市',
            '里區' => self::$cached['hash']['里'].'區',
            '鎮區' => self::$cached['hash']['鎮'].'區',
            '里鎮' => self::$cached['hash']['里'].'鎮',
            '里村' => self::$cached['hash']['里'].'村',
            '鄉村' => self::$cached['hash']['鄉'].'村',
            '路鄉' => self::$cached['hash']['路'].'鄉',
            '新市區' => self::$cached['hash']['新市'].'區',
            '阿里山鄉' => self::$cached['hash']['阿里山'].'鄉',
            '鎮興里平鎮' => self::$cached['hash']['鎮興里平'].'鎮',
        ];
    }

    /**
     * @param  Normalizer  $normalizer
     * @return Normalizer
     */
    public function hash($normalizer)
    {
        return $normalizer->replace(self::$cached['replace']);
    }

    /**
     * @param  string  $token
     * @return string
     */
    public function flip($token)
    {
        return strtr($token, self::$cached['flip']);
    }
}
