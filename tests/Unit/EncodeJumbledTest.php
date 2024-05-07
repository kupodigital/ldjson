<?php

use KupoDigital\Data\LightweightDataJson;

test('encode a array to ld-json format', function () {
  $filename = __DIR__ . "/data_encoded_jumbled.ld-json";
  $array = [
    [
      "name" => "Asana",
      "url" => "https://developers.asana.com/docs",
      "price" => 0,
      "type" => "productivity",
      "authentication" => "oauth"
    ],
    [
      "type" => "productivity",
      "name" => "ClickUp",
      "url" => "https://clickup.com/api/",
      "authentication" => "oauth",
      "price" => 0,
    ],
    [
      "authentication" => "oauth;basic",
      "price" => 0,
      "name" => "Atlassian",
      "url" => "https://developer.atlassian.com/server/jira/platform/rest-apis/",
      "type" => "productivity",
    ],
  ];

  $ldjson = LightweightDataJson::encode($array);

  file_put_contents($filename, $ldjson);

  $ldjsonLoaded = file_get_contents($filename);

  $arrayResult = LightweightDataJson::decode($ldjsonLoaded);

  $items = count($arrayResult);

  expect($items)->toBe(3);
});
