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
							<a class="btn btn-primary btn-square" href="<?php echo site_url('admin/editrule'); ?>">Add Rule</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h3>Web Field Mappings</h3>
				<div class="table-responsive table-border">
					<table class="table ">
						<thead>
						<tr>
							<th>Id</th>
							<th>Document Type</th>
							<th>Rule Type</th>
							<th>Action Type</th>
							<th>Path</th>
							<th>Component</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if (!empty($mappingrules)) {
							foreach ($mappingrules as $key => $var) { ?>
								<tr>
									<td><?php echo $key + 1 ?></td>
									<td><?php echo $var['document_type'] ?></td>
									<td><?php echo $var['rule_type'] ?></td>
									<td><?php echo $var['action_type'] ?></td>
									<td><?php echo $var['path'] ?></td>
									<td><?php echo $var['component'] ?></td>
									<td class="color-primary">
										<div class="d-flex">
											<a href="<?php echo site_url('admin/editrule') . '?id=' . $var['id'] ?>" class="editBtn btn btn-warning shadow btn-xs1 sharp1 me-1"><i class="fas fa-edit"></i></a>
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

<script>
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
					var url = 'deleteMappingRuleById'
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
