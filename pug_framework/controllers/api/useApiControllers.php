<?php

use Pug_Framework\Controllers\User\UserController;
use Pug_Framework\Helper_Function\Date_Func\DateThai;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Http\Http_Request\ServerRequestMethod;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

require_once '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

// api controller
// point use controller

$server = new ServerRequestMethod();
$request = new Request();
$user = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $requestUserProfile = $request
        ->get()
        ->toStdClass();
        
    $resultProfile = $user->getUserProfile($requestUserProfile);

    if (count($resultProfile) > 0) {
        Response::render($resultProfile)->jsonString();
    }
}

