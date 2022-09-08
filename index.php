<?php 
require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/header.php';
require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_default/navbar_top.php'; 
?>

<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <div class="card shadow rounded" style="width: 35rem;">
            <div class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                </svg> Login
            </div>
            <div class="card-body">
                <?php require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/form_login.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_default/footer.php'; ?>

<script>
    $(document).ready(function() {

        $('.form-login').submit(function(e) {
            e.preventDefault();
            
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