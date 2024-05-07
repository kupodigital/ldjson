<?php

include "../vendor/autoload.php";

use KupoDigital\Data\LightweightDataJson as Ldjson;

$ldjson = <<<EOT
{	name:string	type:string	url:string	price:integer	authentication:string	}
{	Asana	productivity	https://developers.asana.com/docs	0	oauth	}
{	ClickUp	productivity	https://clickup.com/api/	0	oauth	}
{	Atlassian	productivity	https://developer.atlassian.com/server/jira/platform/rest-apis/	0	oauth;basic	}
EOT;

print_r( Ldjson::decode($ldjson) );