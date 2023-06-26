<!--Start: Page main heading -->
<div class="container-fluid page-sub-head d-md-block d-none">
	<div class="d-flex flex-nowrap justify-content-between align-items-center">
		<div class="100%">
			<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
			<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
		</div>

	</div>
</div>
<!--End: Page main heading -->

<!--Start: Content body -->
<div class="content-body content-area-scroll">
	<div class="container-fluid">
		<form id="coefForm" action="" method="post">
			<input type="hidden" name="id" id="coeff_id" value="<?= $editCoeff['coeff_details']['id'] ?? '' ?>">
			<div class="card project-main pb-0">
				<div class="card-header">
					<button type="button" class="btn btn-primary btn-square">Add New Variable</button>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Variable Name</label>
								<input type="text" name="coef_var_name" id="coef_var_name" value="<?= $editCoeff['coeff_details']['coef_name'] ?? '' ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Select any, both or none</label>
								<div class="mt-2">
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue check-country" value="1" onchange="valueChanged()">Counties list
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue check-CAEN" value="1" onchange="valueChanged1()">CAEN list
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 check-country-list">
							<div class="row">
								<div class="col-sm-6 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label">Counties List</label>
										<select name='county_name[]' id="county_select" multiple data-live-search="true" data-actions-box="true" class="default-select form-control wide">
											<?php if (!empty($county)) {
												foreach ($county as $c) { ?>
													<option><span class="c_name"><?= $c['county_name'] ?></span></option>
											<?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label me-3">Cities list</label>
										<select multiple name="city_names[]" id="city_select" data-live-search="true" data-actions-box="true" class="default-select form-control wide">

										</select>
										<!-- <div class="grid-view">
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Ballsh</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Ballsh</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Corovode</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Bajram Curri</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Bulqize</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Delvine</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Bajze</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Burrel</span>
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input form-check-inputblue city-check" value="">
													<span>Delvine</span>
												</label>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-8 col-xs-12 check-cean-list">
							<div class="from-group mb-3">
								<div class="d-flex ">
									<div class="" style="max-width: 250px;">
										<label class="form-label me-3">CAEN list</label>
										<select multiple name="caen_codes[]" id="caen_select" data-live-search="true" data-actions-box="true" class="default-select form-control wide">
											<?php
											if (!empty($caen)) {
												foreach ($caen  as $c) { ?>
													<option><?= $c['code'] ?></option>
											<?php }
											}
											?>
											<!-- <option>1366</option>
											<option>2160</option>
											<option>1024</option>
											<option>1600</option>
											<option>1980</option>
											<option>1280</option> -->
										</select>
									</div>
								</div>
								<div class="grid-view d-none">
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>1234</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>1232</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>1233</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>2233</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>2356</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>3215</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>2222</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>2202</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue caen-check">
											<span>2023</span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-g-4 col-md-4 col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">Variables</label>
								<select class="default-select form-control wide mb-3" id="varSelect" name="variables_list[]" multiple>
									<?php
									if (!empty($variables)) {
										foreach ($variables as $var) { ?>
											<option value="<?= $var['id'] ?>"><?= $var['name'] ?></option>
									<?php }
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Variants</label>
								<select class="default-select form-control wide mb-3" id="variantsSelect" name="variants_list[]" multiple>

								</select>
								<!-- <div class="d-flex">
									<label class="form-label me-3">Variants</label>
								</div> -->
								<!-- <div class="grid-view">
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
								</div> -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">Value</label>
								<input type="text" name="coef_value" id="coef_value" value="<?= $editCoeff['coeff_details']['coef_value'] ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="form-label">Variables</label>
								<select class="default-select form-control wide mb-3" id="coef_var_dropdown" name="coef_variables_dropdown">
									<option>Decrease</option>
									<option>Increase </option>
								</select>
							</div>
						</div>
					</div>

					<div class="row ">
						<div class="col-sm-10">
							<button id="saveCoefFormBtn" class="btn btn-primary btn-square"> Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>



		<div class="card project-main pb-0">
			<div class="card-body">
				<div class="table-responsive ">
					<table id="example" class="table table-border dataTable">
						<thead>
							<tr>
								<th>Variable Name</th>
								<th>Counties List</th>
								<th>CAEN List</th>
								<th>Variables</th>
								<th>Variants</th>
								<th>Value</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($coefficients)) {
								foreach ($coefficients as $c) { ?>

									<tr>
										<td><?= $c['coeff_details']['coef_name'] ?? ''  ?></td>
										<td>
											<?php
											if (!empty($c['coeff_details']['county_details'])) {
												foreach ($c['coeff_details']['county_details'] as $county) {
													echo $county['county_name'] . ', ';
												}
											} else {
												echo "No county details selected.";
											}
											?>
										</td>
										<td class="limit-text">
											<?php
											if (!empty($c['coeff_details']['caen_details'])) {
												foreach ($c['coeff_details']['caen_details'] as $caen) {
													echo $caen['caen_code'] . ', ';
												}
											} else {
												echo "No CAEN code selected.";
											}
											?>
										</td>
										<td>
											<?php
											if (!empty($c['coeff_details']['variables'])) {
												foreach ($c['coeff_details']['variables'] as $v) {
													echo $v['name'] . ', ';
												}
											} else {
												echo "No variable selected.";
											}
											?>
										</td>
										<td>
											<?php
											if (!empty($c['coeff_details']['variants'])) {
												foreach ($c['coeff_details']['variants'] as $v) {
													echo $v['name'] . ', ';
												}
											} else {
												echo "No variable selected.";
											}
											?>
										</td>
										<td><?= $c['coeff_details']['coef_value'] ?? '' ?></td>
										<td class="text-end ">
											<div class="d-flex">
												<a href="<?= base_url() ?>admin/editCoeff/<?= $c['coeff_details']['id'] ?>" class="me-2"><i class="las la-edit text-success"></i></a>
												<a href="javascript:void(0);" class="me-2" onclick="deleteCoeff(<?= $c['coeff_details']['id'] ?>)"><i class="las la-trash-alt text-danger"></i></a>
												<a href="<?= base_url() ?>admin/editCoeff/<?= $c['coeff_details']['id'] ?>"><i class="las la-eye text-primary"></i></a>
											</div>
										</td>
									</tr>
							<?php }
							} else {
								echo "
										<tr>
											<td>No data found!</td>
										</tr>
									";
							}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- End: Content body -->
<script src="<?= base_url() ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script>
	var variables = [];
	window.addEventListener('load', function() {
		$("#county_select").on("change", function() {
			let countySelected = $(this).val()
			// alert(countySelected)
			if (countySelected.length > 0) {
				fetchCities(countySelected).then(data => renderCitiesList(data))
			} else {
				$("#city_select").html('')
				$("#city_select").selectpicker('refresh')
			}
		})
		<?php
		if (!empty($editCoeff)) {
			if (!empty($editCoeff['coeff_details']['variables'])) {
				$var_arr = [];
				foreach ($editCoeff['coeff_details']['variables'] as $v) {
					array_push($var_arr, $v['variable_id']);
				}
				$var_arr = json_encode($var_arr); ?>
				// console.log(JSON.parse('<?= $var_arr ?>'));
				variables = JSON.parse('<?= $var_arr ?>');
				$("#varSelect").selectpicker('val', JSON.parse('<?= $var_arr ?>'));

				JSON.parse('<?= $var_arr ?>').forEach(variable => {
					fetchVariables(variable)
						.then(data => {
							renderVariants(data)
						})
						.finally(() => {
							<?php
							$varnt_arr = [];
							foreach ($editCoeff['coeff_details']['variants'] as $v) {
								array_push($varnt_arr, $v['variant_id']);
							}
							$varnt_arr = json_encode($varnt_arr);
							?>
							$("#variantsSelect").selectpicker('val', JSON.parse('<?= $varnt_arr ?>'));
						})
				});
		<?php	}
		}
		?>

		<?php
		if (!empty($editCoeff['coeff_details']['coef_option'])) { ?>
			$("#coef_var_dropdown").selectpicker('val', '<?= $editCoeff['coeff_details']['coef_option'] ?? '' ?>')
		<?php } ?>

		/**
		 * select the counties 
		 */
		<?php
		if (!empty($editCoeff['coeff_details']['county_details'])) {
			$county_arr = []; ?>
			$(".check-country").prop('checked', true)
			<?php foreach ($editCoeff['coeff_details']['county_details'] as $county) {
				array_push($county_arr, $county['county_name']);
			}
			$county_arr = json_encode($county_arr); ?>
			$(".check-country").change()
			$("#county_select").selectpicker('val', JSON.parse('<?= $county_arr ?>'));

			JSON.parse('<?= $county_arr ?>').forEach(county => {
				// console.log(county);
				fetchCitiesByCounty(county)
					.then(data => {
						renderCitiesList(data)
						<?php
						$cities_arr = [];
						foreach ($editCoeff['coeff_details']['cities_details'] as $city) {
							array_push($cities_arr, $city['city_name']);
						}
						$cities_arr = json_encode($cities_arr);
						?>
						$("#city_select").selectpicker('val', JSON.parse('<?= $cities_arr ?>'));
					})
			});
		<?php }
		?>
		
		/**
		 * select the CAEN codes 
		 */
		<?php
		if (!empty($editCoeff['coeff_details']['caen_details'])) {
			$caen_arr = []; ?>
			$(".check-CAEN").prop('checked', true)
			<?php foreach ($editCoeff['coeff_details']['caen_details'] as $caen) {
				array_push($caen_arr, $caen['caen_code']);
			}
			$caen_arr = json_encode($caen_arr); ?>
			$(".check-CAEN").change()
			$("#caen_select").selectpicker('val', JSON.parse('<?= $caen_arr ?>'));
		<?php }
		?>
	})

	$('#varSelect').on('change', function() {
		let varblSelctd = $(this).val()
		console.log("changed",varblSelctd);
		if (varblSelctd.length > 0) {
			if (variables.length == 0) {
				alert('first value')
				variables = varblSelctd
				fetchVariables(variables[0]).then(data => {
					renderVariants(data)
					// console.log(data);
				})
			} else {
				// console.log('existing variables', variables);
				// console.log('selected variables', varblSelctd);
				let removedSelected = ''
				let currentlySelected = varblSelctd.filter(x => !variables.includes(x))
				removedSelected = variables.filter(x => !varblSelctd.includes(x))
				if (currentlySelected.length > 0) {
					// console.log('current', currentlySelected);
					fetchVariables(currentlySelected).then(data => {
						// console.log(data);
						renderVariants(data)
					})
				}
				if (removedSelected.length > 0) {
					// console.log('removed', removedSelected)
					removeVariants(removedSelected)
				}
				// console.log('Selected => ' + currentlySelected);
				// console.log('Removed => ' + removedSelected);
				variables = varblSelctd
			}

		} else {

		}
	})

	/**
	 * Submit form
	 */
	$("#coefForm").submit(function(e) {
		e.preventDefault();
	}).validate({
		rules: {
			coef_var_name: {
				required: true,
			},
			"variables_list[]": {
				required: true,
			},
			"variants_list[]": {
				required: true,
			},
			coef_value: {
				required: true,
			},
			coef_variables_dropdown: {
				required: true,
			},
		},
		submitHandler: function(form) {
			addOverlay()
			let countyCity = [];
			let caen = [];
			let varblVarnt = [];
			let coef_id = $("#coeff_id").val()
			let coef_name = $("#coef_var_name").val()
			let coef_value = $("#coef_value").val()
			let coef_option = $("#coef_var_dropdown").val()

			$.each($("#city_select option:selected"), function(index, obj) {
				countyCity.push([obj.getAttribute('data-county'), obj.value])
			})

			$.each($("#caen_select option:selected"), function(index, obj) {
				caen.push(obj.value)
			})

			$.each($("#variantsSelect option:selected"), function(index, obj) {
				// let arr = [];
				// arr['variable_id'] = obj.getAttribute('data-vrbl')
				// arr['variant_id'] = obj.value
				varblVarnt.push({
					'variable_id': obj.getAttribute('data-vrbl'),
					'variant_id': obj.value
				})
			})

			// console.log('Counties & cities' ,countyCity);
			// console.log('CAEN' ,caen);
			// console.log('Variables & Variants', varblVarnt);
			// console.log('Coef Variable Name ===' ,coef_name);
			// console.log('Coef Value ===' ,coef_value);
			// console.log('Coef Option ===' ,coef_option);

			// console.log(JSON.stringify(varblVarnt));


			let saveData = new FormData();
			saveData.append('id', coef_id)
			saveData.append('coef_name', coef_name)
			saveData.append('coef_value', coef_value)
			saveData.append('coef_option', coef_option)
			saveData.append('variable_variants', JSON.stringify(varblVarnt))
			saveData.append('caen', JSON.stringify(caen))
			saveData.append('county_cities', JSON.stringify(countyCity))

			saveCoefDetails(saveData).then(data => {
				if (data == 'success') {
					window.location.href = '<?= base_url() ?>admin/coeffUpdatedSuccess'
				}
			})


		}
	})

	// Code for using hide and show on checked

	$(".check-country-list").hide();

	function valueChanged() {
		if ($('.check-country').is(":checked"))
			$(".check-country-list").show();
		else
			$(".check-country-list").hide();
	};


	$(".check-cean-list").hide();

	function valueChanged1() {
		if ($('.check-CAEN').is(":checked"))
			$(".check-cean-list").show();
		else
			$(".check-cean-list").hide();
	};

	// code for using select all checkbox 

	var selectAllItems = "#select-all";
	var checkboxItem = ".variant-check";

	$(selectAllItems).click(function() {

		if (this.checked) {
			$(checkboxItem).each(function() {
				this.checked = true;
			});
		} else {
			$(checkboxItem).each(function() {
				this.checked = false;
			});
		}
	});

	// code for using select all CAEN checkbox 

	var selectAllCAEN = '#select-all1';
	var checkCAEN = ".caen-check";

	$(selectAllCAEN).click(function() {

		if (this.checked) {
			$(checkCAEN).each(function() {
				this.checked = true;
			});
		} else {
			$(checkCAEN).each(function() {
				this.checked = false;
			});
		}
	});

	// code for using select all Cities checkbox 

	var selectAllCity = '#select-all2';
	var checkCity = ".city-check";

	$(selectAllCity).click(function() {

		if (this.checked) {
			$(checkCity).each(function() {
				this.checked = true;
			});
		} else {
			$(checkCity).each(function() {
				this.checked = false;
			});
		}
	});

	async function fetchCities(county) {
		let countyList = county
		// static temparr = countyList
		const url = '<?= base_url() ?>county/fetchCitiesWithCounty'

		let data = new FormData()
		data.append('county', JSON.stringify(countyList))

		const response = await fetch(url, {
			method: "post",
			body: data
		})
		return response.json()
		// console.log(response.json());
	}

	async function fetchCitiesByCounty(county) {
		let countyList = [];
		countyList.push(county);
		// static temparr = countyList
		const url = '<?= base_url() ?>county/fetchCitiesWithCounty'

		let data = new FormData()
		data.append('county', JSON.stringify(countyList))

		const response = await fetch(url, {
			method: "post",
			body: data
		})
		return response.json()
		// console.log(response.json());
	}

	function renderCitiesList(data) {
		console.log(data);
		data.cities.sort()
		let element = $("#city_select")
		if (element) {
			data?.cities?.forEach(city => {
				element.append(`<option data-county="${data.county}">${city}</option>`)
			});
			element.selectpicker('refresh')
		}
	}

	async function fetchVariables(var_id) {
		const url = '<?= base_url() ?>admin/fetchVariants'
		console.log("variable id",var_id);
		let data = new FormData();
		data.append('variable_id', var_id);

		const response = await fetch(url, {
			method: 'POST',
			body: data
		});

		return response.json()
	}

	function renderVariants(data) {
		// console.log(data);
		let element = $('#variantsSelect')
		if (element) {
			data?.forEach(variant => {
				element.append(`<option data-vrbl="${variant.variable_id}" value="${variant.id}">${variant.name}</option`)
			});
			element.selectpicker('refresh')
		}
	}

	function removeVariants(variableId) {
		let slctElement = $("#variantsSelect")
		let optionElement = $(`#variantsSelect option[data-vrbl="${variableId}"]`)
		optionElement.remove();
		slctElement.selectpicker('refresh')
	}

	async function saveCoefDetails(data) {
		const url = '<?= base_url() ?>admin/updateCoef'

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json()
	}

	function deleteCoeff(coeff_id) {
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
				var deleteData = {
					"id": coeff_id
				}
				// alert(deleteData)
				var url = '<?= base_url() ?>admin/deleteCoeffById'
				$.ajax({
					url: url,
					method: "POST",
					data: deleteData,
					success: function(response) {
						Swal.fire(
							'Deleted!',
							'Coefficient variable has been deleted successfully.',
							'success'
						);
						setTimeout(() => {
							window.location.href = '<?= base_url() ?>admin/correction_coefficients';
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
	}
</script>
