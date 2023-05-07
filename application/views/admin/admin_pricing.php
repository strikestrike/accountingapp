<style>
	/* .project-main2 .table thead th {
    	width: auto;
	} */
	.project-main2 table .color-primary .btn {
		padding: 5px 9px !important;
	}

	.project-main2 table .color-primary .btn i {
		pointer-events: none;
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

									<!-- rental -->
									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Rental</a>
										<a class="btn btn-primary text-nowrap" id="addRentalBtn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Nr Modules</th>
													<th>Price</th>
													<th>SKU</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($rental)) {
													$i = 1;
													foreach ($rental as $key => $value) {
														echo "
															<tr>
																<td>" . $value['number_of_modules'] . "</td>
																<td>" . $value['price'] . "</td>
																<td>" . $value['sku'] . "</td>
																<td class='color-primary'>
																	<div class='d-flex'>
																		<a href='javascript:void(0);' class='editRentalBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-rentalId=" . $value['id'] . "><i class='fas fa-edit'></i></a>
																		<a href='javascript:void(0);' class='deleteRentalBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-rentalId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																	</div>
																</td>
															</tr>
														";
													}
												} else {
													echo '
														<tr>
														<td>
															<span class="text-danger ms-5 my-5">No record found.</span>
														</td>
														<td></td>
														<td></td>
														<td></td>
														</tr>
													';
												}
												?>

											</tbody>
										</table>
									</div>

									<!-- dividends -->
									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Dividents</a>
										<a class="btn btn-primary text-nowrap" id="addDividentBtn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Nr Modules</th>
													<th>Price</th>
													<th>SKU</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($divident)) {
													$i = 1;
													foreach ($divident as $key => $value) {
														// print_r($value);													
														echo "
															<tr>
																<td>" . $value['number_of_modules'] . "</td>
																<td>" . $value['price'] . "</td>
																<td>" . $value['sku'] . "</td>
																<td class='color-primary'>
																	<div class='d-flex'>
																		<a href='javascript:void(0);' class='editDividentBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-dividentId=" . $value['id'] . "><i class='fas fa-edit'></i></a>
																		<a href='javascript:void(0);' class='deleteDividentBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-dividentId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																	</div>
																</td>
															</tr>
														";
													}
												} else {
													echo '
														<tr>
														<td>
															<span class="text-danger ms-5 my-5">No record found.</span>
														</td>
														<td></td>
														<td></td>
														<td></td>
														</tr>
													';
												}
												?>
											</tbody>
										</table>
									</div>

									<!-- stock -->
									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Stock</a>
										<a class="btn btn-primary text-nowrap" id="addStockBtn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Nr Modules</th>
													<th>Price</th>
													<th>SKU</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($stock)) {
													$i = 1;
													foreach ($stock as $key => $value) {
														// print_r($value);													
														echo "
															<tr>
																<td>" . $value['number_of_modules'] . "</td>
																<td>" . $value['price'] . "</td>
																<td>" . $value['sku'] . "</td>
																<td class='color-primary'>
																	<div class='d-flex'>
																		<a href='javascript:void(0);' class='editStockBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-stockId=" . $value['id'] . "><i class='fas fa-edit'></i></a>
																		<a href='javascript:void(0);' class='deleteStockBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-stockId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																	</div>
																</td>
															</tr>
														";
													}
												} else {
													echo '
														<tr>
														<td>
															<span class="text-danger ms-5 my-5">No record found.</span>
														</td>
														<td></td>
														<td></td>
														<td></td>
														</tr>
													';
												}
												?>
											</tbody>
										</table>
									</div>

									<!-- Crypto -->
									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Crypto</a>
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)" id="addCryptoBtn" data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Nr Modules</th>
													<th>Price</th>
													<th>SKU</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($crypto)) {
													$i = 1;
													foreach ($crypto as $key => $value) {
														// print_r($value);													
														echo "
															<tr>
																<td>" . $value['number_of_modules'] . "</td>
																<td>" . $value['price'] . "</td>
																<td>" . $value['sku'] . "</td>
																<td class='color-primary'>
																	<div class='d-flex'>
																		<a href='javascript:void(0);' class='editCryptoBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-cryptoId=" . $value['id'] . "><i class='fas fa-edit'></i></a>
																		<a href='javascript:void(0);' class='deleteCryptoBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-cryptoId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																	</div>
																</td>
															</tr>
														";
													}
												} else {
													echo '
														<tr>
														<td>
															<span class="text-danger ms-5 my-5">No record found.</span>
														</td>
														<td></td>
														<td></td>
														<td></td>
														</tr>
													';
												}
												?>
											</tbody>
										</table>
									</div>

									<!-- Rental regim -->
									<div class="d-flex justify-content-between align-items-center">
										<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Rental Regim</a>
										<a class="btn btn-primary text-nowrap" id="addRentalRegimBtn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive-sm">
											<thead>
												<tr>
													<th>Nr Modules</th>
													<th>Price</th>
													<th>SKU</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($rentalRegim)) {
													$i = 1;
													foreach ($rentalRegim as $key => $value) {
														// print_r($value);													
														echo "
															<tr>
																<td>" . $value['number_of_modules'] . "</td>
																<td>" . $value['price'] . "</td>
																<td>" . $value['sku'] . "</td>
																<td class='color-primary'>
																	<div class='d-flex'>
																		<a href='javascript:void(0);' class='editRegimBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-regimId=" . $value['id'] . "><i class='fas fa-edit'></i></a>
																		<a href='javascript:void(0);' class='deleteRegimBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-regimId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																	</div>
																</td>
															</tr>
														";
													}
												} else {
													echo '
														<tr>
														<td>
															<span class="text-danger ms-5 my-5">No record found.</span>
														</td>
														<td></td>
														<td></td>
														<td></td>
														</tr>
													';
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


			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Rental</a>
				<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
			</div>
			<div class="table-responsive">
				<table class="table table-responsive-sm">
					<thead>
						<tr>
							<th>Nr Modules</th>
							<th>Price</th>
							<th>SKU</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>119</td>
							<td>Rental 01</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>179</td>
							<td>Rental 02</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Dividents</a>
				<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
			</div>
			<div class="table-responsive">
				<table class="table table-responsive-sm">
					<thead>
						<tr>
							<th>Nr Modules</th>
							<th>Price</th>
							<th>SKU</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>119</td>
							<td>Dividents 01</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>179</td>
							<td>Dividents 02</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Stock</a>
				<a class="btn btn-danger text-nowrap" href="javascript:void(0)"> Add</a>
			</div>
			<div class="table-responsive">
				<table class="table table-responsive-sm">
					<thead>
						<tr>
							<th>Nr Modules</th>
							<th>Price</th>
							<th>SKU</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>119</td>
							<td>Stock 01</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>179</td>
							<td>Stock 02</td>
							<td class="color-primary">
								<div class="d-flex">
									<a href="javascript:void(0);" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
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

<!-- add rental-->
<div class="modal fade" id="addrental">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Rental </h5>
				<button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">

				<form id="rentalForm" action="<?= base_url('admin/addRental') ?>" method="POST">
					<?php if ($this->session->flashdata('rental_validation_error')) { ?>
						<div class=".validation-errors alert alert-danger" style="color:red; font-size: 12px"> <?php echo $this->session->flashdata('rental_validation_error'); ?></div>
					<?php } ?>

					<input type="text" name="id" id="rentalIdHidden" hidden>
					<div class="form-group">
						<label class="text-black font-w500">No. of modules<span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="rental_modules" name="number_of_modules" class="form-control">
						<span style="color:red; font-size: 12px"> <?php echo form_error('number_of_modules'); ?></span>

					</div>
					<div class="form-group">
						<label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
								*</span></label>
						<input type="text" id="rental_price" name="price" class="form-control">
						<span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>
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



<script>
	<?php if ($this->session->flashdata('rental_validation_error')) { ?>
		$('document').ready(function() {
			$("#addrental").modal('show');
			$('.alert').delay(3000).fadeOut(800);
		});
	<?php } ?>
</script>
<script>
	/**
	 * display edit form for updating rental
	 */
	$(".editRentalBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-rentalId") !== "") {
			var rentalId = $(e.target).attr("data-rentalId");
			var data = {
				"id": rentalId
			}
			var url = 'getRentalById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#addrental").modal('show');
					$(".modal-title").text("Edit Rental");
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#rentalForm").attr('action', '<?= base_url('admin/editRental') ?>')
					$("#rentalForm input#rental_modules").val(rate[0].number_of_modules);
					$("#rentalForm input#rental_price").val(rate[0].price);
					$("#rentalIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	/**
	 * display edit form for updating divident
	 */
	$(".editDividentBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-dividentId") !== "") {
			var dividentId = $(e.target).attr("data-dividentId");
			var data = {
				"id": dividentId
			}
			var url = 'getDividentById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#addrental").modal('show');
					$(".modal-title").text("Edit Divident");
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#rentalForm").attr('action', '<?= base_url('admin/editDivident') ?>')
					$("#rentalForm input#rental_modules").val(rate[0].number_of_modules);
					$("#rentalForm input#rental_price").val(rate[0].price);
					$("#rentalIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	/**
	 * display edit form for updating stock
	 */
	$(".editStockBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-stockId") !== "") {
			var stockId = $(e.target).attr("data-stockId");
			var data = {
				"id": stockId
			}
			var url = 'getStockById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#addrental").modal('show');
					$(".modal-title").text("Edit Stock");
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#rentalForm").attr('action', '<?= base_url('admin/editStock') ?>')
					$("#rentalForm input#rental_modules").val(rate[0].number_of_modules);
					$("#rentalForm input#rental_price").val(rate[0].price);
					$("#rentalIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	/**
	 * display edit form for updating Crypto
	 */
	$(".editCryptoBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-cryptoId") !== "") {
			var cryptoId = $(e.target).attr("data-cryptoId");
			var data = {
				"id": cryptoId
			}
			var url = 'getCryptoById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#addrental").modal('show');
					$(".modal-title").text("Edit Crypto");
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#rentalForm").attr('action', '<?= base_url('admin/editCrypto') ?>')
					$("#rentalForm input#rental_modules").val(rate[0].number_of_modules);
					$("#rentalForm input#rental_price").val(rate[0].price);
					$("#rentalIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	/**
	 * display edit form for updating Regim
	 */
	$(".editRegimBtn").on('click', (e) => {
		e.preventDefault();
		if ($(e.target).attr("data-regimId") !== "") {
			var regimId = $(e.target).attr("data-regimId");
			var data = {
				"id": regimId
			}
			var url = 'getRegimById'
			$.ajax({
				url: url,
				method: "POST",
				data: data,
				success: function(response)

				{
					$("#addrental").modal('show');
					$(".modal-title").text("Edit Regim");
					var rate = JSON.parse(response);
					console.log(rate[0]);
					$("#rentalForm").attr('action', '<?= base_url('admin/editRegim') ?>')
					$("#rentalForm input#rental_modules").val(rate[0].number_of_modules);
					$("#rentalForm input#rental_price").val(rate[0].price);
					$("#rentalIdHidden").val(parseInt(rate[0].id));
				}
			})
		} else {
			toastr.warning("No data available for this selection.");
		}
	})

	$("#addRentalBtn").on('click', () => {
		$("#rentalForm").attr('action', '<?= base_url('admin/addRental') ?>')
		$("#rentalForm input#rental_modules").val("");
		$("#rentalForm input#rental_price").val("");
		$("#rentalIdHidden").val("");
		$(".modal-title").text("Add Rental");
	});
	$("#addDividentBtn").on('click', () => {
		$("#rentalForm").attr('action', '<?= base_url('admin/addDivident') ?>')
		$("#rentalForm input#rental_modules").val("");
		$("#rentalForm input#rental_price").val("");
		$("#rentalIdHidden").val("");
		$(".modal-title").text("Add Divident");
	});
	$("#addStockBtn").on('click', () => {
		$("#rentalForm").attr('action', '<?= base_url('admin/addStock') ?>')
		$("#rentalForm input#rental_modules").val("");
		$("#rentalForm input#rental_price").val("");
		$("#rentalIdHidden").val("");
		$(".modal-title").text("Add Stock");
	});
	$("#addCryptoBtn").on('click', () => {
		$("#rentalForm").attr('action', '<?= base_url('admin/addCrypto') ?>')
		$("#rentalForm input#rental_modules").val("");
		$("#rentalForm input#rental_price").val("");
		$("#rentalIdHidden").val("");
		$(".modal-title").text("Add Crypto");
	});
	$("#addRentalRegimBtn").on('click', () => {
		$("#rentalForm").attr('action', '<?= base_url('admin/addRentalRegim') ?>')
		$("#rentalForm input#rental_modules").val("");
		$("#rentalForm input#rental_price").val("");
		$("#rentalIdHidden").val("");
		$(".modal-title").text("Add Rental Regim");
	});



	/**
	 * delete rental
	 */
	$(".deleteRentalBtn").on('click', (e) => {
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if ($(e.target).attr("data-rentalId") !== "") {
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
					var rentalId = $(e.target).attr("data-rentalId");
					var data = {
						"id": rentalId
					}
					var url = 'deleteRentalById'
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
	 * delete divident
	 */
	$(".deleteDividentBtn").on('click', (e) => {
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if ($(e.target).attr("data-dividentId") !== "") {
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
					var dividentId = $(e.target).attr("data-dividentId");
					var data = {
						"id": dividentId
					}
					var url = 'deleteDividentById'
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
	 * delete stock
	 */
	$(".deleteStockBtn").on('click', (e) => {
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if ($(e.target).attr("data-stockId") !== "") {
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
					var stockId = $(e.target).attr("data-stockId");
					var data = {
						"id": stockId
					}
					var url = 'deleteStockById'
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
	 * delete stock
	 */
	$(".deleteCryptoBtn").on('click', (e) => {
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if ($(e.target).attr("data-cryptoId") !== "") {
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
					var cryptoId = $(e.target).attr("data-cryptoId");
					var data = {
						"id": cryptoId
					}
					var url = 'deleteCryptoById'
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
	 * delete stock
	 */
	$(".deleteRegimBtn").on('click', (e) => {
		e.preventDefault();
		// console.log($(e.target).attr("data-currencyId"));
		if ($(e.target).attr("data-regimId") !== "") {
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
					var regimId = $(e.target).attr("data-regimId");
					var data = {
						"id": regimId
					}
					var url = 'deleteRentalRegimById'
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
</script>
