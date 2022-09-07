<form id="editExpenses">
    <p class="text-start">เเก้ไขข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
    <div class="edit-expenses">
        <input type="hidden" id="expenses_id" name="expenses_id" value="">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">วันที่จ่าย</span>
            <input type="date" class="form-control" id="date_expenses" name="date_expenses" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">รายการ</span>
            <input type="text" class="form-control" id="list_expenses" name="list_expenses" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ราคา</span>
            <input type="text" class="form-control" id="price_expenses" name="price_expenses" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">จำนวน</span>
            <input type="text" class="form-control" id="qty_expenses" name="qty_expenses" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">จ่าย</span>
            <input type="text" class="form-control" id="pay_expenses" name="pay_expenses" value="" onchange="payment(this, 'pay_expenses', 'price_expenses', 'qty_expenses', 'change_expenses', 'sum_expenses')" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">รวม</span>
            <input type="text" class="form-control" id="sum_expenses" name="sum_expenses" value="" style="background-color: #CDCDCD;" readonly>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">เงินทอน</span>
            <input type="text" class="form-control" id="change_expenses" name="change_expenses" value="" style="background-color: #CDCDCD;" readonly>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-sm btn-primary w-100">เเก้ไข</button>
</form>