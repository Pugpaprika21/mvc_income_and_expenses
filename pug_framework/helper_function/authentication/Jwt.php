<?php

namespace Pug_Framework\Helper_Function\Authentication;

use DateTime;

final class Jwt
{
    /**
     * @var string
     */
    private static $string_letter = 'abcdefghijklmnopqrsguvwhyz';
    private static $string_big = 'ABCDEFGHIJKLMNOPQRSGUVWHYZ';
    private static $string_number = '1234567890';
    private static $special = '!@#$%^*()_+-=|?/<>';

    private static $str_output_key = '';
    /**
     * @param array $encode_data
     * @return void
     */
    public static function encode(array $encode_data): string
    {
        $counter = 1;
        $encode_str_output = [];
        $string_concat = '';

        $dateTime = (new DateTime())->format('Y-m-d' . (string)time());

        foreach ($encode_data as $encode_key => $encode_value) {
           
            if ($encode_data[$encode_key] !== '') {
                $encode_str_output[$encode_key] = $encode_value;
            } else {
                $encode_str_output = [];
            }

            for ($i = 0; $i < $counter; $i++) {
                $string_concat = self::$string_letter . self::$string_big . self::$string_number . self::$special . $dateTime;
                $secret_key_final = str_shuffle($string_concat . implode('' . $counter, $encode_str_output));
            }

            $counter++;
        }

        $uniq = uniqid();
        $hash = password_hash($secret_key_final, PASSWORD_BCRYPT);
        self::$str_output_key = $hash . $uniq;
        return $hash;
    }
    /**
     * @param string $decode_data
     * @return string
     */
    public static function decode(string $decode_data): string
    {
        return (is_string($decode_data)) ? password_verify(self::$str_output_key, PASSWORD_BCRYPT) : '';
    }
}
