<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="<?= base_url(); ?>assets/image/png" sizes="16x16"
        href="<?= base_url(); ?>assets/images/favicon.png">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom-style.css" rel="stylesheet">
</head>
<style>
@media (max-width:768px) {
    .img-login {
        display: none !important;
    }
}
</style>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-sm-12 mb-3">
                    <div class="text-center login_logo mb-1">
                        <img src="<?= base_url(); ?>assets/img/logo.jpg" alt="logo">
                    </div>
                </div>

                <div class="col-lg-11 col-xl-10">
                    <div class="authincation-content">
                        <div class="authincation-content-in">
                            <div class="row no-gutters">
                                <div class="col-xl-6">
                                    <div class="auth-form auth-form-p">
                                        <div class="text-center">
                                            <h1>Welcome</h1>
                                            <h4 class="mb-4"></h4>

                                            <h4 class="mb-4 mt-4">Reset Password</h4>
                                        </div>
                                        <form action="<?= base_url('user/resetlink')?>" method="POST">
                                            <div class="form-group mb-5  <?php if(form_error('email')) echo 'has-error';?>" >
                                                <label class="mb-1">Enter Email ID<span
                                                        style="color:red; font-size: 12px"> *</span></label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                                                  <?php if(form_error('email')) echo form_error('email'); ?> 

                                            </div>
                                            <div class="text-center mb-4">
                                                <button type="submit"  value="Send reset link"  class="btn btn-primary btn-block Continue-btn">Sent Reset Password
                                                    Link</button>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-0">Don't have an account? Do not worry!</p>
                                                <p>You can create one in the following steps</p>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="img-login">
                                        <img src="<?= base_url(); ?>assets/img/login.jpg" alt="login"
                                            class="img-responsive" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
</body>

</html>