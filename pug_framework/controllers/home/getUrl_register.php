<?php

use Pug_Framework\Helper_Function\Tool\CreateUrl;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $urlRegisterView = '../../../../mvc_income_and_expenses/pug_framework/resource/view/home/register.php';
    CreateUrl::display_path($urlRegisterView)->withQueryString([
        'status' => 200
    ]);
} 
