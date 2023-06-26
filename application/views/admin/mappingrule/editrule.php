<style>
	.form-group label {
		margin-bottom: 0;
	}
</style>
<!--Start: Page main heading -->
<div class="container-fluid page-sub-head d-md-block d-none">
	<div class="d-flex flex-nowrap justify-content-between align-items-center">
		<div class="100%">
			<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
			<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
		</div>
	</div>
</div>
<!--End: Page main heading -->

<!--Start: Content body -->
<div class="content-body content-area-scroll">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header flex-flow-column">
				<div class="row justify-content-center align-items-center w-100">
					<div class="col-auto">
						<div class="form-group mb-md-0">
							<label class="form-label">Document Type:</label>
						</div>
					</div>
					<div class="col-auto">
						<div class="form-group mb-md-0">
							<select class="default-select form-control" id="document_type">
								<option value="212" <?php echo isset($mappingrule) && $mappingrule['document_type'] == '212' ? 'selected' : ''; ?> >212</option>
								<option value="168" <?php echo isset($mappingrule) && $mappingrule['document_type'] == '168' ? 'selected' : ''; ?> >168</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="project-nav">
					<div class="card-action card-tabs card-tabs2 w-100">
						<ul class="nav nav-tabs style-1 w-100 w-scroll-new" id="ListViewTabLink">
							<?php
							$rule_type = 'pdf';
							$action_type = 'count';
							$component = 'button';
							if (isset($mappingrule)) {
								$rule_type = $mappingrule['rule_type'];
								$action_type = $mappingrule['action_type'];
								$component = $mappingrule['component'];
							}
							?>
							<li class="nav-item">
								<a href="#navpills-1" class="nav-link <?php echo $rule_type == 'pdf' ? 'active' : ''; ?>" data-bs-toggle="tab" aria-expanded="false">RULES FOR
									<span class="d-block">PDF</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-2" class="nav-link <?php echo $rule_type== 'xml' ? 'active' : ''; ?>" data-bs-toggle="tab" aria-expanded="false">RULES FOR
									<span class="d-block">XML</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#navpills-3" class="nav-link <?php echo $rule_type== 'invoice' ? 'active' : ''; ?>" data-bs-toggle="tab" aria-expanded="false">RULES FOR
									<span class="d-block">INVOICE</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<input type="text" id="id" value="<?php echo isset($mappingrule) ? $mappingrule['id'] : ''; ?>" hidden>
					<div class="tab-pane fade <?php echo $rule_type == 'pdf' ? 'active' : ''; ?> show pdf-rule-wrap" id="navpills-1">
						<div class="project-main2">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">Component Type</label>
										<div>
											<?php
											$component = 'button';
											if (isset($mappingrule)) {
												$component = $mappingrule['component'];
											}
											?>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="pdf_component_type" value="button" class="form-check-input form-check-inputblue" <?php echo $component != 'checkbox' ? 'checked' : ''; ?>>Button
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="pdf_component_type" value="checkbox" class="form-check-input form-check-inputblue" <?php echo $component == 'checkbox' ? 'checked' : ''; ?>>Checkbox
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php if ($rule_type == 'pdf') { ?>
								<?php foreach ($web_paths as $key => $value): ?>
									<div class="row path_field_wrap">
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path" value="<?php echo $value['pdf_field_path']; ?>">
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<button type="button" class="btn btn-outline-primary path-remove"> - </button>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php } ?>
							<div class="row path_field_wrap">
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path">
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<button type="button" class="btn btn-outline-primary path-add"> + </button>
									</div>
								</div>
							</div>
							<div class="row" id="condition_wrap">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="condition_checkbox" <?php echo $rule_type == 'pdf' && !empty($rule_conditions) ? 'checked' : ''; ?>>
											<label class="form-check-label" for="condition_checkbox">
												Conditions
											</label>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<select class="default-select form-control" id="pdf_matching_mode">
											<option value="all">All</option>
											<option value="any">Any</option>
										</select>
									</div>
								</div>
							</div>
							<?php if ($rule_type == 'pdf') { ?>
								<?php foreach ($rule_conditions as $key => $value): ?>
									<div class="row condition_field_wrap">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="form-group">
											<select class="default-select form-control condition-field">
												<option value=""> Select </option>
												<?php foreach($webfields as $row) { ?>
													<option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $rule_conditions[$key]['field_mappings_id'] ? 'selected' : ''; ?>><?php echo $row['field_label'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-auto">
										<div class="form-group">
											<select class="default-select form-control condition-function">
												<option value="is" <?php echo $rule_conditions[$key]['function'] == 'is' ? 'selected' : ''; ?> >is</option>
												<option value="is not" <?php echo $rule_conditions[$key]['function'] == 'is not' ? 'selected' : ''; ?> >is not</option>
												<option value="equals or greater than" <?php echo $rule_conditions[$key]['function'] == 'equals or greater than' ? 'selected' : ''; ?> >equals or greater than</option>
												<option value="equals or less than" <?php echo $rule_conditions[$key]['function'] == 'equals or less than' ? 'selected' : ''; ?> >equals or less than</option>
												<option value="greater than" <?php echo $rule_conditions[$key]['function'] == 'greater than' ? 'selected' : ''; ?> >greater than</option>
												<option value="less than" <?php echo $rule_conditions[$key]['function'] == 'less than' ? 'selected' : ''; ?> >less than</option>
												<option value="contains" <?php echo $rule_conditions[$key]['function'] == 'contains' ? 'selected' : ''; ?> >contains</option>
												<option value="does not contain" <?php echo $rule_conditions[$key]['function'] == 'does not contain' ? 'selected' : ''; ?> >does not contain</option>
											</select>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="form-group">
											<input type="text" class="form-control condition-value" value="<?php echo $rule_conditions[$key]['value']?>">
										</div>
									</div>
									<div class="col-auto">
										<div class="form-group">
											<button type="button" class="btn btn-outline-primary condition-remove"> - </button>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							<?php } ?>
							<div class="row <?php echo $action_type == 'condition' && !empty($rule_conditions) ? '' : 'd-none'; ?> condition_field_wrap">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<select class="default-select form-control condition-field">
											<option value=""> Select </option>
											<?php foreach($webfields as $row) { ?>
												<option value="<?php echo $row['id'] ?>"><?php echo $row['field_label'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<select class="default-select form-control condition-function">
											<option value="is">is</option>
											<option value="is not">is not</option>
											<option value="equals or greater than">equals or greater than</option>
											<option value="equals or less than">equals or less than</option>
											<option value="greater than">greater than</option>
											<option value="less than">less than</option>
											<option value="contains">contains</option>
											<option value="does not contain">does not contain</option>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control condition-value" value="">
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<button type="button" class="btn btn-outline-primary condition-add"> + </button>
									</div>
								</div>
							</div>

							<div class="row ">
								<div class="col-sm-10">
									<button id="submit_pdf_rule" class="btn btn-primary btn-square">Save</button>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade <?php echo $rule_type == 'xml' ? 'active' : ''; ?> show xml-rule-wrap" id="navpills-2">
						<div class="project-main2">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="form-label">Component Type</label>
										<div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="xml_component_type" value="textbox" class="form-check-input form-check-inputblue" <?php echo $component != 'radio' ? 'checked' : ''; ?>>Text Box
												</label>
											</div>
											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="xml_component_type" value="radio" class="form-check-input form-check-inputblue" <?php echo $component == 'radio' ? 'checked' : ''; ?>>Radio
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-6 col-xs-12 <?php echo $component != 'radio' && $action_type != 'concat' ? '' : 'd-none'; ?>" id="copy_field_wrap">
									<div class="form-group">
										<label class="form-label">Web Field</label>
										<select class="default-select form-control" id="copy_field">
											<?php foreach($webfields as $row) { ?>
												<option value="<?php echo $row['id'] ?>" <?php echo (isset($mappingrule) && ($mappingrule['field_mappings_ids'] == $row['id'])) ? 'selected' : ''; ?>><?php echo $row['field_label'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12 <?php echo $component != 'radio' && $action_type == 'concat' ? '' : 'd-none'; ?>" id="concat_fields_wrap">
									<div class="form-group">
										<label class="form-label">Web Fields</label>
										<select class="default-select form-control" id="concat_field" multiple>
											<?php foreach($webfields as $row) { ?>
												<option value="<?php echo $row['id'] ?>" <?php echo in_array($row['id'], $selected_fields) ? 'selected' : ''; ?> ><?php echo $row['field_label'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12 <?php echo $component != 'radio' ? '' : 'd-none'; ?>" id="xml_action_type_wrap">
									<div class="form-group">
										<label class="form-label">Action Type</label>
										<select class="default-select form-control" id="xml_action_type">
											<option value="copy" <?php echo $action_type != 'concat' ? 'selected' : ''; ?> >Copy</option>
											<option value="concat" <?php echo $action_type == 'concat' ? 'selected' : ''; ?> >Concat</option>
										</select>
									</div>
								</div>
							</div>
							<?php if ($rule_type == 'xml' && $component == 'textbox') { ?>
								<?php foreach ($web_paths as $key => $value): ?>
									<div class="row path_field_wrap textbox_path_wrap <?php echo $component != 'radio' ? '' : 'd-none'; ?>">
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path" value="<?php echo $value['pdf_field_path']; ?>">
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<button type="button" class="btn btn-outline-primary path-remove"> - </button>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php } ?>
							<div class="row path_field_wrap textbox_path_wrap <?php echo $component != 'radio' ? '' : 'd-none'; ?>">
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path">
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<button type="button" class="btn btn-outline-primary path-add"> + </button>
									</div>
								</div>
							</div>
							<?php if ($rule_type == 'xml' && $component == 'radio') { ?>
								<?php foreach ($web_paths as $key => $value): ?>
									<div class="row path_field_wrap radio_path_wrap">
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control" name="radio_field_path" placeholder="Path" value="<?php echo $value['pdf_field_path']; ?>">
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control" name="radio_field_value" placeholder="Value" value="<?php echo $value['value']; ?>">
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<button type="button" class="btn btn-outline-primary path-remove"> - </button>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php } ?>
							<div class="row path_field_wrap radio_path_wrap <?php echo $component == 'radio' ? '' : 'd-none'; ?>">
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control" name="radio_field_path" placeholder="Path">
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control" name="radio_field_value" placeholder="Value">
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<button type="button" class="btn btn-outline-primary path-add"> + </button>
									</div>
								</div>
							</div>
							<div class="row" id="xml_condition_wrap">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="xml_condition_checkbox" <?php echo $rule_type == 'xml' && !empty($rule_conditions) ? 'checked' : ''; ?>>
											<label class="form-check-label" for="xml_condition_checkbox">
												Conditions
											</label>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<select class="default-select form-control" id="xml_matching_mode">
											<option value="all">All</option>
											<option value="any">Any</option>
										</select>
									</div>
								</div>
							</div>
							<?php if ($rule_type == 'xml') { ?>
								<?php foreach ($rule_conditions as $key => $value): ?>
									<div class="row condition_field_wrap">
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="form-group">
												<select class="default-select form-control condition-field">
													<option value=""> Select </option>
													<?php foreach($webfields as $row) { ?>
														<option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $rule_conditions[$key]['field_mappings_id'] ? 'selected' : ''; ?>><?php echo $row['field_label'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<select class="default-select form-control condition-function">
													<option value="is" <?php echo $rule_conditions[$key]['function'] == 'is' ? 'selected' : ''; ?> >is</option>
													<option value="is not" <?php echo $rule_conditions[$key]['function'] == 'is not' ? 'selected' : ''; ?> >is not</option>
													<option value="equals or greater than" <?php echo $rule_conditions[$key]['function'] == 'equals or greater than' ? 'selected' : ''; ?> >equals or greater than</option>
													<option value="equals or less than" <?php echo $rule_conditions[$key]['function'] == 'equals or less than' ? 'selected' : ''; ?> >equals or less than</option>
													<option value="greater than" <?php echo $rule_conditions[$key]['function'] == 'greater than' ? 'selected' : ''; ?> >greater than</option>
													<option value="less than" <?php echo $rule_conditions[$key]['function'] == 'less than' ? 'selected' : ''; ?> >less than</option>
													<option value="contains" <?php echo $rule_conditions[$key]['function'] == 'contains' ? 'selected' : ''; ?> >contains</option>
													<option value="does not contain" <?php echo $rule_conditions[$key]['function'] == 'does not contain' ? 'selected' : ''; ?> >does not contain</option>
												</select>
											</div>
										</div>
										<div class="col-md-3 col-sm-6 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control condition-value" value="<?php echo $rule_conditions[$key]['value']?>">
											</div>
										</div>
										<div class="col-auto">
											<div class="form-group">
												<button type="button" class="btn btn-outline-primary condition-remove"> - </button>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							<?php } ?>
							<div class="row <?php echo $rule_type == 'xml' && !empty($rule_conditions) ? '' : 'd-none'; ?> condition_field_wrap">
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<select class="default-select form-control condition-field">
											<option value=""> Select </option>
											<?php foreach($webfields as $row) { ?>
												<option value="<?php echo $row['id'] ?>"><?php echo $row['field_label'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<select class="default-select form-control condition-function">
											<option value="is">is</option>
											<option value="is not">is not</option>
											<option value="equals or greater than">equals or greater than</option>
											<option value="equals or less than">equals or less than</option>
											<option value="greater than">greater than</option>
											<option value="less than">less than</option>
											<option value="contains">contains</option>
											<option value="does not contain">does not contain</option>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-12">
									<div class="form-group">
										<input type="text" class="form-control condition-value" value="">
									</div>
								</div>
								<div class="col-auto">
									<div class="form-group">
										<button type="button" class="btn btn-outline-primary condition-add"> + </button>
									</div>
								</div>
							</div>

							<div class="row ">
								<div class="col-sm-10">
									<button id="submit_xml_rule" class="btn btn-primary btn-square">Save</button>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade <?php echo $rule_type == 'invoice' ? 'active' : ''; ?> show invoice-rule-wrap" id="navpills-3">
						<div class="project-main2">
							<div class="row">
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="form-group">
										<label class="form-label">Label</label>
										<?php if ($rule_type == 'invoice' && !empty($web_paths)) { ?>
											<input type="text" class="form-control" id="invoice_path" placeholder="Value" value="<?php echo $web_paths[0]['pdf_field_path']; ?>">
										<?php } else { ?>
											<input type="text" class="form-control" id="invoice_path" placeholder="Value">
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Web Field</label>
											<select class="default-select form-control" id="invoice_field">
												<?php foreach($webfields as $row) { ?>
													<option value="<?php echo $row['id'] ?>" <?php echo in_array($row['id'], $selected_fields) ? 'selected' : ''; ?>><?php echo $row['field_label']?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row ">
								<div class="col-sm-10">
									<button id="submit_invoice_rule" class="btn btn-primary btn-square">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End: Content body -->

<script>
	//////////////////////////// PDF ////////////////////////////
	$("input[name=pdf_component_type]").change(function() {
		$('.pdf-rule-wrap .condition_field_wrap').addClass('d-none');
		$('#condition_checkbox').prop('checked', false);

		let val = $(this).val();
		if (val == 'button') {
		} else if (val == 'checkbox') {
		}
	});

	$("#condition_checkbox").change(function() {
		let isChecked = $(this).is(':checked');
		if(isChecked) {
			$('.pdf-rule-wrap .condition_field_wrap').removeClass('d-none');
		} else {
			$('.pdf-rule-wrap .condition_field_wrap').addClass('d-none');
		}
	});

	$('#submit_pdf_rule').click(function() {
		let document_type = $('#document_type').val();
		let id = $('#id').val();
		let component_type = $('input[name=pdf_component_type]:checked').val();
		let matching_mode = $('#pdf_matching_mode').val();
		let conditions = [];
		let isConditionChecked = $('#condition_checkbox').is(':checked');
		let action_type = 'count';

		if (isConditionChecked) {
			let action_type = 'condition';
			let condition_field_wraps = $('.pdf-rule-wrap .condition_field_wrap');
			for(let i = 0; i < condition_field_wraps.length; i++) {
				let condition_field = $(condition_field_wraps[i]).find('select.condition-field').val();
				let condition_function = $(condition_field_wraps[i]).find('select.condition-function').val();
				let condition_value = $(condition_field_wraps[i]).find('.condition-value').val();
				if (condition_field) {
					conditions.push({
						'field_mappings_id': condition_field,
						'function': condition_function,
						'value': condition_value,
						'matching_mode': matching_mode,
					});
				}
			}
		}

		let pathFields = $('.pdf-rule-wrap .path_field_wrap input');
		let path_fields_list = [];
		for (let i = 0; i < pathFields.length; i++) {
			let path = $(pathFields[i]).val();
			if (path) {
				path_fields_list.push({
					"pdf_field_path": path,
				});
			}
		}

		let data = {
			"id": id,
			"document_type": document_type,
			"rule_type": "pdf",
			"component": component_type,
			"action_type": action_type,
			"path_fields": path_fields_list,
			"conditions": conditions,
		}

		var url = 'saveMappingRule'
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			success: function(response)
			{
				let resp = JSON.parse(response)
				if (resp.success) {
					toastr.success('Successfully saved!');
					setTimeout(function () {
						window.location.href = "<?= base_url() ?>admin/mappingrule";
					}, 1000);
				} else {
					toastr.error(resp.message);
				}
			}
		});
	});

	/////////////////////////////// XML /////////////////////////////////
	$("input[name=xml_component_type]").change(function() {
		$('.xml-rule-wrap #copy_field_wrap').addClass('d-none');
		$('.xml-rule-wrap #concat_fields_wrap').addClass('d-none');
		$('.xml-rule-wrap #xml_action_type_wrap').addClass('d-none');
		$('.xml-rule-wrap .textbox_path_wrap').addClass('d-none');
		$('.xml-rule-wrap .radio_path_wrap').addClass('d-none');

		let val = $(this).val();
		if (val == 'textbox') {
			$('.xml-rule-wrap #xml_action_type_wrap').removeClass('d-none');
			$('.xml-rule-wrap .textbox_path_wrap').removeClass('d-none');
			if ($('#xml_action_type_wrap').val() == 'copy') {
				$('.xml-rule-wrap #copy_field_wrap').removeClass('d-none');
			} else {
				$('.xml-rule-wrap #concat_fields_wrap').removeClass('d-none');
			}
		} else if (val == 'radio') {
			$('.xml-rule-wrap .radio_path_wrap').removeClass('d-none');
		}
	});

	$("#xml_action_type_wrap").change(function() {
		$('.xml-rule-wrap #copy_field_wrap').addClass('d-none');
		$('.xml-rule-wrap #concat_fields_wrap').removeClass('d-none');
		if($("#xml_action_type_wrap").val() == 'copy') {
			$('.xml-rule-wrap #copy_field_wrap').removeClass('d-none');
		} else if($("#xml_action_type_wrap").val() == 'concat') {
			$('.xml-rule-wrap #concat_fields_wrap').addClass('d-none');
		}
	});

	$("#xml_condition_checkbox").change(function() {
		let isChecked = $(this).is(':checked');
		if(isChecked) {
			$('.xml-rule-wrap .condition_field_wrap').removeClass('d-none');
		} else {
			$('.xml-rule-wrap .condition_field_wrap').addClass('d-none');
		}
	});

	$('#submit_xml_rule').click(function() {
		let id = $('#id').val();
		let document_type = $('#document_type').val();
		let component_type = $('input[name=xml_component_type]:checked').val();
		let action_type = $('#xml_action_type').val();
		let matching_mode = $('#xml_matching_mode').val();
		let textbox_path_wrappers = $('.xml-rule-wrap .textbox_path_wrap');
		let radio_path_wrappers = $('.xml-rule-wrap .radio_path_wrap');
		let path_fields_list = [];
		let web_field = '';
		if (component_type == 'textbox') {
			if (action_type == 'copy') {
				web_field = $('#copy_field').val();
			} else if (action_type == 'concat') {
				let concat_fields = $('#concat_field').val();
				if (concat_fields) {
					web_field = concat_fields.join();
				}
			}
			for (let i = 0; i < textbox_path_wrappers.length; i++) {
				let path = $(textbox_path_wrappers[i]).find('input[name=pdf-path-field]').val();
				if (path) {
					path_fields_list.push({
						"pdf_field_path": path,
					});
				}
			}
		} else if (component_type == 'radio') {
			action_type = 'value';
			for (let i = 0; i < radio_path_wrappers.length; i++) {
				let radio_field_path = $(radio_path_wrappers[i]).find('input[name=radio_field_path]').val();
				let radio_field_value = $(radio_path_wrappers[i]).find('input[name=radio_field_value]').val();
				if (radio_field_path) {
					path_fields_list.push({
						"pdf_field_path": radio_field_path,
						"value": radio_field_value,
					});
				}
			}
		}

		let conditions = [];
		let isConditionChecked = $('#xml_condition_checkbox').is(':checked');
		if (isConditionChecked) {
			let condition_field_wraps = $('.xml-rule-wrap .condition_field_wrap');
			for(let i = 0; i < condition_field_wraps.length; i++) {
				let condition_field = $(condition_field_wraps[i]).find('select.condition-field').val();
				let condition_function = $(condition_field_wraps[i]).find('select.condition-function').val();
				let condition_value = $(condition_field_wraps[i]).find('.condition-value').val();
				if (condition_field) {
					conditions.push({
						'field_mappings_id': condition_field,
						'function': condition_function,
						'value': condition_value,
						"matching_mode": matching_mode,
					});
				}
			}
		}

		let data = {
			"id": id,
			"document_type": document_type,
			"rule_type": "xml",
			"component": component_type,
			"action_type": action_type,
			"field_mappings_ids": web_field,
			"path_fields": path_fields_list,
			"conditions": conditions,
		};

		var url = 'saveMappingRule';
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			success: function(response)
			{
				let resp = JSON.parse(response)
				if (resp.success) {
					toastr.success('Successfully saved!');
					setTimeout(function () {
						window.location.href = "<?= base_url() ?>admin/mappingrule";
					}, 1000);
				} else {
					toastr.error(resp.message);
				}
			}
		});
	});

	//////////////////// INVOICE ///////////////////////
	$('#submit_invoice_rule').click(function() {
		let document_type = $('#document_type').val();
		let id = $('#id').val();
		let path = $('#invoice_path').val();
		let invoice_field = $('#invoice_field').val();
		let path_fields_list = [];
		if (path) {
			path_fields_list.push({
				"pdf_field_path": path,
			});
		}
		let data = {
			"id": id,
			"document_type": document_type,
			"rule_type": "invoice",
			"component": 'textbox',
			"action_type": 'copy',
			"field_mappings_ids": invoice_field,
			"path_fields": path_fields_list,
		};
		var url = 'saveMappingRule';
		$.ajax({
			url: url,
			method: "POST",
			data: data,
			success: function(response)
			{
				let resp = JSON.parse(response)
				if (resp.success) {
					toastr.success('Successfully saved!');
					setTimeout(function () {
						window.location.href = "<?= base_url() ?>admin/mappingrule";
					}, 1000);
				} else {
					toastr.error(resp.message);
				}
			}
		})
	});

	function initAddRemoveHandlers() {
		$(".condition-add").off('click');
		$(".condition-remove").off('click');
		$(".pdf-rule-wrap .path-add").off('click');
		$(".xml-rule-wrap .path-add").off('click');
		$(".path-remove").off('click');
		$('#xml_action_type').off('change');

		$(".xml-rule-wrap .condition-add").click(function() {
			handleConditionAdd('xml');
		});

		$(".pdf-rule-wrap .condition-add").click(function() {
			handleConditionAdd('pdf');
		});

		$(".condition-remove").click(function() {
			$(this).parents('.condition_field_wrap').remove();
		});

		$(".pdf-rule-wrap .path-add").click(function() {
			$('.pdf-rule-wrap .path_field_wrap:last .path-add').replaceWith('<button type="button" class="btn btn-outline-danger path-remove"> - </button>');
			let field_wrap = generatePathFieldWrap();
			$('.pdf-rule-wrap .path_field_wrap:last').after(field_wrap);
			initAddRemoveHandlers();
		});

		$('.xml_component_type').change(function() {
			let val = $(this).val();
			let actionType = $('#xml_action_type').val();

			if (val) {
				$('.default-select').selectpicker('refresh');

				$('.copy_field_wrap').addClass('d-none');
				$('.concat_fields_wrap').addClass('d-none');
				$('#xml_action_type_wrap').addClass('d-none');
				$('.textbox_path_wrap').addClass('d-none');
				$('.radio_path_wrap').addClass('d-none');

				if (val == 'radio') {
					$('.radio_path_wrap').removeClass('d-none');
				} else if (val == 'textbox') {
					$('#xml_action_type_wrap').removeClass('d-none');
					$('.textbox_path_wrap').removeClass('d-none');
					if (actionType == 'copy') {
						$('.copy_field_wrap').removeClass('d-none');
					} else if (actionType == 'concat') {
						$('.concat_fields_wrap').removeClass('d-none');
					}
				}
			}
		});

		$('#xml_action_type').change(function() {
			let val = $(this).val();
			if (val) {
				$('.default-select').selectpicker('refresh');

				$('.copy_field_wrap').addClass('d-none');
				$('.concat_fields_wrap').addClass('d-none');
				if (val == 'copy') {
					$('.copy_field_wrap').removeClass('d-none');
				} else if (val == 'concat') {
					$('.concat_fields_wrap').removeClass('d-none');
				}
			}
		});

		$(".xml-rule-wrap .textbox_path_wrap .path-add").click(function() {
			$('.xml-rule-wrap .textbox_path_wrap:last .path-add').replaceWith('<button type="button" class="btn btn-outline-danger path-remove"> - </button>');
			let field_wrap = generateTextboxPathFieldWrap();
			$('.xml-rule-wrap .textbox_path_wrap:last').after(field_wrap);
			$('.default-select').selectpicker();
			initAddRemoveHandlers();
		});

		$(".xml-rule-wrap .radio_path_wrap .path-add").click(function() {
			$('.xml-rule-wrap .radio_path_wrap:last .path-add').replaceWith('<button type="button" class="btn btn-outline-danger path-remove"> - </button>');
			let field_wrap = generateRadioPathFieldWrap();
			$('.xml-rule-wrap .radio_path_wrap:last').after(field_wrap);
			$('.default-select').selectpicker();
			initAddRemoveHandlers();
		});

		$(".path-remove").click(function() {
			$(this).parents('.path_field_wrap').remove();
		});
	};

	function handleConditionAdd(ruletype) {
		let wraperClass = '.' + ruletype + '-rule-wrap';
		$(wraperClass + ' .condition_field_wrap:last .condition-add').replaceWith('<button type="button" class="btn btn-outline-danger condition-remove"> - </button>');
		let condition_wrap = generateConditionFieldWrap();
		$(wraperClass + ' .condition_field_wrap:last').after(condition_wrap);
		$('.default-select').selectpicker();

		initAddRemoveHandlers();
	}

	function generatePathFieldWrap() {
		let elem = '<div class="row path_field_wrap">\
						<div class="col-md-4 col-sm-6 col-xs-12">\
							<div class="form-group">\
								<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path">\
							</div>\
						</div>\
						<div class="col-auto">\
							<div class="form-group">\
								<button type="button" class="btn btn-outline-primary path-add"> + </button>\
							</div>\
						</div>\
					</div>';

		return elem;
	}

	function generateTextboxPathFieldWrap() {
		let elem = '<div class="row path_field_wrap textbox_path_wrap">\
						<div class="col-md-4 col-sm-6 col-xs-12">\
							<div class="form-group">\
								<input type="text" class="form-control pdf-path-field" name="pdf-path-field" placeholder="Path">\
							</div>\
						</div>\
						<div class="col-auto">\
							<div class="form-group">\
								<button type="button" class="btn btn-outline-primary path-add"> + </button>\
							</div>\
						</div>\
					</div>';

		return elem;
	}

	function generateRadioPathFieldWrap() {
		let elem = '<div class="row path_field_wrap radio_path_wrap">\
						<div class="col-md-4 col-sm-6 col-xs-12">\
							<div class="form-group">\
								<input type="text" class="form-control" name="radio_field_path" placeholder="Path">\
							</div>\
						</div>\
						<div class="col-md-4 col-sm-6 col-xs-12">\
							<div class="form-group">\
								<input type="text" class="form-control" name="radio_field_value" placeholder="Value">\
							</div>\
						</div>\
						<div class="col-auto">\
							<div class="form-group">\
								<button type="button" class="btn btn-outline-primary path-add"> + </button>\
							</div>\
						</div>\
					</div>';

		return elem;
	}

	function generateConditionFieldWrap() {
		let elem = '<div class="row condition_field_wrap">\
						<div class="col-md-3 col-sm-6 col-xs-12">\
							<div class="form-group">\
								<select class="default-select form-control condition-field">\
									<option value=""> Select </option>\
									<?php foreach($webfields as $row) { ?>\
										<option value="<?php echo $row["id"] ?>"><?php echo $row["field_label"] ?></option>\
									<?php } ?>\
								</select>\
							</div>\
						</div>\
							<div class="col-auto">\
								<div class="form-group">\
									<select class="default-select form-control condition-function">\
										<option value="is">is</option>\
										<option value="is not">is not</option>\
										<option value="equals or greater than">equals or greater than</option>\
										<option value="equals or less than">equals or less than</option>\
										<option value="greater than">greater than</option>\
										<option value="less than">less than</option>\
										<option value="contains" >contains</option>\
										<option value="does not contain">does not contain</option>\
									</select>\
								</div>\
							</div>\
							<div class="col-md-3 col-sm-6 col-xs-12">\
								<div class="form-group">\
									<input type="text" class="form-control condition-value" value="">\
								</div>\
							</div>\
							<div class="col-auto">\
								<div class="form-group">\
									<button type="button" class="btn btn-outline-primary condition-add"> + </button>\
								</div>\
							</div>\
						</div>\
					</div>';

		return elem;
	}

	initAddRemoveHandlers();

</script>
