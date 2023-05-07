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
		<!-- <form action="<?= base_url() ?>variable/saveVariableAndVariant" method="post"> -->
			<div class="card project-main pb-0">
				<div class="card-header">
					<button type="button" id="addVarBtn" class="btn btn-primary btn-square">Add New Variable</button>
				</div>
				<div class="card-body" id="addVarFormRow" style="display: none;">
					<form id="addVariableForm" class="border p-4 rounded" action="" method="post">
						<input type="hidden" name="id">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Variable Name</label>
									<input type="text" name="variable_name" class="form-control" placeholder="Enter variable name" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Automatic evaluation for variable</label>
									<div class="dropdown bootstrap-select default-select form-control">
										<select class="default-select form-control" tabindex="null" name="auto_evaluation" required>
											<option>Age</option>
											<option>Gender</option>
											<option>No age evaluation</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-4 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label w-100" style="visibility: hidden;">dsfasdf</label>
									<div class="d-flex">
										<button type="submit" class="btn btn-primary btn-square">Save</button>
										<?php if(!empty($if_has_variants)){ ?>
											<button type="button" class="btn btn-success final-sbmit-btn ms-3" data-variable_id="<?= $pending_variable['id'] ?>">Final&nbsp;Submit</button>
										<?php } ?>
									</div>
								</div>
							</div>
								<!-- <div class="col-md-2 col-sm-4 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label w-100" style="visibility: hidden;">dsfasdf</label>
										</div>
									</div>
								</div> -->
					</form>
				</div>
			</div>
			<input type="hidden" id="active_variable_id" value="">
			<div class="card project-main pb-0">
				<div class="card-header">
					<button type="button" id="addVariantBtn" class="btn btn-primary btn-square">Add New Variant</button>
				</div>
				<div class="card-body" id="addVariantFormRow" style="display: none;">
					<form class="border p-4 rounded" id="variantForm" action="<?= base_url() ?>variable/saveVariant" method="post">
						<input type="hidden" name="id">
						<input type="hidden" name="variable_id">
						<div class="row align-items-center">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Name</label>
									<input type="text" class="form-control" name="variant_name" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Informatie tooltip</label>
									<input type="text" class="form-control" name="tooltip_info" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Variant Options</label>
									<select class="default-select form-control" name="variant_option" required>
										<option value="">Select</option>
										<option>Necessary</option>
										<option>Optional</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Automatic evaluation</label>
									<select class="default-select form-control" name="auto_evaluation" required>
										<option value="">Select</option>
										<option>Age</option>
										<option>Gender</option>
										<option>No age evaluation</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Display on Frontend</label>
									<div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue" name="display_on_frontend" value="Yes">Yes
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue" name="display_on_frontend" value="No">No
											</label>
										</div>
										<div class="form-check form-check-inline disabled">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue" name="display_on_frontend" value="Always_Yes">Always&nbsp;Yes
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row" id="ifDoF" style="display: none;">
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label">Name on frontend</label>
										<input type="text" name="name_on_frontend" required class="form-control" disabled>

									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label">Frontend interaction</label>
										<select class="default-select form-control" name="frontend_interaction" required disabled>
											<option>Select</option>
											<option>Empty box for value</option>
											<option>(Yes/No) Function dropdown</option>
											<option>(Yes/No) date field</option>
											<option>No special</option>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="from-group mb-3">
										<label class="form-label">Interaction with variants</label>
										<select class="default-select form-control" name="interaction_with_variant" required disabled>
											<option>Select</option>
											<option>Swatch</option>
											<option>List with checkbox </option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<h5 class="mb-3">List the computing variables</h5>
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Month 2 date intervals</label>
									<table>
										<tbody>
											<tr>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Outside_0" value="Outside 0">Outside&nbsp;0
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Outside_0" value="+1">+1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Outside_0" value="+2">+2
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Outside_0" value="-1">-1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Outside_0" value="-2">-2
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Inside_0" value="Inside 0">Inside 0
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Inside_0" value="+1">+1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Inside_0" value="+2">+2
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Inside_0" value="-1">-1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="Inside_0" value="-2">-2
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="5">
													<div class="form-check form-check-inline">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="month_intervals" data-row="" value="Only start date and end date">Only start date and end date
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">Days 2 date intervals</label>
									<table>
										<tbody>
											<tr>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Outside_0" value="Outside 0">Outside&nbsp;0
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Outside_0" value="+1">+1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Outside_0" value="+2">+2
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Outside_0" value="-1">-1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Outside_0" value="-2">-2
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Inside_0" value="Inside 0">Inside 0
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Inside_0" value="+1">+1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Inside_0" value="+2">+2
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Inside_0" value="-1">-1
														</label>
													</div>
												</td>
												<td>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="days_intervals" data-row="Inside_0" value="-2">-2
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
								<div class="from-group mb-3">
									<label class="form-label">One Date</label>
									<div class="computing-list grid-view2">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="one_date" value="Months before">Months before
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="one_date" value="Months After">Months After
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="one_date" value="Months before except">Months before except
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="one_date" value="Months after except">Months after except
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input form-check-inputblue comp-var" data-comvar="one_date" value="Only date">Only date
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="row">
						<input type="hidden" name="month_intervals">
						<input type="hidden" name="days_intervals">
						<input type="hidden" name="one_date">
						<div class="row mt-4">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary btn-square"> Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<!-- </form> -->
		<div class="card project-main pb-0">
			<div class="card-body">
				<h3>Variants List</h3>
				<div class="table-responsive table-border">
					<table class="table ">
						<thead>
							<tr>
								<th>Name</th>
								<th>Name on frontend</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($variants_list)) {
								foreach ($variants_list as $var) { ?>
									<tr>
										<td><?= $var['name'] ?></td>
										<td><?= $var['name_on_frontend'] ?></td>
										<td>
											<div class="d-flex">
												<a href="javascript:void(0);" class="me-2 edt-variant-btn" data-id="<?= $var['id'] ?>"><i class="las la-edit text-success"></i></a>
												<a href="javascript:void(0);" class="dlt-variant-btn" data-id="<?= $var['id'] ?>"><i class="las la-trash-alt text-danger"></i></a>
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
			<div class="card-body">
				<h3>Variables List</h3>
				<div class="table-responsive table-border">
					<table class="table ">
						<thead>
							<tr>
								<th>Name</th>
								<!-- <th>Name on frontend</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($variables_list)) {
								foreach ($variables_list as $var) { ?>
									<tr>
										<td><a class="text-black" href="<?= base_url('admin/view_variable/'.$var['id']) ?>"><?= $var['name'] ?></a></td>
										<!-- <td>Lorem Ipsum</td> -->
										<td>
											<div class="d-flex">
												<a href="javascript:void(0);" class="me-2 edt-variable-btn" data-id="<?= $var['id'] ?>"><i class="las la-edit text-success"></i></a>
												<a href="javascript:void(0);" class="dlt-variable-btn" data-id="<?= $var['id'] ?>"><i class="las la-trash-alt text-danger"></i></a>
											</div>
										</td>
									</tr>
							<?php }
							} else { ?>
								<tr>
									<td colspan="2" class="text-center">No data found</td>
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
<div class="modal fade" id="uploadCaen">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload CAEN</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<div class="modal-body">
				<form id="addCaenForm" action="<?= base_url('caen/import') ?>" method="POST" enctype="multipart/form-data">
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

		/**
		 * if you have a pending variable then display it's form field
		 */
		<?php if(!empty($pending_variable['auto_evaluation'])) { ?>
			let edtUrl = '<?= base_url() ?>variable/editVariable'
			$("#addVariableForm").attr('action', edtUrl)
			$("#addVariableForm input[name=id]").val('<?= $pending_variable['id'] ?>')
			$("input#active_variable_id").val('<?= $pending_variable['id'] ?>')
			$("#addVariableForm input[name=variable_name]").val('<?= $pending_variable['name'] ?>')
			$("#addVariableForm select[name=auto_evaluation]").selectpicker('val', '<?= $pending_variable['auto_evaluation'] ?>')
			$("#addVarFormRow").slideDown()
		<?php } ?>

		$(".final-sbmit-btn").on('click', function() {
			let variableId = $(this).data('variable_id')
			// alert(variableId)

			if(variableId) {
				finalSubmitVariable(variableId).then(data => data ? window.location.reload() : '')
			}
			
		})
		
		/**
		 * 
		 */
		$("input[name=display_on_frontend]").on("change", function() {
			let $check = $(this)
			if ($check.is(":checked")) {
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = $("input[name=display_on_frontend]");
				// the checked state of the group/box on the other hand will change
				// and the current value is retrieved using .prop() method
				$(group).prop("checked", false);
				$check.prop("checked", true);
				if ($(this).val() == "Yes" || $(this).val() == "Always_Yes") {
					$("#ifDoF").slideDown()
					$("#ifDoF input[name='name_on_frontend']").removeAttr('disabled')
					$("#ifDoF select[name='frontend_interaction']").removeAttr('disabled')
					$("#ifDoF select[name='interaction_with_variant']").removeAttr('disabled')
					// refresh selectpicker after change
					$("#ifDoF select[name='frontend_interaction']").selectpicker('refresh');
					$("#ifDoF select[name='interaction_with_variant']").selectpicker('refresh');
				}
				if ($(this).val() == "" || $(this).val() == "No") {
					$("#ifDoF").slideUp()
					$("#ifDoF input[name='name_on_frontend']").attr('disabled', true)
					$("#ifDoF select[name='frontend_interaction']").attr('disabled', true)
					$("#ifDoF select[name='interaction_with_variant']").attr('disabled', true)
					// refresh selectpicker after change
					$("#ifDoF select[name='frontend_interaction']").selectpicker('refresh');
					$("#ifDoF select[name='interaction_with_variant']").selectpicker('refresh');


				}
			} else {
				$check.prop("checked", false);

			}
		});

		$("#addVarBtn").on("click", function() {
			let pendingVar = $("#active_variable_id").val();
			if(pendingVar) {
				toastr.warning('Please add variant for current variable first.')
			}
			else {
				let url = '<?= base_url() ?>variable/saveVariable'
				// alert(url);
				$("#addVariableForm").attr('action', url)
				$("#addVarFormRow").slideDown()
			}
		}); 
		$("#addVariantBtn").on("click", function() {
			let pendingVar = $("#active_variable_id").val();
			if(pendingVar) {
				let url = '<?= base_url() ?>variable/saveVariant';
				$("form#variantForm").attr('action', url)
				$("form#variantForm input[name='variable_id']").val(pendingVar)
				$("#addVariantFormRow").slideDown()
			}
			else {
				toastr.warning('Please add/select variable first.')
			}
		});

		// the selector will match all input controls of type :checkbox
		// and attach a click event handler 
		$(".comp-var").on('click', function() {
			// in the handler, 'this' refers to the box clicked on
			let $box = $(this);
			if ($box.is(":checked")) {
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = $(".comp-var");
				// the checked state of the group/box on the other hand will change
				// and the current value is retrieved using .prop() method
				$(group).prop("checked", false);
				$box.prop("checked", true);
				let comvar = $box.data('comvar')

			} else {
				$box.prop("checked", false);
			}
		});


		$(document).on('click', ".dlt-variant-btn", function() {
			// console.log($(this).data('id'));
			let variantId = $(this).data('id')
			if (variantId) {
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
							"id": variantId
						}
						var url = '<?= base_url() ?>variable/deleteVariantById'
						$.ajax({
							url: url,
							method: "POST",
							data: data,
							success: function(response) {
								Swal.fire(
									'Deleted!',
									'Variant has been deleted successfully.',
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
			}
		})

		$(document).on('click', ".dlt-variable-btn", function() {
			// console.log($(this).data('id'));
			let variableId = $(this).data('id')
			if (variableId) {
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
							"id": variableId
						}
						var url = '<?= base_url() ?>variable/deleteVariableById'
						$.ajax({
							url: url,
							method: "POST",
							data: data,
							success: function(response) {
								Swal.fire(
									'Deleted!',
									'Variable has been deleted successfully.',
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
			}
		})

		$(document).on('click', ".edt-variant-btn", function() {
			let variantId = $(this).data('id')
			// alert(variantId)
			if (variantId) {
				fetchVariantById(variantId).then(data => {
					// console.log(data)
					renderVariantForm(data.variant_info)
					renderVariableForm(data.variable_info)
				})
			}
		})
		
		$(document).on('click', ".edt-variable-btn", function() {
			let variableId = $(this).data('id')
			// alert(variableId)
			if (variableId) {
				fetchVariableById(variableId).then(data => {
					// console.log(data)
					renderVariableForm(data)
					$("input#active_variable_id").val(data?.id)
				})
			}
		})



		$("#variantForm").submit(function(e) {
			e.preventDefault()
			let com = $(".comp-var:checked").val()
			let nm = $(".comp-var:checked").attr('data-comvar')
			let row = ""
			// alert(nm)
			if (nm) {
				$(`input[name="${nm}"]`).val(com)
				if(nm == "month_intervals" || nm == "days_intervals") {
					row = $(".comp-var:checked").attr('data-row')
				}
				$(`input[name=row]`).val(row)
			}
			// alert($(`input[name="${nm}"]`).val())
			document.getElementById("variantForm").submit();

			// alert(com)
			// alert(nm)

			// const personalDataFormValidation = new JustValidate('#clientPDataForm');
			// personalDataFormValidation
			// .addField('#personalData_name', [{
			// 	rule: 'required',
			// 	errorMessage: 'Name is required',
			// }, ])
			// .addField('#personalData_surname', [{
			// 	rule: 'required',
			// 	errorMessage: 'Surname is required',
			// }, ])
			// .addField('#personalData_personal_number', [{
			// 		rule: 'required',
			// 		errorMessage: 'Personal Number is required',
			// 	},
			// 	{
			// 		rule: 'minLength',
			// 		value: 13,
			// 	},
			// 	{
			// 		rule: 'maxLength',
			// 		value: 13,
			// 	},
			// ])
			// .addField('#personalData_mobile_number', [{
			// 		rule: 'required',
			// 		errorMessage: 'Mobile Number is required',
			// 	},
			// 	{
			// 		rule: 'minLength',
			// 		value: 10,
			// 	},
			// 	{
			// 		rule: 'maxLength',
			// 		value: 10,
			// 	},
			// ])
			// .addField('#personalData_national_id_code', [{
			// 		rule: 'required',
			// 		errorMessage: 'National ID is required',
			// 	},
			// 	{
			// 		rule: 'minLength',
			// 		value: 2,
			// 	},
			// 	{
			// 		rule: 'maxLength',
			// 		value: 2,
			// 	},

			// ])
			// .addField('#personalData_national_id_number', [{
			// 		rule: 'required',
			// 		errorMessage: 'National ID Number is required',
			// 	},
			// 	{
			// 		rule: 'minLength',
			// 		value: 6,
			// 	},
			// 	{
			// 		rule: 'maxLength',
			// 		value: 6,
			// 	},
			// ])
			// .addField('#personalData_dob', [{
			// 	rule: 'required',
			// 	errorMessage: 'DOB is required',
			// }, ])
			// .addField('#personalData_address_city', [{
			// 	rule: 'required',
			// 	errorMessage: 'City is required',
			// }, ])
			// .addField('#personalData_address_area', [{
			// 	rule: 'required',
			// 	errorMessage: 'Area is required',
			// }, ])
			// .addField('#personalData_address_other', [{
			// 	rule: 'required',
			// 	errorMessage: 'Other address details is required',
			// }, ])
			// .onSuccess((e) => {

			// });
		})

		async function fetchVariantById(id) {
			let url = '<?= base_url() ?>variable/fetchVariantById';
			let data = new FormData()
			data.append('id', id)

			const response = await fetch(url, {
				method: 'POST',
				body: data
			})

			return response.json()
		}

		async function fetchVariableById(id) {
			let url = '<?= base_url() ?>variable/fetchVariableById';
			let data = new FormData()
			data.append('id', id)

			const response = await fetch(url, {
				method: 'POST',
				body: data
			})

			return response.json()
		}

		async function finalSubmitVariable(variableId) {
			let url = '<?= base_url() ?>variable/finalSubmitVariable'

			let data = new FormData()
			data.append('variableId', variableId)

			const response = await fetch(url, {
				method: 'POST',
				body: data
			});

			return response.json()
		}

		function renderVariableForm(data) {
			// console.log(data);
			// let form = $("#addVariableForm")
			let edtUrl = '<?= base_url() ?>variable/editVariable'
			$("#addVariableForm").attr('action', edtUrl)
			$("#addVariableForm input[name=id]").val(data.id)
			$("#addVariableForm input[name=variable_name]").val(data.name)
			$("#addVariableForm select[name=auto_evaluation]").selectpicker('val', data.auto_evaluation)
			$("#addVarFormRow").slideDown()
			
		}

		function renderVariantForm(data) {
			console.log(data);
			let editUrl = '<?= base_url() ?>variable/editVariant';
			$("#addVariantFormRow").slideDown()
			$("form#variantForm").attr("action", editUrl);
			$("form#variantForm").trigger("reset");
			$("form#variantForm input[name=id]").val(data.id)
			$("form#variantForm input[name=variant_name]").val(data.name)
			$("form#variantForm input[name=tooltip_info]").val(data.tooltip)
			$("form#variantForm select[name=variant_option]").selectpicker('val', data.variant_option)
			$("form#variantForm select[name=auto_evaluation]").selectpicker('val', data.auto_evaluation)
			$("form#variantForm input[name=display_on_frontend][value="+ data.display_on_frontend +"]").prop('checked', true)
			$("form#variantForm input[name=display_on_frontend]").change()
			$("form#variantForm input[name=name_on_frontend]").val(data.name_on_frontend)
			$("form#variantForm select[name=frontend_interaction]").selectpicker('val', data.frontend_interaction)
			$("form#variantForm select[name=interaction_with_variant]").selectpicker('val', data.interaction_with_variant)
			if(data.month_intervals !== null) {
				if(data.row !== null) {
					$("form#variantForm input[data-comvar=month_intervals][value='"+data.month_intervals+"'][data-row="+data.row+"]").prop('checked', true)
				}
				else {
					$("form#variantForm input[data-comvar=month_intervals][value='"+data.month_intervals+"']").prop('checked', true)
				}
				$(".comp-var").change()
			}
			if(data.days_intervals !== null) {
				if(data.row !== null)
					$("form#variantForm input[data-comvar=days_intervals][value='"+ data.days_intervals +"'][data-row="+data.row+"]").prop('checked', true);
				else 
					$("form#variantForm input[data-comvar=days_intervals][value='"+ data.days_intervals +"']").prop('checked', true)
				$(".comp-var").change()
			}
			if(data.one_date !== null) {
				$("form#variantForm input[data-comvar=one_date][value='"+ data.one_date +"']").prop('checked', true)
				$(".comp-var").change()
			}
		}
	})
</script>
