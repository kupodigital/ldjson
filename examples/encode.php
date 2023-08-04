<?php

include "../vendor/autoload.php";

use KupoDigital\Data\LightweightDataJson as Ldjson;

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

echo Ldjson::encode($array);