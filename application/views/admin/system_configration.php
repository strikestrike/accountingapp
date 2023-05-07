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
		<div class="project-nav d-md-block d-none">
			<div class="card-action card-tabs card-tabs2 w-100">
				<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link active">Income Type</a>
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
					<div class="tab-pane fade" id="navpills-1">

						<div class="project-main2">
							<span class="arrow-up-back"></span>
							<span class="arrow-up"></span>
							<div class="d-flex justify-content-between align-items-center">
								income tab
							</div>
						</div>


					</div>
					<div class="tab-pane fade active show" id="navpills-2">
						<div class="row">
							<div class="col-xl-12">
								<div class="project-main2">
									<span class="arrow-up-back"></span>
									<span class="arrow-up"></span>

									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Annual Exchange Rate</a>
										<div>
											<a class="btn action-btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Annual_Exchange_Rate"> <i class="fas fa-plus"></i></a>
											<a class="btn action-btn btn-warning text-nowrap enable-edit-btn" id="editExchangeRateBtn" data-rateid="" href="javascript:void(0)" data-editForm="#Edit_AnnualExchange_Rate"><i class="fas fa-edit"></i></a>
											<a class="btn action-btn btn-danger text-nowrap" href="javascript:void(0)" id="deleteExchangeRateBtn" data-rateid=""> <i class="fas fa-trash"></i></a>
										</div>
									</div>
									<form class="editForm" data-btnGroup="#editExchangeRateFormSubmit" action="<?= base_url('admin/editAnnualExchangeRate') ?>" method="post">
										<div class="row mt-3">
											<div class="col-md-3 col-xs-6">
												<div class="form-group">
													<label>Value</label>
													<input type="text" id="exchangeRate" class="form-control" value="4.97" readonly>
												</div>
											</div>
											<div class="col-md-3 col-xs-6">
												<div class="form-group">
													<label>Year</label>
													<select id="yearSelect" class="form-control">
													</select>
												</div>
											</div>
											<div class="col-md-3 col-xs-6">
												<div class="form-group">
													<label>Currency</label>
													<select id="currencySelect" class="form-control">
														<?php
														foreach ($currencies as $key => $value) {
															echo "
																				<option value='" . $value['currency_code'] . "'>" . $value['currency_code'] . "</option>
																			";
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-3 col-xs-6">
												<div class="form-group mt-4 editFormBtnGroup" id="editExchangeRateFormSubmit">
													<button type="button" class="disableFormBtn btn btn-secondary pull-left" data-editForm="#Edit_AnnualExchange_Rate">Cancel</button>
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</div>
										</div>
									</form>

									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Minimum wage</a>
										<div class="validation-errors text-danger">
											<?= $this->session->flashdata('min_wage_validation_error'); ?>
										</div>
										<div>
											<a class="btn action-btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Minimum_wage"> <i class="fas fa-plus"></i></a>
											<a class="btn action-btn btn-warning text-nowrap enable-edit-btn" id="editMinWageBtn" data-rateid="" href="javascript:void(0)" data-editForm="#Minimum_wage"> <i class="fas fa-edit"></i> </a>
											<a class="btn action-btn btn-danger text-nowrap" href="javascript:void(0)" id="deleteMinWageBtn" data-rateid=""> <i class="fas fa-trash"></i></a>
										</div>
									</div>
									<form class="editForm" id="Edit_MinWage" data-btnGroup="#editExchangeRateFormSubmit" action="<?= base_url('admin/editMinWage') ?>" method="post">
										<div class="row mt-3">
											<div class="col-md-3 col-xs-6">
												<div class="form-group">
													<label>Value</label>
													<input id="minWageInput" type="text" class="form-control" value="" readonly>
												</div>
											</div>
											<div class="col-md-3 col-xs-6">
												<div class="form-group">
													<label>Year</label>
													<select id="minWageYearSelect" class="form-control">
													</select>
												</div>
											</div>
											<div class="col-md-3 col-xs-6">
												<div class="form-group mt-4 editFormBtnGroup" id="editExchangeRateFormSubmit">
													<button type="button" class="disableFormBtn btn btn-secondary pull-left" data-editForm="#Edit_MinWage">Cancel</button>
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</div>
										</div>
									</form>

									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> BNR Exchange rate</a>
										<div>
											<a class="btn action-btn btn-primary text-nowrap me-4" href="<?= base_url('admin/bnrExchangeRate') ?>"> <i class="fas fa-eye"></i>&nbsp; View</a>
											<!-- <a class="btn action-btn btn-warning text-nowrap" href="javascript:void(0)"> <i class="fas fa-edit"></i></a>
                                                    <a class="btn action-btn btn-danger text-nowrap" href="javascript:void(0)"> <i class="fas fa-trash"></i></a> -->
										</div>
									</div>
									<div class="row mt-3">
										<form action="<?= base_url('admin/saveBNRExchangeRate') ?>" enctype="multipart/form-data" method="POST">
											<div class="row mt-3 align-items-start">
												<div class="col-md-6 col-xs-6">
													<div class="form-group">
														<div class="text-center">
															<p class="mb-0 small"><strong>Load a xlsx file</strong></p>
															<a class="load-doc-icon" href="javascript:void(0)">
																<i class="fas fa-camera"></i>
																<input type="file" name="upload_excel" required /><br>
																<button type="submit" class="btn btn-sm btn-primary">Submit</button>
															</a>
															<?php if ($this->session->flashdata('success')) { ?>
																<p><?= $this->session->flashdata('success') ?></p>
															<?php  } ?>
															<?php if ($this->session->flashdata('error')) { ?>
																<p><?= $this->session->flashdata('error') ?></p>
															<?php  } ?>
														</div>

													</div>

												</div>

												<div class="col-md-3 col-xs-6 d-none">
													<div class="form-group">
														<label>Year</label>
														<select class="form-control">
															<option>2021</option>
															<option>2022</option>
														</select>
													</div>
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

	<div class="container-fluid d-none">
		<div class="d-flex flex-nowrap justify-content-between align-items-center mb-4">
			<div class="100%">
				<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
				<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
			</div>
		</div>
		<div class="copyright m-0 py-2 d-flex align-items-center">
			<img src="img/note.png" alt="income type" class="me-2">
			<h5 class="mb-0 text-black">Income Type</h5>
		</div>
		<div class="menu-blu">
			<h4>Select one or more income sources</h4>
			<a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
				<img src="img/paly.png" alt="play btn">
				<span>Video Example</span>
			</a>
		</div>
		<h3 class="text-center my-3"><a href="#">Income Type</a></h3>
		<div class="project-main2 d-none">

			<span class="arrow-up-back"></span>
			<span class="arrow-up"></span>

			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Annual Exchange Rate</a>
				<div>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>
					<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<label>Value</label>
						<input type="text" class="form-control" value="4.97">
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<label>Year</label>
						<select class="form-control">
							<option>2021</option>
							<option>2022</option>
						</select>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Minimum wage</a>
				<div>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>
					<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<label>Value</label>
						<input type="text" class="form-control" value="2300">
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<label>Year</label>
						<select class="form-control">
							<option>2021</option>
							<option>2022</option>
						</select>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> BNR Exchange rate</a>
				<div>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> view</a>
					<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Edit</a>
					<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<div class="text-center">
							<p class="mb-0 small"><strong>Load a xlsx file</strong></p>
							<a class="load-doc-icon" href="javascript:void(0)">
								<i class="fas fa-camera"></i>
								<input type="file">
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="form-group">
						<label>Year</label>
						<select class="form-control">
							<option>2021</option>
							<option>2022</option>
						</select>
					</div>
				</div>
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

<div class="footer d-md-none d-block">
	<div class="next-button ">
		<a class="btn btn-primary">Continue <i class="fas fa-long-arrow-alt-right"></i></a>
	</div>
</div>
</div>
<!-- End: Main wrapper -->



<!-- Annual Exchange Rate -->
<div class="modal fade" id="Annual_Exchange_Rate">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Annual Exchange Rate</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form action="<?= base_url('admin/addAnnualExchangeRate') ?>" method="POST">

					<div class="form-group">
						<label class="text-black font-w500">Enter Rate <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="value" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Year <span style="color:red; font-size: 12px"> *</span></label>
						<!-- <input type="text" name="year" class="form-control" required> -->
						<select name="year" id="exchangeRateFormYearSelect" class="form-control">
							<option>Select</option>
						</select>
						<span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Currency <span style="color:red; font-size: 12px"> *</span></label>
						<!-- <input type="text" name="currency" class="form-control" required> -->
						<select id="exchangeRateFormCurrencySelect" name="currency" class="form-control">
							<option>Select</option>
							<?php
							foreach ($currencies as $key => $value) {
								echo "
										<option value='" . $value['currency_code'] . "'>" . $value['currency_code'] . "</option>
									";
							}
							?>
						</select>
						<span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
					</div>
					<div class="form-group">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">CREATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Edit Annual Exchange Rate -->
<div class="modal fade" id="Edit_AnnualExchange_Rate">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Annual Exchange Rate</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="editAnnualExchangeRateForm" action="<?= base_url('admin/editAnnualExchangeRate') ?>" method="POST">
					<input type="number" name="id" id="exchangeRateIdHidden" hidden>
					<div class="form-group">
						<label class="text-black font-w500">Enter Rate <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="value" class="form-control editExchangeRateInput" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Year <span style="color:red; font-size: 12px"> *</span></label>
						<!-- <input type="text" name="year" class="form-control" required> -->
						<select name="year" id="editExchangeRateFormYearSelect" class="form-control" disabled>
							<option>Select</option>
						</select>
						<span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Currency <span style="color:red; font-size: 12px"> *</span></label>
						<!-- <input type="text" name="currency" class="form-control" required> -->
						<select id="editExchangeRateFormCurrencySelect" name="currency" class="form-control" disabled>
							<option>Select</option>
							<?php
							foreach ($currencies as $key => $value) {
								echo "
										<option value='" . $value['currency_code'] . "'>" . $value['currency_code'] . "</option>
									";
							}
							?>
						</select>
						<span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>
					</div>
					<div class="form-group">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<!--add Minimum wage -->
<div class="modal fade" id="Minimum_wage">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Minimum wage</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>

			</div>
			<div class="modal-body">
				<form id="minWageForm" action="<?= base_url('admin/addMinimumWage') ?>" method="POST">
					<input type="text" name="id" id="minWageIdHidden" value="" hidden>
					<div class="form-group">
						<label class="text-black font-w500">Value<span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" id="minWageInput" name="value" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('value'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Year<span style="color:red; font-size: 12px"> *</span></label>
						<!-- <input type="text" name="year" class="form-control" required> -->
						<select name="year" id="minimumWageFormYearSelect" class="form-control">
							<option>Select</option>
						</select>
						<span style="color:red; font-size: 12px"> <?php echo form_error('year'); ?></span>

					</div>

					<div class="form-group">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- BNR Exchange rate -->
<div class="modal fade" id="BNR_Exchange_rate">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> BNR Exchange rate</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('home/system_configration') ?>" method="POST">
					<input type="hidden" name="type" value="BNR_xchange_rate">
					<div class="form-group">
						<label class="text-black font-w500">Value</label>
						<input type="text" name="value" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Load a xlsx file</label>
						<input type="file" name="xlsx" class="form-control" required>
					</div>

					<div class="form-group">
						<button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">CREATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	var data = <?= json_encode($rates) ?>;
	var minWagesData = <?= json_encode($minimum_wages) ?>;

	/**
	 * this will append the option element in the given "select" element with the years till current year upto the year 2000 
	 * 
	 * @param {object} element :- The "select" element
	 */
	function createYearsDropdown(element) {
		for (i = new Date().getFullYear(); i > 2000; i--) {
			element.append($("<option />").val(i).html(i));
		}
	}

	/**
	 * this will search the exchange rate value from the given data object on the basis of year and currency
	 * 
	 * @param {number} year :- The year to find rate
	 * @param {string} currency :- The currency code to find rate
	 * 
	 * @return rate
	 */
	function findRate(year, currency) {
		for (const key in data) {
			if (data[key].year == year && data[key].currency == currency)
				return data[key];
			// console.log(data[key]);
		}
	}


	function findWage(year) {
		for (const key in minWagesData) {
			if (minWagesData[key].year == year)
				return minWagesData[key];
		}
	}
	createYearsDropdown($("#yearSelect"));
	createYearsDropdown($("#minWageYearSelect"));
	createYearsDropdown($("#exchangeRateFormYearSelect"));
	createYearsDropdown($("#minimumWageFormYearSelect"));
	createYearsDropdown($("#editExchangeRateFormYearSelect"));

	$("#currencySelect").on('change', (e) => {
		var currency = $(e.target).val();
		var year = parseInt($("#yearSelect").find(":selected").val());
		var rate = findRate(year, currency);
		if (rate) {
			$("#exchangeRate").val(parseFloat(rate.value));
			$("#editExchangeRateBtn").attr("data-rateid", rate.id);
			$("#deleteExchangeRateBtn").attr("data-rateid", rate.id);
		} else {
			$("#exchangeRate").val(`No record for ${currency} in ${year}`);
			$("#editExchangeRateBtn").attr("data-rateid", "");
			$("#deleteExchangeRateBtn").attr("data-rateid", "");
		}
	});

	$("#yearSelect").on('change', (e) => {
		var year = $(e.target).val();
		var currency = $("#currencySelect").find(":selected").val();
		var rate = findRate(year, currency);
		if (rate) {
			$("#exchangeRate").val(parseFloat(rate.value));
			$("#editExchangeRateBtn").attr("data-rateid", rate.id);
			$("#deleteExchangeRateBtn").attr("data-rateid", rate.id);
		} else {
			$("#exchangeRate").val(`No record for ${currency} in ${year}`);
			$("#editExchangeRateBtn").attr("data-rateid", "");
			$("#deleteExchangeRateBtn").attr("data-rateid", "");
		}
	});

	$("#currencySelect").change();



	$("#minWageYearSelect").on('change', (e) => {
		var year = $(e.target).val();
		var wage = findWage(year);
		if (wage) {
			$("#minWageInput").val(wage.value);
			$("#editMinWageBtn").attr("data-rateid", wage.id);
			$("#deleteMinWageBtn").attr("data-rateid", wage.id);
		} else {
			$("#minWageInput").val(`No record in ${year}`);
			$("#editMinWageBtn").attr("data-rateid", "");
			$("#deleteMinWageBtn").attr("data-rateid", "");
		}
	});
	$("#minWageYearSelect").change();

	/**
	 * edit annual exchange rate
	 */

	// $(".enable-edit-btn").on('click',(e)=>{
	// 	var editForm = $(e.target).attr("data-editForm");
	// 	if($(e.target).attr("data-rateid") !== "")
	// 		enableEditForm(editForm);
	// })

	// function enableEditForm(form) {
	// 	$(form).addClass("my-5 enabledForm");
	// }

	// function disableEditForm(form) {
	// 	$(form).removeClass("my-5 enabledForm");
	// }

	// $(".disableFormBtn").on("click",(e)=>{
	// 	var editForm = $(e.target).attr("data-editForm");
	// 	disableEditForm(editForm);
	// })

	/**
	 * display edit form for updating exchange rate
	 */
	$("#editExchangeRateBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-rateid") !== "") {
			var rateId = $(e.target).attr("data-rateid");
			var data = {
				"value": rateId
			}
			var url = 'getExchangeRateById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#Edit_AnnualExchange_Rate").modal('show');
					var rate = JSON.parse(response)
					console.log(rate[0]);
					$("#editAnnualExchangeRateForm input.editExchangeRateInput").val(parseFloat(rate[0].value));
					$('#editExchangeRateFormYearSelect option[value=' + rate[0].year + ']').attr('selected', true);
					$('#editExchangeRateFormCurrencySelect option[value=' + rate[0].currency + ']').attr('selected', true);
					$("#exchangeRateIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
		// console.log(rateId)
	})

	/**
	 * display edit form for updating minimum wage
	 */
	$("#editMinWageBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-rateid") !== "") {
			var rateId = $(e.target).attr("data-rateid");
			var data = {
				"value": rateId
			}
			var url = 'getMinWageById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#Minimum_wage").modal('show');
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#minWageForm").attr('action', '<?= base_url('admin/editMinWage') ?>')
					$("#minWageForm input#minWageInput").val(rate[0].value);
					$('#minimumWageFormYearSelect option[value=' + rate[0].year + ']').attr('selected', true);
					$('#minimumWageFormYearSelect').prop('disabled', true);
					$("#minWageIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
		// console.log(rateId)
	})




	/**
	 * delete exchange rate
	 */

	$("#deleteExchangeRateBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-rateid") !== "") {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					console.log(result);
					var rateId = $(e.target).attr("data-rateid");
					var data = {
						"id": rateId
					}
					var url = 'deleteExchangeRateById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							);
							setTimeout(() => {
								window.location.reload();
							}, 1500)
						},
						error: () => {
							toastr.error("Error in deleting.");
						}
					})
				} else {
					// toastr.error("error");
				}
			})

		} else {
			toastr.warning("Cannot delete, data doesn't exist.");
		}
	});

	/**
	 * delete min wage
	 */

	$("#deleteMinWageBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-rateid") !== "") {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					console.log(result);
					var rateId = $(e.target).attr("data-rateid");
					var data = {
						"id": rateId
					}
					var url = 'deleteMinWageById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							);
							setTimeout(() => {
								window.location.reload();
							}, 1500)
						},
						error: () => {
							toastr.error("Error in deleting.");
						}
					})
				} else {
					// toastr.error("error");
				}
			})

		} else {
			toastr.warning("Cannot delete, data doesn't exist.");
		}
	})
</script>
