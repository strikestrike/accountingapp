<?php include 'layout/sidebar.php'; ?>
<!-- Start: Main wrapper -->
<div class="container-fluid d-md-block d-none">
	<div class="row">

		<div class="col-xl-12">
			<div class="project-main2">
				<div class="row justify-content-between align-items-center">
					<div class="title mb-4">
						<h3>Your Profile</h3>
					</div>
					<!-- <div class="col">
						<div class="profile-image">
							<img src="<?= base_url(); ?>assets/images/profile/pic1.jpg" alt="">
						</div>
					</div> -->
				</div>

				<div class="basic-form mt-4">
					<form id="profileUpdateForm" action="<?= base_url('admin/updateProfile')?>" method="POST" enctype="multipart/form-data">
						<?= $this->session->flashdata('logError') ?>
                        <?= $this->session->flashdata('msg') ?>
						<div class="form-group">
							<div class="col-sm-3 mb-3">
								<div class="profile-image">
									<img src="<?= base_url(); ?>upload/profile_image/<?= $this->session->userdata('profile_image')?>" alt="">
								</div>
							</div>
							<div class="col-sm-9">
								<label class="col-sm-3 col-form-label">Profile Image :</label>
								<input type="file" name="profile_image" class="form-control" placeholder="Profile Image">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-form-label">Name :</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="form-control" name="first_name" value="<?= $this->session->userdata('first_name') ?>" placeholder="First Name">
									</div>
									<div class="col-sm-6 mt-2 mt-sm-0">
										<input type="text" class="form-control" name="last_name" value="<?= $this->session->userdata('last_name') ?>" placeholder="Last Name">
									</div>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-sm-3 col-form-label">Email :</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-12">
										<input type="email" name="email" value="<?= $this->session->userdata('email') ?>" class="form-control" placeholder="email" disabled>
									</div>

								</div>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-10">
								<button type="submit" value="submit" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/save.png" alt="">&nbsp;&nbsp; Update</button>
							</div>
						</div>
					</form>
				</div>
				<div class="basic-form mt-4">
					<div class="title mb-3 mt-5">
						<h4>Change Password:</h4>
					</div>
					<form id="changePasswordForm" action="<?= base_url('admin/updatePassword')?>" method="POST">
						<div class="form-group">
							<label class="col-sm-3 col-form-label">Old Password :</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-6">
										<input type="password" class="form-control" name="old_password" placeholder="Type your old password">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-form-label">New Password :</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-6">
										<input type="password" class="form-control" name="new_password" placeholder="Enter new password">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 col-form-label">Confirm Password :</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-6">
										<input type="password" class="form-control" name="confirm_password" placeholder="Confirm new password">
									</div>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-10">
								<button type="submit" name="submit" value="submit" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/save.png" alt="">&nbsp;&nbsp; Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<script>
	$(".allowNumericWithoutDecimal").on("keypress keyup blur", function(event) {
		$(this).val($(this).val().replace(/[^\d].+/, ""));
		if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	})

	$(".allowNumericWithPlus").on("keypress keyup blur", function(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
	$(document).ready(function() {
		$("#name").keypress(function(e) {
			var key = e.keyCode;
			if (key >= 48 && key <= 57) {
				e.preventDefault();
			}
		});
		$("#surname").keypress(function(e) {
			var key = e.keyCode;
			if (key >= 48 && key <= 57) {
				e.preventDefault();
			}
		});
	});
</script>
