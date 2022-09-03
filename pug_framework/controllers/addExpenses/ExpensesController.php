<?php

namespace Pug_Framework\Controllers\AddExpenses;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

require_once dirname(__DIR__). '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

class ExpensesController
{
    /**
     * @param object $request
     * @return void
     */
    public function addToExpensesTable(object $request): void
    {
        $resultInsert = null;

        foreach ($request->date_expenses as $requestKey => $requestVal) { 
   
            $sql = "INSERT INTO expenses_tb(date_expenses, list_expenses, price_expenses, qty_expenses, pay_expenses, sum_expenses, change_expenses, id) VALUES(:date_expenses, :list_expenses, :price_expenses, :qty_expenses, :pay_expenses, :sum_expenses, :change_expenses, :id)";
            $resultInsert = (new Query())->insert($sql, [
                'date_expenses' => $request->date_expenses[$requestKey],
                'list_expenses' => $request->list_expenses[$requestKey],
                'price_expenses' => $request->price_expenses[$requestKey],
                'qty_expenses' => $request->qty_expenses[$requestKey],
                'pay_expenses' => $request->pay_expenses[$requestKey],
                'sum_expenses' => $request->sum_expenses[$requestKey],
                'change_expenses' => $request->change_expenses[$requestKey],
                'id' => $_SESSION['user_id']
            ]);
        }

        if ($resultInsert) {
            Response::success();
        }
    }
}