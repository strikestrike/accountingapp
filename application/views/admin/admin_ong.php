<style>
    .project-main2 .table thead th {
        width: auto;
        font-size: 14px;
    }
    .project-main2 .table tbody td {
        font-size: 14px;
    }

    #ongTable_filter {
        display: none;
    }

    #ongTable_length {
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
									<div class="row">
										<div class="col-md-4 col-xs-12">
											<div class="form-group">
												<label>Name</label>
												<input id="search_name" type="text" class="form-control">
											</div>
										</div>
										<div class="col-md-4 col-xs-12">
											<div class="form-group">
												<label>Registration no.</label>
												<input id="search_reg" type="text" class="form-control">
											</div>
										</div>
									</div>
									<div class="d-flex justify-content-end align-items-center">
										<!-- <p class="mb-0 small">Add at least 1 user to start the process</p> -->
										<!-- <a class="btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> Apply Filter</a> -->
									</div>
									<div class="table-responsive">
										<table id="ongTable" class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Name</th>
													<th>Registration no</th>
													<th>View</th>
													<th>Approve</th>
													<th>Delete</th>

												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($ongList)) {
													foreach ($ongList as $key => $value) { ?>
														<tr>
															<td><?= $value['ong_name'] ?></td>
															<td><?= $value['ong_registration_number'] ?></td>
															<td><a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1 viewOngBtn" title="View Data" data-id="<?= $value['id'] ?>">View</a></td>
															<td class="color-primary">
																<div class="d-flex">
																	<div class='form-check form-switch me-3'>
																		<?php if ($value['approved'] == 1) { ?>
																			<input style="transform: scale(1.2);" class='form-check-input toggle-switch-red approve-ong' type='checkbox' role='switch' data-id="<?= $value['id'] ?>" id='flexSwitchCheckChecked' checked>
																		<?php } else { ?>
																			<input class='form-check-input toggle-switch-red approve-ong' type='checkbox' role='switch' data-id="<?= $value['id'] ?>" id='flexSwitchCheckChecked'>
																		<?php } ?>
																	</div>
																</div>
															</td>
															<td><a href="javascript:void(0);" class="btn btn-danger shadow btn-xs1 sharp1 me-1 deleteOngBtn" title="Delete Data" data-id="<?= $value['id'] ?>"><i class="fas fa-trash"></i></a></td>
														</tr>
												<?php }
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
				<label>Registration no</label>
				<input type="text" class="form-control">
			</div>
			<div class="form-group">
				<label></label>
				<input type="text" class="form-control">
			</div>
			<!-- <div class="">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)">Apply filter</a>
			</div> -->
			<br>
			<div class="form-group">
				<h5>Name</h5>
				<p>Lonionesou</p>
			</div>
			<hr>
			<div class="form-group">
				<h5>Registration no</h5>
				<p>293654</p>
			</div>
			<hr>

			<div class="d-flex justify-content-between align-items-center">
				<div class="form-group">
					<a class="btn btn-primary">View</a>
					<a class="btn btn-primary">Approve</a>
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
<div class="modal fade" id="editOngModal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit ONG</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="ongEditForm" action="<?= base_url('admin/updateOng') ?>" method="POST">
					<input type="hidden" name="id" id="ong-id-input" value="">
					<div class="form-group">
						<label class="text-black font-w500">ONG Name <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="ong_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">ONG Registration Number <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="ong_registration_number" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">ONG Bank Account<span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="ong_bank_account" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>
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
<script>
	window.addEventListener('load', () => {
		var table = $('#ongTable').DataTable();
		$("#search_name").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})
		$("#search_reg").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})

		/***
		 * delete ong by id
		 */
		$(".deleteOngBtn").on('click', (e) => {
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
						var url = 'deleteOngById'
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

		/**
		 * approve ong
		 */

		$('.approve-ong').change(function(e) {
			e.preventDefault();
			var value = $(this).prop('checked') == true ? 1 : 0;
			var id = $(this).attr('data-id');
			
			$.ajax({
				url: 'updateOngApprove',
				method: 'POST',
				data: {
					'value': value,
					'id': id
				},
			});
		})
		
		/**
		 * view/edit ONG
		 */
		$(document).on('click', '.viewOngBtn', function() {
			let ong_id = $(this).attr('data-id')
			fetchOngById(ong_id).then(data => {
				$("#editOngModal").modal('show');
				$("#ongEditForm input[name=id]").val(data.id)
				$("#ongEditForm input[name=ong_name]").val(data.ong_name)
				$("#ongEditForm input[name=ong_registration_number]").val(data.ong_registration_number)
				$("#ongEditForm input[name=ong_bank_account]").val(data.ong_bank_account)
			})
		})
		


	});
</script>
<script>
	async function fetchOngById(id) {
		url = "<?= base_url('admin/fetchOngById/') ?>"+id
		const response = await fetch(url) 
		return response.json();
	}
</script>
