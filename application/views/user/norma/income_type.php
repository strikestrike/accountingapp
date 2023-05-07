<style>
	input[name="da_nu_dd_date"],
	input[name="no_special_from_date"],
	input[name="no_special_to_date"] {
		position: absolute;
		width: 100%;
		height: 100%;
		opacity: 0;
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
						<a href="<?= base_url('user/verifyPersonalData/' . $_SESSION['personal_data_id']) ?>" class="nav-link">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
					</li>
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link">Information Verification </a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('user/generatePdf') ?>" class="nav-link">Document Release </a>
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
					<div class="tab-pane fade active show" id="navpills-2">
						<div class="project-main2">
							<div class="card">
								<div class="card-header  blue-header">
									<h4 class="mx-lg-auto"><span class="las la-angle-left"></span> Date de localizare PFA</h4>
								</div>
								<div class="card-body pos-rel">
									<div class="left-upper-shadow d-md-none">
										<img src="<?= base_url() ?>assets/img/Ellipse-3.png">
									</div>
									<div class="right-lower-shadow d-md-none">
										<img src="<?= base_url() ?>assets/img/Ellipse-2.png">
									</div>
									<form action="<?= base_url() ?>user/saveNormaIncome" class="repeater" method="POST">
										<div class="row mb-3 pfa_row">
											<div class="col-md-6 col-xs-12 pfa_county_col">
												<div class="form-group">
													<label class="form-label mb-1">Alege judetul <span class="text-danger">*</span></label>
													<select multiple class="default-select form-control wide repeater-select county_select" id="county_select_1" name="county_select" onchange="showCitiesList(event)">
														<?php
														if (!empty($county)) {
															foreach ($county as $c) {
																echo "<option>" . $c['county_name'] . "</option>";
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-xs-12 pfa_city_col">
												<div class="form-group">
													<label class="form-label mb-1">Alege Localitatiea<span class="text-danger">*</span></label>
													<select class="form-control default-select city_select" data-live-search="true" id="city_select" onchange="showCaenList(event)">
														<option value="">Select</option>
													</select>
												</div>
											</div>
											<input type="hidden" name="city">
											<div class="col-md-6 col-xs-12 pfa_caen_col">
												<div class="form-group">
													<label class="form-label mb-1">Alege codul CAEN<span class="text-danger">*</span></label>
													<select class="form-control default-select caen_select" name="caen" data-live-search="true" id="caen_select" onchange="showNormaIncome(event)" disabled>
														<option>Search</option>
														<?php
														if (!empty($caen)) {
															foreach ($caen as $c) {
																echo "<option value='" . $c['code'] . "'>" . $c['code'] . " - " . $c['description'] . "</option>";
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-1">Norma de venit<span class="text-danger">*</span></label>
													<input type="text" id="normaField" name="normaIncome" class="form-control" readonly>
												</div>
											</div>
										</div>
										<div class="row variableNameRow hideThis" style="display: none;">
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-1">Variable frontend name</label>
													<input type="text" class="form-control" name="variableFrontName" readonly>
												</div>
											</div>
										</div>
										<div class="row dropdownFunctionDateRow hideThis" style="display: none;">
											<h4 class="mb-3">Da/Nu (Yes/No)</h4>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-1">Variable frontend name</label>
													<select class="default-select form-control wide">
														<option value="">Select</option>
														<option>Da</option>
														<option>Nu</option>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-1" style="visibility: hidden;">Variable frontend name</label>
													<div class="input-group">
														<input type="text" class="form-control" placeholder="De la" id="mdate">
														<span class="input-group-text"><i class="far fa-calendar"></i></span>
														<input type="date" name="da_nu_dd_date" id="">
													</div>
												</div>
											</div>
										</div>
										<div class="row dropdownFunctionRow hideThis" style="display: none;">
											<h4 class="mb-3">Da/Nu (Yes/No)</h4>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-1">Data found on the variable</label>
													<select class="default-select form-control wide" id="dd_func_select">
														<option value="">Select</option>
														<option>Da</option>
														<option>Nu</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row noSpecialRow hideThis" style="display: none;">
											<h4 class="mb-3">No Special</h4>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-3">Month and day 2 date intervals</label>
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<div class="input-group mb-sm-0 mb-3">
																<input type="text" class="form-control" placeholder="De la data" id="mdate1">
																<span class="input-group-text" style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;"><i class="far fa-calendar"></i></span>
																<input type="date" name="no_special_from_date" id="">
															</div>
														</div>
														<div class="col-md-6 col-xs-12">
															<div class="input-group">
																<input type="text" class="form-control" placeholder="Pana la data" id="mdate2">
																<span class="input-group-text" style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;"><i class="far fa-calendar"></i></span>
																<input type="date" name="no_special_to_date" id="">
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-xs-12">
												<div class="form-group">
													<label class="form-label mb-3">Text</label>
													<!-- <label class="form-label mb-3">Variable frontend name</label> -->
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="row mb-5 variantsRow hideThis" style="display: none;">
											<h4 class="mb-3">Variant Options</h4>
											<div class="col-lg-6 col-md-6 col-xs-12 swatchCol hideThis" style="display: none;">
												<div class="form-group">
													<label class="form-label mb-1">Norma venit initiata</label>
													<input type="text" name="swatchInputText" id="nv_initiata" readonly class="form-control" placeholder="Variable 1 - Name">
												</div>

												<div class="variant-selector">
													<div class="selecotr-item">
														<input type="radio" id="radio1" name="selector" class="selector-item_radio" checked>
														<label for="radio1" class="selector-item_label">Variant 1</label>
														<i class="fa fa-info"></i>
													</div>
													<div class="selecotr-item">
														<input type="radio" id="radio2" name="selector" class="selector-item_radio">
														<label for="radio2" class="selector-item_label">Variant 2</label>
														<i class="fa fa-info"></i>
													</div>
													<div class="selecotr-item">
														<input type="radio" id="radio3" name="selector" class="selector-item_radio">
														<label for="radio3" class="selector-item_label">Variant 3</label>
														<i class="fa fa-info"></i>
													</div>
													<div class="selecotr-item">
														<input type="radio" id="radio4" name="selector" class="selector-item_radio">
														<label for="radio4" class="selector-item_label">Variant 4</label>
														<i class="fa fa-info"></i>
													</div>
													<div class="selecotr-item">
														<input type="radio" id="radio5" name="selector" class="selector-item_radio">
														<label for="radio5" class="selector-item_label">Variant 5</label>
														<i class="fa fa-info"></i>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 checksCol hideThis" style="display: none;">
												<div class="from-group mb-3">
													<div class="d-flex">
														<label class="form-label me-3">Variants</label>
													</div>
													<div class="grid-view">
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 1</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 2</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 3</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 4</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 5</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 6</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 7</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 8</span>
															</label>
														</div>
														<div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 9</span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row pfa-data-row hideThis" style="display: none;">
											<div class="col-md-6">
												<div class="card">
													<div class="card-header  blue-header">
														<h4 class="mx-lg-auto"><span class="las la-angle-left"></span> Selecteaza una din</h4>
													</div>
													<div class="card-body">
														<h5>Selecteaza una din optiunile de mai jos care ti se potriveste:</h5>
														<form action="#">
															<div class="form-group">
																<label class="form-label mb-1">Optiune standard</label>
																<input type="text" class="form-control" id="pfaDataVariable" name="pfaDataOptiuneVarbl" placeholder="Variable 1 - Name" readonly>
															</div>

															<div class="variant-selector mb-4 pfaDataBlockVariants">
																<div class="selecotr-item">
																	<input type="radio" id="radio1" name="selector" class="selector-item_radio">
																	<label for="radio1" class="selector-item_label">Variant 1</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio2" name="selector" class="selector-item_radio">
																	<label for="radio2" class="selector-item_label">Variant 2</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio3" name="selector" class="selector-item_radio" checked="">
																	<label for="radio3" class="selector-item_label">Variant 3</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio4" name="selector" class="selector-item_radio">
																	<label for="radio4" class="selector-item_label">Variant 4</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio5" name="selector" class="selector-item_radio">
																	<label for="radio5" class="selector-item_label">Variant 5</label>
																	<i class="fa fa-info"></i>
																</div>
															</div>

															<div class="form-group">
																<label class="form-label mb-1">Exceptii</label>
																<input type="text" class="form-control" id="pfaDataExceptiiVarbl" placeholder="Variable 1 - Name" readonly>
															</div>

															<div class="variant-selector pfaDataExcptiiVarnts">
																<div class="selecotr-item">
																	<input type="radio" id="radio11" name="selector1" class="selector-item_radio">
																	<label for="radio11" class="selector-item_label">Variant 1</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio12" name="selector1" class="selector-item_radio">
																	<label for="radio12" class="selector-item_label">Variant 2</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio13" name="selector1" class="selector-item_radio" checked="">
																	<label for="radio13" class="selector-item_label">Variant 3</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio14" name="selector1" class="selector-item_radio">
																	<label for="radio14" class="selector-item_label">Variant 4</label>
																	<i class="fa fa-info"></i>
																</div>
																<div class="selecotr-item">
																	<input type="radio" id="radio15" name="selector1" class="selector-item_radio">
																	<label for="radio15" class="selector-item_label">Variant 5</label>
																	<i class="fa fa-info"></i>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<div class="row mb-4 pfa-spec-row hideThis" style="display: none;">
											<div class="col-md-6">
												<div class="crest">
													<div class="form-group">
														<label class="form-label mb-1">Factori pentru cresterea normei de venit</label>
														<input type="text" class="form-control" id="factori_pentru_cresterea_variable" placeholder="Variable 1 - Name" readonly>
													</div>

													<div class="variant-selector mb-4 pfaSpecCresterea_vrnts">
														<div class="selecotr-item">
															<input type="radio" id="radio41" name="selector" class="selector-item_radio">
															<label for="radio41" class="selector-item_label">Variant 1</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio42" name="selector" class="selector-item_radio">
															<label for="radio42" class="selector-item_label">Variant 2</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio43" name="selector" class="selector-item_radio" checked="">
															<label for="radio43" class="selector-item_label">Variant 3</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio44" name="selector" class="selector-item_radio">
															<label for="radio44" class="selector-item_label">Variant 4</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio45" name="selector" class="selector-item_radio">
															<label for="radio45" class="selector-item_label">Variant 5</label>
															<i class="fa fa-info"></i>
														</div>
													</div>
												</div>

												<div class="dimin">
													<div class="form-group">
														<label class="form-label mb-1">Factori pentru diminuarea normei de venit</label>
														<input type="text" class="form-control" id="pfaSpecDiminVarbl" placeholder="Variable 1 - Name" readonly>
													</div>
													<div class="variant-selector diminVarnts">
														<div class="selecotr-item">
															<input type="radio" id="radio11" name="selector1" class="selector-item_radio">
															<label for="radio11" class="selector-item_label">Variant 1</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio12" name="selector1" class="selector-item_radio">
															<label for="radio12" class="selector-item_label">Variant 2</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio13" name="selector1" class="selector-item_radio" checked="">
															<label for="radio13" class="selector-item_label">Variant 3</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio14" name="selector1" class="selector-item_radio">
															<label for="radio14" class="selector-item_label">Variant 4</label>
															<i class="fa fa-info"></i>
														</div>
														<div class="selecotr-item">
															<input type="radio" id="radio15" name="selector1" class="selector-item_radio">
															<label for="radio15" class="selector-item_label">Variant 5</label>
															<i class="fa fa-info"></i>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="row mb-4">
											<div class="col text-center text-lg-start px-lg-2 px-0">
												<?php
												if (!empty($existing_income)) { ?>
													<a href="<?= base_url('user/normaInfoVerification') ?>" class="btn btn-primary btn-square">Mergi mai departe</a>
												<?php } else { ?>
													<button type="button" id="submitNormaBtn" class="btn btn-primary btn-square">Mergi mai departe</button>
												<?php	}
												?>
											</div>
										</div>
										<h5 class="text-center text-lg-start">Add new PFA or Add new income source</h5>
										<div class="d-lg-flex align-items-center mb-4 text-center text-lg-start">
											<button type="button" id="addMoreNormaBtn" class="btn btn-outline-primary btn-square me-md-4 mb-3 mb-sm-0">Adauga un alt PFA</button>
											<h6 class="m-0 text-primary">Selecteaza din stanga o alta sursa de venit</h6>
										</div>
									</form>
								</div>
								<div class="row px-md-5">
									<div class="col">
										<h4 class="mb-3">Incomes added</h4>
										<div class="table-responsive table-border mb-3">
											<table class="table mt-0" id="incomesTable">
												<thead>
													<tr>
														<th>County</th>
														<th>City</th>
														<th>CAEN</th>
														<th>Norma&nbsp;de&nbsp;venit</th>
														<!-- <th class="text-end">Action</th> -->
													</tr>
												</thead>
												<tbody>
													<?php
													if (!empty($existing_income)) {
														foreach ($existing_income as $inc) {
															echo "<tr>
																	<td>" . $inc['county'] . "</td>
																	<td>" . $inc['city'] . "</td>
																	<td>" . $inc['caen'] . "</td>
																	<td>" . $inc['norma_de_venit'] . "</td>
																</tr>";
														}
													} else {
														echo '
																<tr id="default_row">
																	<td class="text-center" colspan="4">No data!</td>
																</tr>
															';
													}
													?>
													<!-- <tr>
														<td>1</td>
														<td>1</td>
														<td>1</td>
														<td>1</td>
														<td class="text-end">
															<a href="javascript:void(0);"><i class="las la-trash-alt text-danger"></i></a>
														</td>
													</tr> -->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
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
</div>
<!-- End: Main wrapper -->
<script>
	var counties = [];
	var selectionData = '';
	let normaFinalArr = [];

	window.addEventListener('load', function() {


		$(".county_select").change(() => {

			let countiesSelected = $(this).val()
			alert(countiesSelected)

			if (countiesSelected.length > 0) {
				if (counties.length == 0) {
					counties = countiesSelected
					// console.log(counties[0]);
					fetchCities(counties).then(data => {
						renderCities(data)
					})
				} else {
					let removedSelected = ''
					let currentlySelected = countiesSelected.filter(x => !counties.includes(x))
					removedSelected = counties.filter(x => !countiesSelected.includes(x))
					if (currentlySelected.length > 0) {
						// console.log('currentlySelected', currentlySelected);
						fetchCities(currentlySelected).then(data => {
							renderCities(data)
						})
					}
					if (removedSelected.length > 0) {
						console.log('removed', removedSelected);
						removeCities(removedSelected)
					}
					counties = countiesSelected
				}

			} else {
				if (counties.length === 1) {
					removeCities(counties[0])
				}
			}
		})

		$(".dropdownFunctionRow select").on('change', function() {
			// alert($(".dropdownFunctionRow select").val());
			let ddFuncVal = $(".dropdownFunctionRow select").val()
			switch (ddFuncVal) {
				case "Da":
					$(".variantsRow").slideDown(300)
					let vnId = $(".variableNameRow input").attr('data-id')
					if (vnId) {
						let varbl = new FormData()
						varbl.append('variableId', vnId)
						fetchVariants(varbl)
							.then(data => {
								renderVariants(data)
							})
					}
					break;

				case "Nu":
					$(".variantsRow").slideUp(300)
					$(".pfa-data-row").slideUp(300)
					$(".pfa-spec-row").slideUp(300)
					break;
				default:
					break;
			}
		})

		$("#addMoreNormaBtn").click(() => {
			let county = $("select[name=county_select]").val()[0]
			let city = $("#city_select").val()
			let caen = $("select[name=caen]").val()
			let norma = $("#normaField").val()
			let variable_frontend_name = $("input[name='variableFrontName']").val()
			let dd_func = $("#dd_func_select").val()
			let norma_venit_initiata = $("#nv_initiata").val()
			let nv_initiata_variant = $("input[name='variantsChosen']:checked").val()
			let optiune_standard_variable = $("#pfaDataVariable").val()
			let optiune_standard_variant = $("input[name='pfaDataOptiuneVarnt']:checked").val() ?? ''
			let exceptii_variable = $("#pfaDataExceptiiVarbl").val()
			let exceptii_variant = $("input[name='pfaDataExceptiiVarnt']:checked").val() ?? ''
			let factori_pentru_cresterea_variable = $("#factori_pentru_cresterea_variable").val()
			let factori_pentru_cresterea_variant = $("input[name='pfaSpecCrestVarnt']:checked").val()
			let factori_pentru_dimin_var = $("#pfaSpecDiminVarbl").val()
			let factori_pentru_dimin_variant = $("input[name='pfaSpecDiminVarnt']:checked").val()

			if (county !== '' && county !== null && county !== undefined) {
				if (city) {
					if (caen) {
						if (norma) {
							if (variable_frontend_name) {
								let arr = {};
								arr.personal_data_id = "<?= $_SESSION['personal_data_id'] ?>"
								arr.county = county
								arr.city = city
								arr.caen = caen
								arr.norma_de_venit = norma
								arr.variable_frontend_name = variable_frontend_name
								arr.da_nu_function_dropdown = dd_func
								if (dd_func === "Da") {
									arr.norma_venit_initiata = norma_venit_initiata
									arr.norma_venit_initiata_variant = nv_initiata_variant
									arr.optiune_standard_variable = optiune_standard_variable
									arr.optiune_standard_variant = optiune_standard_variant
									arr.exceptii_variable = exceptii_variable
									arr.exceptii_variant = exceptii_variant
									arr.factori_pentru_cresterea_variable = factori_pentru_cresterea_variable
									arr.factori_pentru_cresterea_variant = factori_pentru_cresterea_variant
									arr.factori_pentru_dimin_var = factori_pentru_dimin_var
									arr.factori_pentru_dimin_variant = factori_pentru_dimin_variant

								}
								arr.created_at = "<?= date("Y-m-d H:i:s") ?>"
								normaFinalArr.push(arr);
								addToTable(arr)
								resetNormaForm()
							}
						} else {
							toastr.warning('Please select CAEN code!')
						}
					} else {
						toastr.warning('Please select CAEN code!')
					}
				} else {
					toastr.warning('Please select city!')
				}
			} else {
				toastr.warning('Please select county!')
			}
		})

		$("#submitNormaBtn").click(() => {
			if (normaFinalArr.length > 0) {
				let $data = normaFinalArr

				submitNormaIncome($data)
			} else {
				toastr.warning('Please add income record!')
			}
		})

	});
</script>
<script>
	function addToTable(arr) {
		let $table = $("#incomesTable tbody")
		$("#default_row").remove();
		let $tr = `
				<tr>
					<td>${arr.county}</td>
					<td>${arr.city}</td>
					<td>${arr.caen}</td>
					<td>${arr.norma_de_venit}</td>
				</tr>
		`;

		$table.append($tr)
	}

	function resetNormaForm() {
		$("select[name='county_select']").selectpicker('val', '')
		$("#city_select option").remove();
		$("#city_select").selectpicker('refresh');
		$("#caen_select").selectpicker('val', '')
		$("#caen_select").prop('disabled', true)
		$("#caen_select").selectpicker('refresh')
		$("#normaField").val('')
		$(".hideThis").slideUp(300)
	}

	async function submitNormaIncome(data) {
		console.log(data);
		const url = "<?= base_url() ?>user/submitNormaIncome"

		addOverlay()

		$.ajax({
			type: 'POST',
			data: {
				income: data
			},
			url: url,
			success: function(data) {
				// console.log(data);
				if (data) {
					window.location.href = "<?= base_url() ?>user/normaInfoVerification"
				}
			}
		})
	}

	function showCitiesList(e) {
		// var counties = [];
		let countiesSelected = $(e.target).val()
		let citiesSelectElm = $(e.target).parents('.pfa_row').children(".pfa_city_col").children().find('select.city_select')
		// let citiesSelectElm = $('select.city_select:last')
		// alert(countiesSelected)
		// console.log(countiesSelected);

		if (countiesSelected.length > 0) {
			if (counties.length == 0) {
				counties = countiesSelected
				// console.log(counties[0]);
				fetchCities(counties).then(data => {
					renderCities(data)
				})
			} else {
				let removedSelected = ''
				let currentlySelected = countiesSelected.filter(x => !counties.includes(x))
				removedSelected = counties.filter(x => !countiesSelected.includes(x))
				if (currentlySelected.length > 0) {
					fetchCities(currentlySelected).then(data => {
						renderCities(data)
					})
				}
				if (removedSelected.length > 0) {
					removeCities(removedSelected)
				}
				counties = countiesSelected
			}

		} else {
			if (counties.length === 1) {
				removeCities(counties[0])
				counties = [];
			}
		}
		$(".county_select").selectpicker('refresh')
	}

	function showCaenList(e) {
		let citySelected = $(e.target).val()
		// alert(citySelected)
		if (citySelected !== '') {
			// console.log($(e.target).parents('.pfa_row').children(".pfa_caen_col").children().find('select.caen_select'))
			// $(e.target).parents('.pfa_row').children(".pfa_caen_col")
			$(e.target).parents('.pfa_city_col').next('input').val(citySelected);
			$(e.target).next('input[type=hidden]').val(citySelected)
			$(e.target).parents('.pfa_row').children(".pfa_caen_col").children().find('select.caen_select').removeAttr('disabled');
			$(e.target).parents('.pfa_row').children(".pfa_caen_col").children().find('select.caen_select').selectpicker('refresh')
		} else {
			$("#caen_select").attr('disabled', true);
		}
	}

	function showNormaIncome(e) {
		let county = $(e.target).parents('.pfa_row').children(".pfa_county_col").children().find("select.county_select").val();
		let city = $(e.target).parents('.pfa_row').children(".pfa_city_col").children().find("select.city_select").val();
		let caen = $(e.target).val();

		let form = new FormData();
		form.append('city', city);
		form.append('county', county);
		form.append('caen', caen);
		fetchNormaIncome(form)
			.then(data => showIncome(data))
	}

	async function fetchCities(county) {
		let countyList = county

		// static temparr = countyList
		const url = '<?= base_url() ?>user/fetchCitiesWithCounty'

		let data = new FormData()
		data.append('county', JSON.stringify(countyList))

		const response = await fetch(url, {
			method: "post",
			body: data
		})
		return response.json()
		// console.log(response.json());
	}

	function renderCities(data, elm = '') {

		data.cities.sort()
		if (elm !== '') {
			element = elm
		} else {
			element = $(".city_select:last")
		}
		if (element) {
			// console.log(element);
			data.cities?.forEach(city => {
				element.append('<option data-county="' + data.county + '">' + city + '</option>')
			});

			element.selectpicker('refresh')
		}
	}

	function removeCities(county) {
		if (county !== '') {
			$(`#city_select option[data-county="${county}"]`).remove()
			$("#city_select").selectpicker('refresh')
		}
	}

	async function fetchNormaIncome(data) {
		const url = '<?= base_url() ?>user/getNormaIncome'

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json()
	}

	function showIncome(data) {
		if(data !== 'error') {
			selectionData = data;
			if (data) {
				$("#normaField").val(data.normaIncome)
				if (data.variablesInfo?.variables[0]) {
					$(".variableNameRow").slideDown(300)
					$(".variableNameRow input").val(data.variablesInfo.variables[0].name)
					$(".variableNameRow input").attr('data-id', data.variablesInfo.variables[0].id)
				}
				if (data.variablesInfo?.variants) {
					// alert(data.variablesInfo?.variants.frontend_interaction)
					if (data.variablesInfo?.variants.frontend_interaction == '(Yes/No) Function dropdown') {
						$(".dropdownFunctionRow").slideDown(300)
					} else {
						$(".dropdownFunctionDateRow").slideDown(300)
					}
					if(data.variablesInfo?.variants.frontend_interaction == 'No special') {
						$(".noSpecialRow").slideDown(300)
					}
				}
			}
		}
		else {
			$("#normaField").after(`<div class="normaNotFound text-danger">No data found! Please contact admin</div>`)
			$(".normaNotFound").delay(3000).fadeOut(800)
		}
	}

	async function fetchVariants(data) {
		const url = '<?= base_url() ?>user/fetchVariants'

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json()
	}

	function renderVariants(data) {
		console.log(data)
		// console.log('variants data', data);
		// console.log('selection data', selectionData);
		$(".pfa-spec-row").slideDown(300)
		$(".pfa-data-row").slideDown(300)
		$("#nv_initiata").val(data.variants[0].name)
		switch (selectionData.variablesInfo.variants.interaction_with_variant) {
			case "Swatch":
				$(".swatchCol").slideDown(300)
				let pElm = $(".swatchCol .variant-selector")
				pElm.html('')

				data.variants.forEach(variant => {

					let temp = `
						<div class="selecotr-item">
							<input type="radio" id="variant${variant.variant_id}" name="variantsChosen" value="${variant.name_on_frontend}" class="selector-item_radio" checked>
							<label for="variant${variant.variant_id}" class="selector-item_label">${variant.name_on_frontend}</label>
							<i class="fa fa-info" title="${variant.tooltip}"></i>
						</div>
						`;

					pElm.append(temp)

				})

				break;

			case "List with checkbox":

				break;

			default:
				break;
		}

		renderPfaDataBlocks(data.pfa_data_vars)
		renderPfaSpecBlocks(data.pfa_spec_vars)

	}

	function renderPfaDataBlocks(data) {
		// console.log(data);
		$("#pfaDataVariable").val(data.variables[0].name)
		$("#pfaDataExceptiiVarbl").val(data.variables[0].name)
		let pElm = $(".pfaDataBlockVariants")
		let excptElm = $(".pfaDataExcptiiVarnts")
		pElm.html('')
		excptElm.html('')
		data.variants.forEach(variant => {
			if (variant.display_on_frontend == "Yes" || variant.display_on_frontend == "Always_Yes") {
				let templ = `
							<div class="selecotr-item">
								<input type="radio" id="radioOptiune${variant.id}" value="${variant.name_on_frontend}" name="pfaDataOptiuneVarnt" class="selector-item_radio">
								<label for="radioOptiune${variant.id}" class="selector-item_label">${variant.name_on_frontend}</label>
								<i class="fa fa-info" title="${variant.tooltip}"></i>
							</div>
				`;
				let templ2 = `
							<div class="selecotr-item">
								<input type="radio" id="radioExceptii${variant.id}" value="${variant.name_on_frontend}" name="pfaDataExceptiiVarnt" class="selector-item_radio">
								<label for="radioExceptii${variant.id}" class="selector-item_label">${variant.name_on_frontend}</label>
								<i class="fa fa-info" title="${variant.tooltip}"></i>
							</div>
				`;
				pElm.append(templ)
				excptElm.append(templ2)
			}
		})

	}

	function renderPfaSpecBlocks(data) {
		$("#factori_pentru_cresterea_variable").val(data.variables[0].name)
		$("#pfaSpecDiminVarbl").val(data.variables[0].name)
		let pElm = $(".pfaSpecCresterea_vrnts")
		let diminElm = $(".diminVarnts")
		pElm.html('')
		diminElm.html('')
		data.variants.forEach(variant => {
			// console.log(variant);
			if (variant.display_on_frontend == "Yes" || variant.display_on_frontend == "Always_Yes") {
				let templ = `
							<div class="selecotr-item">
								<input type="radio" id="radioCresterea${variant.id}" value="${variant.name_on_frontend}" name="pfaSpecCrestVarnt" class="selector-item_radio">
								<label for="radioCresterea${variant.id}" class="selector-item_label">${variant.name_on_frontend}</label>
								<i class="fa fa-info" title="${variant.tooltip}"></i>
							</div>
				`;
				let templ2 = `
							<div class="selecotr-item">
								<input type="radio" id="radioDimin${variant.id}" value="${variant.name_on_frontend}" name="pfaSpecDiminVarnt" class="selector-item_radio">
								<label for="radioDimin${variant.id}" class="selector-item_label">${variant.name_on_frontend}</label>
								<i class="fa fa-info" title="${variant.tooltip}"></i>
							</div>
				`;
				pElm.append(templ)
				diminElm.append(templ2)
			}
		})

	}
</script>
