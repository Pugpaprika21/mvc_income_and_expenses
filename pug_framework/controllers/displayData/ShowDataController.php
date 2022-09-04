<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\DisplayData;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

class ShowDataController
{
    /**
     * @param object $request
     * @return void
     */
    public function getDataRevenueAsExpenses(): void
    {
        $sql = "
            SELECT * FROM user_tb
            INNER JOIN revenue_tb ON user_tb.id = revenue_tb.id
            INNER JOIN expenses_tb ON user_tb.id = expenses_tb.id
            WHERE user_tb.id =:id
        ";

        $asParam = ['id' => $_SESSION['user_id']];
        $result = (new Query())->innerJoin($sql, $asParam);

        if (count($result)) {
            Response::render($result)->jsonString();
        }
    }
}
