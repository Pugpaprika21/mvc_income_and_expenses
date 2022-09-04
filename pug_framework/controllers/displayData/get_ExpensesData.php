<?php

use Pug_Framework\Controllers\DisplayData\ShowDataExpensesController;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    (new ShowDataExpensesController())->getDataExpenses();
}
