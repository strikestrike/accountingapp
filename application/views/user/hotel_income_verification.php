<!--Start: Page main heading -->
<div class="container-fluid page-sub-head">
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
						<a href="<?= base_url('user/verifyPersonalData/'.$personalData['id']) ?>" class="nav-link">Personal Data </a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('user/hotelRegimIncome') ?>" class="nav-link">Income Type</a>
					</li>
					<li class="nav-item">
						<a href="#navpills-3" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Information Verification </a>
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
								Personal tab
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="navpills-2">
						<div class="project-main2">
							<span class="arrow-up-back"></span>
							<span class="arrow-up"></span>
							<div class="d-flex justify-content-between align-items-center">
								income tab
							</div>
						</div>
					</div>
					<div class="tab-pane fade active show" id="navpills-3">
						<div class="row">
							<div class="col-xl-12">
								<div class="project-main2">
									<span class="arrow-up-back"></span>
									<span class="arrow-up"></span>





									<div class="basic-form">
										<?php 
										// echo "<pre>";print_r($incomeData); echo "</pre>"
										?>
										<form action="<?= !empty($hotelVerif_id) ? base_url().'user/updateHotelVerification' : base_url().'user/saveHotelVerification' ?>" method="POST">
												<input type="hidden" name="id" value="<?= $hotelVerif_id ?? '' ?>">
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
															<input type="text" name="personal_data[city]" value="<?= $personalData['city'] ?? '' ?>" class="form-control" placeholder="Enter Country name">
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
											<h6>Information "Product name" 2021</h6>

											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Income</label>
												<div class="col-sm-7">
													<input type="text" name="income_2021" value="<?= $incomeData['income'] ?>" class="form-control" placeholder="264.339 RON">
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Financial Information</label>
												<div class="col-sm-7">
													<div class="row">
														<div class="col-sm-6">
															<label class="form-label">Expenses</label>
															<input type="text" name="expenses" value="<?= $incomeData['totalExpenses'] ?>" class="form-control" placeholder="20.161 RON">
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<label class="form-label">Financial Loss</label>
															<input type="text" name="financial_loss" value="<?= $incomeData['totalFinancialLoss'] ?>" class="form-control" placeholder="2.156 RON">
														</div>

													</div>
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Taxable income</label>
												<div class="col-sm-7">
													<input type="text" name="taxable_income_2021" value="<?= $incomeData['taxableIncome'] ?>" class="form-control" placeholder="158.603 RON">
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>

											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Tax</label>
												<div class="col-sm-7">
													<input type="text" name="tax" value="<?= $incomeData['tax'] ?>" class="form-control" placeholder="158.603 RON">
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Total income for health</label>
												<div class="col-sm-7">
													<input type="text" name="total_income_for_health" value="<?= $incomeData['totalIncomeForHealth'] ?>" class="form-control" placeholder="158.603 RON">
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="row form-group">
												<label class="col-sm-3 col-form-label">Health insurance tax</label>
												<div class="col-sm-7">
													<input type="text" name="health_insurance_tax" value="<?= $incomeData['healthInsuranceTax'] ?>" class="form-control" placeholder="2.760 RON">
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>


											<div class="row form-group">
												<label class="col-sm-3 col-form-label">To be paid until May 2022</label>
												<div class="col-sm-7">
													<div class="row">
														<div class="col-sm-6">
															<label class="form-label">Health Tax</label>
															<input type="text" name="to_be_paid_health_tax" value="<?= $incomeData['healthInsuranceTax'] ?>" class="form-control" placeholder="2.760 RON">
														</div>
														<div class="col-sm-6 mt-2 mt-sm-0">
															<label class="form-label">Tax</label>
															<input type="text" name="to_be_paid_tax" value="<?= $incomeData['tax'] ?>" class="form-control" placeholder="15.860 RON">
														</div>

													</div>
												</div>
												<div class="col-sm-2">
													<div class="tooltip-info">
														<span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
														<div class="main">
															<p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
														</div>
													</div>
												</div>
											</div>



											<hr>
											<h6>Informations "Product name" 2022</h6>

											<?php
												// echo "<pre>";
												// print_r($incomeData);
												// echo "</pre>";
											?>




											<div class="row form-group">
                                                <label class="col-sm-3 col-form-label">Do you need health insurance ?</label>
                                                <div class="col-sm-7">
												<!-- <input type="hidden" name="need_health_insurance" <?= $incomeData['selectYes'] == 1 ? 'disabled' : 'value="0"' ?>> -->
												<div class="col-sm-7">
													<select class="select-2022 form-control" name="need_health_insurance" onchange="checkDropdown(this)">
                                                        <option value="0">Select <i class="fas fa-caret-down"></i> </option>
                                                        <option value="1" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? 'selected' : '') : '' ?>>YES</option>
                                                        <option value="2">NO</option>
                                                    </select>
												</div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group" id="ifYesIncome" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? '' : 'style="display: none;"') : 'style="display: none;"' ?>>
                                                <label class="col-sm-3 col-form-label"> Income</label>
                                                <div class="col-sm-7">
                                                    <input type="text" id="ifYesIncome2022" name="income_estimation_2022" class="form-control" placeholder="3.060 RON" oninput="calculate2022Data(this.value)" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? 'value = "'.$existing_data['income_estimation_2022'].'"' : 'disabled') : 'disabled' ?>>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group" id="ifYesHItax" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? '' : 'style="display: none;"') : 'style="display: none;"' ?>>
                                                <label class="col-sm-3 col-form-label">Health insurance tax</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="health_insurance_tax_2022" id="ifYesHItax2022" class="form-control" placeholder="3.060 RON" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? 'value = "'.$existing_data['health_insurance_tax_2022'].'"' : 'disabled') : 'disabled' ?>>
                                                </div>

                                            </div>
                                            <div class="row form-group" id="ifYesTobePaid" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? '' : 'style="display: none;"') : 'style="display: none;"' ?>>
                                                <label class="col-sm-3 col-form-label text-danger">To be paid till May 2023</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="tax_2022" id="ifYesTobePaid2022" class="form-control" placeholder="3.060 RON" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? 'value = "'.$existing_data['health_insurance_tax_2022'].'"' : 'disabled') : 'disabled' ?>>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<div class="row form-group">
												<div class="col-sm-10">
													<button type="submit" class="btn btn-primary"><img src="img/save.png" alt="">&nbsp;&nbsp; Save</button>
												</div>
											</div>
										</form>
									</div>
								</div>
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
			<div class="tab-pane fade" id="boxed">
				<div class="tab-content" id="BoxedViewTabLink">
					<div class="tab-pane fade show active" id="boxed_navpills-1">
						<div class="row">
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-info">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-primary">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-warning">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-danger">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-info">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="boxed_navpills-2">
						<div class="row">
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-info">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-info">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="boxed_navpills-3">
						<div class="row">
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-warning">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-warning">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-warning">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-warning">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="boxed_navpills-4">
						<div class="row">
							<div class="col-xl-3 col-xxl-4">
								<div class="card project-boxed">
									<div class="img-bx">
										<img src="images/big/img1.jpg" alt="" class="w-100 ">
										<span class="badge badge-danger">Progress</span>
									</div>
									<div class="card-header align-items-start">
										<div>
											<p class="fs-14 mb-2 text-primary">#P-000441425</p>
											<h6 class="fs-18 font-w500 mb-3">
												<a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
											</h6>
											<div class="text-dark fs-14 text-nowrap">
												<i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
											</div>
										</div>
										<div class="dropdown">
											<a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="javascript:void(0);">Edit</a>
												<a class="dropdown-item" href="javascript:void(0);">Delete</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pb-3">
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<span class="mb-0 title">Deadline</span> :
												<span class="text-black ml-2">Monday, Sep 26th 2020</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Client</span> :
												<span class="text-black ml-2">Kevin Sigh</span>
											</li>
											<li class="list-group-item">
												<span class="mb-0 title">Person in charge</span> :
												<span class="text-black desc-text ml-2">Yuri Hanako</span>
											</li>
										</ul>
									</div>
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
		$("#verificationSubmitBtn").click((e) => {
			e.preventDefault();
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Yes, Proceed!'
			}).then((result) => {
				if (result.value) {
					$("#rentVerificationForm").submit();
				} else {
					toastr.error("error");
				}
			})
		})
	});
</script>
<script>
    function checkDropdown(that) {
        if (that.value == 1) {
            $("#ifYesIncome").slideDown('500')
            $("#ifYesIncome2022").removeAttr('disabled');
            $("#ifYesHItax").slideDown('500')
            $("#ifYesHItax2022").removeAttr('disabled')
            $("#ifYesHItax2022").attr('readonly', 'true')
            $("#ifYesTobePaid").slideDown('500')
            $("#ifYesTobePaid2022").removeAttr('disabled')
            $("#ifYesTobePaid2022").attr('readonly', 'true')
        } else {
            $("#ifYesIncome").slideUp(500)
            $("#ifYesIncome2022").attr('disabled', 'true');
            $("#ifYesHItax").slideUp(500)
            $("#ifYesHItax2022").attr('disabled', 'true')
            $("#ifYesTobePaid").slideUp(500)
            $("#ifYesTobePaid2022").attr('disabled', 'true')
        }
    }
    var delayTimer;

    function calculate2022Data(text) {
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            // Do the ajax stuff
            $.ajax({
                url: "<?= base_url('user/calculateDivident2022') ?>",
                method: "post",
                data: {
                    'income': text
                },
                success: function(response) {
                    var data = JSON.parse(response)
                    // console.log(data);
                    $("#ifYesHItax2022").val(data.healthInsuranceTax);
                    $("#ifYesTobePaid2022").val(data.toBePaid);
                },
                error: function() {

                }
            })
        }, 2000); // Will do the ajax stuff after 2000 ms, or 2 s
    }
</script>
