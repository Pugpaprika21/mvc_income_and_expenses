<?php

namespace Pug_Framework\Http\Http_Request;

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
