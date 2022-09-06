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
    <div class="card shadow-sm rounded" id="card-main">
        <div class="card-body">
            <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/table_editRevenue.php'; ?>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/footer.php'; ?>
<script src="../../../../../mvc_income_and_expenses/pug_framework/resource/js/publicJS/urlSearchParams.js"></script>

<script>
    $(document).ready(function() {
        $('#editRevenue').submit(function (e) { 
            e.preventDefault();

            console.log('hahaha');
            
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
                    
                    index = (index + 1);

                    html = `
                        <tr>
                            <td>${(num + 1)}
                                
                            </td>
                            <td>
                                <div class="col">
                                    <input type="date" class="form-control" id="revenue_date" name="revenue_date" value="${data.revenue_date}" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="revenue_detail" name="revenue_detail" style="height: 20px" required>${data.revenue_detail}</textarea>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text" class="form-control revenue_amountOfMoney" id="revenue_amountOfMoney-${index}" name="revenue_amountOfMoney" value="${data.revenue_amountOfMoney}" placeholder="จำนวนเงินที่ได้" aria-label="จำนวนเงินที่ได้" onchange="calAmountOfMoneyAsVat(${index}, 'revenue_amountOfMoney', 'revenue_balance');" required> 
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text" class="form-control revenue_vat" id="revenue_vat-${index}" name="revenue_vat" value="${data.revenue_vat}" placeholder="หักภาษี" aria-label="หักภาษี" onchange="inputVat(${index}, 'revenue_vat', 'revenue_amountOfMoney', 'revenue_balance');">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text" class="form-control revenue_balance" id="revenue_balance-${index}" name="revenue_balance" value="${data.revenue_balance}" placeholder="คงเหลือ" aria-label="คงเหลือ" style="background-color: #CDCDCD;" readonly>
                                </div>
                            </td>
                        </tr>
                    `;

                    $('#showRevenueDataEdit').append(html);
                    num++;
                });
            }
        });
    })();

    function calAmountOfMoneyAsVat(index, elName, elNameShowResult) {
        let concatEl = `#${elName}-${index}`;
        let getTotal = $(concatEl).val();
        let showBalance = `#${elNameShowResult}-${index}`;
    }

    function inputVat(index, elName, elCal, elShowData) {
        let result = 0;
        let elConcat = `#${elName}-${index}`;
        let getVat = $(elConcat).val();
        let elCals = `#${elCal}-${index}`;
        let getAmount = $(elCals).val();
        let elShow = `#${elShowData}-${index}`;
        let sum = (parseFloat(getAmount) * parseFloat(getVat)) / 100;

        result = parseFloat(getAmount) - sum;
        $(elShow).val(result);
    }

</script>