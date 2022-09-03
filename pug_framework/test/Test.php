<?php

// Test File .php

use Pug_Framework\Http\Http_Request\{Request, RequestMethod};
use Pug_Framework\Include\Autoload\Autoloader;
use Pug_Framework\Model\Query_Builder\Query;

/**
 * @param RequestMethod $requestMethod
 * @return void
 */

#[RequestMethod]
function get(RequestMethod $requestMethod): void
{
    $joinTable = "
        SELECT * FROM user_tb
        INNER JOIN revenue_tb ON user_tb.id = revenue_tb.id
        INNER JOIN expenses_tb ON user_tb.id = expenses_tb.id
        WHERE user_tb.id =:id
    ";

    $query = new Query();
    $result = $query->innerJoin($joinTable, [
        'id' => Request::get()->toArray()
    ]);
}

get(RequestMethod::DELETE);




require_once dirname(__DIR__) . '../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());
