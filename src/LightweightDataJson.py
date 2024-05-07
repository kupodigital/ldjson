"""
 * LightweightDataJson - A lightweight utility for encoding and decoding data in the .ld-json format.
 *
 * This class provides methods to encode PHP arrays into .ld-json format and decode .ld-json data into PHP arrays.
 * It can be used as open source software under the terms of the MIT License.
 * When utilizing this code, please provide appropriate attribution to the author.
 *
 * @package   LightweightDataJson
 * @category  Utility
 * @version   1.0.0
 * @license   MIT License (https://opensource.org/licenses/MIT)
 * @author    Weslley Alves
 * @link      https://github.com/kupodigital/ldjson
"""

class LightweightDataJson:
    
    def decode(data: str) -> list:
        lines = data.split("\n")
        header = []
        result = []

        for line in lines:
            if line.strip():
                header = [item.split(":")[0] for item in map(str.strip, line.strip("{}").split("\t"))]
                break

        for i in range(1, len(lines)):
            if not lines[i].strip():
                continue
            values = list(map(str.strip, lines[i].strip("{}").split("\t")))
            obj = {}

            for j in range(len(header)):
                if header[j]:
                    obj[header[j]] = values[j]

            result.append(obj)

        return result
    
    @staticmethod
    def encode(data: list) -> str:
        header = []
        body = ""
        t = 0

        for value in data:
            body += "\x0A{\x09"
            sorted_value = dict(sorted(value.items()))
            
            for subKey, subValue in sorted_value.items():
                if t == 0:
                    header.append(f"{subKey}:{type(subValue).__name__}")
                body += f"{subValue}\x09"

            t += 1
            body += "}"

        header_str = "\x09".join(header)
        return f"{{\x09{header_str}\x09}}{body}"