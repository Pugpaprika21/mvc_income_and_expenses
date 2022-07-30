<?php

use Pug_Framework\Controllers\User\UserController;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    (new UserController())
        ->register(Request::any('profile')
        ->toStdClass()
    );

} else {
    Response::error();
}
