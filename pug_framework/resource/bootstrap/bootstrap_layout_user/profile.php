<p class="text-start">ข้อมูลรายจ่าย ประจำวันที่ <?= $dayMonthYearCutResult; ?> </p>
<div class="row g-3">
    <div class="col-sm">
        <div class="card" id="card-profile">
            <div class="card-body" id="card-body-profile">
                <div class="text-center">
                    <img src="../../../../../mvc_income_and_expenses/pug_framework/public/image/maxresdefault.jpg" class="img-fluid rounded">
                </div>
                <div class="profile mt-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Username" value="<?= $_SESSION['username']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Password" value="<?= $_SESSION['password']; ?>">
                    </div>
                </div>
                <a class="btn btn-sm btn-primary w-100" href="../../../../index.php?logout=1" role="button">ออกจากระบบ</a>
            </div>
        </div>
    </div>

    <div class="col-sm">
        <canvas id="myChart" width="20%" height="24%"></canvas>
    </div>

    <div class="col-sm-6">

    </div>

</div>