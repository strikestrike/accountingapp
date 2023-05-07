<style>
    .remove-divident-row i {
        pointer-events: none;
    }

    #repeater {
        position: relative;
    }

    .repeater-heading {
        position: absolute;
        bottom: -10px;
    }

    .repeater-remove-btn {
        position: relative;
        top: -40px;
        left: -60px;
        margin-top: 0 !important;
        width: fit-content;
    }

    .repeater-remove-btn button {
        padding: 7px 11px !important;
    }

    .error-input {
        border-color: red;
    }
</style>
<!--Start: Page main heading -->
<div class="container-fluid page-sub-head mb-md-0 mb-4">
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
                        <a href="<?= base_url('user/dividentsIncome') ?>" class="nav-link">Income Type</a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-3" class="nav-link active">Information Verification </a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-4" class="nav-link">Document Release </a>
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
                                        <form action="<?= !empty($existingVerification['id']) ? base_url('user/updateDividentVerification') : base_url('user/saveDividentVerification') ?>" method="POST">
											<input type="hidden" name="id" value="<?= $existingVerification['id'] ?? '' ?>">
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
                                                            <input type="text" name="personal_data[surname]" <?= !empty($personalData['surname']) ? 'value = ' . $personalData['surname'] : '' ?> class="form-control" placeholder="Surname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 col-form-label">Personal number</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="personal_data[personal_number]" <?= !empty($personalData['personal_number']) ? 'value = ' . $personalData['personal_number'] : '' ?> class="form-control" placeholder="12354678910111213">
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
                                                            <input type="text" name="personal_data[address_other_details]" value="<?= $personalData['address'] ?>" class="form-control" placeholder="Assasa">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <h6>Information "Product name" 2021</h6>
                                            <?php
                                            // echo "<pre>";print_r($calculatedData2021);echo "</pre>";
                                            ?>

                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-md-7 col-10 divident-2021-wrapper">
                                                    <?php if (!empty($calculatedDividentList)) { ?>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="form-label">Countries list </label>
                                                            </div>
                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                <label class="form-label">Dividents </label>
                                                            </div>
                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                <label class="form-label">Tax</label>
                                                            </div>
                                                        </div>
                                                        <?php foreach ($calculatedDividentList as $key => $value) { ?>
                                                            <div class="row divident-2021">
                                                                <div class="col">
                                                                    <div class="divident-2021-inputs">
                                                                        <div class="row">
                                                                            <div class="col-sm-4 mt-2">
                                                                                <input type="text" name="" value="<?= $value['country'] ?>" data-name="country" class="form-control div_country" placeholder="e.g. XX">
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2">
                                                                                <input type="text" name="" value="<?= $value['divident'] ?>" data-name="divident" class="form-control div_divident" placeholder="divident">
                                                                            </div>
                                                                            <div class="col-sm-4 mt-2">
                                                                                <input type="text" name="" value="<?= $value['tax'] ?>" data-name="tax" class="form-control div_tax" placeholder="tax" readonly>
                                                                            </div>
                                                                            <!-- <a class="remove-divident-row" href="javascript:void(0);"><i class="fas fa-minus"></i></a> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } else { ?>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="form-label">Countries list </label>
                                                            </div>
                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                <label class="form-label">Net Divident (in USD) </label>
                                                            </div>
                                                            <div class="col-sm-4 mt-2 mt-sm-0">
                                                                <label class="form-label">Tax</label>
                                                            </div>
                                                        </div>
                                                        <div id="repeater">
                                                            <!-- Repeater Heading -->

                                                            <div class="clearfix"></div>
                                                            <!-- Repeater Items -->
                                                            <div class="items" data-group="test">
                                                                <!-- Repeater Content -->
                                                                <div class="row divident-2021">
                                                                    <div class="col">
                                                                        <div class="divident-2021-inputs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4 mt-2">
                                                                                    <input type="text" name="" data-name="country" class="form-control processCountry" placeholder="e.g. XX">
                                                                                </div>
                                                                                <div class="col-sm-4 mt-2">
                                                                                    <input type="text" name="" data-name="divident" class="form-control processDivident" placeholder="divident">
                                                                                </div>
                                                                                <div class="col-sm-4 mt-2">
                                                                                    <input type="text" name="" data-name="tax" class="form-control processTax" placeholder="tax">
                                                                                </div>
                                                                                <!-- <a class="remove-divident-row" href="javascript:void(0);"><i class="fas fa-minus"></i></a> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Repeater Remove Btn -->
                                                                <div class="pull-right repeater-remove-btn" style="margin-top:20px">
                                                                    <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="repeater-heading">
                                                                <a class="btn btn-primary pt-5 pull-right repeater-add-btn">
                                                                    <i class="fas fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-primary mt-4" id="processDividentDataBtn" onclick="processDivident()" href="javascript:void(0);">Process</a>
                                                    <?php } ?>
                                                    <!-- Repeater End -->

                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Input the Net dividents (in USD). It will get calculated on the basis of annual exchange rate.</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Income</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="income_2021" value="" class="form-control" placeholder="Income (in RON)">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Taxable income</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="taxable_income_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['taxableincome2021'] : '' ?>" class="form-control" placeholder="158.603 RON">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Tax</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="tax_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['tax2021'] : '' ?>" class="form-control" placeholder="158.603 RON">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Total income for health</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="total_income_for_health_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['totalIncomeForHealth2021'] : '' ?>" class="form-control" placeholder="158.603 RON">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Health insurance tax</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="health_insurance_tax_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['healthInsuranceTax2021'] : '' ?>" class="form-control" placeholder="2.760 RON">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">To be paid till May 2022</label>
                                                <div class="col-md-7 col-10">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" name="to_be_paid_health_tax_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['toBePaidHealthTax2021'] : '' ?>" class="form-control" placeholder="3.060 RON">
                                                        </div>
                                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                                            <input type="text" name="to_be_paid_tax_2021" value="<?= !empty($calculatedData2021) ? $calculatedData2021['toBePaidTax2021'] : '' ?>" class="form-control" placeholder="17.372 RON">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-2">
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




                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <label class="col-sm-3 col-form-label">Do you need health insurance ?</label>
                                                <div class="col-md-7 col-10">
                                                    <select class="default-select select-2022 form-control" onchange="checkDropdown(this)">
                                                        <option value="0">Select</option>
                                                        <option value="1">YES</option>
                                                        <option value="2">NO</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center px-md-0 px-2" id="ifYesIncome" style="display: none;">
                                                <label class="col-sm-3 col-form-label"> Income</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" id="ifYesIncome2022" name="income_2022" class="form-control" placeholder="3.060 RON" oninput="calculate2022Data(this.value)">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center px-md-0 px-2" id="ifYesHItax" style="display: none;">
                                                <label class="col-sm-3 col-form-label">Health insurance tax</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="health_insurance_tax_2022" id="ifYesHItax2022" class="form-control" placeholder="3.060 RON">
                                                </div>

                                            </div>
                                            <div class="row mb-3 align-items-center px-md-0 px-2" id="ifYesTobePaid" style="display: none;">
                                                <label class="col-sm-3 col-form-label text-danger">To be paid till May 2023</label>
                                                <div class="col-md-7 col-10">
                                                    <input type="text" name="tax_2022" id="ifYesTobePaid2022" class="form-control" placeholder="3.060 RON">
                                                </div>
                                                <div class="col-2">
                                                    <div class="tooltip-info">
                                                        <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                        <div class="main">
                                                            <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 align-items-center px-md-0 px-2">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary"><img src="<?= base_url() ?>assets/img/save.png" alt="">&nbsp;&nbsp; Save</button>
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
        <h3 class="text-center my-3"><a href="#">Information Verification</a></h3>
        <div class="project-main2">

            <span class="arrow-up-back"></span>
            <span class="arrow-up"></span>

            <div class="basic-form">
                <form>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Salutation</label>
                        <div class="col-sm-9">
                            <div>
                                <label class="radio-inline me-3"><input type="radio" name="optradio" checked=""> Mr</label>
                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Mrs</label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Name Surname</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="" class="form-control" placeholder="Aasasasa">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" name="" class="form-control" placeholder="asad">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Personal number</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" name="" class="form-control" placeholder="12354678910111213">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="" class="form-control" placeholder=" Country">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="" class="form-control" placeholder="City">
                                </div>
                                <div class="col-12 mt-2">
                                    <input type="text" name="" class="form-control" placeholder="Address">
                                </div>
                            </div>
                        </div>
                    </div>



                    <hr>
                    <h6>Information "Product name" 2021</h6>



                    <div class="form-group">
                        <label class="col-form-label">Income</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Taxable income</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control" placeholder="173.728 RON">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tax</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control" placeholder="173.728 RON">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-form-label text-danger">To be paid untill May 2022</label>
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Health Tax</label>
                                        <input type="text" name="" class="form-control" placeholder="2.760 RON">
                                    </div>
                                    <div class="col-6">
                                        <label>Tax</label>
                                        <input type="text" name="" class="form-control" placeholder="15.860 RON">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <h6>Information "Product name" 2022</h6>



                    <div class="form-group">
                        <label class="col-form-label">Countries list (indicatives)</label>
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">

                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Tax</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control" placeholder="158.603 RON">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">
                        <input type="text" name="" class="form-control mb-3" placeholder="158.603 RON">

                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Income</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control mb-3">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Taxable income</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control mb-3" placeholder="173.728 RON">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Total income for health</label>
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="" class="form-control" placeholder="173.728 RON">
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label">Health insurance tax</label>
                        <div class="col-sm-7">
                            <input type="text" name="" class="form-control" placeholder="3.060 RON">
                        </div>
                    </div>



                    <p class="text-danger">To be paid untill 25 May 2022</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="" class="form-control" placeholder="3.060 RON">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="" class="form-control" placeholder="3.060 RON">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="tooltip-info">
                                    <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                    <div class="main">
                                        <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h5>Redirect 3.5% to one ONG</h5>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-sm-12 mt-2 mt-sm-0">
                                        <label class="form-label">Choose from list</label>
                                        <input type="text" name="" class="form-control" placeholder="3.060 RON">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <label class="ong-radio">
                                    <input class="ong_question" type="checkbox" name="ong_question" value="1">
                                    <span class="crossmark"></span>
                                </label>
                            </div>
                        </div>
                        <p class="ong-text">I don't want to redirect 3.5% to support a humanitarian project</p>

                    </div>


            </div>

            <h5>Or add a new ONG</h5>
            <div class="form-group">
                <label class="form-label">OMG Name</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>
            <div class="form-group">
                <label class="form-label">Registration No.</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>
            <div class="form-group">
                <label class="form-label">Bank Account</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>
            <h5>Informations Product name 2022</h5>

            <div class="form-group">
                <div class="row">
                    <label class="col-7 col-form-label">Do you need health insurance ?</label>
                    <div class="col-5">
                        <div class="dropdown bootstrap-select default-select form-control"><select class="default-select form-control">
                                <option value="">YES</option>
                                <option value="">option</option>
                                <option value="">option</option>
                            </select>


                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Income</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>
            <div class="form-group">
                <label class="form-label">Health insurance tax</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>
            <div class="form-group">
                <label class="form-label text-danger">to be paid until 25 May 2022</label>
                <input type="text" name="" class="form-control" placeholder="3.060 RON">
            </div>

            <div class="row form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"><img src="img/save.png" alt="">&nbsp;&nbsp; Save</button>
                </div>
            </div>
            </form>
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
    window.addEventListener('load', () => {
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });


		<?php if(!empty($existingVerification)){
			if($existingVerification['income_2022'] != 0){?>
				$(".select-2022").val("1")
				$("#ifYesIncome").slideDown('500')
				$("#ifYesIncome2022").removeAttr('disabled');
				$("#ifYesHItax").slideDown('500')
				$("#ifYesHItax2022").removeAttr('disabled')
				$("#ifYesHItax2022").attr('readonly', 'true')
				$("#ifYesTobePaid").slideDown('500')
				$("#ifYesTobePaid2022").removeAttr('disabled')
				$("#ifYesTobePaid2022").attr('readonly', 'true')
				$("#ifYesIncome2022").val("<?= $existingVerification['income_2022'] ?>")
				$("#ifYesHItax2022").val("<?= $existingVerification['health_insurance_tax_2022'] ?>");
				$("#ifYesTobePaid2022").val(<?= $existingVerification['tax_2022'] ?>);
		
		<?php	}
		} ?>
    })
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

<script>
    function processDivident() {
        // var items = $(".items");
        var data = [];
        var country = []
        var divident = []
        var tax = []
        var error = 0;

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to continue with the data provided!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Proceed!'
        }).then((result) => {
            if (result.value) {
                $(".processCountry").each(function(e) {
                    if ($(this).val() !== '') {
                        // console.log($(this).val());
                        country.push($(this).val());
                    } else {
                        $(this).css('border-color', 'red');
                        error++;
                    }
                })
                $(".processDivident").each(function(e) {
                    if ($(this).val() !== '') {
                        // console.log($(this).val());
                        divident.push($(this).val());
                    } else {
                        $(this).css('border-color', 'red');
                        error++;
                    }
                })
                $(".processTax").each(function(e) {
                    if ($(this).val() !== '') {
                        // console.log($(this).val());
                        tax.push($(this).val());
                    } else {
                        // $(this).css('border-color','red');
                        $(this).addClass('error-input');
                        error++;
                    }
                })
                if (error == 0) {
                    for (let i = 0; i < country.length; i++) {
                        var obj = {
                            'personal_data_id': <?= $_SESSION['personal_data_id'] ?>,
                            'country': country[i],
                            'divident': divident[i]
                        }
                        data.push(obj);
                        // console.log(data)
                    }
                    $.ajax({
                        url: "<?= base_url('user/processDividents') ?>",
                        method: 'POST',
                        data: {
                            data
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    })
                }
            } else {
                // toastr.warning("error");
            }
        })



    }
</script>
