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
		<form id="tmplateForm" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $template_info['id'] ?? '' ?>">
			<div class="card project-main pb-0">
				<div class="card-header">
					<button type="button" class="btn btn-primary btn-square">Add New Template</button>
				</div>
				<div class="card-body">
					<!-- <form class="border p-4 rounded"> -->
					<div class="row template_row">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Template Name</label>
								<input type="text" name="template_name" value="<?= $template_info['template_name'] ?? '' ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Select CAEN Code</label>
								<select class="default-select form-control" name="caen-column">
									<option>Select</option>
									<option selected>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>
					</div>
					<!-- </form> -->
				</div>
			</div>
			<div class="card project-main pb-0">
				<div class="card-header">
					<h4>Column Details</h4>
					<div class="d-flex align-items-center">
						<div class="addColErr me-3"></div>
						<button type="button" id="addColBtn" class="btn btn-primary btn-square">Add New Column</button>
					</div>
				</div>
				<div class="card-body">
					<div class="row city_row">
						<div class="col-2">
							<div class="form-group mb-2">
								<select class="default-select form-control" name="city_col">
									<option>Select</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row county_city_row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="from-group mb-3">
								<label class="form-label">Counties names</label>
								<select multiple name="county_name" data-live-search="true" class="default-select form-control wide">
									<?php if (!empty($county)) {
										foreach ($county as $c) { ?>
											<option><span class="c_name"><?= $c['county_name'] ?></span></option>
									<?php }
									} ?>
								</select>
							</div>
						</div>
						<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
							<div class="from-group mb-3">
								<div class="">
									<label class="form-label me-3">Cities list</label>
									<select multiple name="city_name" id="city_select" data-live-search="true" data-actions-box="true" class="default-select form-control wide">

									</select>
								</div>
								<div class="grid-view cities-grid d-none">
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check variant1">
											<span>Ballsh</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check variant2">
											<span>Corovode</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check variant3">
											<span>Bajram Curri</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check variant4">
											<span>Bulqize</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
											<span>Delvine</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
											<span>Bajze</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
											<span>Burrel</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
											<span>Berat</span>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
											<span>Cerrik</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12" id="countyCityErrRow">
							<div class="row">
								<div class="col-md-4">
									<div class="countyErr"></div>
								</div>
								<div class="col-md-4">
									<div class="cityErr"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row ">
						<div class="col-sm-10">
							<!-- <button type="submit" id="saveColBtn" class="btn btn-primary btn-square"> Save</button> -->
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<div class="table-responsive table-border mb-3">
								<table class="table" id="column_table">
									<thead>
										<tr>
											<th>Column Name</th>
											<th class="text-end">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($completed_columns)) {
											foreach ($completed_columns as $c) {
										?>
												<tr>
													<td><?= $c['column_name'] ?></td>
													<td class="text-end">
														<a href="javascript:void(0);" class="me-2 edt_col" data-id="<?= $c['id'] ?? '' ?>"><i class="las la-edit text-success"></i></a>
														<a href="javascript:void(0);" class="delete_col" onclick="deleteColumn(<?= $c['id'] ?? '' ?>)"><i class="las la-trash-alt text-danger"></i></a>
														<input class="compltd_col_id" type="hidden" name="completed_column_details_id[]" value="<?= $c['id'] ?? '' ?>">
													</td>
												</tr>
											<?php }
										} else { ?>
											<tr class="emptyCol">
												<td>No data found!</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="from-group mb-3 year_select_grp">
								<label class="form-label">Select Year</label>
								<select class="default-select form-control" name="yearForUpload">
									<option>Select</option>
									<?php
									for ($i = date('Y') - 2; $i < date('Y') + 100; $i++) {
										echo "<option>$i</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="from-group mb-3 func_select_grp">
								<label class="form-label">Import function</label>
								<select class="default-select form-control" name="func_select" id="attributeselector">
									<option>Select</option>
									<option value="Add">Add</option>
									<option value="Update">Update</option>
									<option value="Replace">Replace</option>
									<option value="Deactivate">Deactivate</option>
								</select>
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-between" id="file_upload_row">
						<div class="output d-flex">
							<div id="add" class="atribute column_csv_upload">
								<button type="button" class="btn btn-primary btn-square me-2">Upload Field</button>
								<input type="file" class="csv_upload_input" name="column_name" id="column_name">
							</div>
							<button class="btn uploadCancelBtn d-none">Cancel</button>
							<div id="upload" class="atribute">
							</div>
							<p class="csv-file-uploaded mb-0 lh-35 fw-bold"></p>
						</div>

						<button class="btn btn-primary btn-square"> Save</button>
					</div>
				</div>
			</div>
		</form>

		<?php
		// echo "<pre>";
		// print_r($template_info);
		// echo "</pre>";
		?>

		<div class="card project-main pb-0">
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 col-xs-12">
						<div class="table-responsive ">
							<table id="example" class="table table-border dataTable">
								<thead>
									<tr>
										<th>Template Name</th>
										<th>Counties Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="templt_tbl_body">

									<!-- <tr>
										<td>Lorem Ipsum</td>
										<td>Lorem Ipsum</td>
										<td>
											<div class="d-flex">
												<a href="javascript:void(0);" class="me-2"><i class="las la-edit text-success"></i></a>
												<a href="javascript:void(0);"><i class="las la-trash-alt text-danger"></i></a>
											</div>
										</td>
									</tr>
									 -->
									<tr>
										<td>No data found !</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End: Content body -->

<script>
	window.addEventListener('load', function() {
		var columnDetails = [];
		var currCounties = [];

		let jsonData = `<?= !empty($template_info) ? json_encode($template_info['col_details']) : '' ?>`
		// console.log(JSON.parse(jsonData));
		if (jsonData !== "") {
			jsonArr = JSON.parse(jsonData);

			renderColumns(jsonArr)
			let cc = [];
			jsonArr.forEach(el => {
				// console.log(el);
				el.counties_cities.forEach(countyCity => {
					cc.push([countyCity.county_name, countyCity.city_name])
				})
				columnDetails.push({
							'column_name': el.column_name,
							'counties_cities': cc,
						})
				cc = [];
			})
			// console.log(columnDetails);

			$("select[name='yearForUpload']").selectpicker('val', '2023')

		}

		$("select[name='county_name']").on("change", function() {
			let countySelected = $(this).val()
			fetchCities(countySelected).then(data => renderCitiesList(data))
			countySelected = ''
		})

		/**
		 * show file name on upload
		 */
		$('.csv_upload_input').change(function(evt) {
			if (evt.target.files) {
				$(".column_csv_upload").addClass('d-none');
				$(".uploadCancelBtn").removeClass('d-none');
				$("p.csv-file-uploaded").removeClass('d-none');
				$("p.csv-file-uploaded").text(evt.target.files[0].name);
				let ext = evt.target.files[0].name.split('.')[1]
				// console.log(ext);
				// if (ext === 'xlsx' || ext === 'xls') {
				// 	processXls(evt.target.files).then(data => console.log(data))
				// }
			}
		});

		let templateData = '<?= $templates ?? '' ?>'
		if (templateData) {
			templateData = JSON.parse(templateData)
			renderTemplates(templateData)
		}

		/**
		 * cancel file upload
		 */
		$('.uploadCancelBtn').click(function() {
			$(".column_csv_upload").removeClass('d-none');
			$(".uploadCancelBtn").addClass('d-none');
			$(".csv-file-uploaded").addClass('d-none');
			$('.csv_upload_input').val('');
		})


		/**
		 * submit template form
		 */
		$("#tmplateForm").submit((e) => {
			e.preventDefault();
		}).validate({
			rules: {
				template_name: {
					required: true,
				},

			},
			submitHandler: form => {
				let template_name = $("input[name='template_name']").val()
				let caenCol = $("select[name='caen-column']").val()
				let columns = JSON.stringify(columnDetails)
				let year = $("select[name='yearForUpload']").val()
				let func = $("select[name='func_select']").val()
				let xlsFile = $(".csv_upload_input").prop('files')
				let id = $("#tmplateForm input[name='id']").val()

				if (caenCol !== 'Select' && caenCol >= 1 && caenCol <= 10) {
					if (columnDetails.length > 0) {
						if (year !== "Select") {
							if (func !== "Select") {
								if (xlsFile.length > 0) {
									// alert('submit')
									// console.log(columnDetails);

									let data = new FormData()
									data.append('id', id)
									data.append('template_name', template_name)
									data.append('caen_column', caenCol)
									data.append('columnDetails', columns)
									data.append('year', year)
									data.append('function', func)
									data.append('xlsx_file', xlsFile[0])

									// alert("submit")
									submitTemplate(data)
										.then(data => {
											if (data == 'success') {
												window.location.href = '<?= base_url() ?>admin/savedTemplateSuccess'
											} else {
												toastr.error("Something went wrong");
											}
										})

								} else {
									$("#file_upload_row").after(`<span class="text-danger text-center mt-4" id="caen_col_err">Please select file.</span>`)
									setTimeout(() => {
										$("#caen_col_err").fadeOut(800)
										$("#caen_col_err").remove()
									}, 3000)
								}
							} else {
								$(".func_select_grp").after(`<span class="text-danger text-center mb-4" id="caen_col_err">Please select function.</span>`)
								setTimeout(() => {
									$("#caen_col_err").fadeOut(800)
									$("#caen_col_err").remove()
								}, 3000)
							}

						} else {
							$(".year_select_grp").after(`<span class="text-danger text-center mb-4" id="caen_col_err">Please select year.</span>`)
							setTimeout(() => {
								$("#caen_col_err").fadeOut(800)
								$("#caen_col_err").remove()
							}, 3000)
						}
					} else {
						$("#addColBtn").focus()
						$(".addColErr").html(`<span class="text-danger err">Please add column</span>`);
						$(".err").delay(3000).fadeOut(800).remove(3800)
					}
				} else {
					$("select[name='caen-column']").focus()
					$(".template_row").after(`<p class="text-center text-danger err">Please select CAEN column!</p>`);
					$(".err").delay(3000).fadeOut(800).remove(3800)
				}
			}
		})

		/**
		 * delete template
		 */
		$('.deleteTemplateBtn').on('click', function() {
			// alert($(this).data('id'));
			let id = $(this).data('id')
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
					var colId = id
					var deleteData = {
						"id": colId
					}
					// alert(deleteData)
					var url = '<?= base_url() ?>admin/deleteTemplateById'
					$.ajax({
						url: url,
						method: "POST",
						data: deleteData,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'Template has been deleted successfully.',
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
		})

		$("#addColBtn").click(() => {
			let colNo = $(`select[name="city_col"]`).val()
			let county = $(`select[name="county_name"]`).val()
			let cities = $(`select[name="city_name"]`).val()
			// console.log('cities', cities);
			// alert(colNo)
			let countyCities = [];
			if (colNo >= 1 && colNo <= 10) {
				if (county.length > 0) {
					if (cities.length > 0) {
						// columnDetails.push({
						// 	'column_name': colNo,
						// 	'county_name': county,
						// 	'city_name': cities
						// })
						// console.log('Columns ====>',columnDetails);
						$.each($("#city_select option:selected"), (index, obj) => {
							countyCities.push([obj.getAttribute('data-county'), obj.value])
						})

						columnDetails.push({
							'column_name': colNo,
							'counties_cities': countyCities,
						})
						// console.log('Columns ====>',columnDetails);

						addColumnToTable(columnDetails)
					} else {
						showMsg($(`.cityErr`), 'Select city please!')
					}
				} else {
					showMsg($(`.countyErr`), 'Select county please!')
				}
			} else {
				showMsg($(`.city_row`), 'Select column please!')
			}
		})

		$(".dltColBtn").click((event) => {
			columnName = $(event.target).attr('data-colname')
			console.log(columnDetails);
			for (let i = 0; i < columnDetails.length; i++) {
				if (columnName === columnDetails[i].column_name) {
					columnDetails.splice(i, 1);
				}
			}
			renderColumns(columnDetails)

		})
		
		$(".edtColBtn").click((event) => {
			// alert()
			columnName = $(event.target).attr('data-colname')
			// alert(columnName)
			// console.log(columnDetails[0].counties_cities);
			for (let i = 0; i < columnDetails.length; i++) {
				if (columnName === columnDetails[i].column_name) {
					// console.log(columnDetails[i]);
					$("select[name='city_col']").selectpicker('val',columnName)
					let coun = ''
					let cit = []
					columnDetails[i].counties_cities.forEach(c => {
						if(c[0] != coun) {
							coun = c[0];
							$("select[name='county_name']").selectpicker('val', coun)
							fetchCities([coun]).then(data => renderCitiesList(data))
							cit.push(c[1])
						}
						else {
							cit.push(c[1])
						}
					})
					setTimeout(() => {
						$("#city_select").selectpicker('val',cit)
					}, 1000)
					columnDetails.splice(i, 1);
				}
			}
			renderColumns(columnDetails)

		})

	});
</script>
<script>
	function removeColumn(columnName) {
		// alert(columnName)
		console.log(columnDetails);
		for (let i = 0; i < columnDetails.length; i++) {
			if (columnName === columnDetails[i].column_name) {
				alert(columnName)
				// columnDetails.splice(i, 1);
			}
		}
		// renderColumns(columnDetails)
	}
	/**
	 * delete column
	 */
	function deleteColumn(id) {
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
				var colId = id
				var deleteData = {
					"id": colId
				}
				// alert(deleteData)
				var url = '<?= base_url() ?>admin/deleteColumnDetailsById'
				$.ajax({
					url: url,
					method: "POST",
					data: deleteData,
					success: function(response) {
						Swal.fire(
							'Deleted!',
							'Column has been deleted successfully.',
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
	}

	function resetColumnFields() {
		$(`select[name="city_col"]`).selectpicker('val', '')
		$(`select[name="county_name"]`).selectpicker('val', '')
		$(`select[name="city_name"]`).selectpicker('val', '')
		$(`select[name="city_name"] option`).remove()
		$(`select[name="city_name"]`).selectpicker('refresh')
	}

	function addColumnToTable(details) {
		// console.log(details);
		let tableElm = $("#column_table")
		let template = `
			<tr>
				<td class="ms-lg-3">${details[details.length - 1].column_name}</td>
				<td class="text-end d-flex justify-content-end">
					<a class="edtColBtn me-2 edt_col" href="javascript:void(0);"><i class="las la-edit text-success" data-colname="${details[details.length - 1].column_name}"></i></a>
					<a class="dltColBtn" href="javascript:void(0);"><i class="las la-trash-alt text-danger" data-colname="${details[details.length - 1].column_name}"></i></a>
				</td>
			</tr>
		`;
		$(".emptyCol").remove()
		tableElm.append(template)

		resetColumnFields()
	}

	function showMsg(el, msg) {
		$(el).after(`<label class="errorMsg text-danger mb-3">${msg}</label>`)
		$('label.errorMsg').delay(3000).fadeOut(800)
		setTimeout(() => {
			$('label.errorMsg').remove()
		}, 3800);
	}

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

	function renderCitiesList(data) {
		// console.log(data.cities);
		data.cities.sort()
		let element = $("#city_select")
		if (element) {
			// console.log(element);
			data.cities?.forEach(city => {
				element.append('<option data-county="' + data.county + '">' + city + '</option>')
			});

			element.selectpicker('refresh')
		}
	}

	async function processXls(data) {
		const url = '<?= base_url() ?>admin/process_income_norms'
		let body = data

		const response = await fetch(url, {
			method: 'POST',
			body: body
		})

		// console.log(response);
		return response.json();

	}

	async function uploadExcelData(data) {
		let url = '<?= base_url() ?>admin/uploadColumnExcel'

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json();
	}

	async function submitTemplate(data) {
		addOverlay()
		let url = '<?= base_url() ?>admin/updateIncomeNormTemplate'

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json()
	}

	function renderTemplates(data) {
		console.log(data);
		let count = 0;
		let tr = ''
		let tbl = $("#templt_tbl_body")
		let newArr = [];
		Object.values(data).forEach(item => {
			let temp = [];
			// console.log(item);
			if (newArr.length > 0) {
				let lastItem = newArr[newArr.length - 1]
				// console.log(lastItem);
				if (item.templt_pkey != lastItem.template_id) {
					temp['template_id'] = item.templt_pkey
					temp['template_name'] = item.template_name
					temp['county_name'] = [item.county_name]
					newArr.push(temp)
				} else {
					if (item.county_name != lastItem.county_name[lastItem.county_name.length - 1]) {
						newArr[newArr.length - 1].county_name.push(item.county_name)
					}
				}
			} else {
				temp['template_id'] = item.templt_pkey
				temp['template_name'] = item.template_name
				temp['county_name'] = [item.county_name]
				newArr.push(temp)
			}
		})
		if (newArr.length > 0) {
			tbl.html('')
			newArr.forEach(template => {
				let tr = `
							<tr>
		 						<td>${template.template_name}</td>
		 						<td class='counties'>${template.county_name.map(county => `<span>${county}</span>`)}</td>
		 						<td>
		 							<div class="d-flex">
		 								<a href="<?= base_url() ?>admin/view_template/${template.template_id}" class="me-2" data-id="${template.template_id}"><i class="las la-edit text-success"></i></a>
		 								<a href="javascript:void(0);" class="deleteTemplateBtn" data-id="${template.template_id}"><i class="las la-trash-alt text-danger"></i></a>
		 							</div>
		 						</td>
		 					</tr>
						`;
				tbl.append(tr)
			})
		}

	}

	function renderColumns(cols) {
		// console.log(cols);
		let tableElm = $("#column_table tbody")
		tableElm.html('')


		cols.forEach(col => {
			let template = `
			<tr>
				<td class="ms-lg-3">${col.column_name}</td>
				<td class="text-end d-flex justify-content-end col-btn-td">
					<a class="edtColBtn me-2 edt_col" href="javascript:void(0);"><i class="las la-edit text-success" data-colname="${col.column_name}"></i></a>
					<a class="dltColBtn" href="javascript:void(0);"><i class="las la-trash-alt text-danger" data-colname="${col.column_name}"></i></a>
				</td>
			</tr>
			`;
			tableElm.append(template)
		})
	}
</script>
