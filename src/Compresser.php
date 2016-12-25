<?php

namespace Recca0120\Twzipcode;

class Compresser
{
    public static function compress($plainText)
    {
        $method = 'gzcompress';
        if (function_exists($method) === true) {
            return call_user_func($method, $data);
        }

        return $plainText;
    }

    public static function decompress($compressed)
    {
        $method = 'gzuncompress';
        if (function_exists($method) === true) {
            return call_user_func($method, $data);
        }

        return $compressed;
    }
}
