<form method="post" id="editRevenue">
    <div class="row">
        <p class="text-start">เเก้ไขข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
        <table class="table table-bordered text-center display" id="showRevenueData_table" style="width:100%">
            <thead style="background-color: #1F75F1; color: #FFFFFF;">
                <tr>
                    <td>#</td>
                    <td>วันที่รับ</td>
                    <td>รายละเอียดรายรับ</td>
                    <td>จำนวนเงินที่ได้</td>
                    <td>หักภาษี</td>
                    <td>คงเหลือ</td>
                </tr>
            </thead>
            <tbody id="showRevenueDataEdit">

            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-sm btn-primary w-100">เเก้ไข</button>
</form>