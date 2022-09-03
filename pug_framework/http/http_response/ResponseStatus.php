<?php

namespace Pug_Framework\Http\Http_Response;

enum ResponseStatus: int
{
    case OK           = 200;
    case CLIENT_ERROR = 400;
    case SERVER_ERROR = 500;
}
