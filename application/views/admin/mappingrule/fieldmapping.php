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
                <div class="row justify-content-between align-items-center w-100">
                    <div class="col-md-12 col-sm-12 col-xs-12 d-md-flex justify-content-end">
                        <div class="form-group mb-md-0">
                            <button class="btn btn-primary btn-square" id="add_mapping">Add Mapping</button>
                        </div>
						<div class="form-group mb-md-0 mx-1">
							<button class="btn btn-success btn-square" id="auto_fill">Auto Fill Data</button>
						</div>
                    </div>
                </div>
			</div>
			<div class="card-body">
				<h3>Web Field Mappings</h3>
				<div class="table-border">
					<table class="table ">
						<thead>
						<tr>
							<th>Id</th>
							<th>Type</th>
							<th>Field Label</th>
							<th>Data Source</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if (!empty($fieldmappings)) {
							foreach ($fieldmappings as $key => $var) { ?>
								<tr>
									<td><?php echo $key + 1 ?></td>
									<td style="word-break: break-all"><?php echo $var['type'] ?></td>
									<td style="word-break: break-all"><?php echo $var['field_label'] ?></td>
									<td style="word-break: break-all"><?php echo $var['data_source'] ?></td>
									<td class="color-primary">
										<div class="d-flex">
											<a href="javascript:void(0);" class="editBtn btn btn-warning shadow btn-xs1 sharp1 me-1" data-id="<?php echo $var['id'] ?>"><i class="fas fa-edit"></i></a>
											<a href="javascript:void(0);" class="deleteBtn btn btn-danger shadow btn-xs1 sharp1 me-1" data-id="<?php echo $var['id'] ?>"><i class="fas fa-trash"></i></a>
										</div>
									</td>
								</tr>
							<?php }
						} else { ?>
							<tr>
								<td colspan="3" class="text-center">No data found</td>
							</tr>
						<?php } ?>
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
				<h5 class="modal-title">Add Mapping</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="addForm" action="#" method="POST">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label class="text-black font-w500">Type<span style="color:red; font-size: 12px"> *</span></label>
                        <select class="type-select default-select form-control" name="type">
                            <option value="">Select</option>
                            <?php foreach($fieldtypes as $type) { ?>
                            <option value="<?php echo $type ?>"><?php echo $type ?></option>
                            <?php } ?>
                        </select>
						<span style="color:red; font-size: 12px"> </span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Field Label<span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="field_label" class="form-control" required>
						<span style="color:red; font-size: 12px"> </span>
					</div>
                    <div class="form-group">
						<label class="text-black font-w500">Data Source<span style="color:red; font-size: 12px"> *</span></label>
						<input type="text" name="data_source" class="form-control" required>
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

	$("#add_mapping").click(function() {
		$("#addModal").modal('show');
		$("#addModal .modal-title").text('Add Mapping');
		$("#addForm").attr('action', 'insertMapping')
		$("#addForm input[name=id]").val('')
		$("#addForm input[name=field_label]").val('')
		$("#addForm input[name=data_source]").val('')
	});

	$("#auto_fill").click(function() {
		addOverlay();
		$.ajax({
			url: 'autoFillMapping',
			method: "POST",
			success: function(response)
			{
				let result = JSON.parse(response)
				if (result.success) {
					window.location.reload();
				}
			}
		})
	});

	$(document).on("click",".editBtn", function () {
		var id = $(this).attr("data-id");
		if (id) {
			var data = {
				"id": id
			}
			var url = 'fetchMapping'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)
				{
					$("#addModal").modal('show');
					$(".modal-title").text("Edit Mapping");
					var data = JSON.parse(response);
					$("#addForm").attr('action', '<?= base_url('admin/updateMapping') ?>')
                    $("#addForm input[name=id]").val(data.id);
					$("#addForm select[name=type]").selectpicker('val', data.type);
                    $("#addForm input[name=field_label]").val(data.field_label);
                    $("#addForm input[name=data_source]").val(data.data_source);
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	$(document).on("click",".deleteBtn", function () {
		var id = $(this).attr("data-id");
		if (id) {
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
					var data = {
						"id": id
					}
					var url = 'deleteMappingById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response) {
							Swal.fire(
								'Deleted!',
								'Mapping has been deleted successfully.',
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
