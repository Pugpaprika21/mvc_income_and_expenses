<form method="post" id="formAdd_revenue_tb">
    <div class="row">
        <p class="text-start">เพิ่มข้อมูลรายรับ ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <td>เเถว</td>
                    <td>วันที่รับ</td>
                    <td>ชื่อสินค้า</td>
                    <td>ราคาสินค้า</td>
                    <td>จำนวนสินค้า</td>
                    <td>ราคารวม</td>
                    <td>เพิ่ม</td>
                </tr>
            </thead>
            <tbody>

                <tr id="displayRow">
                    <td id="showCountClick">

                    </td>
                    <td>
                        <div class="col">
                            <input type="date" class="form-control" id="payment_date" name="payment_date[]" placeholder="วันที่จ่าย" aria-label="วันที่จ่าย">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_name" name="product_name[]" placeholder="ชื่อสินค้า" aria-label="ชื่อสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_price" name="product_price[]" placeholder="ราคาสินค้า" aria-label="ราคาสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_qty" name="product_qty[]" placeholder="จำนวนสินค้า" aria-label="จำนวนสินค้า">
                        </div>
                    </td>
                    <td>
                        <div class="col">
                            <input type="text" class="form-control" id="product_sum" name="product_sum[]" placeholder="ราคารวม" aria-label="ราคารวม" style="background-color: #CDCDCD;" readonly>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-success" onclick="addRows();">
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