<form id="editRevenue">
    <p class="text-start">เเก้ไขข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
    <div class="input-edit">
        <input type="hidden" id="revenue_id" name="revenue_id" value="">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">วันที่รับ</span>
            <input type="date" class="form-control" id="revenue_date" name="revenue_date" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">รายละเอียดรายรับ</span>
            <input type="text" class="form-control" id="revenue_detail" name="revenue_detail" value="" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">จำนวนเงินที่ได้</span>
            <input type="text" class="form-control" id="revenue_amountOfMoney" name="revenue_amountOfMoney" value="" onchange="calAmountOfMoneyAsVat(this);" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">หักภาษี %</span>
            <input type="text" class="form-control" id="revenue_vat" name="revenue_vat" value="" onchange="inputVat(this);" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">คงเหลือ</span>
            <input type="text" class="form-control" id="revenue_balance" name="revenue_balance" value="" style="background-color: #CDCDCD;" readonly>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-sm btn-primary w-100">เเก้ไข</button>
</form>