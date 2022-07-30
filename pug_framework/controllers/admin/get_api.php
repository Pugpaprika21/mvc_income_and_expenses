<?php

use Pug_Framework\controllers\Admin\AdminController;
use Pug_Framework\Http\Curl_Api\Api;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $url = 'https://jsonplaceholder.typicode.com/photos';
    $method = 'GET';

    $result = ['api' => Api::option(['url' => $url, 'method' => $method])->result];

    $users_data = (new AdminController())->getUsers();
    
    Response::render($users_data)->toArray();
    
} else {
    
    Response::error();
}
