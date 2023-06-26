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
		<div class="project-nav">
			<div class="card-action card-tabs card-tabs2 w-100">
				<ul class="nav nav-tabs style-1 w-100 w-scroll-new" id="ListViewTabLink">
					<li class="nav-item">
						<a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Total Income for pension
							<span class="d-block">Mandatory</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-2" class="nav-link " data-bs-toggle="tab" aria-expanded="false">Total Income for pension
							<span class="d-block">Optional</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Total income for health
							<span class="d-block">Mandatory</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Total income for health
							<span class="d-block">Optional</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-5" class="nav-link" data-bs-toggle="tab" aria-expanded="false">PFA Data
						</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-6" class="nav-link" data-bs-toggle="tab" aria-expanded="false">PFA Specific data</a>
					</li>
				</ul>

			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade active show" id="list">
				<div class="tab-content project-list-group" id="ListViewTabLink">
					<div class="tab-pane fade active show" id="navpills-1">
						<form id="TIPMform" action="<?= base_url() ?>admin/saveInfoBlock" method="post">
							<input type="hidden" name="id" value="<?= $pension_mandatory['id'] ?? '' ?>">
							<div class="project-main2">
								<div class="from-group" id="TIPMincomeRow">
									<label class="form-label">Select Income Sources</label>
									<div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMrental" name="incomeTypeTIPM[]" value="Rental" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMdivident" name="incomeTypeTIPM[]" value="Divident" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Dividents
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMstock" name="incomeTypeTIPM[]" value="Stock" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Stock
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMcrypto" name="incomeTypeTIPM[]" value="Crypto" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Crypto
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMhotel" name="incomeTypeTIPM[]" value="Hotel" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Hotel rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPMnorma" name="incomeTypeTIPM[]" value="Norma" class="form-check-input form-check-inputblue TIPMcheck TIPMinputCheck">Norma de venit
											</label>
										</div>
									</div>
								</div>
								<hr>
								<h4 class="mb-3">Select taxable income</h4>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMrental">
										<div class="form-group">
											<label class="form-label">Rental</label>
											<select class="default-select form-control income_field" disabled name="rental_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMdivident">
										<div class="form-group">
											<label class="form-label">Dividents</label>
											<select class="default-select form-control income_field" disabled name="divident_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMstock">
										<div class="form-group">
											<label class="form-label">Stock</label>
											<select class="default-select form-control income_field" disabled name="stock_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMcrypto">
										<div class="form-group">
											<label class="form-label">Crypto</label>
											<select class="default-select form-control income_field" disabled name="crypto_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMhotel">
										<div class="form-group">
											<label class="form-label">Hotel Rental</label>
											<select class="default-select form-control income_field" disabled name="hotel_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPMnorma">
										<div class="form-group">
											<label class="form-label">Norma de venit</label>
											<select class="default-select form-control income_field" disabled name="norma_field">
												<option>Venit Impozabil</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the calculation method</label>
											<input type="text" class="form-control" name="calculation_method_name" value="<?= $pension_mandatory['calculation_method_name'] ?? '' ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the block in the frontend</label>
											<input type="text" class="form-control" name="frontend_block_name" value="<?= $pension_mandatory['frontend_block_name'] ?? '' ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Position on frontend</label>
											<select class="default-select form-control" name="frontend_position">
												<option>Information verification screen, after user tax</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row ">
									<div class="col-sm-10">
										<button type="submit" id="submitTIPM" class="btn btn-primary btn-square">Save</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane fade" id="navpills-2">
						<form action="<?= base_url() ?>admin/saveTIPO" method="post">
							<input type="hidden" name="id" value="<?= $pension_optional['id'] ?? '' ?>">
							<div class="project-main2">
								<div class="from-group">
									<label class="form-label">Select Income Sources</label>
									<div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOrental" name="incomeTypeTIPO[]" value="Rental" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOdivident" name="incomeTypeTIPO[]" value="Divident" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Dividents
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOstock" name="incomeTypeTIPO[]" value="Stock" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Stock
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOcrypto" name="incomeTypeTIPO[]" value="Crypto" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Crypto
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOhotel" name="incomeTypeTIPO[]" value="Hotel" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Hotel rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIPOnorma" name="incomeTypeTIPO[]" value="Norma" class="form-check-input form-check-inputblue TIPMcheck TIPOinputCheck">Norma de venit
											</label>
										</div>
									</div>
								</div>
								<hr>
								<h5 class="mb-3">Select taxable income</h5>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOrental">
										<div class="form-group">
											<label class="form-label">Rental</label>
											<select class="default-select form-control income_field" disabled name="rental_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOdivident">
										<div class="form-group">
											<label class="form-label">Dividents</label>
											<select class="default-select form-control income_field" disabled name="divident_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOstock">
										<div class="form-group">
											<label class="form-label">Stock</label>
											<select class="default-select form-control income_field" disabled name="stock_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOcrypto">
										<div class="form-group">
											<label class="form-label">Crypto</label>
											<select class="default-select form-control income_field" disabled name="crypto_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOhotel">
										<div class="form-group">
											<label class="form-label">Hotel Rental</label>
											<select class="default-select form-control income_field" disabled name="hotel_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIPOnorma">
										<div class="form-group">
											<label class="form-label">Norma de venit</label>
											<select class="default-select form-control income_field" disabled name="norma_field">
												<option>Venit Impozabil</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the calculation method</label>
											<input type="text" name="calculation_method_name" value="<?= $pension_optional['calculation_method_name'] ?? '' ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the block in the frontend</label>
											<input type="text" name="frontend_block_name" value="<?= $pension_optional['frontend_block_name'] ?? '' ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Position on frontend</label>
											<select class="default-select form-control" name="frontend_position">
												<option>Information verification screen, after user tax</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row ">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary btn-square"> Save</button>
									</div>
								</div>
							</div>
						</form>


					</div>

					<div class="tab-pane fade" id="navpills-3">
						<form action="<?= base_url() ?>admin/saveTIHM" method="post">
							<input type="hidden" name="id" value="<?= $health_mandatory['id'] ?? '' ?>">
							<div class="project-main2">
								<div class="from-group">
									<label class="form-label">Select Income Sources</label>
									<div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMrental" name="incomeTypeTIHM[]" value="Rental" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMdivident" name="incomeTypeTIHM[]" value="Divident" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Dividents
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMstock" name="incomeTypeTIHM[]" value="Stock" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Stock
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMcrypto" name="incomeTypeTIHM[]" value="Crypto" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Crypto
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMhotel" name="incomeTypeTIHM[]" value="Hotel" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Hotel rental
											</label>
										</div>
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" data-target="#TIHMnorma" name="incomeTypeTIHM[]" value="Norma" class="form-check-input form-check-inputblue TIPMcheck TIHMinputCheck">Norma de venit
											</label>
										</div>
									</div>
								</div>
								<hr>
								<h5 class="mb-3">Select taxable income</h5>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMrental">
										<div class="form-group">
											<label class="form-label">Rental</label>
											<select class="default-select form-control income_field" disabled name="rental_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMdivident">
										<div class="form-group">
											<label class="form-label">Dividents</label>
											<select class="default-select form-control income_field" disabled name="divident_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMstock">
										<div class="form-group">
											<label class="form-label">Stock</label>
											<select class="default-select form-control income_field" disabled name="stock_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMcrypto">
										<div class="form-group">
											<label class="form-label">Crypto</label>
											<select class="default-select form-control income_field" disabled name="crypto_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMhotel">
										<div class="form-group">
											<label class="form-label">Hotel Rental</label>
											<select class="default-select form-control income_field" disabled name="hotel_field">
												<option>Taxable income</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHMnorma">
										<div class="form-group">
											<label class="form-label">Norma de venit</label>
											<select class="default-select form-control income_field" disabled name="norma_field">
												<option>Venit Impozabil</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the calculation method</label>
											<input type="text" class="form-control" name="calculation_method_name" value="<?= $health_mandatory['calculation_method_name'] ?? '' ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Name of the block in the frontend</label>
											<input type="text" class="form-control" name="frontend_block_name" value="<?= $health_mandatory['frontend_block_name'] ?? '' ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="form-label">Position on frontend</label>
											<select class="default-select form-control" name="frontend_position">
												<option>Information verification screen, after user tax</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row ">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary btn-square"> Save</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane fade" id="navpills-4">
						<div class="row">
							<div class="col-xl-12">
								<form action="<?= base_url() ?>admin/saveTIHO" method="post">
									<input type="hidden" name="id" value="<?= $health_optional['id'] ?? '' ?>">
									<div class="project-main2">
										<div class="from-group">
											<label class="form-label">Select Income Sources</label>
											<div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOrental" name="incomeTypeTIHO[]" value="Rental" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOdivident" name="incomeTypeTIHO[]" value="Divident" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Dividents
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOstock" name="incomeTypeTIHO[]" value="Stock" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Stock
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOcrypto" name="incomeTypeTIHO[]" value="Crypto" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Crypto
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOhotel" name="incomeTypeTIHO[]" value="Hotel" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Hotel rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" data-target="#TIHOnorma" name="incomeTypeTIHO[]" value="Norma" class="form-check-input form-check-inputblue TIPMcheck TIHOinputCheck">Norma de venit
													</label>
												</div>
											</div>
										</div>
										<hr>
										<h5 class="mb-3">Select taxable income</h5>
										<div class="row">
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOrental">
												<div class="form-group">
													<label class="form-label">Rental</label>
													<select class="default-select form-control income_field" disabled name="rental_field">
														<option>Taxable income</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOdivident">
												<div class="form-group">
													<label class="form-label">Dividents</label>
													<select class="default-select form-control income_field" disabled name="divident_field">
														<option>Taxable income</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOstock">
												<div class="form-group">
													<label class="form-label">Stock</label>
													<select class="default-select form-control income_field" disabled name="stock_field">
														<option>Taxable income</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOcrypto">
												<div class="form-group">
													<label class="form-label">Crypto</label>
													<select class="default-select form-control income_field" disabled name="crypto_field">
														<option>Taxable income</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOhotel">
												<div class="form-group">
													<label class="form-label">Hotel Rental</label>
													<select class="default-select form-control income_field" disabled name="hotel_field">
														<option>Taxable income</option>
													</select>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12 d-none" id="TIHOnorma">
												<div class="form-group">
													<label class="form-label">Norma de venit</label>
													<select class="default-select form-control income_field" disabled name="norma_field">
														<option>Venit Impozabil</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Name of the calculation method</label>
													<input type="text" class="form-control" name="calculation_method_name" value="<?= $health_optional['calculation_method_name'] ?? '' ?>">
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Name of the block in the frontend</label>
													<input type="text" class="form-control" name="frontend_block_name" value="<?= $health_optional['frontend_block_name'] ?? '' ?>">
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Position on frontend</label>
													<select class="default-select form-control" name="frontend_position">
														<option>Information verification screen, after user tax</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row ">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary btn-square"> Save</button>
											</div>
										</div>

									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="navpills-5">
						<div class="row">
							<div class="col-xl-12">
								<form id="pfaForm" action="<?= base_url() ?>admin/savePFAdata" method="post">
									<input type="hidden" name="id" value="<?= $pfa_data['id'] ?? '' ?>">
									<div class="project-main2">
										<div class="from-group mb-3">
											<label class="form-label">Select Income Sources</label>
											<div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Rental">Rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Divident">Divident
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Stock">Stock
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Crypto">Crypto
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Hotel">Hotel rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaIncomeCheck" name="incomeTypePFA[]" value="Norma">Norma de venit
													</label>
												</div>
											</div>
										</div>
										<div id="PFAincomeTypeErr"></div>
										<hr>
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
												<div class="from-group">
													<label class="form-label">Assign variable</label>
													<select class="default-select form-control wide mb-3" id="varSelect" name="variables_list[]" multiple>
														<?php
														if (!empty($variables)) {
															foreach ($variables as $var) { ?>
																<option value="<?= $var['id'] ?>"><?= $var['name'] ?></option>
														<?php }
														}
														?>
													</select>
												</div>
												<div id="pfaVrblErr"></div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
												<div class="from-group">
													<div class="d-flex">
														<label class="form-label me-3">Variants</label>
													</div>
													<div class="grid-view" id="variantsBlock">
														<!-- <div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 9</span>
															</label>
														</div> -->
													</div>
												</div>
												<div id="pfaVrntErr"></div>
											</div>
										</div>

										<div class="row" id="vrnt_dd_opt_row">
											<!-- <div class="col-md-4 col-sm-6 col-xs-12 variantdata1">
												<div class="form-group">
													<label class="form-label">Variants 1</label>
													<select class="default-select form-control">
														<option>Nr zile lucrate</option>
														<option>Nr zile fara handicap</option>
														<option>Nr luni pensionar</option>
													</select>
												</div>
											</div> -->
										</div>
										<div class="row">
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Name of the block in the frontend</label>
													<input type="text" name="frontend_block_name" value="<?= $pfa_data['frontend_block_name'] ?? '' ?>" class="form-control">
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Position on frontend</label>
													<select class="default-select form-control" name="frontend_position">
														<option>Date de localizare PFA</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row ">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary btn-square"> Save</button>
											</div>
										</div>

									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="navpills-6">
						<div class="row">
							<div class="col-xl-12">
								<form id="pfaSpecForm" action="<?= base_url() ?>admin/savePFASpecdata" method="post">
									<input type="hidden" name="id" value="<?= $pfa_spec_data['id'] ?? '' ?>">
									<div class="project-main2">
										<div class="from-group mb-3">
											<label class="form-label">Select Income Sources</label>
											<div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Rental">Rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Divident">Divident
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Stock">Stock
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Crypto">Crypto
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Hotel">Hotel rental
													</label>
												</div>
												<div class="form-check form-check-inline">
													<label class="form-check-label">
														<input type="checkbox" class="form-check-input form-check-inputblue pfaSpecIncomeCheck" name="incomeTypePFASpec[]" value="Norma">Norma de venit
													</label>
												</div>
											</div>
										</div>
										<div id="PFAincomeTypeErr"></div>
										<hr>
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3">
												<div class="from-group">
													<label class="form-label">Assign variable</label>
													<select class="default-select form-control wide mb-3" id="varSelectSpec" name="variables_list[]" multiple>
														<?php
														if (!empty($variables)) {
															foreach ($variables as $var) { ?>
																<option value="<?= $var['id'] ?>"><?= $var['name'] ?></option>
														<?php }
														}
														?>
													</select>
												</div>
												<div id="pfaVrblErr"></div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-3">
												<div class="from-group">
													<div class="d-flex">
														<label class="form-label me-3">Variants</label>
													</div>
													<div class="grid-view" id="variantsSpecBlock">
														<!-- <div class="form-check form-check-inline">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input form-check-inputblue variant-check">
																<span>Variant 9</span>
															</label>
														</div> -->
													</div>
												</div>
												<div id="pfaVrntErr"></div>
											</div>
										</div>

										<div class="row" id="vrnt_spec_dd_opt_row">
											<!-- <div class="col-md-4 col-sm-6 col-xs-12 variantdata1">
												<div class="form-group">
													<label class="form-label">Variants 1</label>
													<select class="default-select form-control">
														<option>Nr zile lucrate</option>
														<option>Nr zile fara handicap</option>
														<option>Nr luni pensionar</option>
													</select>
												</div>
											</div> -->
										</div>
										<div class="row">
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Name of the block in the frontend</label>
													<input type="text" name="frontend_block_name" value="<?= $pfa_spec_data['frontend_block_name'] ?? '' ?>" class="form-control">
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="form-label">Position on frontend</label>
													<select class="default-select form-control" name="frontend_position">
														<option>Date de localizare PFA</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row ">
											<div class="col-sm-10">
												<button type="submit" class="btn btn-primary btn-square"> Save</button>
											</div>
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
<!-- End: Content body -->
<script>
	var variables = [];
	var variablesSpec = [];
	window.addEventListener("load", function() {
		$(document).on('change', '.TIPMcheck', function() {
			let $check = $(this);
			let target = $check.attr('data-target')
			// alert('checked');
			if ($check.is(':checked')) {
				// alert($(this).val())
				if ($(target).hasClass('d-none')) {
					$(target).removeClass('d-none')
					$(target).find('.income_field').removeAttr('disabled')
					$(target).find('.income_field').selectpicker('refresh')
				}
			} else {
				$(target).addClass('d-none')
				$(target).find('.income_field').attr('disabled', true)
			}
		})

		/**
		 * render variants when variable is selected
		 */
		$('#varSelect').on('change', function() {
			let varblSelctd = $(this).val()
			if (varblSelctd.length > 0) {
				if (variables.length == 0) {
					variables = varblSelctd
					fetchVariables(variables[0]).then(data => {
						renderVariants(data)
					})
				} else {
					let removedSelected = ''
					let currentlySelected = varblSelctd.filter(x => !variables.includes(x))
					removedSelected = variables.filter(x => !varblSelctd.includes(x))
					if (currentlySelected.length > 0) {
						fetchVariables(currentlySelected).then(data => {
							renderVariants(data)
						})
					}
					if (removedSelected.length > 0) {
						removeVariants(removedSelected)
					}
					variables = varblSelctd
				}

			} else {

			}
		})

		/**
		 * render variants for PFA specific form
		 */
		$('#varSelectSpec').on('change', function() {
			// alert()
			let varblSelctd = $(this).val()
			// alert(varblSelctd)
			if (varblSelctd.length > 0) {
				if (variablesSpec.length == 0) {
					variablesSpec = varblSelctd
					fetchVariables(variablesSpec[0]).then(data => {
						renderVariantsSpec(data)
					})
				} else {
					let removedSelected = ''
					let currentlySelected = varblSelctd.filter(x => !variablesSpec.includes(x))
					removedSelected = variablesSpec.filter(x => !varblSelctd.includes(x))
					if (currentlySelected.length > 0) {
						fetchVariables(currentlySelected).then(data => {
							renderVariantsSpec(data)
						})
					}
					if (removedSelected.length > 0) {
						removeVariants(removedSelected)
					}
					variablesSpec = varblSelctd
				}

			} else {

			}
		})

		<?php
		if (!empty($pension_mandatory['incomes'])) {
			foreach ($pension_mandatory['incomes'] as $income) { ?>
				$(".TIPMinputCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
				$(".TIPMcheck").change();
		<?php }
		}
		?>

		<?php
		if (!empty($pension_optional['incomes'])) {
			foreach ($pension_optional['incomes'] as $income) { ?>
				$(".TIPOinputCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
				$(".TIPMcheck").change();
		<?php }
		}
		?>

		<?php
		if (!empty($health_mandatory['incomes'])) {
			foreach ($health_mandatory['incomes'] as $income) { ?>
				$(".TIHMinputCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
				$(".TIPMcheck").change();
		<?php }
		}
		?>

		<?php
		if (!empty($health_optional['incomes'])) {
			foreach ($health_optional['incomes'] as $income) { ?>
				$(".TIHOinputCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
				$(".TIPMcheck").change();
		<?php }
		}
		?>


		<?php
		if (!empty($pfa_data['incomes'])) {
			foreach ($pfa_data['incomes'] as $income) { ?>
				$(".pfaIncomeCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
		<?php }
		}
		?>
		
		<?php
		if (!empty($pfa_spec_data['incomes'])) {
			foreach ($pfa_spec_data['incomes'] as $income) { ?>
				$(".pfaSpecIncomeCheck[value='<?= $income['income_name'] ?>']").prop('checked', true)
		<?php }
		}
		?>

		/**
		 * submit TIPM form
		 */
		$("#TIPMform").submit((e) => {
			e.preventDefault();
		}).validate({
			rules: {
				calculation_method_name: {
					required: true,
				},
				frontend_block_name: {
					required: true,
				},
			},
			submitHandler: (form) => {
				if ($(".TIPMcheck:checked").length > 0) {
					// alert('submit')
					form.submit()

				} else {
					$("#TIPMincomeRow").after('<label class="error mt-2" id="incomeErr">Please choose one of the income!</label>')
					setTimeout(() => {
						$("#incomeErr").fadeOut(800)
					}, 3000);
				}
			}
		});

		$(document).on('change', '.variant-check', (e) => {
			// console.log($(e.target));
			let rowEl = $("#vrnt_dd_opt_row")
			let targetId = $(e.target).attr('data-target');
			if ($(e.target).is(':checked')) {
				// alert(targetId)
				let vrnt_name = $(e.target).attr('data-vname')
				let vrnt_ID = $(e.target).val()
				let dd_opts = `<?= json_encode($pfa_data['variants_dd_options']) ?>`
				let pfa_vrnts = `<?= json_encode($pfa_data['variants'])?>`;
				dd_opts = JSON.parse(dd_opts)
				pfa_vrnts = JSON.parse(pfa_vrnts);
				// console.log(pfa_vrnts);
				if(pfa_vrnts.includes(vrnt_ID)) {
					dd_opts.forEach(item => {
						if(vrnt_ID == item.variant_id) {
							let template = `
								<div class="col-md-4 col-sm-6 col-xs-12 variantdata1" id="${targetId}">
									<div class="form-group">
										<label class="form-label">${vrnt_name}</label>
										<select class="default-select form-control vrnt_dd_opt" name="vrnt_dd_opt[]" data-vrntid="${vrnt_ID}">
											<option ${item.variant_dd_option == "Nr zile lucrate" ? 'selected' : ''}>Nr zile lucrate</option>
											<option ${item.variant_dd_option == "Nr zile fara handicap" ? 'selected' : ''}>Nr zile fara handicap</option>
											<option ${item.variant_dd_option == "Nr luni pensionar" ? 'selected' : ''}>Nr luni pensionar</option>
										</select>
									</div>
								</div>
								`;
							rowEl.append(template)
						}
						
					})
				}
				else {
					let template = `
								<div class="col-md-4 col-sm-6 col-xs-12 variantdata1" id="${targetId}">
									<div class="form-group">
										<label class="form-label">${vrnt_name}</label>
										<select class="default-select form-control vrnt_dd_opt" name="vrnt_dd_opt[]" data-vrntid="${vrnt_ID}">
											<option>Nr zile lucrate</option>
											<option>Nr zile fara handicap</option>
											<option>Nr luni pensionar</option>
										</select>
									</div>
								</div>
								`;
							rowEl.append(template)
				}
				$(".vrnt_dd_opt").selectpicker('refresh');
			} else {
				// $(targetId).remove();
				let el = document.getElementById(targetId)
				// alert(targetId)
				// console.log(el);
				$(el).remove();
			}
		})

		/**
		 * PFA specific variants check
		 */
		$(document).on('change', '.variant-spec-check', (e) => {
			// console.log($(e.target));
			let rowEl = $("#vrnt_spec_dd_opt_row")
			let targetId = $(e.target).attr('data-target');
			if ($(e.target).is(':checked')) {
				// alert(targetId)
				let vrnt_name = $(e.target).attr('data-vname')
				let vrnt_ID = $(e.target).val()
				let template = `
					<div class="col-md-4 col-sm-6 col-xs-12 variantdata1" id="${targetId}">
						<div class="form-group">
							<label class="form-label">${vrnt_name}</label>
							<select class="default-select form-control vrnt_spec_dd_opt" name="vrnt_dd_opt[]" data-vrntid="${vrnt_ID}">
								<option>Variabila Angajat</option>
							</select>
						</div>
					</div>
					`;
				rowEl.append(template)
				$(".vrnt_dd_opt").selectpicker('refresh');
			} else {
				// $(targetId).remove();
				let el = document.getElementById(targetId)
				// alert(targetId)
				// console.log(el);
				$(el).remove();
			}
		})


		/**
		 * show PFA data
		 */
		<?php
		if (!empty($pfa_data['variables_variants'])) {
			$pfa_vrbls = [];
			foreach ($pfa_data['variables_variants'] as $vb) {
				array_push($pfa_vrbls, $vb['variable_id']);
			}
			$var_arr = json_encode($pfa_vrbls); ?>

			let varData = JSON.parse('<?= $var_arr ?>');
			varData = [...new Set(varData)]
			variables = varData;

			$("#pfaForm #varSelect").selectpicker('val', varData);

			varData.forEach(variable => {
				fetchVariables(variable)
					.then(data => {
						renderVariants(data)
					})
					.finally(() => {

					})
			});
			let targets_arr = [];
			setTimeout(() => {
				let tg = ''
				<?php
				foreach ($pfa_data['variables_variants'] as $v) { ?>
					$(`.variant-check[value='<?= $v['variant_id'] ?>']`).prop('checked', true)
					$(`.variant-check[value='<?= $v['variant_id'] ?>']`).change()
					tg = $(`.variant-check[value='<?= $v['variant_id'] ?>']`).attr('data-target');
					targets_arr.push(tg)
					<?php 
						foreach($pfa_data['variants_dd_options'] as $dd_opt) { 
						if($v['variant_id'] == $dd_opt['variant_id']) { 
							?>
							
						<?php }
					} ?>
				<?php }
				?>
				console.log(targets_arr);
			}, 1000);

			// setTimeout(() => {
			// 	console.log($(targets_arr[0]));
			// }, 2000);


		<?php }
		?>
		
		/**
		 * show PFA specific data
		 */
		<?php
		if (!empty($pfa_spec_data['variables_variants'])) {
			$pfa_spec_vrbls = [];
			foreach ($pfa_spec_data['variables_variants'] as $vb) {
				array_push($pfa_spec_vrbls, $vb['variable_id']);
			}
			$var_spec_arr = json_encode($pfa_spec_vrbls); ?>

			let varSpecData = JSON.parse('<?= $var_spec_arr ?>');
			varSpecData = [...new Set(varSpecData)]
			variablesSpec = varSpecData;

			$("#pfaSpecForm #varSelectSpec").selectpicker('val', varSpecData);

			varSpecData.forEach(variable => {
				fetchVariables(variable)
					.then(data => {
						renderVariantsSpec(data)
					})
					.finally(() => {

					})
			});
			setTimeout(() => {
				<?php
				foreach ($pfa_spec_data['variables_variants'] as $v) { ?>
					$(`.variant-spec-check[value='<?= $v['variant_id'] ?>']`).prop('checked', true)
					$(`.variant-spec-check[value='<?= $v['variant_id'] ?>']`).change()
				<?php }
				?>
			}, 1000);


		<?php }
		?>

		/**
		 * submit PFA form
		 */
		$("#pfaForm").submit((e) => {
			e.preventDefault()
		}).validate({
			rules: {
				frontend_block_name: {
					required: true,
				},
			},
			submitHandler: (form) => {
				let id = $("#pfaForm input[name=id]").val()
				let frontend_block_name = $("#pfaForm input[name=frontend_block_name]").val()
				let frontend_position = $("#pfaForm select[name=frontend_position]").val()
				let variables = $("#varSelect").val()
				let varblVarnt = [];
				let incomeTypes = [];
				let vrntsDDOptions = [];
				$.each($('.variant-check:checked'), (index, obj) => {
					varblVarnt.push({
						'variable_id': obj.getAttribute('data-vrbl'),
						'variant_id': obj.value
					})
				})

				$.each($('.pfaIncomeCheck:checked'), (index, obj) => {
					incomeTypes.push(obj.value)
				})

				$.each($('.vrnt_dd_opt'), (index, obj) => {
					if (obj.value !== undefined) {
						vrntsDDOptions.push({
							'variant_id': obj.getAttribute('data-vrntid'),
							'variant_dd_option': obj.value
						})
					}
				})

				if (incomeTypes.length > 0) {
					if (variables.length > 0) {
						if (varblVarnt.length > 0) {

							let form = new FormData();
							if (id !== undefined || id !== null || id !== '') {
								form.append('id', id)
							}
							form.append('income_types', JSON.stringify(incomeTypes))
							form.append('variables_and_variants', JSON.stringify(varblVarnt))
							form.append('variants_dd_options', JSON.stringify(vrntsDDOptions))
							form.append('frontend_block_name', frontend_block_name)
							form.append('frontend_position', frontend_position)
							addOverlay()
							savePFAData(form)
								.then(data => {
									if (data === 'success') {
										window.location.href = '<?= base_url() ?>admin/pfaDataSuccess';
									}
								})
						} else {
							showErrMsg('#pfaVrntErr', 'Please select variants!')
						}
					} else {
						showErrMsg('#pfaVrblErr', 'Please select variable!')
					}
				} else {
					showErrMsg('#PFAincomeTypeErr', 'Please select income!')
				}

			}
		})

		/**
		 * submit PFA specfic form
		 */
		$("#pfaSpecForm").submit((e) => {
			e.preventDefault()
		}).validate({
			rules: {
				frontend_block_name: {
					required: true,
				},
			},
			submitHandler: (form) => {
				let id = $("#pfaSpecForm input[name=id]").val()
				let frontend_block_name = $("#pfaSpecForm input[name=frontend_block_name]").val()
				let frontend_position = $("#pfaSpecForm select[name=frontend_position]").val()
				let variables = $("#varSelect").val()
				let varblVarnt = [];
				let incomeTypes = [];
				let vrntsDDOptions = [];
				$.each($('.variant-spec-check:checked'), (index, obj) => {
					varblVarnt.push({
						'variable_id': obj.getAttribute('data-vrbl'),
						'variant_id': obj.value
					})
				})

				$.each($('.pfaSpecIncomeCheck:checked'), (index, obj) => {
					incomeTypes.push(obj.value)
				})

				$.each($('.vrnt_spec_dd_opt'), (index, obj) => {
					if (obj.value !== undefined) {
						vrntsDDOptions.push({
							'variant_id': obj.getAttribute('data-vrntid'),
							'variant_dd_option': obj.value
						})
					}
				})

				if (incomeTypes.length > 0) {
					if (variables.length > 0) {
						if (varblVarnt.length > 0) {

							let form = new FormData();
							if (id !== undefined || id !== null || id !== '') {
								form.append('id', id)
							}
							form.append('income_types', JSON.stringify(incomeTypes))
							form.append('variables_and_variants', JSON.stringify(varblVarnt))
							form.append('variants_dd_options', JSON.stringify(vrntsDDOptions))
							form.append('frontend_block_name', frontend_block_name)
							form.append('frontend_position', frontend_position)
							// addOverlay()
							console.log('INcomes ====', incomeTypes);
							console.log('vrbls vrnts ====', varblVarnt);
							console.log('dd options ====', vrntsDDOptions);
							console.log('frntend blck name ====', frontend_block_name);
							console.log('FE position ====', frontend_position);
							savePFASpecData(form)
								.then(data => {
									if (data === 'success') {
										window.location.href = '<?= base_url() ?>admin/pfaDataSuccess';
									}
								})
						} else {
							showErrMsg('#pfaVrntErr', 'Please select variants!')
						}
					} else {
						showErrMsg('#pfaVrblErr', 'Please select variable!')
					}
				} else {
					showErrMsg('#PFAincomeTypeErr', 'Please select income!')
				}

			}
		})
	})
</script>
<script>
	function showErrMsg(el, msg) {
		$(el).html(`<label class="text-danger" id="msgErr">${msg}</label>`)
		$("#msgErr").delay(3000).fadeOut(800)
		setTimeout(() => {
			$("#msgErr").remove()
		}, 3800);

	}

	async function fetchVariables(var_id) {
		const url = '<?= base_url() ?>admin/fetchVariants'
		// console.log(var_id);
		let data = new FormData();
		data.append('variable_id', var_id);

		const response = await fetch(url, {
			method: 'POST',
			body: data
		});

		return response.json()
	}

	function renderVariants(data) {
		// console.log(data);
		let element = $('#variantsBlock')
		if (element) {
			data?.forEach(variant => {
				element.append(
					`<div class="form-check form-check-inline chkP_${variant.variable_id}">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input form-check-inputblue variant-check variant1" name="variants_list[]" data-target="#vn_${variant.id}" data-vname="${variant.name}" data-vrbl="${variant.variable_id}" value="${variant.id}">
							<span>${variant.name}</span>
						</label>
					</div>`
				)
			});
			element.selectpicker('refresh')
		}
	}

	function renderVariantsSpec(data) {
		// console.log(data);
		let element = $('#variantsSpecBlock')
		if (element) {
			data?.forEach(variant => {
				element.append(
					`<div class="form-check form-check-inline chkP_${variant.variable_id}">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input form-check-inputblue variant-spec-check variant1" name="variants_list[]" data-target="#vnSpec_${variant.id}" data-vname="${variant.name}" data-vrbl="${variant.variable_id}" value="${variant.id}">
							<span>${variant.name}</span>
						</label>
					</div>`
				)
			});
			element.selectpicker('refresh')
		}
	}

	function removeVariants(variableId) {
		let slctElement = $("#variantsSelect")
		let checkBox = $(`.chkP_${variableId}`)
		checkBox.remove();
		// slctElement.selectpicker('refresh')
	}

	async function savePFAData(data) {
		const url = "<?= base_url() ?>admin/savePFAData"

		const response = await fetch(url, {
			method: 'POST',
			body: data
		});

		return response.json();
	}

	async function savePFASpecData(data) {
		const url = "<?= base_url() ?>admin/savePFASpecData"

		const response = await fetch(url, {
			method: 'POST',
			body: data
		});

		return response.json();
	}
</script>
