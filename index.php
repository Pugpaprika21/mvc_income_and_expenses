<?php require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/header.php'; ?>

<style>
    .card {
        margin-top: 50px;
    }
</style>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card shadow rounded" style="width: 35rem;">
            <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                </svg> Login
            </div>
            <div class="card-body">
                <div class="form-login">
                    <form method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช้</span>
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">รหัสผ่าน</span>
                            <input type="text" class="form-control" placeholder="Password" id="password" name="password" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-outline-primary" id="btn-register" onclick="register(this);">register</button>
                            </div>
                        </div>
                        <div class="btn-submit">
                            <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/footer.php'; ?>

<script>
    $(document).ready(function() {

        $('.form-login').submit(function(e) {
            e.preventDefault();

            let checkInput = [];
            const Fd = new FormData();
            Fd.append('username', $('#username').val());
            Fd.append('password', $('#password').val());

            if (Fd.get('username') !== '' && Fd.get('password') !== '') {

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../../../mvc_income_and_expenses/pug_framework/controllers/home/getData_login.php",
                    data: Fd,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.href = response.path_url;
                    }
                });
            }
        });

        function getUrl() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "../../../mvc_income_and_expenses/pug_framework/controllers/home/getUrl.php",
                success: function(response) {
                    window.location.href = response.path_url;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });

    function register(_this) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../mvc_income_and_expenses/pug_framework/controllers/home/getUrl_register.php",
            data: "data",
            success: function(response) {
                window.location.href = response.path_url;
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>