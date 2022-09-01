<?php

namespace Pug_Framework\Controllers\AddRevenue;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

require_once dirname(__DIR__) . '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

class RevenueController
{
    /**
     * @param object $request
     * @return void
     */
    public function addToRevenueTable(object $request): void
    {
        $resultInsert = null;

        foreach ($request->revenue_date as $requestKey => $requestVal) {

            $sql = "INSERT INTO revenue_tb(revenue_date, revenue_detail, revenue_total, revenue_vat, revenue_balance, id) VALUES(:revenue_date, :revenue_detail, :revenue_total, :revenue_vat, :revenue_balance, :id)";

            $resultInsert = (new Query())->insert($sql, [
                'revenue_date' => $request->revenue_date[$requestKey],
                'revenue_detail' => $request->revenue_detail[$requestKey],
                'revenue_total' => $request->revenue_total[$requestKey],
                'revenue_vat' => $request->revenue_vat[$requestKey],
                'revenue_balance' => $request->revenue_balance[$requestKey],
                'id' => $_SESSION['user_id']
            ]);
        }

        if ($resultInsert) {
            Response::success();
        }
    }
}
