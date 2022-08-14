<?php require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/header.php'; ?>

<style>
    .card {
        margin-top: 50px;
    }

    /*  input[type=text] {
        height: 20px;
    } */
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
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <div class="form-login">
                    <form method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
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
                //getUrl();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../../../mvc_income_and_expenses/pug_framework/controllers/home/getData_login.php",
                    data: Fd,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
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
                //console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>