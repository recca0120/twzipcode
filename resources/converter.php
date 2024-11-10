<?php

include __DIR__.'/../vendor/autoload.php';

use Recca0120\Twzipcode\Storages\File;

set_error_handler(static function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

$start = microtime(true);
$file = __DIR__.'/Zip32_utf8_10501_1.zip';

// https://data.gov.tw/dataset/5948
$url = 'https://quality.data.gov.tw/dq_download_csv.php?nid=5948&md5_url=e1f6004ad33eb3ff3a824fb992a4b01a';

if (file_exists($file) === false) {
    touch($file);
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

    $zip = new ZipArchive;
    $zip->open($file, ZipArchive::OVERWRITE);
    $zip->addFromString(pathinfo($file, PATHINFO_FILENAME).'.csv', $contents);
    $zip->close();
}

(new File)->loadFile($file);
echo 'benchmark: '.(microtime(true) - $start)."\n";
