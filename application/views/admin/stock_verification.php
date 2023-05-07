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





                             <div class="basic-form">
                                 <form method="POST" action="<?php echo base_url() . 'Admin/stock_verification' ?>">
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Salutation <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div>
                                                 <label class="radio-inline me-3"><input type="radio" name="salutation" value="Mr"> Mr</label>
                                                 <label class="radio-inline me-3"><input type="radio" name="salutation" value="Mrs"> Mrs</label>
                                                 <span style="color:red; font-size: 12px">
                                                     <?php echo form_error('salutation'); ?></span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Name Surname <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <input type="text" name="name" id="name" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('name'); ?></span>
                                                 </div>
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <input type="text" name="sername" id="surname" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('sername'); ?></span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Personal number <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <input type="text" name="per_number" class="form-control allowNumericWithPlus" onKeyPress="if(this.value.length > 12) return false;" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('per_number'); ?></span>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Address <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <label class="form-label">Country <span style="color:red; font-size: 12px"> *</span></label>
                                                     <input type="text" name="country" class="form-control" placeholder="">
                                                      <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('country'); ?></span>
                                                 </div>
                                                 <div class="col-sm-6 mt-2 mt-sm-0">
                                                     <label class="form-label">City <span style="color:red; font-size: 12px"> *</span></label>
                                                     <input type="text" name="city" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('city'); ?></span>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Address <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-9">
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <input type="text" name="address" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('address'); ?></span>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>

                                     <hr>
                                     <h6>Information "Product name" 2021 <span style="color:red; font-size: 12px"> *</span></h6>

                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label"></label>
                                         <div class="col-sm-7">
                                             <div class="row">
                                                 <div class="col-sm-4">
                                                     <label class="form-label">Countries list <span style="color:red; font-size: 12px"> *</span> </label>
                                                     <input type="text" name="countries_list" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('countries_list'); ?></span>
                                                 </div>
                                                 <div class="col-sm-4 mt-2 mt-sm-0">
                                                     <label class="form-label">Dividents <span style="color:red; font-size: 12px"> *</span> </label>
                                                     <input type="text" name="dividents" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('dividents'); ?></span>
                                                 </div>
                                                 <div class="col-sm-4 mt-2 mt-sm-0">
                                                     <label class="form-label">Tax <span style="color:red; font-size: 12px"> *</span> </label>
                                                     <input type="text" name="tax1" class="form-control" placeholder=" ">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('tax1'); ?></span>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="countries_list" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="countries_list" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="countries_list" class="form-control" placeholder="">
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="dividents" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="dividents" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="dividents" class="form-control" placeholder="">
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="tax1" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="tax1" class="form-control" placeholder="">
                                                 </div>
                                                 <div class="col-sm-4 mt-2">
                                                     <input type="text" name="tax1" class="form-control" placeholder="">
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
                                         <label class="col-sm-3 col-form-label">Income <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="income" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('income'); ?></span>
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
                                         <label class="col-sm-3 col-form-label">Taxable income <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="taxable_income" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('taxable_income'); ?></span>
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
                                         <label class="col-sm-3 col-form-label">Tax <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="tax2" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('tax2'); ?></span>
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
                                         <label class="col-sm-3 col-form-label">Total income for health <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="total_income_for_health" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('total_income_for_health'); ?></span>
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
                                         <label class="col-sm-3 col-form-label">Health insurance tax<span style="color:red; font-size:12p"> *</span> </label>
                                         <div class="col-sm-7">
                                             <input type="text" name="health_insurance_tax1" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('health_insurance_tax1'); ?></span>
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
                                         <label class="col-sm-3 col-form-label text-danger">To be paid until May 2022</label>
                                         <div class="col-sm-7">
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <input type="text" name="to_be_paid_till_2022" class="form-control" placeholder="">
                                                     <span style="color:red; font-size: 12px">
                                                         <?php echo form_error('to_be_paid_till_2022'); ?></span>
                                                 </div>
                                                 <!-- <div class="col-sm-6 mt-2 mt-sm-0">
                                                                    <input type="text" name="to_be_paid_till_2022" class="form-control" placeholder="">
                                                                </div> -->

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




                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Do you need health insurance ? <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <select class="default-select form-control" name="do_you_need_health_insurance">
                                                 <option value="yes">YES</option>
                                                 <option value="1">option</option>
                                                 <option value="2">option</option>
                                                 <span style="color:red; font-size: 12px">
                                                     <?php echo form_error('do_you_need_health_insurance'); ?></span>
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

                                     <div class="row form-group">
                                         <label class="col-sm-3 col-form-label">Total Income <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="total_income" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('total_income'); ?></span>
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
                                         <label class="col-sm-3 col-form-label">Health insurance tax <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="health_insurance_tax2" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('health_insurance_tax2'); ?></span>
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
                                         <label class="col-sm-3 col-form-label text-danger">To be paid unit may 2023 <span style="color:red; font-size: 12px"> *</span></label>
                                         <div class="col-sm-7">
                                             <input type="text" name="to_be_paid_unit_2023" class="form-control" placeholder="">
                                             <span style="color:red; font-size: 12px">
                                                 <?php echo form_error('to_be_paid_unit_2023'); ?></span>
                                         </div>
                                         <!-- <div class="col-sm-2">
                                                            <div class="tooltip-info">
                                                                <a href="javascript:;" class="btn1" onclick="showDiv()"><i class="fa fa-info"></i></a>
                                                                <div class="divClass" class="border">
                                                                    <a href="javascript:;" class="btn2" onclick="hideDiv()">&times;</a>
                                                                    <p>I don't want to redirect 3.5% to support a humanitarian project</p>

                                                                </div>
                                                            </div>
                                                        </div> -->
                                     </div>

                                     <div class="row form-group">
                                         <div class="col-sm-10">
                                             <button type="submit" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/save.png" alt="">&nbsp;&nbsp; Save</button>
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
                         <div class="cal-icon"><input type="date" class="form-control"><i class="far fa-calendar-alt"></i></div>
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
 <script>
     $(".allowNumericWithoutDecimal").on("keypress keyup blur", function(event) {
         $(this).val($(this).val().replace(/[^\d].+/, ""));
         if ((event.which < 48 || event.which > 57)) {
             event.preventDefault();
         }
     })

     $(".allowNumericWithPlus").on("keypress keyup blur", function(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
         return true;
     })
 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


 <script>
     $(document).ready(function() {
         $("#name").keypress(function(e) {
             var key = e.keyCode;
             if (key >= 48 && key <= 57) {
                 e.preventDefault();
             }
         });
         $("#surname").keypress(function(e) {
             var key = e.keyCode;
             if (key >= 48 && key <= 57) {
                 e.preventDefault();
             }
         });
     });
 </script>