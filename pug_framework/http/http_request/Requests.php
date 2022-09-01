<?php

namespace Pug_Framework\Http\Http_Request;

class Requests
{
    private static $request = null;
    /**
     * @return self
     */
    public static function post(): self
    {
        if (self::checkRequestMethod() === 'POST') {
            self::$request = $_POST;
            return new self;
        }

        return new self;
    }
    /**
     * @return self
     */
    public static function get(): self
    {
        if (self::checkRequestMethod() === 'GET') {
            self::$request = $_POST;
            return new self;
        }

        return new self;
    }
    /**
     * @return self
     */
    public static function any(string $fileName = ''): self
    {
        $mapMethod = [
            'post' => isset($_POST) ? $_POST : [],
            'get' => isset($_GET) ? $_GET : [],
            'files' => isset($_FILES) ? ['files_request' => $_FILES] : []
        ];

        self::$request = $mapMethod;
        return new self;
    }
    /**
     * @return array
     */
    public function toArray(): array
    {
        $array_result = is_array(self::$request) ? self::$request : [
            'status' => http_response_code(500),
            'error' => get_class($this)
        ];

        return $array_result;
    }
    /**
     * @return object
     */
    public function toStdClass(): object
    {
        $json_result = json_decode(json_encode(self::$request));

        return is_object($json_result) ? $json_result : (object)[
            'status' => http_response_code(500),
            'error' => get_class($this)
        ];
    }
    /**
     * @return array
     */
    public static function checkRequestMethod(): array
    {
        return match ($_SERVER['REQUEST_METHOD']) {
            'POST' => $_POST,
            'GET' => $_GET,
            'FILES' => $_FILES,
            default => []
        };
    }
}
