import sys
import os
script_dir = os.path.dirname(os.path.realpath(__file__))
sys.path.append(os.path.join(script_dir, "../../"))

from src.LightweightDataJson import LightweightDataJson

with open("data.ld-json", "r") as file:
    ldjson_data = file.read()

decoded_data = LightweightDataJson.decode(ldjson_data)

print(decoded_data)