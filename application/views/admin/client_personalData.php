<?php include 'layout/sidebar.php'; ?>
<div class="container-fluid d-md-block d-none">
	<div class="project-nav">
		<div class="card-action card-tabs card-tabs2 w-100">
			<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link active">Personal Data </a>
				</li>
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link">Income Type</a>
				</li>
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link">Information Verification </a>
				</li>
				<li class="nav-item">
					<a href="javascript:void(0);" class="nav-link">Document Release </a>
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

								<div class="row justify-content-between align-items-center d-none">
									<div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
										<p class="mb-0 small">Retrieving information from <br>2021 ″Project name″</p>
									</div>
									<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
										<!-- <p class="mb-0 small">Load document</p> -->
										<!-- <a class="load-doc-icon" href="javascript:void(0)"><i class="fas fa-camera"></i></a> -->
									</div>
									<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex justify-content-end">
										<a class="btn btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="img/u.png" alt="">&nbsp; Process data</a>
									</div>
									<hr>
								</div>


								<?php if (!empty($personal_data)) { ?>
									<h6 class="text-center text-danger"></h6>
								<?php } else { ?>
									<h6 class="text-center">I don't have the old form, please add your personal data</h6>
								<?php }

								?>
								<div class="basic-form">
									<form id="clientPDataForm" action="<?php echo base_url() . 'admin/editPersonalData'; ?>" method="POST">
									<input type="hidden" name="id" <?= !empty($personal_data['id']) ? 'value = ' . $personal_data['id'] : '' ?>>
										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Salutation</label>
											<div class="col-sm-9">
												<div>
													<label class="radio-inline me-3"><input type="radio" name="salutation" <?= !empty($personal_data['salutation']) ? ($personal_data['salutation'] == 'Mr' ? 'checked' : '') : '' ?> value="Mr" required> Mr</label>
													<label class="radio-inline me-3"><input type="radio" name="salutation" <?= !empty($personal_data['salutation']) ? ($personal_data['salutation'] == 'Mrs' ? 'checked' : '') : '' ?> value="Mrs" required> Mrs</label>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Name Surname</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control" id="personalData_name" name="name" <?= !empty($personal_data['name']) ? 'value = ' . $personal_data['name'] : '' ?> placeholder="Name" required>
													</div>
													<div class="col-sm-6 mt-2 mt-sm-0">
														<input type="text" class="form-control" id="personalData_surname" <?= !empty($personal_data['surname']) ? 'value = ' . $personal_data['surname'] : '' ?> name="surname" placeholder="Surname" required>
													</div>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Personal number</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-12">
														<input type="number" class="form-control" id="personalData_personal_number" name="personal_number" <?= !empty($personal_data['personal_number']) ? 'value = ' . $personal_data['personal_number'] : '' ?> placeholder="Personal Number of 13 digits" required>
													</div>

												</div>
											</div>
										</div>

										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Mobile number</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-12">
														<input type="number" class="form-control" id="personalData_mobile_number" name="mobile_number" <?= !empty($personal_data['mobile_number']) ? 'value = ' . $personal_data['mobile_number'] : '' ?> placeholder="Mobile Number of 10 digits" required>
													</div>

												</div>
											</div>
										</div>

										<div class="row form-group">
											<label class="col-sm-3 col-form-label">National Id Data</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control" id="personalData_national_id_code" <?= !empty($personal_data['national_id_code']) ? 'value = ' . $personal_data['national_id_code'] : '' ?> name="national_id_code" placeholder="ID of 2 letters" minlength="2" maxlength="2" required>
													</div>
													<div class="col-sm-6 mt-2 mt-sm-0">
														<input type="number" class="form-control" id="personalData_national_id_number" <?= !empty($personal_data['national_id_number']) ? 'value = ' . $personal_data['national_id_number'] : '' ?> name="national_id_number" placeholder="Number of 6 digits" minlength="6" maxlength="6" required>
													</div>
												</div>
											</div>
										</div>


										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Birthday</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<input type="Date" name="dob" class="datepicker-default form-control" <?= !empty($personal_data['dob']) ? 'value = ' . $personal_data['dob'] : '' ?> id="personalData_dob" required>
													</div>

												</div>
											</div>
										</div>

										<div class="row form-group">
											<label class="col-sm-3 col-form-label">Address</label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-6">
														<input type="text" class="form-control" id="personalData_address_city" name="city" value="<?= $personal_data['city'] ?? '' ?>" placeholder="City" required>
													</div>
													<div class="col-sm-6 mt-2 mt-sm-0">
														<input type="text" class="form-control" id="personalData_address_area" name="area" value="<?= $personal_data['area'] ?? '' ?>" placeholder="Area" required>
													</div>

												</div>
											</div>
										</div>

										<div class="row form-group">
											<label class="col-sm-3 col-form-label"></label>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-12 mt-2 mt-sm-0">
														<input type="text" class="form-control" id="personalData_address_other" name="address_other_details" value="<?= $personal_data['address'] ?? '' ?>" placeholder="Street/landmark, house no." required>
													</div>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary"><img src="<?= base_url() ?>assets/img/save.png" alt="">&nbsp;&nbsp; Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="tab-pane fade" id="navpills-1">

				</div>
				<div class="tab-pane fade" id="navpills-3">
					<div class="project-main2">
						<span class="arrow-up-back"></span>
						<span class="arrow-up"></span>
						<div class="d-flex justify-content-between align-items-center">
							information tab
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="navpills-4">
					<div class="project-main2">
						<span class="arrow-up-back"></span>
						<span class="arrow-up"></span>
						<div class="d-flex justify-content-between align-items-center">
							doc release tab
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	window.addEventListener('load', function() {
		$("#clientPDataForm").submit(function(e) {
			validateClientPDataForm();
		})
	})
</script>
