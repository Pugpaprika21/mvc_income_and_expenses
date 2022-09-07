<?php

use Pug_Framework\Helper_Function\Date_Func\DateThai;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

$dateThai = new DateThai();
$dayMonthYearCutResult = $dateThai->get(date('Y-m-d'))->dayMonthYearCut;

require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/header.php';
require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_user/navbar_top.php';

?>

<div class="container" style="padding-bottom: 40px;">
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm rounded" id="card-main" style="width: 50rem;">
            <div class="card-header" style="background-color: #1F75F1; color: #FFFFFF;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg> รายรับ-รายจ่าย
            </div>
            <div class="card-body">
                <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/table_editRevenue.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/footer.php'; ?>
<script src="../../../../../mvc_income_and_expenses/pug_framework/resource/js/publicJS/urlSearchParams.js"></script>

<script>
    $(document).ready(function() {
        $('#editRevenue').submit(function(e) {
            e.preventDefault();

            const Fd = new FormData($(this)[0]);
            Fd.append('revenue_id', $('#revenue_id').val());
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '../../../../../mvc_income_and_expenses/pug_framework/controllers/addRevenue/edit_revenueTable.php',
                data: Fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        window.location.reload();
                    }
                }
            });
        });
    });

    (function() {
        let urlParam = urlSearchParams('revenue_id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '../../../../../mvc_income_and_expenses/pug_framework/controllers/addRevenue/get_edit_revenue.php',
            data: {
                revenue_id: urlParam
            },
            success: function(response) {
                let html = ``;
                let num = 0;
                let index = 0;
                response.forEach(function(data, v) {
                    $('#revenue_date').val(data.revenue_date);
                    $('#revenue_detail').val(data.revenue_detail);
                    $('#revenue_amountOfMoney').val(data.revenue_amountOfMoney);
                    $('#revenue_vat').val(data.revenue_vat);
                    $('#revenue_balance').val(data.revenue_balance);
                    $('#revenue_id').val(data.revenue_id);
                });
            }
        });
    })();

    function calAmountOfMoneyAsVat(_this) {
        let eVal = _this.value;
        $('#revenue_balance').val(eVal);
    }

    function inputVat(_this) {
        let getRevenueAmountOfMoney = $('#revenue_amountOfMoney').val();
        let getVat = _this.value;
        let sum = (parseFloat(getRevenueAmountOfMoney) * parseFloat(getVat)) / 100;
        result = parseFloat(getRevenueAmountOfMoney) - sum;
        $('#revenue_balance').val(result);
    }
</script>