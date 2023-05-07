<!--Start: Page main heading -->
<div class="container-fluid page-sub-head d-md-block d-none">
	<div class="d-flex flex-nowrap justify-content-between align-items-center">
		<div class="100%">
			<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
			<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
		</div>
		<div class="ms-3">
			<a href="#list" class="text-black mb-3" data-bs-toggle="tab">
				<i class="fas fa-bars"></i>
			</a>
		</div>
	</div>
</div>
<!--End: Page main heading -->

<!--Start: Content body -->
<div class="content-body content-area-scroll">
	<div class="container-fluid d-md-block d-none">
		<div class="project-nav">
			<div class="card-action card-tabs card-tabs2 w-100">
				<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
					<li class="nav-item">
						<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Information Verification </a>
					</li>
					<li class="nav-item">
						<a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Document Release </a>
					</li>
				</ul>

				<ul class="nav nav-tabs style-2 d-none" id="BoxedViewTabLink">
					<li class="nav-item">
						<a href="#boxed_navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">All Projects <span class="badge badge-pill shadow-primary badge-primary">154</span></a>
					</li>
					<li class="nav-item">
						<a href="#boxed_navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">On Progress <span class="badge badge-pill badge-info shadow-info">2</span></a>
					</li>
					<li class="nav-item">
						<a href="#boxed_navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Pending <span class="badge badge-pill badge-warning shadow-warning">4</span></a>
					</li>
					<li class="nav-item">
						<a href="#boxed_navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Closed <span class="badge badge-pill badge-danger shadow-danger">12</span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active show" id="list">
				<div class="tab-content project-list-group" id="ListViewTabLink">
					<div class="tab-pane fade active show" id="navpills-1">
						<div class="row">
							<div class="col-xl-12">
								<div class="project-main2">
									<span class="arrow-up-back"></span>
									<span class="arrow-up"></span>

									<div class="basic-form">
										<form id="profileUpdateForm" action="<?= base_url('user/updateProfile') ?>" method="POST" enctype="multipart/form-data">
											<?= $this->session->flashdata('logError') ?>
											<?= $this->session->flashdata('msg') ?>
											<div class="form-group">
												<div class="col-sm-3 mb-3">
													<div class="profile-image user-profile-image">
														<?php if (!empty($this->session->userdata('profile_image'))) { ?>
															<img src="<?= base_url(); ?>upload/profile_image/<?= $this->session->userdata('profile_image')?>" alt="">
														<?php } else { ?>
															<img src="<?= base_url() ?>assets/images/profile-pic.png" alt="">
														<?php } ?>
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
									<?php if(!$this->session->userdata('token')){ ?>
										<div class="basic-form mt-4">
											<div class="title mb-3 mt-5">
												<h4>Change Password:</h4>
											</div>
											<form id="changePasswordForm" action="<?= base_url('user/updatePassword') ?>" method="POST">
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
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="container-fluid d-md-none d-block">
		<div class="d-flex flex-nowrap justify-content-between align-items-center mb-4">
			<div class="100%">
				<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
				<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
			</div>
		</div>
		<div class="copyright m-0 py-2 d-flex align-items-center">
			<img src="<?= base_url() ?>assets/img/note.png" alt="income type" class="me-2">
			<h5 class="mb-0 text-black">Income Type</h5>
		</div>
		<div class="menu-blu">
			<h4>Select one or more income sources</h4>
			<a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
				<img src="<?= base_url() ?>assets/img/paly.png" alt="play btn">
				<span>Video Example</span>
			</a>
		</div>
		<h3 class="text-center my-3"><a href="#">Personal Data</a></h3>
		<div class="project-main2">

			<span class="arrow-up-back"></span>
			<span class="arrow-up"></span>

			<div class="row text-center">
				<div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
					<p class="mb-0 small">Retrieving information from <br>2021 &#8243;Project name&#8243;</p>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
					<p class="mb-0 small">Load document</p>
					<a class="load-doc-icon" href="javascript:void(0)"><i class="fas fa-camera"></i></a>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 text-center">
					<a class="btn btn-primary" href="javascript:void(0)"> Process data</a>
				</div>
				<hr>
			</div>

			<h6 class="text-center">I don't have the old form, please add your personal data</h6>

			<div class="basic-form">
				<form>
					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Salutation</label>
						<div class="col-sm-9">
							<div>
								<label class="radio-inline me-3"><input type="radio" name="optradio" checked> Mr</label>
								<label class="radio-inline me-3"><input type="radio" name="optradio"> Mrs</label>
							</div>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Name Surname</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Aasasasa">
								</div>
								<div class="col-sm-6 mt-2 mt-sm-0">
									<input type="text" class="form-control" placeholder="asad">
								</div>
							</div>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Personal number</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-12">
									<input type="text" class="form-control" placeholder="12354678910111213">
								</div>

							</div>
						</div>
					</div>

					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Mobile number</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-12">
									<input type="text" class="form-control" placeholder="12345678910">
								</div>

							</div>
						</div>
					</div>

					<div class="row form-group">
						<label class="col-sm-3 col-form-label">National Id Data</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Assasa">
								</div>
								<div class="col-sm-6 mt-2 mt-sm-0">
									<input type="text" class="form-control" placeholder="Assasa">
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="col-form-label">Birthday</label>
						<div class="row">
							<div class="col-4">
								<select class="default-select form-control">
									<option>Day</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="col-4">
								<select class="default-select form-control">
									<option>Month</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>
							<div class="col-4">
								<select class="default-select form-control">
									<option>Year</option>
									<option>Option 2</option>
									<option>Option 3</option>
								</select>
							</div>

						</div>
					</div>



					<div class="form-group">
						<label class="col-form-label">Address</label>
						<div class="row">
							<div class="col-6">
								<input type="text" class="form-control" placeholder="Country">
							</div>
							<div class="col-6">
								<input type="text" class="form-control" placeholder="City">
							</div>
							<div class="col-12">
								<input type="text" class="form-control" placeholder="Address">
							</div>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary"><img src="<?= base_url() ?>assets/img/save.png" alt="">&nbsp;&nbsp; Save</button>
						</div>
					</div>
				</form>
			</div>



		</div>



	</div>

	<button class="btn btn-primary chat-btn d-flex align-items-center">
		<span>Chat</span>
		<div class="chat-btn-icon">
			<i class="fas fa-comment"></i>
		</div>
	</button>
</div>
<!-- End: Content body -->
</div>
<!-- End: Main wrapper -->
