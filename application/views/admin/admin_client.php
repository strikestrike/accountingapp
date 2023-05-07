<style>
	.project-main2 .table thead th {
		width: auto;
		font-size: 14px;
	}

	.project-main2 .table tbody td {
		font-size: 14px;
	}

	#clientsTable_filter {
		display: none;
	}

	#clientsTable_length {
		display: none;
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
			<div class="card-action card-tabs card-tabs2 w-100 d-md-block d-none" >
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
									<div class="row">
										<div class="col-md-4 col-xs-12">
											<div class="form-group">
												<label>Name</label>
												<input id="search_name" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-4 col-xs-12">
											<div class="form-group">
												<label>CNP</label>
												<input id="search_cnp" type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="d-flex justify-content-end align-items-center">
										<!-- <p class="mb-0 small">Add at least 1 user to start the process</p> -->
										<a class="btn btn-primary text-nowrap d-none" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> Apply Filter</a>
									</div>
									<div class="table-responsive mt-4">
										<table class="table table-responsive-sm" id="clientsTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>CNP</th>
													<th>Personal Data</th>
													<th>Declaration&nbsp;Data</th>
													<th>Delete</th>
													<!-- <th class="text-center">Actions</th> -->
												</tr>
											</thead>
											<tbody>
												<?php
												// echo "<pre>";
												// print_r($clients);
												// echo "</pre>";
												if (!empty($clients)) {
													foreach ($clients as $key => $value) { ?>
														<tr>
															<td><?= $value['name'] ?></td>
															<td><?= $value['personal_number'] ?></td>
															<td><a href="<?= base_url('admin/clientPersonalData/' . $value['id']) ?>" class="btn btn-warning shadow btn-xs1 sharp1 me-1" title="Edit Personal Data" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></a></td>
															<td>
																<div class="d-flex flex-row">
																	<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1" title="View Declaration Data" data-id="<?= $value['id'] ?>"><i class="fas fa-eye"></i></a>
																	<a href="<?= base_url('admin/clientDeclarationData/' . $value['id']) ?>" class="btn btn-warning shadow btn-xs1 sharp1 me-1" title="Edit Declaration Data" data-id="<?= $value['id'] ?>"><i class="fas fa-edit"></i></a>
																</div>
															</td>
															<td><a href="javascript:void(0);" class="btn btn-danger shadow btn-xs1 sharp1 me-1 deleteClientBtn" title="Delete Data" data-id="<?= $value['id'] ?>"><i class="fas fa-trash"></i></a></td>
														</tr>
												<?php
													}
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

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
		<div class="project-main2">

			<span class="arrow-up-back"></span>
			<span class="arrow-up"></span>

			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control">
			</div>
			<div class="form-group">
				<label>CNP</label>
				<input type="text" class="form-control">
			</div>
			<div class="">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)">Apply filter</a>
			</div>
			<br>
			<div class="form-group">
				<h5>Name</h5>
				<p>Lonionesou</p>
			</div>
			<hr>
			<div class="form-group">
				<h5>Personal no</h5>
				<p>12345 468/4683</p>
			</div>
			<hr>

			<div class="d-flex justify-content-between align-items-center">
				<div class="form-group">
					<a class="btn btn-primary">Edit Personal</a>
					<a class="btn btn-primary">Edit Declaration Data</a>
					<a class="btn btn-primary">View Declaration</a>
					<a class="btn btn-danger">Delete</a>
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



<!-- Modal Start: Add Project -->
<div class="modal fade" id="addrental">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Rental </h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">

				<form id="rentalForm" action="<?= base_url('admin/editPersonalData') ?>" method="POST">
					<input type="text" name="id" id="pDataIdHidden" hidden>
					<div class="form-group">
						<div class="row align-items-center">
							<div class="col-sm-4">
								<label class="text-black col-form-label">Salutation</label>
							</div>
							<div class="col-sm-8">
								<div class="salutation-group">
									<label class="radio-inline me-3"><input type="radio" id="mr" name="salutation" <?= !empty($personal_data['salutation']) ? ($personal_data['salutation'] == 'Mr' ? 'checked' : '') : '' ?> value="Mr" required> Mr</label>
									<label class="radio-inline me-3"><input type="radio" id="mrs" name="salutation" <?= !empty($personal_data['salutation']) ? ($personal_data['salutation'] == 'Mrs' ? 'checked' : '') : '' ?> value="Mrs" required> Mrs</label>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Name Surname<span style="color:red; font-size: 12px">
								*</span></label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="personalData_name" name="name" placeholder="Name" required>
							</div>
							<div class="col-sm-6 mt-2 mt-sm-0">
								<input type="text" class="form-control" id="personalData_surname" name="surname" placeholder="Surname" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Personal Number<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="number" class="form-control" id="personalData_personal_number" name="personal_number" placeholder="Personal Number of 13 digits" required>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Mobile Number<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="number" class="form-control" id="personalData_mobile_number" name="mobile_number" placeholder="Personal Number of 13 digits" required>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">National Id Data<span style="color:red; font-size: 12px">
								*</span></label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="personalData_national_id_code" name="national_id_code" placeholder="ID of 2 letters" minlength="2" maxlength="2" required>
							</div>
							<div class="col-sm-6 mt-2 mt-sm-0">
								<input type="number" class="form-control" id="personalData_national_id_number" name="national_id_number" placeholder="Number of 6 digits" minlength="6" maxlength="6" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Birthday<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="Date" name="dob" class="datepicker-default form-control" id="personalData_dob" required>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Address<span style="color:red; font-size: 12px">
								*</span></label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="personalData_address_city" name="city" placeholder="City" required>
							</div>
							<div class="col-sm-6 mt-2 mt-sm-0">
								<input type="text" class="form-control" id="personalData_address_area" name="area" placeholder="Area" required>
							</div>
							<div class="col">
								<input type="text" class="form-control" id="personalData_address_other" name="address_other_details" placeholder="Street/landmark, house no." required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
						<button type="submit" value="submit" class="btn btn-primary">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal End: Add Project -->

<script>
	function confirmation() {
		var result = confirm("Are you sure to delete?");
		if (result) {
			// Delete logic goes here
		}
	}
	window.addEventListener('load', () => {

		var table = $('#clientsTable').DataTable();
		$("#search_name").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})
		$("#search_cnp").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})
		/**
		 * display edit form for updating rental
		 */
		$(".edit-pdata-btn").on('click', (e) => {
			e.preventDefault();
			if ($(e.target).attr("data-id") !== "") {
				var id = $(e.target).attr("data-id");
				var data = {
					"id": id
				}
				var url = 'getPersonalDataById'
				$.ajax({
					url: url,
					method: "POST",
					data: data,
					success: function(response)

					{
						$("#addrental").modal('show');
						$(".modal-title").text("Edit Personal Data");
						var rate = JSON.parse(response);
						console.log(rate);
						$("#pDataIdHidden").val(rate.id)
						if (rate.salutation == 'Mr')
							$("#mr").prop("checked", true);
						if (rate.salutation == 'Mrs')
							$("#mrs").prop("checked", true);
						$("#personalData_name").val(rate.name);
						$("#personalData_surname").val(rate.surname);
						$("#personalData_personal_number").val(rate.personal_number);
						$("#personalData_mobile_number").val(rate.mobile_number);
						$("#personalData_national_id_code").val(rate.national_id_code);
						$("#personalData_national_id_number").val(rate.national_id_number);
						$("#personalData_dob").val(rate.dob);
						$("#personalData_address_city").val(rate.address.city);
						$("#personalData_address_area").val(rate.address.area);
						$("#personalData_address_other").val(rate.address.address_other_details);
					}
				})
			} else {
				toastr.warning("No data available for this selection.");
			}
		})

		$(".deleteClientBtn").on('click', (e) => {
			e.preventDefault();
			// console.log($(e.target).attr("data-currencyId"));
			if ($(e.target).attr("data-id") !== "") {
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
						var id = $(e.target).attr("data-id");
						var data = {
							"id": id
						}
						var url = 'deleteClientById'
						$.ajax({
							url: url,
							method: "POST",
							data: data,
							success: function(response) {
								Swal.fire(
									'Deleted!',
									'Your record has been deleted.',
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

	})
</script>
