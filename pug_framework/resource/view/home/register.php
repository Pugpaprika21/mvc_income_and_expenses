<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_home/header.php'; ?>

<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_component_default_home/navbar_top.php'; ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card shadow rounded" style="width: 50rem;">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <div class="form-register">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-12">
                            <label for="gmail" class="form-label">Gmail</label>
                            <input type="email" class="form-control" id="gmail" name="gmail" placeholder="gmail">
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">State</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Role</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="role" name="role" checked>
                                <label class="form-check-label" for="role">Checked switch checkbox input</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="../../../../../mvc_income_and_expenses/pug_framework/public/image/maxresdefault.jpg" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once dirname(__DIR__) .  '../../../../../mvc_income_and_expenses/pug_framework/resource/bootstrap/bootstrap_layout_home/footer.php'; ?>

<script>
    $(document).ready(function() {
        // ...
        $('.form-register > form').submit(function(e) {
            e.preventDefault();

            const Fd = new FormData($(this)[0]);
            Fd.append('register', 'addData');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../../mvc_income_and_expenses/pug_framework/controllers/home/getData_register.php",
                data: Fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                }
            });

        });
    });
</script>