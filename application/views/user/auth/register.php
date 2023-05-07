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
	.auth-form{
		padding-bottom: 1.5rem !important;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<body class="vh-100">
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
						<div class="authincation-content mb-5">
							<div class="authincation-content-in">
								<div class="row no-gutters">
									<div class="col-xl-6">
										<div class="img-login">
											<img src="<?= base_url(); ?>assets/img/login.jpg" alt="login" class="img-responsive" />
										</div>
									</div>
									<div class="col-xl-5 pb-5">
										<div class="auth-form auth-form-p">
											<h1>Welcome</h1>




											<?php if ($this->session->flashdata('error')) { ?>
												<p style="color:red"><?php echo $this->session->flashdata('error'); ?></p>
											<?php } ?>
											<form action="<?= base_url('user/registerUser') ?>" method="POST" autocomplete="off">
											
												<?php if ($this->session->flashdata('msg')) { ?>
													<?php echo $this->session->flashdata('msg'); ?>
												<?php } ?>
											

												<div class="form-group">
													<label class="mb-1">First Name <span style="color:red; font-size: 12px">
															*</span></label>
													<input type="type" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>" required />

													<span style="color:red; font-size: 12px">
														<?php echo form_error('first_name'); ?></span>
												</div>

												<div class="form-group">
													<label class="mb-1">Last Name <span style="color:red; font-size: 12px">
															*</span></label>
													<input type="type" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>" required />

													<span style="color:red; font-size: 12px">
														<?php echo form_error('last_name'); ?></span>
												</div>

												<div class="form-group">
													<label class="mb-1">Email <span style="color:red; font-size: 12px">
															*</span></label>
													<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required />

													<span style="color:red; font-size: 12px">
														<?php echo form_error('email'); ?></span>
												</div>

												<div class="form-group">
													<label class="mb-1">Password <span style="color:red; font-size: 12px">
															*</span></label>
													<div class="position-relative password-toggle">
														<input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" name="password" value="<?php echo set_value('password'); ?>" id="id_password" required />
														<i class="far fa-eye togglePassword" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
													</div>
													<span style="color:red; font-size: 12px">
														<?php echo form_error('password'); ?></span>
												</div>

												<div class="form-group">
													<label class="mb-1">Confirm Password <span style="color:red; font-size: 12px"> *</span></label>
													<div class="position-relative password-toggle">
														<input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" name="confirm_password" value="<?php echo set_value('com_password'); ?>" id="id_password" required />
														<i class="far fa-eye togglePassword" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
													</div>

													<span style="color:red; font-size: 12px">
														<?php echo form_error('com_password'); ?></span>
												</div>



												<div class="form-row d-flex justify-content-between mt-4 mb-2">
													<div class="form-group">
														<div class="d-flex align-items-start">
															<input type="checkbox" class="me-2" name="agree_tNc" id="agreeToTnC">
															<label class="form-check-label" for="agreeToTnC">
																I have read and agree to the Terms and Conditions Privacy Policy, I
																confirm that I am over 16 years old. <a href="javascript:void(0);">Terms & Conditions.</a>
															</label>
														</div>
													</div>
												</div>
												<div class="form-row d-flex justify-content-between mt-4 mb-2">
													<div class="form-group">
														<div class="d-flex align-items-start">
															<input type="checkbox" class="me-2" name="agree_deals" id="agreeToDeals">
															<label class="form-check-label" for="agreeToDeals">
																I want to receive the best deals.
															</label>
														</div>
													</div>
												</div>


										</div>
										<div class="text-center">
											<button type="submit" id="submitBtn" class="btn btn-primary btn-block Continue-btn" disabled="disabled">Continue</button>
											<br>
										</div>
										</form>
										<p>
											Already have an Account?
											<a href="<?php echo base_url()?>" class="text-center mb-5">Login</a>
										</p>

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

	var checker = document.getElementById("agreeToTnC");
	var submitBtn = document.getElementById("submitBtn");
	// when unchecked or checked, run the function
	checker.onchange = function(){
		if(this.checked){
			console.log('checked');
			submitBtn.disabled = false;
		} else {
			submitBtn.disabled = true;
		}
	}
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
		$('.validation-errors').delay(3000).fadeOut(800);
	</script>
