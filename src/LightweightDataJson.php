<?php
/**
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
 */

namespace KupoDigital\Data;

class LightweightDataJson
{
    public static function decode(string $data): array
    {
        $lines = explode("\x0A", $data);
        $header = array_map(function($item) {
            return strtok($item, ":");
        }, array_map('trim', explode("\x09", trim($lines[0], "{}"))));
        $result = [];

        for ($i = 1; $i < count($lines); $i++) {
            $values = array_map('trim', explode("\x09", trim($lines[$i], "{}")));
            $object = [];

            for ($j = 0; $j < count($header); $j++) {
                if (!empty($header[$j])) {
                    $object[$header[$j]] = $values[$j];
                }
            }

            $result[] = $object;
        }

        return $result;
    }

    public static function encode(array $data): string
    {
        $header = [];
        $body = "";
        $t = 0;

        foreach ($data as $k => $value) {
            $body .= "\x0A{\x09";
            
            foreach ($value as $subKey => $subValue) {
                if ($t === 0) {
                    $header[] = "{$subKey}:" . gettype($subValue);
                }
                $body .= "{$subValue}\x09";
            }

            $t++;
            $body .= "}";
        }

        $header = implode("\x09", $header);
        return "{\x09{$header}\x09}{$body}";
    }
}