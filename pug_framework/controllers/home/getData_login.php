<?php

use Pug_Framework\Controllers\Home\LoginController;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = (new LoginController())->login(Request::post()->toStdClass());
} else {
    Response::error();
}
