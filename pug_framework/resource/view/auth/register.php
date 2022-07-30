<?php
include_once dirname(__DIR__) . '../../../../../pug_framework/pug_framework/resource/bootstrap/layout_default/header.php';
include_once dirname(__DIR__) . '../../../../pug_framework/resource/bootstrap/auth_component_default/navbar.php';
?>

<style>
    .card {
        margin-top: 100px;
        width: 35rem;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm rounded">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="username-input">@</span>
                        <input type="text" class="form-control" name="username" placeholder="username" aria-label="username" aria-describedby="username-input">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="password-input">@</span>
                        <input type="text" class="form-control" name="password" placeholder="password" aria-label="password" aria-describedby="password-input">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="gmail-input">@</span>
                        <input type="gmail" class="form-control" name="gmail" placeholder="gmail" aria-label="gmail" aria-describedby="gmail-input">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="phone-input">@</span>
                        <input type="phone" class="form-control" name="phone" placeholder="phone" aria-label="phone" aria-describedby="phone-input">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="profile-input" name="profile">
                        <label class="input-group-text" for="profile-input">Upload</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="role" name="role" value="user">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Role</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Primary</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once dirname(__DIR__) . '../../../../../pug_framework/pug_framework/resource/bootstrap/layout_default/footer.php'; ?>

<script>
    $(function() {

        $('form').submit(function(e) {
            e.preventDefault();

            const fd = new FormData($(this)[0]);

            let role = ($('.form-check-input').is(':checked')) ? $('.form-check-input').val() : 'admin';
            fd.append('role', role);
            
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "../../../../pug_framework/controllers/user/req_register.php",
                data: fd,
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