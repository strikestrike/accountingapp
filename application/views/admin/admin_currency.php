<?php include 'layout/sidebar.php'; ?>
<style>
	/* .project-main2 .table thead th {
    	width: auto;
	} */
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
				<div class="tab-pane fade active show" id="navpills-2">
					<div class="row">
						<div class="col-xl-12">
							<div class="project-main2">
								<span class="arrow-up-back"></span>
								<span class="arrow-up"></span>

								<div class="d-flex justify-content-between align-items-center">
									<a class="btn btn-primary text-nowrap invisible" href="javascript:void(0)"> Rental</a>
									<div class="text-danger"><?= validation_errors()?></div>
									<a class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addCurrency"> Add</a>
								</div>
								<div class="table-responsive">
									<table class="table table-responsive-sm">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>Currency Name</th>
												<th>Currency Code</th>
												<th>Actions</th>
												
											</tr>
										</thead>
										<tbody>
											<?php 
												// echo "<pre>";
												$i=1;
												foreach ($currencyData as $key => $value) {
													// print_r($value);													
													echo "
															<tr>
															<td>".$i++."</td>
															<td>".$value['currency_name']."</td>
															<td>".$value['currency_code']."</td>
															<td class='color-primary'>
																<div class='d-flex'>
																	<a href='javascript:void(0);' class='editCurrencyBtn btn btn-primary shadow btn-xs1 sharp1 me-1' data-currencyId=".$value['id']."><i class='fas fa-edit'></i></a>
																	<a href='javascript:void(0);' class='deleteCurrencyBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-currencyId=".$value['id']."><i class='fas fa-trash'></i></a>
																</div>
															</td>
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
				<!-- <div class="tab-pane fade" id="navpills-3">
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
				</div> -->
			</div>
		</div>

	</div>
</div>



<!-- add currency-->
<div class="modal fade" id="addCurrency">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Currency </h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">

				<form id="currencyForm" action="<?= base_url('admin/addCurrency') ?>" method="POST">
					<input type="text" name="id" id="currencyIdHidden" hidden>
					<div class="form-group">
						<label class="text-black font-w500">Currency Code<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="currency_code" name="currency_code" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Currency Name <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="currency_name" name="currency_name" class="form-control" required>
						<span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>

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

<script>
	/**
	 * delete currency
	 */

	$(".deleteCurrencyBtn").on('click', (e)=>{
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if($(e.target).attr("data-currencyId") !== ""){
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
					var currencyId = $(e.target).attr("data-currencyId");
					var data = {"id":currencyId}
					var url = 'deleteCurrencyById'
					$.ajax({
						url: url,
						method: "POST",
						data: data,
						success: function(response)
						{
							Swal.fire(
							'Deleted!',
							'Your record has been deleted.',
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
		$(".editCurrencyBtn").on('click',(e)=>{
			e.preventDefault();
			if($(e.target).attr("data-currencyId") !== ""){
				var currencyId = $(e.target).attr("data-currencyId");
				var data = {"id":currencyId}
				var url = 'getCurrencyById'
				$.ajax({
					url: url,
					method: "POST",
					data: data,
					success: function(response)

					{
						$("#addCurrency").modal('show');
						var rate = JSON.parse(response);
						console.log(rate[0]);
						$("#currencyForm").attr('action','<?= base_url('admin/editCurrency') ?>')
						$("#currencyForm input#currency_code").val(rate[0].currency_code);
						$("#currencyForm input#currency_name").val(rate[0].currency_name);
						$("#currencyIdHidden").val(parseInt(rate[0].id));
					}
				})
			}
			else{
				toastr.warning("No data available for this selection.");
			}
			// console.log(rateId)
		})

</script>
