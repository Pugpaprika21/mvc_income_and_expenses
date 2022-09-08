<div class="form-register">
    <form class="row g-3">
        <div class="col-md-6">
            <div class="input-group mt-2 mb-2">
                <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช่</span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mt-2 mb-2">
                <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="col-12">
            <div class="input-group mt-2 mb-2">
                <span class="input-group-text" id="basic-addon1">อีเมล</span>
                <input type="text" class="form-control" id="gmail" name="gmail" placeholder="Gmail" required>
            </div>
        </div>
        <div class="col-12">
            <div class="input-group mt-2 mb-2">
                <span class="input-group-text" id="basic-addon1">เบอร์โทร</span>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">Profile</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
        <div class="col-md-4">
            <label for="inputCity" class="form-label">Role</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="role" name="role" checked>
                <label class="form-check-label" for="role">select role user or admin</label>
            </div>
        </div>
        <div class="col-md-2">
            <img src="../../../../../mvc_income_and_expenses/pug_framework/public/image/maxresdefault.jpg" class="img-fluid rounded">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">ลงทะเบียน</button>
        </div>
    </form>
</div>