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





									<div class="basic-form">
										<?php 
										// echo "<pre>";print_r($personalData); echo "</pre>"
										?>
										
											<input type="hidden" name="personal_data[id]" value="<?= $personalData['id'] ?>">
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Salutation</label>
												<div class="col-sm-9">
													<div>
														<label class="radio-inline me-3"><input type="radio" name="personal_data[salutation]" value="Mr" <?= !empty($personalData['salutation']) ? ($personalData['salutation'] == 'Mr' ? 'checked' : '') : '' ?>> Mr</label>
														<label class="radio-inline me-3"><input type="radio" name="personal_data[salutation]" value="Mr" <?= !empty($personalData['salutation']) ? ($personalData['salutation'] == 'Mrs' ? 'checked' : '') : '' ?>> Mrs</label>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Name Surname</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-6">
															<input type="text" name="personal_data[name]" <?= !empty($personalData['name']) ? 'value = ' . $personalData['name'] : '' ?> class="form-control" placeholder="Name">
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<input type="text" name="personal_data[surname]"  <?= !empty($personalData['surname']) ? 'value = ' . $personalData['surname'] : '' ?> class="form-control" placeholder="Surname">
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Personal number</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12">
															<input type="text" name="personal_data[personal_number]"  <?= !empty($personalData['personal_number']) ? 'value = ' . $personalData['personal_number'] : '' ?> class="form-control" placeholder="12354678910111213">
														</div>

													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Address</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-6 mt-2 mt-sm-0">
															<label class="form-label">City</label>
															<input type="text" name="personal_data[city]" value="<?= $personalData['city'] ?>" class="form-control" placeholder="Enter Country name">
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<label class="form-label">Area</label>
															<input type="text" name="personal_data[area]" value="<?= $personalData['area'] ?? '' ?>" class="form-control" placeholder="Enter City name">
														</div>
													</div>
												</div>
											</div>


											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Address</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12">
															<input type="text" name="personal_data[address_other_details]" value="<?= $personalData['address'] ?? '' ?>" class="form-control" placeholder="Assasa">
														</div>

													</div>
												</div>
											</div>

											<hr>

											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Income Types</label>
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-12">
															<?php if(!empty($rent_income)){ ?>
																<p><a href="<?= base_url()?>admin/clientRentIncome/<?= $personalData['id'] ?>">Rental Income</a></p>
															<?php } ?>
															<?php if(!empty($hotel_income)){ ?>
																<p><a href="<?= base_url()?>admin/clientHotelIncome/<?= $personalData['id'] ?>">Hotel Income</a></p>
															<?php } ?>
															<?php if(!empty($stocks_income)){ ?>
																<p><a href="<?= base_url()?>admin/clientStocksIncomeVerification/<?= $personalData['id'] ?>">Stocks Income</a></p>
															<?php } ?>
															<?php if(!empty($divident_income)){ ?>
																<p><a href="<?= base_url()?>admin/clientDividentIncomeVerification/<?= $personalData['id'] ?>">Divident Income</a></p>
															<?php } ?>
															<?php if(!empty($crypto_income)){ ?>
																<p><a href="<?= base_url()?>admin/clientCryptoIncomeVerification/<?= $personalData['id'] ?>">Crypto Income</a></p>
															<?php } ?>
															
														</div>

													</div>
												</div>
											</div>
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
