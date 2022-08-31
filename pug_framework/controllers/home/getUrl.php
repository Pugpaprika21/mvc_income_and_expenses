<?php

use Pug_Framework\Helper_Function\Tool\CreateUrl;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $pathLocationToView = '../../../../mvc_income_and_expenses/pug_framework/resource/view/home/login.php';
    CreateUrl::display_path($pathLocationToView)->withQueryString([
        'status' => 200
    ]);
} 


