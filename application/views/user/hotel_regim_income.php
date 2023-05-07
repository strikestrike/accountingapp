<style>
	/* Plugin Example Container */
	.date-select {
		width: 33%;
		min-width: 400px;
		padding: 15px 0;
		display: inline-block;
		box-sizing: border-box;
		text-align: center;
	}

	.date-select .date-dropdowns {
		display: flex;
	}

	.date-select:first-of-type {
		position: relative;
		/* bottom: 35px; */
	}

	/* date-select Heading */
	.date-select h2 {
		font-family: "Roboto Condensed", helvetica, arial, sans-serif;
		font-size: 1.3em;
		margin: 15px 0;
		color: #4F5462;
	}

	.date-select input {
		display: block;
		margin: 0 auto 20px auto;
		width: 150px;
		padding: 8px 10px;
		border: 1px solid #CCCCCC;
		border-radius: 3px;
		background: #F2F2F2;
		text-align: center;
		font-size: 1em;
		letter-spacing: 0.02em;
		font-family: "Roboto Condensed", helvetica, arial, sans-serif;
	}

	.date-select select {
		padding: 10px 0;
		background: #ffffff;
		border: 1px solid #CCCCCC;
		border-radius: 3px;
		margin: 0 3px;
		flex-grow: 1;
	}

	.date-select select.invalid {
		color: #E9403C;
	}

	.price-box {
		position: absolute;
		bottom: 25px;
		right: 25px;
		width: 230px;
	}

	.remove-btn:disabled {
		display: none;
	}

	.price-box {
		width: 175px;
	}
</style>
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
						<a href="<?= base_url('user/verifyPersonalData/'.$personalData['id']) ?>" class="nav-link">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
					</li>
					<li class="nav-item">
						<?php if ($personalData['steps_completed'] >= 2) { ?>
							<a href="hotelIncomeVerification" class="nav-link">Information Verification</a>
						<?php } else { ?>
							<a href="javascript:void(0);" class="nav-link">Information Verification</a>
						<?php } ?>
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
					<!-- Rental ====Income type=== -->
					<div class="tab-pane fade active show" id="navpills-2">
						<div class="project-main2">
							<span class="arrow-up-back"></span>
							<span class="arrow-up"></span>

							<div class="row justify-content-between align-items-center">
								<div class="col-sm-8 mb-3 d-flex justify-content-end align-items-center">
									<p class="mb-0 small">I don't have the old form, please add your personal data</p>
									<?php
									// echo "<pre>";
									// print_r($personalData);
									?>
								</div>
								<div class="col-sm-4 mb-3 d-flex justify-content-end">
									<a class="btn btn-primary text-nowarp" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">Update Information</a>
								</div>
								<hr>
							</div>

							<div class="basic-form">
								<?php
								// echo "<pre>";
								// print_r($_SESSION);
								?>
								<form id="<?= !empty($rentIncome) ? 'incomeTypeForm' : 'hotel_form' ?>" class="<?= !empty($rentIncome) ? 'editable' : '' ?>" action="<?= !empty($rentIncome) ? base_url() . 'user/updateHotelIncome' : base_url() . 'user/saveHotelIncome' ?>" method="POST">
									<div class="row">
										<div class="col-xl-9 col-lg-9 col-sm-8">
											<div id="repeater">
												<div class="clearfix"></div>
												<?php
												if (!empty($rentIncome)) {
													$i = 0;
													foreach ($rentIncome as $key => $value) {
														// echo $value['rented_space_address']
												?>
														<input type="hidden" name="income_type[<?= $i ?>][id]" value="<?= $value['id'] ?>">
														<!-- <div class="items" data-group="income_type"> -->
														<div class="form-wrapper">
															<div class="row form-group">
																<!-- rented space address -->
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Rented Space address <span style="color:red; font-size: 12px"></span></label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-12">
																			<input type="text" id="hotelIncome_rented_space_address" class="form-control" name="income_type[<?= $i ?>][rented_space_address]" data-name="rented_space_address" value="<?php echo $value['rented_space_address'] ?>" placeholder="">
																			<span style="color:red; font-size: 12px">
																				<?php echo form_error('rented_spaceadd'); ?></span>
																		</div>
																	</div>
																</div>
															</div>
															<!-- rented space address end -->
															<!-- contract details -->
															<div class="row form-group align-items-inherit">
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Contract Data<span style="color:red; font-size: 12px"> *</span></label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-4">
																			<label class="form-label">Rent value <span style="color:red; font-size: 12px"> *</span></label>
																			<input type="number" id="hotelIncome_rent_value" name="income_type[<?= $i ?>][rent_value]" data-name="rent_value" value="<?php echo $value['rent_value'] ?>" class="form-control" required>
																			<span style="color:red; font-size: 12px">
																				<?php echo form_error('rent_value'); ?></span>
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Currency <span style="color:red; font-size: 12px"> *</span></label>
																			<select class="form-control" id="hotelIncome_currency" name="income_type[<?= $i ?>][currency]" data-name="currency">
																				<option value="RON" <?= $value['currency'] == 'RON' ? 'selected' : '' ?>>RON</option>
																				<option value="EURO" <?= $value['currency'] == 'EUR' ? 'selected' : '' ?>>EUR</option>
																			</select>
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Year <span style="color:red; font-size: 12px"> *</span></label>
																			<select id="hotelIncome_year" name="income_type[<?= $i ?>][year]" class="form-control">
																				<option value="2022" <?= $value['year'] == '2022' ? 'selected' : '' ?>>2022</option>
																				<option value="2021" <?= $value['year'] == '2021' ? 'selected' : '' ?>>2021</option>
																			</select>
																		</div>
																	</div>

																</div>
															</div>
															<!-- contract details end-->
															<div class="row form-group align-items-inherit">
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">Financial Info</label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-4">
																			<label class="form-label">Expenses</label>
																			<input type="text" id="hotelIncome_expenses" name="income_type[<?= $i ?>][expenses]" value="<?php echo $value['expenses'] ?>" class="form-control">
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Financial Loss</label>
																			<input type="text" id="hotelIncome_financial_loss" name="income_type[<?= $i ?>][financial_loss]" value="<?php echo $value['financial_loss'] ?>" class="form-control">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- Repeater Remove Btn -->
														<!-- <div class="pull-right repeater-remove-btn">
																	<button class="btn btn-danger remove-btn">
																		Remove
																	</button>
																</div> -->
														<div class="clearfix"></div>
														<!-- </div> -->
													<?php $i++;
													}
												} else { ?>
													<div class="items" data-group="income_type">
														<div class="form-wrapper">
															<div class="row form-group">
																<!-- rented space address -->
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Rented Space address <span style="color:red; font-size: 12px"></span></label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-12">
																			<input type="text" id="hotelIncome_rented_space_address" class="form-control" name="rented_space_address" data-name="rented_space_address" placeholder="">
																			<span style="color:red; font-size: 12px">
																				<?php echo form_error('rented_spaceadd'); ?></span>
																		</div>
																	</div>
																</div>
															</div>
															<!-- rented space address end -->
															<!-- contract details -->
															<div class="row form-group align-items-inherit">
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Contract Data<span style="color:red; font-size: 12px"> *</span></label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-4">
																			<label class="form-label">Rent value <span style="color:red; font-size: 12px"> *</span></label>
																			<input type="number" id="hotelIncome_rent_value" name="rent_value[]" data-name="rent_value" class="form-control" required>
																			<span style="color:red; font-size: 12px">
																				<?php echo form_error('rent_value'); ?></span>
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Currency <span style="color:red; font-size: 12px"> *</span></label>
																			<select class="default-select form-control" id="hotelIncome_currency" name="currency" data-name="currency">
																				<option value="RON">RON</option>
																				<option value="EUR">EUR</option>
																			</select>
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Year <span style="color:red; font-size: 12px"> *</span></label>
																			<select name="year" data-name="year" id="hotelIncome_year" class="form-control">
																				<option>Select</option>
																				<option value="2022">2022</option>
																				<option value="2021">2021</option>
																			</select>
																		</div>
																	</div>

																</div>
															</div>
															<!-- contract details end-->
															<div class="row form-group align-items-inherit">
																<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">Financial Info</label>
																<div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
																	<div class="row">
																		<div class="col-sm-4">
																			<label class="form-label">Expenses</label>
																			<input type="text" name="expenses" id="hotelIncome_expenses" data-name="expenses" class="form-control">
																		</div>
																		<div class="col-sm-4 mt-2 mt-sm-0">
																			<label class="form-label">Financial Loss</label>
																			<input type="text" name="financial_loss" id="hotelIncome_financial_loss" data-name="financial_loss" class="form-control">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- Repeater Remove Btn -->
														<div class="pull-right repeater-remove-btn">
															<button class="btn btn-danger remove-btn">
																Remove
															</button>
														</div>
														<div class="clearfix"></div>
													</div>
												<?php }
												?>

												<div class="row form-group mb-4">
													<div class="col-xl-3 col-lg-3 col-sm-3">
														<!-- <button class="btn btn-danger w-100">Add</button> -->
														<?php if (empty($rentIncome)) { ?>
															<button type="button" class="btn btn-danger pt-5 pull-right repeater-add-btn">
																Add
															</button>
														<?php } ?>
													</div>
													<div class="col-xl-9 col-lg-9 col-sm-9 pl-lg-0">
														<?php if (empty($rentIncome)) { ?>
															<small id="duplicateFormMsg">Add a new rented space</small>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-3 col-lg-3 col-sm-4">
										</div>
									</div>


									<div class="row form-group">
										<div class="col-xl-9 col-lg-9 col-sm-6">
											<!-- <div class="row form-group mb-4">
												<div class="col-xl-3 col-lg-3 col-sm-3">
													<a class="btn btn-danger w-100" id="duplicateRentalForm">Add</a>
												</div>
												<div class="col-xl-9 col-lg-9 col-sm-9 pl-lg-0">
													<small>Add a new rented space</small>
												</div>
											</div> -->
											<div class="row form-group mb-0">
												<div class="col-xl-6">
													<?php if (!empty($rentIncome)) { ?>
														<a href="javascript:void(0);" class="btn btn-warning editPersonalDataBtn"><i class="fas fa-edit"></i> Edit</a>
														<a href="javascript:void(0);" class="btn btn-danger cancelEditingBtn"><i class="fas fa-times"></i> Cancel</a>
														<button type="submit" class="btn btn-primary">Update</button>
														<?php if (!empty($personalData)) { ?>
															<?php if ($personalData['steps_completed'] < 2) { ?>
																<a href="javascript:void(0);" class="btn btn-success proceedPersonalData proceedIncomeType"><i class="fas fa-forward"></i> Final Submit</a>
															<?php } elseif ($personalData['steps_completed'] >= 2) { ?>
																<a href="hotelIncomeVerification" class="btn btn-primary nextStep"><i class="fas fa-forward"></i> Next</a>
															<?php } ?>
														<?php } ?>
													<?php } else { ?>
														<button type="submit" class="btn btn-primary">Save</button>
													<?php } ?>
												</div>
												<div class="col-xl-6">
													<small>Required fields</small>
												</div>
											</div>
										</div>
									</div>
									<div class="white-box price-box">
										<h2>Price</h2>
										<h3>Cost Final</h3>
										<p>670 Ron</p>
										<input type="hidden" id="finalCostInput" name="cost_final" value="">
									</div>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="container-fluid d-none">
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
		<?php
		if (!empty($rentIncome)) { ?>
			validateHotelIncomeForm();
		<?php }	?>

		/* Create Repeater */
		$("#repeater").createRepeater({
			showFirstItemToDefault: true,
		});

		var modulesCost = <?= json_encode($rentIncomePrice) ?>;
		// console.log(modulesCost);
		setPrice(modulesCost);

		var maxModules = findMaxNoOfModules(modulesCost);
		var countForm = $(".form-wrapper").length;
		if (countForm == maxModules) {
			$(".repeater-add-btn").attr('disabled', 'true');
			$("#duplicateFormMsg").html("<span class='text-danger'>You can't create more rented space.</span>")
		}
		$(".repeater-add-btn").click((e) => {
			// console.log("add form");
			setPrice(modulesCost);
			var countForm = $(".form-wrapper").length;
			// console.log(countForm);
			if (countForm == maxModules) {
				$(e.target).attr('disabled', 'true');
				$("#duplicateFormMsg").html("<span class='text-danger'>You can't create more rented space.</span>")
			}
		})

		function createYearsDropdown(element) {
			for (i = new Date().getFullYear(); i > 2000; i--) {
				element.append($("<option />").val(i).html(i));
			}
		}
		createYearsDropdown($("#yearSelect"));


		$(".remove-btn").click((e) => {
			var countForm = $(".form-wrapper").length;
			if (countForm == maxModules) {
				// console.log("remove");
				$(".repeater-add-btn").attr('disabled', 'false');
				$("#duplicateFormMsg").html("Add new rented space.")
			}
		})


		$("form.editable :input").prop('readonly', true);
		$("form.editable select").attr('disabled', true);

		$(".editPersonalDataBtn").click(() => {
			$("#incomeTypeForm").removeClass("editable");
			$("#incomeTypeForm :input").prop('readonly', false);
			$("#incomeTypeForm select").attr('disabled', false);
			$(".nextStep").hide();
			// $("#incomeTypeForm input[type='radio']").attr('disabled', false);
		});
		$(".cancelEditingBtn").click(() => {
			$("#incomeTypeForm").addClass("editable");
			$("#incomeTypeForm :input").prop('readonly', true);
			$("form.editable select").attr('disabled', true);
			$(".nextStep").show();
			// $("#incomeTypeForm input[type='radio']").attr('disabled', true);
		});

		$(".proceedIncomeType").click(() => {
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
					var id = <?= !empty($_SESSION['personal_data_id']) ? $_SESSION['personal_data_id'] : '""' ?>;
					var data = {
						"id": id,
						"type": 'hotel'
					}
					var url = 'step2Completed'
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
									window.location.href = "<?= base_url() . 'user/hotelIncomeVerification' ?>"
									// console.log(response);
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

	})

	function findMaxNoOfModules(data) {
		let maxModules = parseInt(data[0].number_of_modules);
		// console.log(typeof(maxModules));
		for (let i = 1; i < data.length; i++) {
			if (maxModules < parseInt(data[i].number_of_modules))
				maxModules = data[i].number_of_modules;
		}
		// console.log(maxModules);
		return parseInt(maxModules);
	}

	function setPrice(data) {
		var countForm = $(".form-wrapper").length;
		// console.log(countForm);
		for (const key in data) {
			// console.log(data[key]);
			if (data[key].number_of_modules == countForm) {
				$(".price-box p").html(data[key].price + " RON");
				$("#finalCostInput").val(data[key].price);
			}
		}
	}


	function removeModule(event) {
		var modulesCost = <?= json_encode($rentIncomePrice) ?>;
		var maxModules = findMaxNoOfModules(modulesCost);
		// console.log("remove");
		$(event.target).parents('.items').remove()
		setPrice(modulesCost);
		var countForm = $(".form-wrapper").length;
		if (countForm < maxModules) {
			$(".repeater-add-btn").removeAttr('disabled');
			$("#duplicateFormMsg").html("<span class=''>Add a new rented space</span>")
		}
	}

</script>
