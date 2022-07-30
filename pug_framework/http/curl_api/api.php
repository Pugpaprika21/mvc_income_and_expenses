<?php

namespace Pug_Framework\Http\Curl_Api;

use CurlHandle;
use Exception;

class Api
{
    private static $response;
    /**
     * @param array $option_api
     * @return object
     */
    public static function option(array $option_api): object
    {
        if (is_array($option_api)) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $option_api['url'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $option_api['method']
            ]);

            self::$response = curl_exec($curl);
            self::api_close($curl);

            return (object)[
                'result' => json_decode(self::$response)
            ];
        }

        return (object)[
            'error' => throw new Exception('error send api type error')
        ];
    }
    /**
     * @param CurlHandle $curl
     * @return void
     */
    public static function api_close(CurlHandle $curl): void
    {
        curl_close($curl);
    }
}
