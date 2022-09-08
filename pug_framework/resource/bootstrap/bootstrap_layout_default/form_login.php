<div class="form-login">
    <form method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช้</span>
            <input type="text" class="form-control" placeholder="username" id="username" name="username">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
            <input type="text" class="form-control" placeholder="password" id="password" name="password">
        </div>
        <div class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-outline-primary" id="btn-register" onclick="register(this);">ลงทะเบียน</button>
            </div>
        </div>
        <div class="btn-submit">
            <button type="submit" class="btn btn-sm btn-primary mt-3 w-100">เข้าสู่ระบบ</button>
        </div>
    </form>
</div>