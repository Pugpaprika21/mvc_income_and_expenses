<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\DisplayData;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

class ShowDataExpensesController
{
    /**
     * @return void
     */
    public function getDataExpenses(): void
    {
        $result = null;
        $sql = "SELECT * FROM expenses_tb WHERE id =:id";
        $result = (new Query())->select($sql, ['id' => $_SESSION['user_id']]);

        if (count($result)) {
            Response::render($result)->jsonString();
        }
    }
}
