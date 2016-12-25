<?php

include __DIR__.'/../vendor/autoload.php';

use Recca0120\Twzipcode\Storage;

function dump($value)
{
    echo mb_convert_encoding(var_export($value, true), 'big5', 'utf8')."\n";
}

$start = microtime(true);

(new Storage())
    ->generate(file_get_contents(__DIR__.'/Zip32_utf8_10501_1.csv'));

echo 'benchmark: '.(microtime(true) - $start)."\n";
