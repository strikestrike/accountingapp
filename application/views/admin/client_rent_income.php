<?php include 'layout/sidebar.php'; ?>
<style>
    .project-main2 .table thead th {
        width: auto;
    }

    .project-main2 table .color-primary .btn {
        padding: 5px 9px !important;
    }

    .project-main2 table .color-primary .btn i {
        pointer-events: none;
    }
</style>
<style>
	/* Plugin Example Container */
	.date-select {
		width: 33%;
		min-width: 400px;
		padding: 15px 0;
		display: inline-block;
		box-sizing: border-box;
		text-align: center;
	}

	.date-select .date-dropdowns {
		display: flex;
	}

	.date-select:first-of-type {
		position: relative;
		/* bottom: 35px; */
	}

	/* date-select Heading */
	.date-select h2 {
		font-family: "Roboto Condensed", helvetica, arial, sans-serif;
		font-size: 1.3em;
		margin: 15px 0;
		color: #4F5462;
	}

	.date-select input {
		display: block;
		margin: 0 auto 20px auto;
		width: 150px;
		padding: 8px 10px;
		border: 1px solid #CCCCCC;
		border-radius: 3px;
		background: #F2F2F2;
		text-align: center;
		font-size: 1em;
		letter-spacing: 0.02em;
		font-family: "Roboto Condensed", helvetica, arial, sans-serif;
	}

	.date-select select {
		padding: 10px 0;
		background: #ffffff;
		border: 1px solid #CCCCCC;
		border-radius: 3px;
		margin: 0 3px;
		flex-grow: 1;
	}

	.date-select select.invalid {
		color: #E9403C;
	}

	.price-box {
		position: absolute;
		bottom: 25px;
		right: 25px;
		width: 230px;
	}
	.remove-btn:disabled{
		display: none;
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
                                    // echo "<pre>";
                                    // print_r($personalData);
                                    // echo "</pre>";
                                    ?>
                                    <form id="<?= !empty($rentIncome) ? 'incomeTypeForm' : 'rent_form' ?>" class="<?= !empty($rentIncome) ? 'editable' : '' ?>" action="<?= !empty($rentIncome) ? base_url() . 'admin/updateClientRentIncome' : '' ?>" method="POST">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-9 col-sm-8">
                                                <div id="repeater">
                                                    <div class="clearfix"></div>
                                                    <?php
                                                    if (!empty($rentIncome)) {
                                                        $i = 0;
                                                        // die;
                                                        foreach ($rentIncome as $key => $value) {
                                                            // echo $value['rented_space_address']
                                                    ?>
                                                            <input type="hidden" name="income_type[<?= $i ?>][id]" value="<?= $value['id'] ?>">
                                                            <input type="hidden" name="income_type[<?= $i ?>][personal_data_id]" value="<?= $personalData['id'] ?>">
                                                            <!-- <div class="items" data-group="income_type"> -->
                                                            <div class="form-wrapper">
                                                                <div class="row form-group">
                                                                    <!-- rented space address -->
                                                                    <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Rented Space address <span style="color:red; font-size: 12px"></span></label>
                                                                    <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <input type="text" id="rentalIncome_rented_space_address" class="form-control" name="income_type[<?= $i ?>][rented_space_address]" data-name="rented_space_address" value="<?php echo $value['rented_space_address'] ?>" placeholder="">
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('rented_spaceadd'); ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- rented space address end -->
                                                                <!-- contract details -->
                                                                <div class="row form-group align-items-inherit">
                                                                    <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Contract Data<span style="color:red; font-size: 12px"> *</span></label>
                                                                    <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract no <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <input type="number" id="rentalIncome_contract_number" name="income_type[<?= $i ?>][contract_number]" data-name="contract_number" value="<?php echo $value['contract_number'] ?>" class="form-control" required>
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('contract_no'); ?></span>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label">Rent value <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <input type="number" id="rentalIncome_rent_value" name="income_type[<?= $i ?>][rent_value]" data-name="rent_value" value="<?php echo $value['rent_value'] ?>" class="form-control" required>
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('rent_value'); ?></span>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label">Currency <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <select class="default-select form-control" id="rentalIncome_currency" name="income_type[<?= $i ?>][currency]" data-name="currency">
                                                                                    <option value="RON" <?= $value['currency'] == 'RON' ? 'selected' : '' ?>>RON</option>
                                                                                    <option value="EUR" <?= $value['currency'] == 'EUR' ? 'selected' : '' ?>>EUR</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Sign date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="sign-date" type="hidden" name="sign_date" data-name="sign_date"> -->
                                                                                    <input type="date" id="rentalIncome_sign_date" name="income_type[<?= $i ?>][sign_date]" value="<?= $value['sign_date'] ?>" data-name="sign_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract start date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="contract-start-date" type="hidden" name="contract_start_date" data-name="contract_start_date"> -->
                                                                                    <input type="date" id="rentalIncome_contract_start_date" name="income_type[<?= $i ?>][contract_start_date]" value="<?= $value['contract_start_date'] ?>" data-name="contract_start_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract end date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="contract-end-date" type="hidden" name="contract_end_date" data-name="contract_end_date"> -->
                                                                                    <input type="date" id="rentalIncome_contract_end_date" name="income_type[<?= $i ?>][contract_end_date]" value="<?= $value['contract_end_date'] ?>" data-name="contract_end_date">
                                                                                </div>
                                                                                <span style="color:red; font-size: 12px">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- contract details end-->
                                                            </div>
                                                            <!-- Repeater Remove Btn -->
                                                            <!-- <div class="pull-right repeater-remove-btn">
																	<button class="btn btn-danger remove-btn">
																		Remove
																	</button>
																</div> -->
                                                            <div class="clearfix"></div>
                                                            <!-- </div> -->
                                                        <?php $i++;
                                                        }
                                                    } else { ?>
                                                        <div class="items" data-group="income_type">
                                                            <div class="form-wrapper">
                                                                <div class="row form-group">
                                                                    <!-- rented space address -->
                                                                    <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Rented Space address <span style="color:red; font-size: 12px"></span></label>
                                                                    <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <!-- <p>lorem</p> -->
                                                                                <input type="text" class="form-control" id="ri_rsa" name="rented_space_address" data-name="rented_space_address" placeholder="">
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('rented_spaceadd'); ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- rented space address end -->
                                                                <!-- contract details -->
                                                                <div class="row form-group align-items-inherit">
                                                                    <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Contract Data<span style="color:red; font-size: 12px"> *</span></label>
                                                                    <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract no <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <input type="number" id="rentalIncome_contract_number" name="contract_number" data-name="contract_number" class="form-control" required>
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('contract_no'); ?></span>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label">Rent value <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <input type="number" id="rentalIncome_rent_value" name="rent_value[]" data-name="rent_value" class="form-control" required>
                                                                                <span style="color:red; font-size: 12px">
                                                                                    <?php echo form_error('rent_value'); ?></span>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label">Currency <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <select class="default-select form-control" id="rentalIncome_currency" name="currency" data-name="currency">
                                                                                    <option value="RON">RON</option>
                                                                                    <option value="EUR">EUR</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Sign date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="sign-date" type="hidden" name="sign_date" data-name="sign_date"> -->
                                                                                    <input type="date" id="rentalIncome_sign_date" name="sign_date" data-name="sign_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract start date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="contract-start-date" type="hidden" name="contract_start_date" data-name="contract_start_date"> -->
                                                                                    <input type="date" id="rentalIncome_contract_start_date" name="contract_start_date" data-name="contract_start_date">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                                <label class="form-label"></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Contract end date <span style="color:red; font-size: 12px"> *</span></label>
                                                                                <div class="date-select">
                                                                                    <!-- <input class="contract-end-date" type="hidden" name="contract_end_date" data-name="contract_end_date"> -->
                                                                                    <input type="date" id="rentalIncome_contract_end_date" name="contract_end_date" data-name="contract_end_date">
                                                                                </div>
                                                                                <span style="color:red; font-size: 12px">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- contract details end-->
                                                            </div>
                                                            <!-- Repeater Remove Btn -->
                                                            <div class="pull-right repeater-remove-btn">
                                                                <button class="btn btn-danger remove-btn">
                                                                    Remove
                                                                </button>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    <?php }
                                                    ?>

                                                    <div class="row form-group mb-4">
                                                        <div class="col-xl-3 col-lg-3 col-sm-3">
                                                            <!-- <button class="btn btn-danger w-100">Add</button> -->
                                                            <?php if (empty($rentIncome)) { ?>
                                                                <button type="button" class="btn btn-danger pt-5 pull-right repeater-add-btn">
                                                                    Add
                                                                </button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-xl-9 col-lg-9 col-sm-9 pl-lg-0">
                                                            <?php if (empty($rentIncome)) { ?>
                                                                <small id="duplicateFormMsg">Add a new rented space</small>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-sm-4">
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col-xl-9 col-lg-9 col-sm-6">
                                                <div class="row form-group mb-0">
                                                    <div class="col-xl-6">
                                                        <?php if (!empty($rentIncome)) { ?>
                                                            <a href="javascript:void(0);" class="btn btn-warning editPersonalDataBtn"><i class="fas fa-edit"></i> Edit</a>
                                                            <a href="javascript:void(0);" class="btn btn-danger cancelEditingBtn"><i class="fas fa-times"></i> Cancel</a>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <?php if (!empty($personalData)) { ?>
                                                                <?php if ($personalData['steps_completed'] < 2) { ?>
                                                                    <!-- <a href="javascript:void(0);" class="btn btn-success proceedPersonalData proceedIncomeType"><i class="fas fa-forward"></i> Final Submit</a> -->
                                                                <?php } elseif ($personalData['steps_completed'] >= 2) { ?>
                                                                    <a href="<?= base_url()?>admin/clientRentVerification/<?= $personalData['id'] ?>" class="btn btn-primary nextStep"><i class="fas fa-forward"></i> Next</a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <small>Required fields</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="white-box price-box d-none">
                                            <h2>Price</h2>
                                            <h3>Cost Final</h3>
                                            <p> Ron</p>
                                            <input type="hidden" id="finalCostInput" name="cost_final" value="">
                                        </div>
                                    </form>


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
    window.addEventListener('load', function(){
        $("form.editable :input").prop('readonly', true);
		// $("form.editable input[type='radio']").attr('disabled', true);

		$(".editPersonalDataBtn").click(() => {
			$("#incomeTypeForm").removeClass("editable");
			$("#incomeTypeForm :input").prop('readonly', false);
			$(".nextStep").hide();
			// $("#incomeTypeForm input[type='radio']").attr('disabled', false);
		});
		$(".cancelEditingBtn").click(() => {
			$("#incomeTypeForm").addClass("editable");
			$("#incomeTypeForm :input").prop('readonly', true);
			$(".nextStep").show();
			// $("#incomeTypeForm input[type='radio']").attr('disabled', true);
		});
    });
</script>