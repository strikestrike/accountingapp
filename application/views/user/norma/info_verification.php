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
	<div class="container-fluid px-md-5 px-0">
		<div class="project-nav">
			<div class="card-action card-tabs card-tabs2 w-100">
				<ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
					<li class="nav-item">
						<a href="<?= base_url('user/verifyPersonalData/' . $_SESSION['personal_data_id']) ?>" class="nav-link">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
					</li>
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link active">Information Verification </a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('user/generatePdf') ?>" class="nav-link">Document Release </a>
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
						<div class="project-main2">
							<div class="row justify-content-center h-100 align-items-lg-center align-items-sm-center">


								<div class="col">
									<form action="<?= base_url() ?>user/saveNormaInfoVerification" method="POST">
										<input type="hidden" name="personal_data_id" value="<?= $personalData['id'] ?? '' ?>">
										<div class="authincation-content ">
											<div class="card">
												<div class="card-header blue-header d-md-none d-block">
													<h4 class="mx-lg-auto"><span class="las la-angle-left"></span>Information Verification</h4>
												</div>
												<div class="card-body pos-rel">
													<div class="left-upper-shadow">
														<img src="<?= base_url() ?>assets/img/Ellipse-3.png">
													</div>
													<div class="right-lower-shadow">
														<img src="<?= base_url() ?>assets/img/Ellipse-2.png">
													</div>
													<h4 class="text-primary mb-3"> Date personale</h4>
													<div class="row form-group">
														<div class="col-md-3 col-6">
															<label class="form-label mb-1 me-5">Salutation</label>
														</div>
														<div class="col-md-9 col-6">
															<div class="d-flex">
																<div class="form-check me-3">
																	<input class="form-check-input form-check-inputblue shadow-radio" type="radio" value="Mr" <?= $personalData['salutation'] == 'Mr' ? 'checked' : '' ?>>
																	<label class="form-check-label">
																		Mr
																	</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input form-check-inputblue shadow-radio" type="radio" value="Mrs" <?= $personalData['salutation'] == 'Mrs' ? 'checked' : '' ?>>
																	<label class="form-check-label">
																		Mrs
																	</label>
																</div>
															</div>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 col-xs-12">
															<label class="form-label mb-1">Name Surname</label>
														</div>
														<div class="col-md-9 col-xs-12">
															<div class="row">
																<div class="col-md-6 col-xs-12 mb-3">
																	<input type="text" class="form-control" value="<?= $personalData['name'] ?? '' ?>" readonly>
																</div>
																<div class="col-md-6 col-xs-12">
																	<input type="text" class="form-control" value="<?= $personalData['surname'] ?? '' ?>" readonly>
																</div>
															</div>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 col-xs-12">
															<label class="form-label mb-1">Personal Number</label>
														</div>
														<div class="col-md-9 col-xs-12">
															<input type="text" class="form-control" value="<?= $personalData['personal_number'] ?? '' ?>" readonly>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-3 col-xs-12">
															<label class="form-label mb-1">Address</label>
														</div>
														<div class="col-md-9 col-xs-12">
															<input type="text" class="form-control" value="<?= $personalData['address'] ?? '' ?>" readonly>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<div class="form-group">
																<label class="form-label mb-1">County</label>
																<select class="default-select form-control wide">
																	<option><?= $county ?? '' ?></option>
																</select>
															</div>
														</div>

														<div class="col-md-6 col-xs-12">
															<div class="form-group">
																<label class="form-label mb-1">City</label>
																<select class="default-select form-control wide">
																	<option><?= $city ?? '' ?></option>
																</select>
															</div>
														</div>
													</div>

												</div>
											</div>

										</div>

										<div class="authincation-content">
											<div class="card">
												<div class="card-header ">
													<h4 class="text-primary">Rezumat Deckaratie Unica Norma de Venit, 2023</h4>
												</div>
												<div class="card-body">
													<div class="row align-items-center">
														<div class="col-md-3 col-5">
															<div class="form-group">
																<label class="form-label mb-1">Norma venit initiata</label>
															</div>
														</div>

														<div class="col-md-9 col-7">
															<div class="form-group">
																<label class="form-label mb-1">Valoare</label>
																<input type="text" name="norma_venit_initiata" value="<?= $norma_venit_initiata ?? '' ?>" readonly class="form-control">
															</div>
														</div>
														<div class="col-md-3 col-5">
															<div class="form-group">
																<label class="form-label mb-1">Norma ajustata</label>
															</div>
														</div>
														<div class="col-md-9 col-7">
															<div class="form-group">
																<label class="form-label mb-1">Valoare</label>
																<input type="text" name="norma_ajustata" value="<?= $norma_ajustata ?? '' ?>" class="form-control">
															</div>
														</div>
														<div class="col-md-3 col-5">
															<div class="form-group">
																<label class="form-label mb-1">Venit net anual</label>
															</div>
														</div>
														<div class="col-md-9 col-7">
															<div class="form-group">
																<label class="form-label mb-1">Valoare</label>
																<input type="text" name="venit_net_anual" value="<?= round($venit_net_anual) ?? '' ?>" class="form-control">
															</div>
														</div>
														<div class="col-md-3 col-5">
															<div class="form-group">
																<label class="form-label mb-1">Venit impozabila</label>
															</div>
														</div>
														<div class="col-md-9 col-7">
															<div class="form-group">
																<label class="form-label mb-1">Valoare</label>
																<input type="text" class="form-control" name="venit_impozabil" value="<?= $venit_impozabil ?? '' ?>">
															</div>
														</div>
														<div class="col-md-3 col-5">
															<div class="form-group">
																<label class="form-label mb-1">Impozit</label>
															</div>
														</div>
														<div class="col-md-9 col-7">
															<div class="form-group">
																<label class="form-label mb-1">Valoare</label>
																<input type="text" class="form-control" name="impozit" value="<?= $impozit ?? '' ?>">
															</div>
														</div>
													</div>

													<!-- <h4 class="mb-4">Blocks</h4> -->

													<!-- Block for pension mandatory data -->
													<?php if(!empty($pfa_block) && count($pfa_block) > 0) {
														if($pfa_block['visible']) { ?>
															<div class="row mt-4 mb-4">
																<h4 class="mx-lg-auto mb-3">Asigurare pensie obligatorie 2023</h4>
																<div class="col-md-6 col-xs-12">
																	<div class="form-group pos-rel">
																		<label class="form-label mb-1">Valoare impozabila pentru pensie</label>
																		<input type="number" class="form-control" name="pfa_data_block_valoare" value="<?= $pfa_block['valoare'] ?? '' ?>" data-min="<?= $pfa_block['valoare'] ?? '' ?>" oninput="checkPfaDataInput(event)">
																		<!-- <p class="cover-input"></p> -->
																	</div>
																</div>
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="form-label mb-1">Taxa</label>
																		<input type="text" class="form-control" name="pfa_data_block_taxa" value="<?= $pfa_block['taxa'] ?? '' ?>" min="<?= $pfa_block['taxa'] ?? '' ?>" readonly>
																	</div>
																</div>
																<div class="col" id="pfa_data_err" style="display: none;">
																	<div class="alert alert-danger alert-dismissible fade show">
																		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
																		</button>
																		<strong>Note</strong> Valoare minima nu poate fi scazuta, poate fi doar crescuta
																	</div>
																</div>
															</div>
													<?php }
													} ?>

													<!-- block for pension optional data -->
													<?php if(!empty($pfa_block) && count($pfa_block) > 0) {
														if(!$pfa_block['visible']) { ?>
															<div class="row mt-4 mb-4">
																<h4 class="mx-lg-auto mb-3">Asigurare pensie optionala 2023</h4>
																<div class="col-md-6">
																	<div class="form-group d-flex">
																		<label class="form-label mb-1 me-5">Doriti asigurare de pensie?</label>
																		<div class="form-check me-3">
																			<input class="form-check-input form-check-inputblue" type="radio" name="pfaSpecRadio" value="Da">
																			<label class="form-label form-check-label">
																				Da
																			</label>
																		</div>
																		<div class="form-check">
																			<input class="form-check-input form-check-inputblue" type="radio" name="pfaSpecRadio" value="Nu">
																			<label class="form-label form-check-label">
																				Nu
																			</label>
																		</div>
																	</div>
																</div>
																<div class="row mb-4" id="pfaSpecRow" style="display: none;">
																	<div class="col-md-6 col-xs-12">
																		<div class="form-group">
																			<label class="form-label mb-1">Valoare impozabila pentru pensie</label>
																			<input type="number" class="form-control" name="pfa_spec_valoare" value="<?= $pfa_spec_block['valoare'] ?? 0 ?>" data-min="<?= $pfa_spec_block['valoare'] ?? 0 ?>" disabled oninput="checkPfaSpecInput(event)">
																		</div>
																	</div>
																	<div class="col-md-6 col-xs-12">
																		<div class="form-group">
																			<label class="form-label mb-1">Taxa</label>
																			<input type="text" class="form-control" name="pfa_spec_taxa" value="<?= $pfa_spec_block['taxa'] ?? 0 ?>" readonly disabled>
																		</div>
																	</div>
																	<div class="col" id="pfaSpecErr" style="display: none;">
																		<div class="alert alert-danger alert-dismissible fade show">
																			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
																			</button>
																			<strong>Note</strong> Valoare minima nu poate fi scazuta, poate fi doar crescuta
																		</div>
																	</div>
																</div>
															</div>
													<?php }
													} ?>

													<!-- block for total income for health mandatory -->
													<?php if(!empty($health_mandatory_block) && count($health_mandatory_block) > 0) {
														if($health_mandatory_block['visible']) { ?>
															<div class="row mt-4 mb-4">
																<h4 class="mx-lg-auto mb-3">Asigurare sanatate obligatorie</h4>
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="form-label mb-1">Valoare impozabila pentru sanatate</label>
																		<input type="number" class="form-control" name="health_mandatory_valoare" value="<?= $health_mandatory_block['valoare'] ?>" readonly>
																	</div>
																</div>
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="form-label mb-1">Taxa</label>
																		<input type="text" class="form-control" name="health_mandatory_taxa" value="<?= $health_mandatory_block['taxa'] ?>" readonly>
																	</div>
																</div>
															</div>
													<?php }
													} ?>

													<!-- block for total income for health optional -->
													<?php if(!empty($health_mandatory_block) && count($health_mandatory_block) > 0) {
														if(!$health_mandatory_block['visible']) { ?>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group d-flex">
																	<label class="form-label mb-1 me-5 mt-2">Doriti asigurare de pensie?</label>
																	<select class="default-select" id="healthOptSelect" style="width: 100px;">
																		<option value="">Select</option>
																		<option>Da</option>
																		<option>Nu</option>
																	</select>
																</div>
															</div>
															<div class="row mb-4" id="healthOptRow" style="display: none;">
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="form-label mb-1">Valoare impozabila pentru sanatate</label>
																		<input type="number" class="form-control" name="health_opt_valoare" value="<?= $health_optional_block['valoare'] ?? '0' ?>" disabled>
																	</div>
																</div>
																<div class="col-md-6 col-xs-12">
																	<div class="form-group">
																		<label class="form-label mb-1">Taxa</label>
																		<input type="text" class="form-control" name="health_opt_taxa" value="<?= $health_optional_block['taxa'] ?? '0' ?>" readonly disabled>
																	</div>
																</div>
															</div>
														</div>
													<?php }
													} ?>

												</div>
											</div>
											<!-- <div class="row justify-content-center h-100 align-items-lg-center align-items-sm-center">


												<div class="col">

													<div class="authincation-content sm-h-100 ">
														<div class="card">
															<div class="card-header blue-header">
																<h4 class="mx-lg-auto"><span class="las la-angle-left"></span> Asigurare pensie obligatorie 2023</h4>
															</div>
															<div class="card-body">
																<form action="#">
																	<div class="row mb-4">
																		<div class="col-md-6 col-xs-12">
																			<div class="form-group">
																				<label class="form-label mb-1">Valoare impozabila pentru pensie</label>
																				<input type="number" class="form-control" min="0">
																			</div>
																		</div>
																		<div class="col-md-6 col-xs-12">
																			<div class="form-group">
																				<label class="form-label mb-1">Taxa</label>
																				<input type="text" class="form-control">
																			</div>
																		</div>
																	</div>
																	<div class="alert alert-danger alert-dismissible fade show">
																		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
																		</button>
																		<strong>Note</strong> Valoare minima nu poate fi scazuta, poate fi doar crescuta
																	</div>

																</form>
															</div>
														</div>

													</div>
												</div>
											</div> -->

										</div>
										<div class="row ps-md-4 mb-4">
											<div class="col-sm-10 text-center text-lg-start">
												<button type="submit" class="btn btn-primary btn-square">Mergi mai departe</button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
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
</div>
<!-- End: Main wrapper -->
<script>
	window.addEventListener('load', function() {
		// $(`input[name="pfa_data_block_valoare"]`).change(() => {
		// 	alert()
		// })
		$(`input[name='pfaSpecRadio']`).on('change', function() {
			let rval = $(this).val();
			switch (rval) {
				case "Da":
					$("#pfaSpecRow").slideDown(300)
					$(`#pfaSpecRow input[name="pfa_spec_valoare"]`).prop('disabled', false)
					$(`#pfaSpecRow input[name="pfa_spec_taxa"]`).prop('disabled', false)
					break;
				case "Nu":
					$("#pfaSpecRow").slideUp(300)
					$(`#pfaSpecRow input[name="pfa_spec_valoare"]`).prop('disabled', true)
					$(`#pfaSpecRow input[name="pfa_spec_taxa"]`).prop('disabled', true)
					break;
				default:
					break;
			}
		})

		$(`#healthOptSelect`).on('change', function() {
			let optVal = $(this).val()
			switch (optVal) {
				case "Da":
					$("#healthOptRow").slideDown(300)
					$(`#healthOptRow input[name="health_opt_valoare"]`).prop('disabled', false)
					$(`#healthOptRow input[name="health_opt_taxa"]`).prop('disabled', false)
					break;
				case "Nu":
					$("#healthOptRow").slideUp(300)
					$(`#healthOptRow input[name="health_opt_valoare"]`).prop('disabled', true)
					$(`#healthOptRow input[name="health_opt_taxa"]`).prop('disabled', true)
					break;

				default:
					break;
			}
		})
	})


	function checkPfaDataInput(e) {
		// alert($(e.target).val())
		// console.log($(e.target).val());
		let min = $(e.target).attr('data-min');
		let value = $(e.target).val();
		if (value < min) {
			$(e.target).val(min)
			$("#pfa_data_err").slideDown(300)
		} else {
			increasePfaTax(value).then(tax => showNewTaxValue(tax))
		}
	}

	function checkPfaSpecInput(e) {
		// alert($(e.target).val())
		// console.log($(e.target).val());
		let min = $(e.target).attr('data-min');
		let value = $(e.target).val();
		if (value < min) {
			$(e.target).val(min)
			$("#pfaSpecErr").slideDown(300)
		} else {
			increasePfaTax(value).then(tax => showNewPfaSpecTaxValue(tax))
		}
	}

	function showNewTaxValue(value) {
		$(`input[name="pfa_data_block_taxa"]`).val(value.tax)
	}

	function showNewPfaSpecTaxValue(value) {
		$(`input[name="pfa_spec_taxa"]`).val(value.tax)
	}

	async function increasePfaTax(value) {
		let data = new FormData()
		data.append('value', value)
		const url = "<?= base_url() ?>user/increasePfaTax"

		const response = await fetch(url, {
			method: 'POST',
			body: data
		})

		return response.json();
	}
</script>
