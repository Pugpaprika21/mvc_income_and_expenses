<?php

namespace Pug_Framework\Http\Http_Response;

final class ServerUrl
{
    public static function display_all(): object
    {
        return (object)[
            'https' => $_SERVER['HTTPS'],
            'server_post' => $_SERVER['SERVER_PORT'],
            'http_host' => $_SERVER['HTTP_HOST'],
            'request_url' => $_SERVER['REQUEST_URI'],
            'query_string' => $_SERVER['QUERY_STRING'],
            'request_method' => $_SERVER['REQUEST_METHOD']
        ];
    }
}
