<?php

declare(strict_types=1);

namespace Pug_Framework\Http\Http_Request;

use Pug_Framework\Helper_Function\Tool\{HttpString, URLcurrent};
use Pug_Framework\Include\Autoload\Autoloader;

require_once '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

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
 * @param RequestMethod $request
 * @return object
 */
#[RequestMethod, HttpString]
function getMethod(RequestMethod $request): object
{
    return (new HttpString())
        ->getUrlComponents($request::GET->value)
        ->getOne();
}
/**
 * @return void
 */
#[URLcurrent]
function getUrl(): void
{
    $url = (new URLcurrent())->currentHTTP();
    echo $url;
}