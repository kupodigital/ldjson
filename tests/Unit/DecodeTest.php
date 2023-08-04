<?php

use KupoDigital\Data\LightweightDataJson;

test('decode a ld-json format to array', function () {

    $ldjson= file_get_contents( __DIR__ . "/data.ld-json");

    $arrayResult = LightweightDataJson::decode($ldjson);
    
    $items = count($arrayResult);

    expect($items)->toBe(3);
});

test('size of data is same', function () {

    $ldjson= file_get_contents( __DIR__ . "/data.ld-json");

    $length = strlen( $ldjson );

    $array = LightweightDataJson::decode($ldjson);

    if(!is_array($array)){
        expect([])->toBe(null);
    }

    $ldjsonEncoded = LightweightDataJson::encode($array);

    $size = strlen( $ldjsonEncoded ) + 1;

    expect($length)->toEqual($size);
    
});