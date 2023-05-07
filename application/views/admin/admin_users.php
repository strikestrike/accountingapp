<?php include 'layout/sidebar.php'; ?>
<style>
	.project-main2 .table thead th {
    	width: auto;
	}
	.project-main2 table .color-primary .btn {
		padding: 5px 9px !important;
	}
	.project-main2 table .color-primary .btn i{
		pointer-events: none;
	}
</style>
<div class="container-fluid d-md-block d-none">
	<div class="project-nav">
		<div class="card-action card-tabs card-tabs2 w-100">
			<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
				<li class="nav-item">
					<a href="#navpills-1" class="nav-link " data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
				</li>
				<li class="nav-item">
					<a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
				</li>
				<li class="nav-item">
					<a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Information Verification </a>
				</li>
				<li class="nav-item">
					<a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Document Release </a>
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
									<a class="btn btn-primary text-nowrap invisible" href="javascript:void(0)"> Rental</a>
									<div class="text-danger"><?= validation_errors()?></div>
									<a class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addUser"> Add</a>
								</div>
								<div class="table-responsive">
									<table class="table table-responsive-sm">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>User Name</th>
												<th>Email</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												// echo "<pre>";
												// print_r($users);
												$i=1;
												if (!empty($users)) {
													foreach ($users as $key => $value) {
														// print_r($value);													
														echo "
																<tr>
																	<td>".$i++."</td>
																	<td>".$value['first_name']."</td>
																	<td>".$value['last_name']."</td>
																	<td>".$value['user_name']."</td>
																	<td>".$value['email']."</td>";
																	
														if($value['status'] == 1){			
															echo "		<td>
																			<div class='form-check form-switch'>
																				<input class='form-check-input toggle-switch-red toggle-status' type='checkbox' role='switch' data-userId=".$value['id']." id='flexSwitchCheckChecked' checked>
																			</div>
																		</td>";
														}
														if($value['status'] == 0){			
															echo "		<td>
																			<div class='form-check form-switch'>
																				<input class='form-check-input toggle-switch-red toggle-status' type='checkbox' role='switch' data-userId=".$value['id']." id='flexSwitchCheckChecked'>
																			</div>
																		</td>";
														}
														echo "			<td class='color-primary'>
																			<a href='javascript:void(0);' class='editUserBtn btn btn-primary shadow btn-xs1 sharp1' data-userId=".$value['id']."><i class='fas fa-edit'></i></a>
																			<a href='javascript:void(0);' class='deleteUserBtn btn btn-danger shadow btn-xs1 sharp1' data-userId=".$value['id']."><i class='fas fa-trash'></i></a>
																	</td>
																</tr>
														";
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



<!-- add user-->
<div class="modal fade" id="addUser">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User </h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">

				<form id="userForm" action="<?= base_url('admin/addUser') ?>" method="POST">
					<div class="form-group">
						<label class="text-black font-w500">First Name<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="first_name" name="first_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Last Name<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="last_name" name="last_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Email<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="email" id="email" name="email" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Password<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="password" id="password" name="password" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Confirm Password<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>
					</div>
					<div class="form-group">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
						<button type="submit" value="submit" class="btn btn-primary">CREATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end add user -->

<!-- edit user-->
<div class="modal fade" id="editUser">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit User </h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">

				<form id="editUserForm" action="<?= base_url('admin/editUser') ?>" method="POST">
					<input type="text" id="userIdHidden" value="" name="id" hidden>
					<div class="form-group">
						<label class="text-black font-w500">First Name<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="edit_first_name" name="first_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Last Name<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="edit_last_name" name="last_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Email<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="edit_email" id="edit_email" name="email" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>
					<div class="form-group mt-3">
						<button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
						<button type="submit" value="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end edit user -->

<script>
	$(function() {
		<?php
		if (isset($_POST['addrentaltype'])) {

			echo '$("#addrental").modal("show")';
		}
		?>

	});
</script>


<!-- Edit Rental-->
<div class="modal fade" id="editrental">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Rental</h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="rental_update" method="POST">
					<input type="hidden" name="editrentalid" id="editrentalid" />
					<input type="hidden" name="type" id="edittype" />

					<div class="form-group">
						<label class="text-black font-w500">Nr Modules</label>
						<input type="text" id="editnr_modules" name="nr_modules" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Price</label>
						<input type="text" name="price" id="editprice" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">SKU</label>
						<input type="text" name="sku" id="editsku" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
					</div>
					<div class="form-group">

						<button type="submit" class="btn btn-primary">UPDATE</button>
						<button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function abc(id) {
		// alert(id)   
		//return false;
		$('#editrental').modal('show');
		$.ajax({
			url: '<?php echo base_url(); ?>Home/getIncomeTypeData',
			type: "post",
			data: {
				id: id
			},
			success: function(response) {
				var data = jQuery.parseJSON(response);

				$('#editnr_modules').val(data[0].nr_modules);
				$('#editprice').val(data[0].price);
				$('#editsku').val(data[0].sku);
				$('#editrentalid').val(data[0].id);
				$('#edittype').val(data[0].type);
			},
			error: function(jqXhr, textStatus, errorMessage) {
				$('p').append('Error' + errorMessage);
			}
		});
	}

	/*function updateDatafun(){
	alert($('#editrentalid').val())
	var updatedata={
	nr_modules:$('#editnr_modules').val(),
	price:$('#editprice').val(),
	sku:$('#editsku').val(),
	id:$('#editrentalid').val()
	}
	    console.log(updatedata)


	}*/
</script>


<!-- Dividents -->
<div class="modal fade" id="adddevidents">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Dividents</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('home/admin_pricing') ?>" method="POST">
					<input type="hidden" name="type" value="dividents">
					<div class="form-group">
						<label class="text-black font-w500">Nr Modules <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="nr_modules" class="form-control" required>

						<span style="color:red; font-size: 12px"> <?php echo form_error('nr_modules'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="price" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">SKU <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="sku" class="form-control" required>

						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
					</div>
					<div class="form-group">
						<button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
						<button type="submit" name="adddevidentstype" value="Submit" class="btn btn-primary">CREATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<script>
	$(function() {
		<?php
		if (isset($_POST['adddevidentstype'])) {

			echo '$("#adddevidents").modal("show")';
		}
		?>

	});
</script>

<!-- Stock -->

<div class="modal fade" id="addstock">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Stock</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('home/admin_pricing') ?>" method="POST">
					<input type="hidden" name="type" value="stock" required>
					<div class="form-group">
						<label class="text-black font-w500">Nr Modules <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="nr_modules" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('nr_modules'); ?></span>
					</div>
					<div class="form-group">
						<label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="price" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">SKU <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" name="sku" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
					</div>
					<div class="form-group">
						<button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
						<button type="submit" name="addincometype" value="Submit" class="btn btn-primary">CREATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		<?php
		if (isset($_POST['addincometype'])) {

			echo '$("#addstock").modal("show")';
		}
		?>

	});
</script>
<script>
	/**
	 * delete min wage
	 */

	$(".deleteUserBtn").on('click', (e)=>{
		e.preventDefault();
		// console.log($(e.target).attr("data-userId"));
		if($(e.target).attr("data-userId") !== ""){
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
					var userId = $(e.target).attr("data-userId");
					var data = {"id":userId}
					var url = 'deleteUserById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response)
						{
							Swal.fire(
							'Deleted!',
							'User has been deleted successfully.',
							'success'
							);
							setTimeout(()=>{
								window.location.reload();
							},1500)
						},
						error: ()=>{
							toastr.error("Error in deleting.");
						}
					})
				}
				else{
					// toastr.error("error");
				}
			})
			
		}
		else{
			toastr.warning("Cannot delete, data doesn't exist.");
		}
	})

	/**
		 * display edit form for updating minimum wage
		 */
		$(".editUserBtn").on('click',(e)=>{
			e.preventDefault();
			if($(e.target).attr("data-userId") !== ""){
				var userId = $(e.target).attr("data-userId");
				var data = {"id":userId}
				var url = 'getUserById'
				$.ajax({
					url: url,
					method: "POST",
					data: data,
					success: function(response)

					{
						$("#editUser").modal('show');
						var rate = JSON.parse(response);
						console.log(rate[0]);
						$("#editUserForm input#edit_first_name").val(rate[0].first_name);
						$("#editUserForm input#edit_last_name").val(rate[0].last_name);
						$("#editUserForm input#edit_email").val(rate[0].email);
						$("#userIdHidden").val(parseInt(rate[0].id));
						console.log($("#editUserForm input#userIdHidden"));
					}
				})
			}
			else{
				toastr.warning("No data available for this selection.");
			}
			// console.log(rateId)
		})


		/**Update the status of the User */
        $(document).ready(function() {
            $('.toggle-status').change(function(e) {
				e.preventDefault();
                var value = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).attr('data-userId');
                console.warn(user_id);
                console.warn(value);
                $.ajax({
                    url: 'updateUserStatus',
					method: 'POST',
                    data: {
                        'value': value,
                        'user_id': user_id
                    },
                });
            })
        });

</script>
