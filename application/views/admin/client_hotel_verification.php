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

    .remove-btn:disabled {
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
                                    // echo "<pre>";print_r($incomeData); echo "</pre>"
                                    ?>
                                    <form action="<?= !empty($existing_data)? base_url() . 'admin/updateClientHotelVerification' : base_url() . 'admin/saveClientHotelVerification' ?>" method="POST">
                                        <input type="hidden" name="personal_data[id]" value="<?= $personalData['id'] ?>">
                                        <input type="hidden" name="verf_id" <?= !empty($existing_data) ? 'value = "'.$existing_data['id'].'"' : 'disabled' ?>>
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
                                                        <input type="text" name="personal_data[city]" value="<?= $personalData['city'] ?>" class="form-control" placeholder="Enter Country name">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <label class="form-label">Area</label>
                                                        <input type="text" name="personal_data[area]" value="<?= $personalData['area'] ?>" class="form-control" placeholder="Enter City name">
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
                                            // print_r($existing_data);
                                            // echo "</pre>";
                                        ?>


                                        <div class="row form-group">
                                            <label class="col-sm-3 col-form-label">Do you need health insurance ?</label>
                                            <div class="col-sm-7">
                                                <!-- <select class="select-2022 form-control" name="need_health_insurance" onchange="checkDropdown(this)">
                                                    <option value="0">Select <i class="fas fa-caret-down"></i> </option>
                                                    <option value="1">YES</option>
                                                    <option value="2">NO</option>
                                                </select> -->
                                                <select class="select-2022 form-control" name="need_health_insurance" onchange="checkDropdown(this)">
                                                    <!-- <input type="hidden" name="need_health_insurance" <?= $existing_data['need_health_insurance'] == 1 ? 'disabled' : 'value="0"' ?>> -->
                                                    <option value="0">Select <i class="fas fa-caret-down"></i> </option>
                                                    <option value="1" <?= !empty($existing_data) ? ($existing_data['need_health_insurance'] == 1 ? 'selected' : '') : '' ?> >YES</option>
                                                    <option value="0">NO</option>
                                                </select>
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
                                                <button type="submit" class="btn btn-primary"><img src="<?= base_url() ?>assets/img/save.png" alt="">&nbsp;&nbsp; Save</button>
                                            </div>
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
    window.addEventListener('load', function() {
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
        }, 1000); // Will do the ajax stuff after 2000 ms, or 2 s
    }
</script>
