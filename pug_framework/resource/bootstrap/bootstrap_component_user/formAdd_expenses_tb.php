<form method="post" id="formAdd_expenses_tb">
    <div class="row">
        <p class="text-start">เพิ่มข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                        </svg>
                    </td>
                    <td>วันที่จ่าย</td>
                    <td>ชื่อสินค้า</td>
                    <td>ราคาสินค้า</td>
                    <td>จำนวนสินค้า</td>
                    <td>ราคารวม</td>
                    <td>เพิ่ม</td>
                </tr>
            </thead>
            <tbody>

                <tr id="displayRowExpenses">
                    <td>

                    </td>
                    <td>
                        <div class="col">
                            <input type="date" class="form-control" id="payment_date_expenses" name="payment_date_expenses[]" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย" style="background-color: #CDCDCD;" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_name_expenses" name="product_name_expenses[]" placeholder="ชื่อสินค้า" aria-label="ชื่อสินค้า" style="background-color: #CDCDCD;" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_price_expenses" name="product_price_expenses[]" placeholder="ราคาสินค้า" aria-label="ราคาสินค้า" style="background-color: #CDCDCD;" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_qty_expenses" name="product_qty_expenses[]" placeholder="จำนวนสินค้า-ชิ้น" aria-label="จำนวนสินค้า" style="background-color: #CDCDCD;" disabled>
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_sum_expenses" name="product_sum_expenses[]" placeholder="ราคารวม" aria-label="ราคารวม" style="background-color: #CDCDCD;" disabled>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" onclick="addRowsExpenses();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-sm btn-primary w-100">บันทึก</button>
</form>