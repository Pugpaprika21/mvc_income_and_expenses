<?php

namespace Pug_Framework\Controllers\DisplayData;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

require_once dirname(__DIR__) . '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

class ChartRevenueExpensesController
{
    /**
     * @return void
     */
    public function displayChartRevenueExpenses(): void
    {
        $sql = "SELECT * FROM revenue_tb WHERE id =:id AND revenue_date =:revenue_date";
        $resultRevenueTb = (new Query())->select($sql, [
            'id' => $_SESSION['user_id'],
            'revenue_date' => date('Y-m-d')
        ]);

        $sql = "SELECT * FROM expenses_tb WHERE id =:id AND date_expenses =:date_expenses";
        $resultExpensesTb = (new Query())->select($sql, [
            'id' => $_SESSION['user_id'],
            'date_expenses' => date('Y-m-d')
        ]);

        $mergeToChart = [
            'revenue_tb' => $resultRevenueTb,
            'expenses_tb' => $resultExpensesTb 
        ];

        Response::render($mergeToChart)->jsonString();
    }
}
