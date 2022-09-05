<?php

use Pug_Framework\Helper_Function\Date_Func\DateThai;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

$dateThai = new DateThai();

$dayMonthYearCutResult = $dateThai->get(date('Y-m-d'))->dayMonthYearCut;
$dateInput = $dateThai->get(date('Y-m-d'))->ymd;

require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/header.php';
require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_user/navbar_top.php';

?>

<div class="container" style="padding-bottom: 40px;">
    <div class="card shadow-sm rounded" id="card-main">
        <div class="card-body">
            <div class="nav-tab-main">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">หน้าเเรก</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ข้อมูลรายรับ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">ข้อมูลรายจ่าย</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">ข้อมูลทั้งหมด</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- หน้าเเรก -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                    </div>
                    <!-- ข้อมูลรายรับ -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_user/formAdd_revenue_tb.php'; ?>
                    </div>
                    <!-- ข้อมูลรายจ่าย pay -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_user/formAdd_expenses_tb.php'; ?>
                    </div>
                    <!-- ข้อมูลทั้งหมด -->
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">

                        <nav class="nav justify-content-end">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-showDataRevenue-tab" data-bs-toggle="tab" data-bs-target="#nav-showDataRevenue" type="button" role="tab" aria-controls="nav-showDataRevenue" aria-selected="true">ข้อมูลรายรับ</button>
                                <button class="nav-link" id="nav-showExpensesData-tab" data-bs-toggle="tab" data-bs-target="#nav-showExpensesData" type="button" role="tab" aria-controls="nav-showExpensesData" aria-selected="false">ข้อมูลรายจ่าย</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                                <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- ข้อมูลรายรับ -->
                            <div class="tab-pane fade show active" id="nav-showDataRevenue" role="tabpanel" aria-labelledby="nav-showDataRevenue-tab" tabindex="0">
                                <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/table_showDataRevenue.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="nav-showExpensesData" role="tabpanel" aria-labelledby="nav-showExpensesData-tab" tabindex="0">
                                <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/table_showDataExpenses.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
                            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/footer.php'; ?>

<script>
    var countRow = 1;

    $(document).ready(function() {

        getUserProfile();

        $('#formAdd_revenue_tb').submit(function(e) {
            e.preventDefault();

            let eId = $('#formAdd_revenue_tb');
            let Fd = new FormData(eId[0]);

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/addRevenue/insert_revenue.php",
                data: Fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        swlAlert('สำเร็จ', 'เพิ่มข้อมูลรายรับสำเร็จ', 'success', '');
                        $('#formAdd_revenue_tb')[0].reset(); 
                    }
                }
            });

        });

        $('#formAdd_expenses_tb').submit(function(e) {
            e.preventDefault();

            let eId = $('#formAdd_expenses_tb');
            let Fd = new FormData(eId[0]);

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/addExpenses/insert_expenses.php",
                data: Fd,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });

    function addRowsRevenue() {

        let htmlRows = '';
        let index = 0;

        for (let i = 0; i < countRow; i++) {

            index = (i + 1);

            htmlRows = `
                <tr id="trNumRows-${index}">
                    <td></td>
                    <td>
                        <div class="col">
                            <input type="date" class="form-control" id="revenue_date" name="revenue_date[]" value="<?= $dateInput; ?>" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control" id="revenue_detail" name="revenue_detail[]" style="height: 20px" required></textarea>
                                <label for="floatingTextarea2">รายละเอียดรายรับ</label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_amountOfMoney" id="revenue_amountOfMoney-${index}" name="revenue_amountOfMoney[]" value="" placeholder="จำนวนเงินที่ได้" aria-label="จำนวนเงินที่ได้" onchange="calAmountOfMoneyAsVat(${index}, 'revenue_amountOfMoney', 'revenue_balance');" required> 
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_vat" id="revenue_vat-${index}" name="revenue_vat[]" placeholder="หักภาษี" aria-label="หักภาษี" onchange="inputVat(${index}, 'revenue_vat', 'revenue_amountOfMoney', 'revenue_balance');">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_balance" id="revenue_balance-${index}" name="revenue_balance[]" value="" placeholder="คงเหลือ" aria-label="คงเหลือ" style="background-color: #CDCDCD;" readonly>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(${index}, ${countRow});">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </td>
                <tr>
            `;
        }

        $('#showCountClick').html(index + 1);
        $('#displayRow').after(htmlRows); //  
        countRow++;
    }

    function removeRow(index, countRow) {
        $(`#trNumRows-${index}`).remove();
        index--;
    }

    // expenses formAdd_expenses_tb.php

    function addRowsExpenses() {
        let htmlRows = '';
        let index = 0;

        for (let i = 0; i < countRow; i++) {
            index = (i + 1);

            htmlRows = `
                <tr id="trNumRows-${index}">
                    <td></td>
                    <td>
                        <div class="col">
                            <input type="date" class="form-control" id="date_expenses" name="date_expenses[]" value="<?= $dateInput; ?>" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <div class="form-floating">
                                <textarea class="form-control" id="list_expenses" name="list_expenses[]" style="height: 20px" required></textarea>
                                <label for="floatingTextarea2">รายการ</label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control price_expenses" id="price_expenses-${index}" name="price_expenses[]" value="" placeholder="ราคา" aria-label="ราคา" required>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control qty_expenses" id="qty_expenses-${index}" name="qty_expenses[]" value="" placeholder="จำนวน" aria-label="จำนวน" required>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control pay_expenses" id="pay_expenses-${index}" name="pay_expenses[]" value="" placeholder="จ่าย" aria-label="จ่าย" onchange="payment(${index}, 'pay_expenses', 'price_expenses', 'qty_expenses', 'change_expenses', 'sum_expenses')" required>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control sum_expenses" id="sum_expenses-${index}" name="sum_expenses[]" value="" placeholder="รวม" aria-label="รวม" style="background-color: #CDCDCD;" readonly>
                        </div>
                    </td>
                    
                    <td>
                        <div class="col">
                            <input type="text" class="form-control change_expenses" id="change_expenses-${index}" name="change_expenses[]" value="" placeholder="เงินทอน" aria-label="เงินทอน" style="background-color: #CDCDCD;" readonly>
                        </div>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(${index}, ${countRow});">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    </td>
                <tr>
            `;
        }

        $('#showCountClick').html(index + 1);
        $('#displayRowExpenses').after(htmlRows);
        countRow++;
    }

    // calculate 

    function sumMultiple(tableName = '', elTaget = '', className = '', elCount = '', elShowResult = '') {
        $(tableName).on(elTaget, className, function(e) {
            e.preventDefault();
            let total = 0;
            $(elCount).each(function() {
                let selfEl = $(this).val();
                if ($.isNumeric(selfEl)) {
                    total += parseFloat(selfEl);
                }
            });
            //$(elShowResult).val(total.toFixed(2));
        });
    }

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

    function showBalance(result, index, elShowResult) {
        let showResult = `#${elShowResult}-${index}`;
        $(showResult).val(parseFloat(result).toFixed(2));
    }

    // formAdd_expenses_tb

    function payment(index, elSelf, elName1, elName2, elName3, elName4) {
        let sum = 0;
        let result = 0;
        let getElSelf = `#${elSelf}-${index}`;
        let getElNamePrice = `#${elName1}-${index}`;
        let getElNameQty = `#${elName2}-${index}`;
        let getElNameChange = `#${elName3}-${index}`;
        let getElExpenses = `#${elName4}-${index}`;
        let getPay = $(getElSelf).val();
        let getPrice = $(getElNamePrice).val();
        let getQty = $(getElNameQty).val();
        let getExpenses = $(getElExpenses).val();

        sum = parseFloat(getPrice) * parseFloat(getQty);
        result = sum - parseFloat(getPay);

        $(getElExpenses).val(Math.abs(sum));
        $(getElNameChange).val(Math.abs(result));
    }

    function swlAlert(title = '', message = '', icon = '', url = '') {
        Swal.fire(
            title,
            message,
            icon
        ).then(() => {
            window.location.reload();
        });
    }

    (function () {
        let respAjax = null;
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/displayData/get_RevenueData.php",
            async: false,
            global: false,
            success: function(response) {
                let dt = $('#showRevenueData_table').DataTable({
                    data: response,
                    columns: [
                        {data: 'revenue_id'},
                        {data: 'revenue_date'},
                        {data: 'revenue_detail'},
                        {data: 'revenue_amountOfMoney'},
                        {data: 'revenue_vat'},
                        {data: 'revenue_balance'},
                    ],
                    columnDefs: [{
                        searchable: false,
                        orderable: false,
                        targets: 0,
                    }],
                    order: [
                        [1, 'asc']
                    ],
                });

                dt.on('order.dt search.dt', function() {
                    let i = 1;

                    dt.cells(null, 0, {
                        search: 'applied',
                        order: 'applied'
                    }).every(function(cell) {
                        this.data(i++);
                    });
                }).draw();
            }
        });
    })();

    (function() {
        let respAjax = null;
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/displayData/get_ExpensesData.php",
            async: false,
            global: false,
            success: function(response) {
                let dt = $('#showExpensesData_table').DataTable({
                    data: response,
                    columns: [
                        {data: 'expenses_id'},
                        {data: 'date_expenses'},
                        {data: 'list_expenses'},
                        {data: 'price_expenses'},
                        {data: 'qty_expenses'},
                        {data: 'pay_expenses'},
                        {data: 'sum_expenses'},
                        {data: 'change_expenses'},
                    ],
                    columnDefs: [{
                        searchable: false,
                        orderable: false,
                        targets: 0,
                    }],
                    order: [
                        [1, 'asc']
                    ],
                });

                dt.on('order.dt search.dt', function() {
                    let i = 1;

                    dt.cells(null, 0, {
                        search: 'applied',
                        order: 'applied'
                    }).every(function(cell) {
                        this.data(i++);
                    });
                }).draw();
            }
        });

    })();

    function getUserProfile() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/user/get_userProfile.php",
            data: {
                username: '<?= base64_encode($_SESSION['username']); ?>',
                password: '<?= base64_encode($_SESSION['password']); ?>'
            },
            success: function(response) {
                response.forEach(function(i, v) {
                    //console.log(i);
                });
            }
        });
    }
</script>