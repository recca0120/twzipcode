<?php

include __DIR__.'/../vendor/autoload.php';

use Recca0120\Twzipcode\Sources\Csv;
use Recca0120\Twzipcode\Sources\Json;
use Recca0120\Twzipcode\Storages\File;

// https://data.gov.tw/dataset/5948
$downloadUrl = 'https://quality.data.gov.tw/dq_download_json.php?nid=5948&md5_url=e1f6004ad33eb3ff3a824fb992a4b01a';
$extension = 'json';
$file = __DIR__.'/Zip32_11208.'.$extension.'.zip';

set_error_handler(static function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

function csv($url)
{
    $contents = file_get_contents($url);

    $encoding = mb_detect_encoding($contents, ['UCS-2LE', 'BIG5', 'UTF-8']);
    if ($encoding !== 'UTF-8') {
        $contents = mb_convert_encoding($contents, 'UTF-8', $encoding);
    }
    $contents = preg_replace("/^\xEF\xBB\xBF/", '', $contents);
    $contents = trim(str_replace('Zip5,City,Area,Road,Scope', '', $contents));

    if (strpos('Zip5,City,Area,Road,Scope', $contents) === false) {
        throw new RuntimeException($contents);
    }

    return $contents;
}

function json($url)
{
    return file_get_contents($url);
}

$start = microtime(true);
if (file_exists($file) === false) {
    $contents = $extension($downloadUrl);

    touch($file);
    $zip = new ZipArchive;
    $zip->open($file, ZipArchive::OVERWRITE);
    $zip->addFromString(pathinfo($file, PATHINFO_FILENAME).'.'.$extension, $contents);
    $zip->close();
}

$lookup = ['csv' => Csv::class, 'json' => Json::class];
$class = $lookup[$extension];

$source = new $class($file);

(new File)->load($source);
echo 'benchmark: '.(microtime(true) - $start)."\n";
