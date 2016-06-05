<?php

namespace Recca0120\Twzipcode;

class Twzipcode
{
    private static $twzipcodeData = null;

    public $zipcode;

    public $county;

    public $district;

    public $shortAddress;

    public $address;

    public $originalAddress;

    public function __construct($address)
    {
        $this->originalAddress = $address;

        $parsed = $this->parse($this->normalizeAddress($address));
        $this->zipcode = $parsed['zipcode'];
        $this->county = $parsed['county'];
        $this->district = $parsed['district'];
        $this->shortAddress = $parsed['shortAddress'];
        $this->address = $parsed['address'];
    }

    private function parse($address)
    {
        $county = null;
        $district = null;
        $zipcode = null;
        $shortAddress = null;
        $twzipcodeData = static::getTwzipcodeData();
        if (preg_match('/'.implode('|', array_keys($twzipcodeData)).'/', $address, $countyMatch)) {
            $county = $countyMatch[0];
            $districts = $twzipcodeData[$county];
            $shortAddress = preg_replace('/^'.$county.'/', '', $address);
            if (preg_match('/'.implode('|', array_keys($districts)).'/', $address, $districtMatch)) {
                $district = $districtMatch[0];
                $zipcode = $districts[$district];
                $shortAddress = preg_replace('/^'.$district.'/', '', $shortAddress);
            }
        }

        return compact('county', 'district', 'zipcode', 'shortAddress', 'address');
    }

    public static function getTwzipcodeData()
    {
        if (is_null(static::$twzipcodeData) === true) {
            static::$twzipcodeData = json_decode(file_get_contents(__DIR__.'/twzipcode.json'), true);
        }

        return static::$twzipcodeData;
    }

    private function normalizeAddress($address)
    {
        $address = str_replace([' ', '　'], '', $address);
        $address = preg_replace('/^\d+/', '', $address);
        $address = $this->normalizeCounty($address);
        $address = $this->normalizeDistrict($address);

        return $address;
    }

    private function normalizeCounty($address)
    {
        $newName = [
            '臺北'  => '台北',
            '台北縣' => '新北市',
            '北市'  => '台北市',
            '北縣'  => '新北市',
            '臺南'  => '台南',
            '台南縣' => '台南市',
            '南市'  => '台南市',
            '南縣'  => '台南市',
            '臺中'  => '台中',
            '台中縣' => '台中市',
            '中市'  => '台中市',
            '中縣'  => '台中市',
            '高雄縣' => '高雄市',
            '高縣'  => '高雄市',
            '高市'  => '高雄市',
            // '台東市' => '臺東市',
            '臺東縣' => '台東縣',
        ];

        return preg_replace_callback('/^('.implode('|', array_keys($newName)).')/', function ($m) use ($newName) {
            return $newName[$m[1]];
        }, $address);
    }

    private function normalizeDistrict($address)
    {
        $newName = [
            '萬里鄉'  => '萬里區',
            '金山鄉'  => '金山區',
            '板橋市'  => '板橋區',
            '汐止市'  => '汐止區',
            '深坑鄉'  => '深坑區',
            '石碇鄉'  => '石碇區',
            '瑞芳鎮'  => '瑞芳區',
            '平溪鄉'  => '平溪區',
            '雙溪鄉'  => '雙溪區',
            '貢寮鄉'  => '貢寮區',
            '新店市'  => '新店區',
            '坪林鄉'  => '坪林區',
            '烏來鄉'  => '烏來區',
            '永和市'  => '永和區',
            '中和市'  => '中和區',
            '土城市'  => '土城區',
            '三峽鎮'  => '三峽區',
            '樹林市'  => '樹林區',
            '鶯歌鎮'  => '鶯歌區',
            '三重市'  => '三重區',
            '新莊市'  => '新莊區',
            '泰山鄉'  => '泰山區',
            '林口鄉'  => '林口區',
            '蘆洲市'  => '蘆洲區',
            '五股鄉'  => '五股區',
            '八里鄉'  => '八里區',
            '淡水鎮'  => '淡水區',
            '三芝鄉'  => '三芝區',
            '石門鄉'  => '石門區',
            '大雅鄉'  => '大雅區',
            '太平市'  => '太平區',
            '大里市'  => '大里區',
            '霧峰鄉'  => '霧峰區',
            '烏日鄉'  => '烏日區',
            '豐原市'  => '豐原區',
            '后里鄉'  => '后里區',
            '石岡鄉'  => '石岡區',
            '東勢鎮'  => '東勢區',
            '和平鄉'  => '和平區',
            '新社鄉'  => '新社區',
            '潭子鄉'  => '潭子區',
            '大雅鄉'  => '大雅區',
            '神岡鄉'  => '神岡區',
            '霧峰鄉'  => '霧峰區',
            '大肚鄉'  => '大肚區',
            '沙鹿鎮'  => '沙鹿區',
            '龍井鄉'  => '龍井區',
            '梧棲鎮'  => '梧棲區',
            '清水鎮'  => '清水區',
            '大甲鎮'  => '大甲區',
            '外埔鄉'  => '外埔區',
            '大安鄉'  => '大安區',
            '永康市'  => '永康區',
            '歸仁鄉'  => '歸仁區',
            '新化鎮'  => '新化區',
            '左鎮鄉'  => '左鎮區',
            '玉井鄉'  => '玉井區',
            '楠西鄉'  => '楠西區',
            '南化鄉'  => '南化區',
            '仁德鄉'  => '仁德區',
            '關廟鄉'  => '關廟區',
            '龍崎鄉'  => '龍崎區',
            '官田鄉'  => '官田區',
            '麻豆鎮'  => '麻豆區',
            '佳里鎮'  => '佳里區',
            '西港鄉'  => '西港區',
            '七股鄉'  => '七股區',
            '將軍鄉'  => '將軍區',
            '學甲鎮'  => '學甲區',
            '北門鄉'  => '北門區',
            '新營市'  => '新營區',
            '後壁鄉'  => '後壁區',
            '白河鎮'  => '白河區',
            '東山鄉'  => '東山區',
            '六甲鄉'  => '六甲區',
            '下營鄉'  => '下營區',
            '柳營鄉'  => '柳營區',
            '鹽水鎮'  => '鹽水區',
            '善化鎮'  => '善化區',
            '大內鄉'  => '大內區',
            '山上鄉'  => '山上區',
            '新市鄉'  => '新市區',
            '安定鄉'  => '安定區',
            '仁武鄉'  => '仁武區',
            '大社鄉'  => '大社區',
            '岡山鎮'  => '岡山區',
            '路竹鄉'  => '路竹區',
            '阿蓮鄉'  => '阿蓮區',
            '田寮鄉'  => '田寮區',
            '燕巢鄉'  => '燕巢區',
            '橋頭鄉'  => '橋頭區',
            '梓官鄉'  => '梓官區',
            '彌陀鄉'  => '彌陀區',
            '永安鄉'  => '永安區',
            '湖內鄉'  => '湖內區',
            '鳳山市'  => '鳳山區',
            '大寮鄉'  => '大寮區',
            '林園鄉'  => '林園區',
            '鳥松鄉'  => '鳥松區',
            '九曲堂'  => '九曲區',
            '大樹鄉'  => '大樹區',
            '旗山鎮'  => '旗山區',
            '美濃鎮'  => '美濃區',
            '六龜鄉'  => '六龜區',
            '內門鄉'  => '內門區',
            '杉林鄉'  => '杉林區',
            '甲仙鄉'  => '甲仙區',
            '桃源鄉'  => '桃源區',
            '那瑪夏鄉' => '那瑪夏區',
            '茂林鄉'  => '茂林區',
            '茄萣鄉'  => '茄萣區',

            '台西鄉' => '臺西鄉',
            '霧台鄉' => '霧臺鄉',
            '台東市' => '臺東市',
        ];

        return strtr($address, $newName);
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getCounty()
    {
        return $this->county;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getShortAddress()
    {
        return $this->shortAddress;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
