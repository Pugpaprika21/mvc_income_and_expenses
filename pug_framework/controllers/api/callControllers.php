<?php

use Pug_Framework\Controllers\Test\HomeController;
use Pug_Framework\Helper_Function\Tool\HttpString;
use Pug_Framework\Include\Autoload\Autoloader;

require_once '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

// api controller
// point use controller

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

}
