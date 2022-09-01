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

<div class="container">
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
                    <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_user/footer.php'; ?>

<script>
    var countRow = 1;

    $(document).ready(function() {
        dataTable('#myTable');
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
                    console.log(response);
                }
            });

        });

        $('#formAdd_expenses_tb').submit(function(e) {
            e.preventDefault();
            console.log('hahaha');
        });

        // formAdd_revenue_tb
        sumMultiple('#formAdd_revenue_tb', 'input', '.revenue_total', '#formAdd_revenue_tb .revenue_total');

        // formAdd_expenses_tb
        sumMultiple('#formAdd_expenses_tb', 'input', '.product_price_expenses', '#formAdd_expenses_tb .product_price_expenses');

    });

    function dataTable(eName) {
        return $(eName).DataTable();
    }

    function addRowsRevenue() {

        let htmlRows = '';
        let index = 0;

        for (let i = 0; i < countRow; i++) {

            index = (i + 1);
            // balance
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
                            <input type="text" class="form-control" id="revenue_detail" name="revenue_detail[]" placeholder="รายละเอียดรายรับ" aria-label="รายละเอียดรายรับ">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_total" id="revenue_total-${index}" name="revenue_total[]" placeholder="จำนวนเงินที่ได้" aria-label="จำนวนเงินที่ได้">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_vat" id="revenue_vat-${index}" name="revenue_vat[]" value="10" placeholder="หักภาษี" aria-label="หักภาษี">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control revenue_balance" id="revenue_balance-${index}" name="revenue_balance[]" value="10" placeholder="คงเหลือ" aria-label="คงเหลือ" style="background-color: #CDCDCD;" readonly>
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
        $('#displayRow').after(htmlRows);
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
                            <input type="date" class="form-control" id="payment_date_expenses" name="payment_date_expenses[]" value="<?= $dateInput; ?>" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_name_expenses" name="product_name_expenses[]" placeholder="ชื่อสินค้า" aria-label="ชื่อสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control product_price_expenses" id="product_price_expenses-${index}" name="product_price_expenses[]" placeholder="ราคาสินค้า" aria-label="ราคาสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control product_qty_expenses" id="product_qty_expenses-${index}" name="product_qty_expenses[]" placeholder="จำนวนสินค้า" aria-label="จำนวนสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control product_sum_expenses" id="product_sum_expenses-${index}" name="product_sum_expenses[]" placeholder="ราคารวม" aria-label="ราคารวม" style="background-color: #CDCDCD;" readonly>
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

            $(elShowResult).val(total.toFixed(2));
            console.log(total.toFixed(2));
        });
    }

    function getUserProfile() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/user/get_userProfile.php",
            data: {
                username: '<?= $_SESSION['username']; ?>',
                password: '<?= $_SESSION['password']; ?>'
            },
            success: function(response) {
                response.forEach(function(i, v) {
                    console.log(i);
                });
            }
        });
    }
</script>