<?php

$fp = fopen(__DIR__.'/Zip32_utf8_10501_1.csv', 'r');

$data = [];
while (($line = fgets($fp)) !== false) {
    // $line = mb_convert_encoding($line, 'UTF-8', 'UCS-2LE');
    list($zipcode, $county, $district, $street, $condition) = explode(',', $line);
    $zipcode = trim($zipcode);
    $county = trim($county);
    $district = trim($district);
    $street = trim($street);
    $condition = trim($condition);
    if (isset($data[$county]) === false) {
        $data[$county] = [];
    }

    if (isset($data[$county][$district]) === false) {
        $data[$county][$district] = [];
    }

    $data[$county][$district]['zipcode'] = substr($zipcode, 0, 3);
    $data[$county][$district]['streets'][] = [
        'zipcode' => $zipcode,
        'street' => $street,
        'condition' => $condition,
    ];
}

file_put_contents(__DIR__.'/twzipcode.gz', gzcompress(serialize($data)));
