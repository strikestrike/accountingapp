<style>
	.dataTables_length {
		display: none;
	}
</style>
<!--Start: Page main heading -->
<div class="container-fluid page-sub-head d-md-block d-none">
	<div class="d-flex flex-nowrap justify-content-between align-items-center">
		<div class="100%">
			<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
			<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si
				descarci declaratia. </p>
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
<div class="content-body">
	<div class="container-fluid">
		<div class="card project-main">
			<div class="card-header flex-flow-column">
				<form action="" class="importCaenForm w-100" enctype="multipart/form-data" method="post">
					<div class="row justify-content-between align-items-center w-100">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="form-group mb-md-0">
								<div class="select-csv-file">
									<a class="choose-btn upload-csv-btn-wrapper" href="javascript:void(0)">
										<button class="btn btn-outline-primary btn-square" type="button">Choose File</button>
										<input type="file" name="upload" class="upload-csv" required>
									</a>
									<div class="csv-file-uploaded d-flex flex-column justify-content-center align-items-baseline pos-rel d-none">
										<img src="<?= base_url() . 'assets/img/csv.png' ?>" alt="">
										<p></p>
										<button type="button" class="upload-cancel-btn cancel-btn">X</button>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="form-group mb-md-0">
								<select class="function-select default-select form-control">
									<option value="">Select</option>
									<option>Add</option>
									<option>Update</option>
									<option>Replace</option>
									<option>Activate</option>
									<option>Deactivate</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 d-md-flex justify-content-end">
							<div class="form-group mb-md-0">
								<button type="submit" class="btn btn-primary btn-square">Process Data</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-body">
				<div class="table-responsive full-seach-bar">
					<table id="tableID" class="display table-border">
						<thead>
							<tr>
								<th>Id</th>
								<th>Code</th>
								<th>Description</th>
								<th>View</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							/* echo "<pre>";
                                             print_r($bnrlist);
                                             echo "</pre>"; */
							$i = 1;
							if (!empty($caen_codes_list)) {
								foreach ($caen_codes_list as $key => $value) { ?>

									<tr>
										<td><?= $value['id'] ?></td>
										<td><?= $value['code'] ?></td>
										<td><?= $value['description'] ?></td>
										<td><button class="btn btn-primary viewBtn" data-id="<?= $value['id'] ?>"><i class="fas fa-eye"></i></button></td>
										<td class="color-primary">
											<div class="d-flex align-items-center justify-content-center">
												<div class='form-check form-switch me-3'>
													<?php if ($value['status'] == 1) { ?>
														<input class='form-check-input toggle-switch-red status-switch' type='checkbox' role='switch' data-id="<?= $value['id'] ?>" onchange="checkStatus(event)" checked>
													<?php } else { ?>
														<input class='form-check-input toggle-switch-red status-switch' type='checkbox' role='switch' data-id="<?= $value['id'] ?>" onchange="checkStatus(event)">
													<?php } ?>
												</div>
											</div>
										</td>
										<td class="color-primary">
											<a href='javascript:void(0);' class='deleteCaenBtn btn btn-danger shadow btn-xs1 sharp1' data-CId="<?= $value['id'] ?>"><i class='fas fa-trash'></i></a>
										</td>
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



	<button class="btn btn-primary chat-btn d-flex align-items-center">
		<span>Chat</span>
		<div class="chat-btn-icon">
			<i class="fas fa-comment"></i>
		</div>
	</button>
</div>
<!-- End: Content body -->

<div class="modal fade" id="addModal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add CAEN</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="addCaenForm" action="#" method="POST">
					<input type="hidden" name="id" id="county_id" value="">
					<div class="form-group">
						<label class="text-black font-w500">CAEN Code<span style="color:red; font-size: 12px"> *</span></label>
						<input type="number" name="code" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Description<span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="description" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>
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


<script>
	$('.upload-csv').change(function(evt) {
		$(".upload-csv-btn-wrapper").addClass('d-none');
		$(".csv-file-uploaded").removeClass('d-none');
		$(".csv-file-uploaded p").text(evt.target.files[0].name);
	});

	$('.upload-cancel-btn').click(function() {
		$(".upload-csv-btn-wrapper").removeClass('d-none');
		$(".csv-file-uploaded").addClass('d-none');
		$('.upload-csv').val('');
	})
	/**
	 * display edit form for updating county
	 */
	$(".viewBtn").click(function() {
		let id = $(this).attr("data-id");
		fetchCaenById(id).then(data => {
			console.log(data);
			$("#addModal").modal('show');
			$("#addModal .modal-title").text('Edit CAEN');
			$("#addCaenForm").attr('action', 'caen/update')
			$("#addCaenForm input[name=id]").val(data.id)
			$("#addCaenForm input[name=code]").val(data.code)
			$("#addCaenForm input[name=description]").val(data.description)
		});
	})

	$(".addBtn").click(function() {

		$("#addModal").modal('show');
		$("#addModal .modal-title").text('Add CAEN');
		$("#addCaenForm").attr('action', 'caen/insert')
		$("#addCaenForm input[name=id]").val('')
		$("#addCaenForm input[name=code]").val('')
		$("#addCaenForm input[name=description]").val('')

	})

	$(".function-select").change((e) => {
		let selectedFunction = e.target.value;
		let url = ''

		switch (selectedFunction) {
			case 'Add':
				url = '<?= base_url('caen/import') ?>';
				break;
			case 'Update':
				url = '<?= base_url('caen/updateCSV') ?>';
				break;
			case 'Replace':
				url = '<?= base_url('caen/replace') ?>';
				break;
			case 'Activate':
				url = '<?= base_url('caen/activate') ?>';
				break;
			case 'Deactivate':
				url = '<?= base_url('caen/deactivate') ?>';
				break;
			default:
				break;
		}

		$(".importCaenForm").attr('action', url)

	})

	$(".deleteCaenBtn").on('click', (e) => {
		// e.stopPropagation();
		// console.log($(e.target).attr("data-userId"));
		if ($(e.target).attr("data-CId") !== "") {
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
					var caenId = $(e.target).attr("data-CId");
					var data = {
						"id": caenId
					}
					var url = 'deleteCaenById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'Caen has been deleted successfully.',
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

	async function fetchCaenById(id) {
		url = "<?= base_url('caen/fetch/') ?>" + id
		const response = await fetch(url)
		return response.json();
	}
</script>

<script>
	// Initialize the DataTable
	$(document).ready(function() {
		let table = $('#tableID').DataTable({
			"order": [
				[1, "asc"]
			],
			'columnDefs': [{
					'searchable': false,
					'orderable': false,
					'visible': false,
					'targets': [0]
				},
				{
					'orderable': true,
					'targets': [1]
				}
			],
			"buttons": [{
				'extend': 'csv',
				'text': '<i class="fas fa-file-download"></i>&nbsp; CSV',
				'exportOptions': {
					columns: [0, 1, 2]
				}
			}],
		}).buttons().container().appendTo('#tableID_wrapper .row .col-sm-12.col-md-6:eq(0)');


		// $("#search_name").on('keyup change clear', function() {
		// 	table.search($(this).val()).draw();
		// })

		// $("#search_reg").on('keyup change clear', function() {
		// 	table.search($(this).val()).draw();
		// })

		// $(".status-switch").change(function() {
		// 	let id = $(this).data('id');
		// 	let value = $(this).prop('checked') == true ? 1 : 0;
		// 	alert(id)
		// 	// updateStatus(id, value)
		// })

		

	});

	function checkStatus(evt) {
		let id = $(evt.target).data('id');
		let value = $(evt.target).prop('checked') == true ? 1 : 0;
		updateStatus(id, value)
	}

	async function updateStatus(id, value) {
		let url = "<?= base_url('caen/updateStatus') ?>"
		let data = new FormData();
		data.append('id', id)
		data.append('value', value)

		const response = await fetch(url, {
			method: "post",
			body: data
		})

		return response.json();
	}
</script>
