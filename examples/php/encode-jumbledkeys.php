<?php

include "../vendor/autoload.php";

use KupoDigital\Data\LightweightDataJson as Ldjson;

$array = [
  [
    "name" => "Asana", 
    "url" => "https://developers.asana.com/docs", 
    "price" => 0,
    "type" => "productivity", 
    "authentication" => "oauth"
  ],
  [
    "name" => "ClickUp", 
    "type" => "productivity", 
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

echo Ldjson::encode($array);