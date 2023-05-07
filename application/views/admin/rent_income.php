<?php include 'layout/sidebar.php'; ?>
<div class="tab-content">
    <div class="tab-pane fade active show" id="list">
        <div class="tab-content project-list-group" id="ListViewTabLink">
            <div class="tab-pane fade" id="navpills-1">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-main2">
                            <span class="arrow-up-back"></span>
                            <span class="arrow-up"></span> personal data
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active show" id="navpills-2">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>

                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-8 mb-3 d-flex justify-content-end align-items-center">
                            <p class="mb-0 small">I don't have the old form, please add your personal data</p>
                        </div>
                        <div class="col-sm-4 mb-3 d-flex justify-content-end">
                            <a class="btn btn-primary text-nowarp" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">Update Information</a>
                        </div>
                        <hr>
                    </div>
                    <?php
                    //echo validation_errors(); 
                    if ($this->session->flashdata('message'))


                        echo $this->session->flashdata('message');
                    ?>

                    <div class="basic-form">

                        <form action="" method="POST" action="<?php echo base_url() . 'Admin/rent_income' ?>">

                            <div class="row">
                                <div class="col-xl-9 col-lg-9 col-sm-8">

                                    <div class="row form-group">
                                        <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Rented Space address <span style="color:red; font-size: 12px"> *</span></label>
                                        <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="rented_spaceadd" placeholder="">
                                                    <span style="color:red; font-size: 12px">
                                                        <?php echo form_error('rented_spaceadd'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group align-items-inherit">
                                        <label class="col-xl-3 col-lg-3 col-sm-3 col-form-label form2">Contract Data<span style="color:red; font-size: 12px"> *</span></label>



                                        <div class="col-xl-9 col-lg-9 col-sm-9 right-form2">

                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <label class="form-label">Contract no <span style="color:red; font-size: 12px"> *</span></label>
                                                    <input type="number" name="contract_no" class="form-control">
                                                    <span style="color:red; font-size: 12px">
                                                        <?php echo form_error('contract_no'); ?></span>
                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label">Rent value <span style="color:red; font-size: 12px"> *</span></label>
                                                    <input type="number" name="rent_value" class="form-control">
                                                    <span style="color:red; font-size: 12px">
                                                        <?php echo form_error('rent_value'); ?></span>
                                                </div>


                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label">Currency <span style="color:red; font-size: 12px"> *</span></label>
                                                    <select class="default-select form-control" name="currency">
                                                        <option>RON</option>
                                                        <option>EURO</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-label">Sign date <span style="color:red; font-size: 12px"> *</span></label>
                                                    <select class="default-select form-control" name="sign_date">
                                                        <option>Day</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                        <option>15</option>
                                                        <option>16</option>
                                                        <option>17</option>
                                                        <option>18</option>
                                                        <option>19</option>
                                                        <option>20</option>
                                                        <option>21</option>
                                                        <option>22</option>
                                                        <option>23</option>
                                                        <option>24</option>
                                                        <option>25</option>
                                                        <option>26</option>
                                                        <option>27</option>
                                                        <option>28</option>
                                                        <option>29</option>
                                                        <option>30</option>
                                                        <option>31</option>


                                                    </select>

                                                </div>


                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="sign_month">
                                                        <option>Month</option>
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select>

                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="sign_year">
                                                        <option>Year</option>
                                                        <option>2022</option>
                                                        <option>2021</option>
                                                        <option>2020</option>
                                                        <option>2019</option>
                                                        <option>2018</option>
                                                        <option>2017</option>
                                                        <option>2016</option>
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                        <option>2010</option>
                                                        <option>2009</option>
                                                        <option>2008</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2005</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-label">Contract start date <span style="color:red; font-size: 12px"> *</span></label>
                                                    <select class="default-select form-control" name="contract_startdate">
                                                        <option>Day</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                        <option>15</option>
                                                        <option>16</option>
                                                        <option>17</option>
                                                        <option>18</option>
                                                        <option>19</option>
                                                        <option>20</option>
                                                        <option>21</option>
                                                        <option>22</option>
                                                        <option>23</option>
                                                        <option>24</option>
                                                        <option>25</option>
                                                        <option>26</option>
                                                        <option>27</option>
                                                        <option>28</option>
                                                        <option>29</option>
                                                        <option>30</option>
                                                        <option>31</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="contract_startmonth">
                                                        <option>Month</option>
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select>

                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="contract_startyear">
                                                        <option>Year</option>
                                                        <option>2022</option>
                                                        <option>2021</option>
                                                        <option>2020</option>
                                                        <option>2019</option>
                                                        <option>2018</option>
                                                        <option>2017</option>
                                                        <option>2016</option>
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                        <option>2010</option>
                                                        <option>2009</option>
                                                        <option>2008</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2005</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-label">Contract end date <span style="color:red; font-size: 12px"> *</span></label>
                                                    <select class="default-select form-control" name="contract_enddate">
                                                        <option>Day</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                        <option>15</option>
                                                        <option>16</option>
                                                        <option>17</option>
                                                        <option>18</option>
                                                        <option>19</option>
                                                        <option>20</option>
                                                        <option>21</option>
                                                        <option>22</option>
                                                        <option>23</option>
                                                        <option>24</option>
                                                        <option>25</option>
                                                        <option>26</option>
                                                        <option>27</option>
                                                        <option>28</option>
                                                        <option>29</option>
                                                        <option>30</option>
                                                        <option>31</option>
                                                    </select>
                                                    <span style="color:red; font-size: 12px">


                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="contract_endmonth">
                                                        <option>Month</option>
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select>

                                                </div>

                                                <div class="col-sm-4 mt-2 mt-sm-0">
                                                    <label class="form-label"></label>
                                                    <select class="default-select form-control" name="contract_endyear">
                                                        <option>Year</option>
                                                        <option>2022</option>
                                                        <option>2021</option>
                                                        <option>2020</option>
                                                        <option>2019</option>
                                                        <option>2018</option>
                                                        <option>2017</option>
                                                        <option>2016</option>
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                        <option>2010</option>
                                                        <option>2009</option>
                                                        <option>2008</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2007</option>
                                                        <option>2006</option>
                                                        <option>2005</option>
                                                    </select>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-4">
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-xl-9 col-lg-9 col-sm-6">
                                    <div class="row form-group mb-4">
                                        <div class="col-xl-3 col-lg-3 col-sm-3">
                                            <button type="refresh" class="btn btn-danger w-100">Add</button>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-sm-9 pl-lg-0">
                                            <small>Add a new rented space</small>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-0">
                                        <div class="col-xl-3 col-lg-3 col-sm-3">
                                            <button type="submit" class="btn btn-primary w-100">Save</button>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-sm-9 pl-lg-0">
                                            <small>Required fields</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-6">
                                    <div class="white-box">
                                        <h2>Price</h2>
                                        <h3>Cost Final</h3>
                                        <p>129 Ron</p>
                                    </div>
                                </div>
                            </div>
                        </form>
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