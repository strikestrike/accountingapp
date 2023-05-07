 <?php include 'layout/sidebar.php'; ?>

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



                             <div class="error_validator" id="hide_data">
                                 <?php
                                    //echo validation_errors(); 
                                    if ($this->session->flashdata('message'))


                                        echo $this->session->flashdata('message');
                                    ?>
                             </div>

                             <div class="basic-form">
                                 <form method="POST"
                                     action="<?php echo base_url() . 'Admin/rent_regim_verification' ?>">
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Salutation <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div>
                                                 <label class="radio-inline me-3"><input type="radio" name="salutation"
                                                         value="Mr"> Mr</label>
                                                 <label class="radio-inline me-3"><input type="radio" name="salutation"
                                                         value="Mrs"> Mrs</label>
                                                 <span style="color:red; font-size: 12px">
                                                     <?php echo form_error('salutation'); ?></span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Name Surname<span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <input type="text" name="name" class="form-control" eholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('name'); ?></span>
                                                 </div>

                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <input type="text" name="sername" class="form-control"
                                                         placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('sername'); ?></span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Personal number <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <input type="text" name="per_number"
                                                         value="<?php echo set_value('per_number', ''); ?>"
                                                         class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('per_number'); ?></span>
                                                 </div>


                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Address <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <label class="form-label">Country <span
                                                             style="color:red; font-size: 12px"> *</span></label>
                                                     <input type="text" name="country" class="form-control"
                                                         placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('country'); ?></span>
                                                 </div>
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <label class="form-label">City</label>
                                                     <input type="text" name="city" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('city'); ?></span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Address <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <input type="text" name="address" class="form-control"
                                                         placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('address'); ?></span>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>

                                     <hr>
                                     <h6>Information "Product name" 2021</h6>

                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Income <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="income" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('income'); ?></span>
                                         </div>
                                         <!--   <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Financial Information <span
                                                 style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <label class="form-label">Expenses <span
                                                             style="color:red; font-size: 12px"> *</span></label>
                                                     <input type="text" name="expenses" class="form-control"
                                                         placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('expenses'); ?></span>
                                                 </div>
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <label class="form-label">Financial Loss <span
                                                             style="color:red; font-size: 12px"> *</span></label>
                                                     <input type="text" name="financial_loss" class="form-control"
                                                         placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('financial_loss'); ?></span>
                                                 </div>

                                             </div>
                                         </div>
                                         <!--   <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div> -->
                                     </div>
                             </div>
                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Taxable income <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="taxable_income1" class="form-control" placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('taxable_income1'); ?></span>
                                 </div>
                                 <!-- <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->

                             </div>
                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Tax <span style="color:red; font-size: 12px">
                                         *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="tax1" class="form-control" placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('tax1'); ?></span>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>
                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Total income for health <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="total_income_for_health" class="form-control"
                                         placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('total_income_for_health'); ?></span>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>
                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Health insurance tax <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="health_insurance_tax1" class="form-control"
                                         placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('health_insurance_tax1'); ?></span>
                                 </div>
                                 <!--   <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>


                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">To be paid until May 2022 <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <div class="row">
                                         <div class="col-sm-6">
                                             <label class="form-label">Health Tax <span
                                                     style="color:red; font-size: 12px"> *</span></label>
                                             <input type="text" name="health_tax" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('health_tax'); ?></span>
                                         </div>
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <label class="form-label">Tax <span style="color:red; font-size: 12px">
                                                     *</span></label>
                                             <input type="text" name="tax2" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('tax2'); ?></span>
                                         </div>

                                     </div>
                                 </div>
                                 <!-- <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>



                             <hr>
                             <h6>Informations "Product name" 2022</h6>




                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Do you need health insurance ? <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <select class="default-select form-control" name="do_you_need_health_insurance">
                                         <option value="yes">YES</option>
                                         <option value="1">option</option>
                                         <option value="2">option</option>
                                         <span style="color:red; font-size: 12px">
                                             <?php echo form_error('do_you_need_health_insurance'); ?></span>
                                     </select>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>

                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Taxable Income <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="taxable_income2" class="form-control" placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('taxable_income2'); ?></span>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>

                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label">Health insurance tax <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="health_insurance_tax2" class="form-control"
                                         placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('health_insurance_tax2'); ?></span>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>
                             <div class="row form-group">
                                 <label class="col-sm-3 col-form-label text-danger">To be paid till 2023 <span
                                         style="color:red; font-size: 12px"> *</span></label>
                                 <div class="col-sm-7">
                                     <input type="text" name="to_be_paid_till_2023" class="form-control" placeholder="">
                                     <span style="color:red; font-size: 12px">
                                         <?php echo form_error('to_be_paid_till_2023'); ?></span>
                                 </div>
                                 <!--  <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <span><a href="javascript:void(0);" class="info-btn"><i class="fa fa-info"></i></a></span>
                                                                <div class="main">
                                                                    <p>Password should be at least 10 characters long and include 1 uppercase and 1 lower case alpha character, 1 number and 1 special character . Passwords are case sensitive.</p>
                                                                </div>
                                                            </div>
                                                        </div> -->
                             </div>

                             <div class="row form-group">
                                 <div class="col-sm-10">
                                     <button type="submit" class="btn btn-primary"><img
                                             src="<?= base_url(); ?>assets/img/save.png" alt="">&nbsp;&nbsp;
                                         Save</button>
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
 </div>



 <!-- Modal Start: Add Project -->
 <div class="modal fade" id="addProjectSidebar">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Create Project</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>
             <div class="modal-body">
                 <form>
                     <div class="form-group">
                         <label class="text-black font-w500">Project Name</label>
                         <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                         <label class="text-black font-w500">Dadeline</label>
                         <div class="cal-icon"><input type="date" class="form-control"><i
                                 class="far fa-calendar-alt"></i></div>
                     </div>
                     <div class="form-group">
                         <label class="text-black font-w500">Client Name</label>
                         <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                         <button type="button" class="btn btn-primary">CREATE</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal End: Add Project -->