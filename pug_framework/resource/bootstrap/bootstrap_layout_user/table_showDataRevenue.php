<div class="row">
    <p class="text-start">ข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
    <table class="table table-bordered text-center display" id="showRevenueData_table" style="width:100%"> 
        <thead style="background-color: #1F75F1; color: #FFFFFF;">
            <tr>
                <td>#</td>
                <td>วันที่รับ</td>
                <td>รายละเอียดรายรับ</td>
                <td>จำนวนเงินที่ได้</td>
                <td>หักภาษี %</td>
                <td>คงเหลือ</td>

                <td>จัดการ</td>
            </tr>
        </thead>
        <tbody id="showRevenueData">
                
        </tbody>
    </table>
</div>