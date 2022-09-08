<?php 
require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_home/header.php';
require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_default_home/navbar_top.php'; 
?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card shadow rounded" style="width: 50rem;">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_home/form_register.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_home/footer.php'; ?>

<script>
    $(document).ready(function() {
        
        $('.form-register > form').submit(function(e) {
            e.preventDefault();

            const Fd = new FormData($(this)[0]);
            Fd.append('register', 'addData');

            let fileName = Fd.get('image').name;
            let fileSize = Fd.get('image').size;
            let checkFile = Fd.get('image').type;

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/home/getData_register.php",
                data: Fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.path_url != '') {
                        window.location.href = response.path_url;
                    }
                }
            });
        });
    });
</script>