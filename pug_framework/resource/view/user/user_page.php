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

<style>
    #card-profile {
        border: none;
    }

    #card-body-profile {
        border-radius: 5px;
        background-color: rgb(85, 134, 203, 0.2);
    }
</style>

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
                        <?php require_once dirname(__DIR__) . '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/profile.php'; ?>
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
                                <button class="nav-link active" id="nav-showDataRevenue-tab" data-bs-toggle="tab" data-bs-target="#nav-showDataRevenue" type="button" role="tab" aria-controls="nav-showDataRevenue" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                        <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z" />
                                        <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z" />
                                    </svg> ข้อมูลรายรับ
                                </button>
                                <button class="nav-link" id="nav-showExpensesData-tab" data-bs-toggle="tab" data-bs-target="#nav-showExpensesData" type="button" role="tab" aria-controls="nav-showExpensesData" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                    </svg> ข้อมูลรายจ่าย
                                </button>
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

    (function() {
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
                    columns: [{
                            data: 'revenue_id'
                        },
                        {
                            data: 'revenue_date'
                        },
                        {
                            data: 'revenue_detail'
                        },
                        {
                            data: 'revenue_amountOfMoney'
                        },
                        {
                            data: 'revenue_vat'
                        },
                        {
                            data: 'revenue_balance'
                        },
                        {
                            data: null
                        },
                    ],
                    columnDefs: [{
                            searchable: true,
                            orderable: false,
                            targets: 0,
                        },
                        {
                            targets: 6,
                            searchable: false,
                            orderable: false,
                            render: function(data, type, row) {
                                return `
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdown-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-action">
                                        <li><button class="dropdown-item" type="button" onclick="editRevenuesByID(${data.revenue_id})">เเก้ไข</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="deleteRevenuesByID(${data.revenue_id})">ลบ</button></li>
                                    </ul>
                                </div>
                            `;
                            }
                        }
                    ],
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

    function editRevenuesByID(id) {
        let url = `../../../../../mvc_income_and_expenses/pug_framework/resource/view/user/user_edit_revenue.php?revenues_id=${id}`;
        window.location.href = url;
    }

    function deleteRevenuesByID(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "คุณต้องการลบข้อมูลรายจ่ายนี้หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '../../../../../mvc_income_and_expenses/pug_framework/controllers/addRevenue/delete_revenue.php',
                    data: {
                        expenses_id: id
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            window.location.reload();
                        }
                    }
                });
            }
        })
    }

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
                    columns: [{
                            data: 'expenses_id'
                        },
                        {
                            data: 'date_expenses'
                        },
                        {
                            data: 'list_expenses'
                        },
                        {
                            data: 'price_expenses'
                        },
                        {
                            data: 'qty_expenses'
                        },
                        {
                            data: 'pay_expenses'
                        },
                        {
                            data: 'sum_expenses'
                        },
                        {
                            data: 'change_expenses'
                        },
                        {
                            data: null
                        }
                    ],
                    columnDefs: [{
                            searchable: true,
                            orderable: false,
                            targets: 0,
                        },
                        {
                            targets: 8,
                            searchable: false,
                            orderable: false,
                            render: function(data, type, row) {
                                return `
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdown-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown-action">
                                        <li><button class="dropdown-item" type="button" onclick="editExpensesByID(${data.expenses_id})">เเก้ไข</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="deleteExpensesByID(${data.expenses_id})">ลบ</button></li>
                                    </ul>
                                </div>
                            `;
                            }
                        }
                    ],
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

                dt.draw();
            }
        });

    })();

    function editExpensesByID(id) {
        let url = `../../../../../mvc_income_and_expenses/pug_framework/resource/view/user/user_edit_expenses.php?expenses_id=${id}`;
        window.location.href = url;
    }

    function deleteExpensesByID(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "คุณต้องการลบข้อมูลรายจ่ายนี้หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '../../../../../mvc_income_and_expenses/pug_framework/controllers/addExpenses/delete_expenses.php',
                    data: {
                        expenses_id: id
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            window.location.reload();
                        }
                    }
                });
            }
        })
    }

    (function() {

        let elememt = "myChart";
        let type = "bar";
        let labels = ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"];
        let label = "# of Votes";
        let data = [12, 19, 3, 5, 2, 3];
        let backgroundColor = [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
        ];

        let borderColor = [
            "rgba(255,99,132,1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
        ];

        let borderWidth = 1;
        myChart(elememt, type, labels, label, data, backgroundColor, borderColor, borderWidth);

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