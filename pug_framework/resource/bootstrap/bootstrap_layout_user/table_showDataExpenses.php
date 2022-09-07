<div class="row">
    <p class="text-start">ข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
    <table class="table table-bordered text-center display" id="showExpensesData_table" style="width:100%">
        <thead style="background-color: #1F75F1; color: #FFFFFF;">
            <tr>
                <td>#</td>
                <td>วันที่จ่าย</td>
                <td>รายการ</td>
                <td>ราคา</td>
                <td>จำนวน</td>
                <td>จ่าย</td>
                <td>รวม</td>
                <td>เงินทอน</td>
                <td>จัดการ</td>
            </tr>
        </thead>
        <tbody id="showExpensesData">
            
        </tbody>
    </table>
</div>