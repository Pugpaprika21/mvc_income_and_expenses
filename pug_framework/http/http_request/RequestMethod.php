<?php

declare(strict_types=1);

namespace Pug_Framework\Http\Http_Request;

use Pug_Framework\Helper_Function\Tool\{HttpString, URLcurrent};

enum RequestMethod: string
{
    case DELETE  = 'DELETE';
    case GET     = 'GET';
    case HEAD    = 'HEAD';
    case OPTIONS = 'OPTIONS';
    case PATCH   = 'PATCH';
    case POST    = 'POST';
    case PUT     = 'PUT';
}
/**
 * @global Https
 * @return object
 */
#[RequestMethod, HttpString]
function getMethod(RequestMethod $request): object
{
    return (new HttpString())
        ->getUrlComponents($request::GET->value)
        ->getOne();
}
