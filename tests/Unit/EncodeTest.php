<?php

use KupoDigital\Data\LightweightDataJson;

test('encode a array to ld-json format', function () {
    $filename = __DIR__ . "/data_encoded.ld-json";
    $array = [
        [
            "name" => "Asana",
            "type" => "productivity",
            "url" => "https://developers.asana.com/docs",
            "price" => 0,
            "authentication" => "oauth"
        ],
        [
            "name" => "ClickUp",
            "type" => "productivity",
            "url" => "https://clickup.com/api/",
            "price" => 0,
            "authentication" => "oauth"
        ],
        [
            "name" => "Atlassian",
            "type" => "productivity",
            "url" => "https://developer.atlassian.com/server/jira/platform/rest-apis/",
            "price" => 0,
            "authentication" => "oauth;basic"
        ],
    ];

    $ldjson = LightweightDataJson::encode($array);

    file_put_contents($filename , $ldjson);

    $ldjsonLoaded = file_get_contents( $filename );

    $arrayResult = LightweightDataJson::decode($ldjsonLoaded);

    $items = count($arrayResult);

    expect($items)->toBe(3);

});
