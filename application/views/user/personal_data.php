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
	<div class="container-fluid">
		<div class="project-nav">
			<div class="card-action card-tabs card-tabs2 w-100">
				<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
					<li class="nav-item">
						<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
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
					<!-- Rental ====Personal Data=== -->
					<div class="tab-pane fade active show" id="navpills-1">
						<div class="row">
							<div class="col-xl-12">
								<div class="project-main2">
									<span class="arrow-up-back"></span>
									<span class="arrow-up"></span>
									<form id="processXMLForm" method="post" enctype="multipart/form-data">
										<div class="row text-center">
											<div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
												<p class="mb-0 small">Retrieving information from <br>2021 &#8243;Project name&#8243;</p>
											</div>
											<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
												<p class="mb-0 small">Load document</p>
												<a class="load-doc-icon" href="javascript:void(0)">
													<i class="fas fa-camera"></i>
													<input type="file" id="selectXml" name="doc">
												</a>
											</div>
											<div class="col-xl-4 col-lg-4 col-sm-6 mb-3 text-center">
												<button class="btn btn-primary" href="javascript:void(0)"> Process data</button>
											</div>
											<hr>
										</div>
									</form>

									<?php if (!empty($personal_data)) { ?>
										<h6 class="text-center text-danger">Please re-check your form for any errors. To update, click edit button below the form.</h6>
									<?php } else { ?>
										<h6 class="text-center">I don't have the old form, please add your personal data</h6>
									<?php }
									// echo "<pre>";print_r($personal_data);
									?>



									<div class="basic-form">
										<form class="<?= !empty($personal_data) ? 'editable' : '' ?>" id="personalDataForm" action="<?= !empty($personal_data) ? base_url() . 'user/editPersonalData'   : base_url() . 'user/savePersonalData' ?>" method="POST">
											<input type="number" name="id" <?= !empty($personal_data['id']) ? 'value = ' . $personal_data['id'] : '' ?> hidden>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Salutation</label>
												<div class="col-sm-9">
													<div class="salutation-group">
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
															<span style="color:red; font-size: 12px"> <?php echo form_error('name'); ?></span>
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<input type="text" class="form-control" id="personalData_surname" <?= !empty($personal_data['surname']) ? 'value = ' . $personal_data['surname'] : '' ?> name="surname" placeholder="Surname" required>
															<span style="color:red; font-size: 12px"> <?php echo form_error('surname'); ?></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Personal number</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12">
															<input type="number" class="form-control numberInput" id="personalData_personal_number" name="personal_number" <?= !empty($personal_data['personal_number']) ? 'value = ' . $personal_data['personal_number'] : '' ?> placeholder="Personal Number of 13 digits" required data-maxlen="13">
															<span style="color:red; font-size: 12px"> <?php echo form_error('personal_number'); ?></span>
														</div>

													</div>
												</div>
											</div>

											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Mobile number</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12">
															<input type="text" class="form-control numberInput allownumericwithoutdecimal" maxlength="11" id="personalData_mobile_number" name="mobile_number" <?= !empty($personal_data['mobile_number']) ? 'value = ' . $personal_data['mobile_number'] : '' ?> placeholder="Mobile Number of 10 digits" required data-maxlen="10">
															<span style="color:red; font-size: 12px"> <?php echo form_error('mobile_number'); ?></span>
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
															<input type="number" class="form-control" id="personalData_national_id_number" <?= !empty($personal_data['national_id_number']) ? 'value = ' . $personal_data['national_id_number'] : '' ?> name="national_id_number" placeholder="Number of 6 digits" data-maxlen="6" required>
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
															<input type="text" class="form-control" id="personalData_address_city" name="city" <?= !empty($personal_data['city']) ? 'value = ' . $personal_data['city'] : '' ?> placeholder="City" required>
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<input type="text" class="form-control" id="personalData_address_area" name="area" <?= !empty($personal_data['area']) ? 'value = ' . $personal_data['area'] : '' ?> placeholder="Area" required>
														</div>

													</div>
												</div>
											</div>

											<div class="row form-group">
												<label class="col-sm-3 col-form-label"></label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12 mt-2 mt-sm-0">
															<input type="text" class="form-control" id="personalData_address_other" name="address_other_details" <?= !empty($personal_data['address']) ? 'value = ' . $personal_data['address'] : '' ?> placeholder="Street/landmark, house no." required>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-sm-10">
													<a href="javascript:void(0);" class="btn btn-warning editPersonalDataBtn"><i class="fas fa-edit"></i> Edit</a>
													<button type="submit" class="btn btn-primary"><img class="me-2" src="<?= base_url() ?>assets/img/save.png" alt=""><?= !empty($personal_data) ? 'Update' : 'Save' ?></button>
													<?php if (!empty($personal_data)) { ?>
														<a href="javascript:void(0);" class="btn btn-danger cancelEditingBtn"><i class="fas fa-times"></i> Cancel</a>
														<?php if ($personal_data['steps_completed'] == 0) { ?>
															<a href="javascript:void(0);" class="btn btn-success proceedPersonalData"><i class="fas fa-forward"></i> Final Submit</a>
														<?php }
														if ($personal_data['steps_completed'] >= 1) { ?>
															<a href="step1completed/<?= !empty($personal_data['id']) ? $personal_data['id'] : '' ?>" class="btn btn-primary proceedNext"><i class="fas fa-forward"></i> Next</a>
													<?php }
													} ?>
												</div>
											</div>
										</form>
									</div>
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
								<label class="radio-inline me-3"><input type="radio" name="optradio" required> Mr</label>
								<label class="radio-inline me-3"><input type="radio" name="optradio" required> Mrs</label>
							</div>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Name Surname</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Aasasasa" required>
								</div>
								<div class="col-sm-6 mt-2 mt-sm-0">
									<input type="text" class="form-control" placeholder="asad" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Personal number</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-12">
									<input type="text" class="form-control" placeholder="12354678910111213" required>
								</div>

							</div>
						</div>
					</div>

					<div class="row form-group">
						<label class="col-sm-3 col-form-label">Mobile number</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-12">
									<input type="text" class="form-control" placeholder="12345678910" required>
								</div>

							</div>
						</div>
					</div>

					<div class="row form-group">
						<label class="col-sm-3 col-form-label">National Id Data</label>
						<div class="col-sm-9">
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" placeholder="Assasa" required>
								</div>
								<div class="col-sm-6 mt-2 mt-sm-0">
									<input type="text" class="form-control" placeholder="Assasa" required>
								</div>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="col-form-label">Birthday</label>
						<div class="row">
							<input type="text" class="form-control" placeholder="Country">

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
<script>
	window.addEventListener('load', function() {
		validatePersonalDataForm();

		$("form.editable :input").prop('readonly', true);
		$("form.editable input[type='radio']").attr('disabled', true);

		$(".editPersonalDataBtn").click(() => {
			$("#personalDataForm").removeClass("editable");
			$("#personalDataForm :input").prop('readonly', false);
			$("#personalDataForm input[type='radio']").attr('disabled', false);
		});
		$(".cancelEditingBtn").click(() => {
			$("#personalDataForm").addClass("editable");
			$("#personalDataForm :input").prop('readonly', true);
			$("#personalDataForm input[type='radio']").attr('disabled', true);
		});
		$(".proceedPersonalData").click(() => {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Proceed!'
			}).then((result) => {
				if (result.value) {
					console.log(result);
					var id = <?= !empty($personal_data['id']) ? $personal_data['id'] : '""' ?>;
					var data = {
						"id": id
					}
					var url = 'finalSubmitPersonalData'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response) {
							Swal.fire(
									'Submitted!',
									'Your data has been submitted successfully.',
									'success'
								)
								.then(function() {
									window.location.href = "<?= base_url() ?>user/step1completed/<?= !empty($personal_data['id']) ? $personal_data['id'] : '' ?>"
								});
							// setTimeout(() => {
							// 	window.location.reload();
							// }, 2000)
						},
						error: () => {
							toastr.error("Error in submitting your data.");
						}
					})
				} else {
					// toastr.error("error");
				}
			})
		})

		const xmlValidation = new JustValidate('#processXMLForm');
		xmlValidation
			.addField('#selectXml', [{
				rule: 'files',
				value: {
					files: {
						extensions: ['xml'],
						maxSize: 25000,
						// minSize: 1000,
						// types: ['image/jpeg', 'image/png'],
						// names: ['file1.jpeg', 'file2.png'],
					},
				},
				errorMessage: 'Please select XML file'
			}])
			.onSuccess((e) => {
				// alert("success xml");

				/** ajax to process xml file  */
				var formData = new FormData();
				formData.append('doc', $('#selectXml')[0].files[0]);

				$.ajax({
					url: "<?= base_url() ?>process-xml",
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(data) {
						console.log(JSON.parse(data));
						response = JSON.parse(data)
						// console.log(response.attributes)
						sessionStorage.setItem('uploaded', data);
						const currentYear = new Date().getFullYear();
						const previousYear = currentYear - 1;

						Object.values(response).forEach(
							(key) => {
								if (key.hasOwnProperty('an_r')) {
									// console.log(key.an_r)
									// if(key.an_r == previousYear) {
									if (key.hasOwnProperty('nume_c')) {
										let nameArray = key.nume_c.split(',')
										var name = nameArray[0]
										var surname = nameArray[1].trim()
										$("#personalData_name").val(name)
										$("#personalData_surname").val(surname)
									}
									if (key.hasOwnProperty('cif')) {
										$("#personalData_personal_number").val(key.cif)
									}
									if (key.hasOwnProperty('telefon_c')) {
										$("#personalData_mobile_number").val(key.telefon_c)
									}
									if (key.hasOwnProperty('adresa_c')) {
										let addressArray = key.adresa_c.split(',')
										$("#personalData_address_city").val(addressArray[0] != '' ? addressArray[0] : '')
										$("#personalData_address_area").val(addressArray[1] != '' ? addressArray[1] : '')
										$("#personalData_address_other").val(addressArray[2] != '' ? addressArray[2] : '')
									}
									// }
									// else{
									// 	alert("Invalid file");
									// }
								}
							}
						);
						// alert(data);
					}
				});

			});

		$(".btn.back-palce").click(function(e) {
			e.preventDefault();
			Swal.fire({
				title: 'Are you sure?',
				text: "If we go back before change the edited information won’t be saved",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.value) {
					console.log(result);
					window.location.href = $(this).attr('href')
				} else {
					// toastr.error("error");
				}
			})
		})

	})
</script>
