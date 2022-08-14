<?php

use Pug_Framework\Controllers\Admin\AdminController;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = Request::post()->toStdClass();

    $admin = new AdminController();

    /* echo '<pre>';
    print_r($data);
    echo '</pre>'; */

    //$login = (new LoginController())->login(Request::post()->toStdClass());
}
