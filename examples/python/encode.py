import sys
import os
script_dir = os.path.dirname(os.path.realpath(__file__))
sys.path.append(os.path.join(script_dir, "../../"))

from src.LightweightDataJson import LightweightDataJson

data = [
    {
        "name": "Asana",
        "type": "productivity",
        "url": "https://developers.asana.com/docs",
        "price": 0,
        "authentication": "oauth"
    },
    {
        "name": "ClickUp",
        "type": "productivity",
        "url": "https://clickup.com/api/",
        "price": 0,
        "authentication": "oauth"
    },
    {
        "name": "Atlassian",
        "type": "productivity",
        "url": "https://developer.atlassian.com/server/jira/platform/rest-apis/",
        "price": 0,
        "authentication": "oauth;basic"
    }
]

ldjson_encoded = LightweightDataJson.encode(data)

with open("data.ld-json", "w") as file:
    file.write(ldjson_encoded)
