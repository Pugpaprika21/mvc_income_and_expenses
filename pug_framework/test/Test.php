<?php

// Test File .php

use Pug_Framework\Http\Http_Request\{Request, RequestMethod};
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;
use Pug_Framework\Model\Query_Builder\Query;

require_once dirname(__DIR__) . '../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

$joinTable = "
        SELECT * FROM user_tb
        INNER JOIN revenue_tb ON user_tb.id = revenue_tb.id
        INNER JOIN expenses_tb ON user_tb.id = expenses_tb.id
        WHERE user_tb.id =:id
    ";

$query = new Query();

$param = ['id' => 5];
$result = $query->innerJoin($joinTable, $param);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <td>#</td>
            <td>วันที่รับ</td>
            <td>รายละเอียดรายรับ</td>
            <td>จำนวนเงินที่ได้</td>
            <td>หักภาษี</td>
            <td>คงเหลือ</td>
        </thead>
        <tbody>
            <?php $i = 0; foreach ($result as $resultKey => $resultVal) : ?>
                <tr>
                    <td><?= ($i + 1); ?></td>
                    <td><?= $resultVal->revenue_date; ?></td>
                    <td><?= $resultVal->revenue_detail; ?></td>
                    <td><?= $resultVal->revenue_amountOfMoney; ?></td>
                    <td><?= $resultVal->revenue_vat; ?></td>
                    <td><?= $resultVal->revenue_balance; ?></td>
                </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>

</html>