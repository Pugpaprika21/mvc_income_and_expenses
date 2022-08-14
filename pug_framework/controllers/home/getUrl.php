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

} else {
    Response::render(['status' => 500, 'path_url' => CreateUrl::DEFAULT_INDEX_PAGE_PHP])->jsonString();
}
