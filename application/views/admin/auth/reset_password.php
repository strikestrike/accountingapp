<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="<?= base_url(); ?>assets/image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/toastr/css/toastr.min.css" rel="stylesheet">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
    .password-toggle {
        display: flex;
        align-items: center;
    }

    .password-toggle input {
        padding-right: 30px;
    }

    .password-toggle i {
        position: absolute;
        right: 10px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

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
                                            <h1 class="fs-1 mb-5">Create New Password</h1>


                                        </div>

										<?php
											// echo "<pre>";
											// print_r($user);
										?>

                                        <form action="<?= base_url('admin/resetPassword') ?>" method="POST">
											<?php if ($this->session->flashdata('msg')) { ?>
												<div class="alert alert-danger">
													<?php echo $this->session->flashdata('msg'); ?>
												</div>
											<?php } ?>
											<input type="text" name="user_id" value="<?= $user['user_id'] ?>" id="" hidden>
											<input type="text" name="token" value="<?= $_GET['token'] ?>" id="" hidden>
                                            <div class="form-group mb-5">
                                                <label class="mb-3">New Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <div class="position-relative password-toggle">
                                                    <input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" id="password" name="new_password" id="id_password">
                                                    <i class="far fa-eye togglePassword" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                                </div>
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('password'); ?></span>

												<label class="mb-3 mt-5">Confirm New Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <div class="position-relative password-toggle">
                                                    <input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" id="password" name="confirm_new_password" id="confirm_password">
                                                    <i class="far fa-eye togglePassword" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                                </div>
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('password'); ?></span>
                                            </div>



                                            <div class="text-center mb-4">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block Continue-btn">
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="img-login">
                                        <img src="<?= base_url(); ?>assets/img/login.jpg" alt="login" class="img-responsive" />
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
	<script src="<?= base_url(); ?>assets/vendor/toastr/js/toastr.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // hide and show password
    $(".togglePassword").on("click", function() {
        const inputActive = $(this).siblings('input').prop("type");
        if (inputActive == "password") {
            $(this).siblings('input').prop('type', 'text');
            $(this).toggleClass("fa-eye-slash");
            $(this).toggleClass("fa-eye");
        } else {
            $(this).siblings('input').prop('type', 'password');
            $(this).toggleClass("fa-eye-slash");
            $(this).toggleClass("fa-eye");
        }
    });
</script>
<script>
	toastr.options = {
		"closeButton": true,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	
	<?php if($this->session->flashdata('success')){ ?>
		toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	<?php }else if($this->session->flashdata('error')){  ?>
		toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	<?php }else if($this->session->flashdata('warning')){  ?>
		toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
	<?php }else if($this->session->flashdata('info')){  ?>
		toastr.info("<?php echo $this->session->flashdata('info'); ?>");
	<?php } ?>
	$('.alert-danger').delay(3000).fadeOut(800);
</script>
