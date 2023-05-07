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
<div class="content-body ">
	<div class="container-fluid">
		<div class="card project-main">
			<div class="card-header flex-flow-column">
				<form action="" method="post" class="importCountyForm w-100" enctype="multipart/form-data">
					<div class="row justify-content-between align-items-center w-100">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="form-group mb-md-0">
								<div class="select-csv-file">
									<a class="choose-btn upload-csv-btn-wrapper" href="javascript:void(0)">
										<button class="btn btn-outline-primary" type="button">Choose File</button>
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
								<select class="function-select default-select form-control" required>
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
								<button type="submit" class="btn btn-primary">Process Data</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-body">
				<div id="import-btns"><button class="btn btn-secondary" onclick="window.location.href='<?= base_url('county/exportCSV') ?>'">CSV</button></div>
				<div class="table-responsive full-seach-bar">
					<table id="tableID" class="display table-border">
						<thead>
							<tr>
								<th>Id</th>
								<th>Counties</th>
								<th>City</th>
								<th>View</th>
								<th>Status</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							if (!empty($countyList)) {
								foreach ($countyList as $key => $value) { ?>
									<tr>
										<td><?= $value['id'] ?></td>
										<td><?= $value['county_name'] ?></td>
										<td><?= $value['city_name'] ?></td>
										<td><button class="btn btn-primary viewCounty" data-CId="<?= $value['id'] ?>"><i class="fas fa-eye"></i></button></td>
										<td class="color-primary">
											<div class="d-flex align-items-center justify-content-center">
												<div class='form-check form-switch me-3'>
													<?php if ($value['status'] == 1) { ?>
														<input class='form-check-input toggle-switch-red approve-ong status-switch' type='checkbox' role='switch' data-id="<?= $value['id'] ?>" checked>
													<?php } else { ?>
														<input class='form-check-input toggle-switch-red approve-ong status-switch' type='checkbox' role='switch' data-id="<?= $value['id'] ?>">
													<?php } ?>
												</div>
											</div>
										</td>
										<td class="color-primary">
											<a href='javascript:void(0);' class='deleteCountyBtn btn btn-danger shadow btn-xs1 sharp1' data-CId="<?= $value['id'] ?>"><i class='fas fa-trash'></i></a>
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

<div class="modal fade" id="addCounty">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add County</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="addCountyForm" action="#" method="POST">
					<input type="hidden" name="id" id="county_id" value="">
					<div class="form-group">
						<label class="text-black font-w500">County Name <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="county_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">City Name <span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="city_name" class="form-control" required>
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
<div class="modal fade" id="uploadCounty">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload County List</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="addCountyForm" action="<?= base_url('county/import') ?>" method="POST" enctype="multipart/form-data">
					<!-- <input type="hidden" name="id" id="ong-id-input" value=""> -->
					<div class="form-group">
						<label class="text-black font-w500">Choose CSV <span style="color:red; font-size: 12px"> *</span></label>
						<input type="file" name="upload" class="form-control" required>
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
	window.addEventListener('load', function() {

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

		$(".function-select").change((e) => {
			let selectedFunction = e.target.value;
			let url = ''

			switch (selectedFunction) {
				case 'Add':
					url = '<?= base_url('county/import') ?>';
					break;
				case 'Update':
					url = '<?= base_url('county/updateCSV') ?>';
					break;
				case 'Replace':
					url = '<?= base_url('county/replace') ?>';
					break;
				case 'Activate':
					url = '<?= base_url('county/activate') ?>';
					break;
				case 'Deactivate':
					url = '<?= base_url('county/deactivate') ?>';
					break;
				default:
					break;
			}

			$(".importCountyForm").attr('action', url)

		})

		let table = $('#tableID').DataTable({
			"ajax": {
				url: "<?= base_url(); ?>county/list",
				type: 'GET'
			},
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
					columns: [0, 1, 2],
					modifier: {
						page: 'current'
					}
				}
			}],
			// initComplete: function() {
			// 	var api = this.api();
			// 	console.log(api.buttons().container()[0].nodeName);
			// }

		})
		table.buttons().container().appendTo('#tableID_wrapper .row .col-sm-12.col-md-6:eq(0)');

		$("#search_name").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})
		$("#search_reg").on('keyup change clear', function() {
			table.search($(this).val()).draw();
		})

		// $(".card-body").on('mouseenter', function(e){
		// 	if($(".content-body").hasClass('ps--active-y')) {
		// 		$(".content-body").removeClass('ps--active-y')
		// 	}
		// })
	})
	/**
	 * display edit form for updating county
	 */
	$(document).on('click', '.viewCounty', function() {
		let id = $(this).attr("data-cid");
		fetchCountyById(id).then(data => {
			$("#addCounty").modal('show');
			$("#addCounty .modal-title").text('Edit County');
			$("#addCountyForm").attr('action', 'county/update')
			$("#addCountyForm input[name=id]").val(data.id)
			$("#addCountyForm input[name=county_name]").val(data.county_name)
			$("#addCountyForm input[name=city_name]").val(data.city_name)
		});
	})

	$(".addCountyBtn").click(function() {

		$("#addCounty").modal('show');
		$("#addCounty .modal-title").text('Add County');
		$("#addCountyForm").attr('action', 'county/insert')
		$("#addCountyForm input[name=id]").val('')
		$("#addCountyForm input[name=county_name]").val('')
		$("#addCountyForm input[name=city_name]").val('')

	})


	$(document).on('change',".status-switch", function() {
		let id = $(this).data('id');
		let value = $(this).prop('checked') == true ? 1 : 0;
		// alert(id)
		updateStatus(id, value)
	})

	$(document).on('click', ".deleteCountyBtn", (e) => {
		// e.stopPropagation();
		// console.log($(e.target).attr("data-userId"));
		if ($(e.target).data("cid") !== "") {
			// alert($(this).data("cid"))
			// console.log($(e.target).data("cid"));
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
					var userId = $(e.target).data("cid")
					// alert(userId)
					var deleteData = {
						"id": userId
					}
					// alert(deleteData)
					var url = 'deleteCountyById'
					$.ajax({
						url: url,
						method: "POST",
						data: deleteData,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'County has been deleted successfully.',
								'success'
							);
							// setTimeout(() => {
							// 	window.location.reload();
							// }, 1500)
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

	async function fetchCountyById(id) {
		let url = "<?= base_url('county/fetch/') ?>" + id
		const response = await fetch(url)
		return response.json();
	}

	async function updateStatus(id, value) {
		let url = "<?= base_url('county/updateStatus') ?>"
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
