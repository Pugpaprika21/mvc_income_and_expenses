<?php

declare(strict_types=1);

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

            $sql = "INSERT INTO revenue_tb(revenue_date, revenue_detail, revenue_amountOfMoney, revenue_vat, revenue_balance, id) VALUES(:revenue_date, :revenue_detail, :revenue_amountOfMoney, :revenue_vat, :revenue_balance, :id)";

            $resultInsert = (new Query())->insert($sql, [
                'revenue_date' => $request->revenue_date[$requestKey],
                'revenue_detail' => $request->revenue_detail[$requestKey],
                'revenue_amountOfMoney' => $request->revenue_amountOfMoney[$requestKey],
                'revenue_vat' => $request->revenue_vat[$requestKey],
                'revenue_balance' => $request->revenue_balance[$requestKey],
                'id' => $_SESSION['user_id']
            ]);
        }

        if ($resultInsert) {
            Response::success();
        }
    }
    /**
     * edit revenue data
     *
     * @param object $request
     * @return void
     */
    public function editRevenue(object $request): void
    {
        $revenue_id = $request->revenue_id;
        $pathEditRevenue = "../../../../pug_framework/resource/view/user/user_edit_revenue.php?revenue_id={$revenue_id}";

        if ($revenue_id !== null) {
            Response::render(['path_url' => $pathEditRevenue])->jsonString();
        }
    }
    /**
     * get data Revenue
     *
     * @param object $request
     * @return void
     */
    public function getDataEditRevenue(object $request): void
    {
        $sql = "SELECT * FROM revenue_tb WHERE revenue_id =:revenue_id";
        $result = (new Query())->select($sql, ['revenue_id' => $request->revenue_id]);

        if (count($result) > 0) {
            Response::render($result)->jsonString();
        }
    }
    /**
     * @param object $request
     * @return void
     */
    public function deleteRevenueBuId(object $request): void
    {
        $sql = "DELETE FROM revenue_tb WHERE revenue_id =:revenue_id";
        $result = (new Query())->delete($sql, [
            'revenue_id' => $request->revenue_id
        ]);

        if ($result) {
            Response::success();
        }
    }
}
