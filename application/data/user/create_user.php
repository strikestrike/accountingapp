<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
</head>

<body>
    <!--Preloader Start-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--Preloader end-->

    <!-- Start: Main wrapper --> 
    <div id="main-wrapper">
       

        

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
                                <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
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
                            <div class="tab-pane fade active show" id="navpills-1">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="project-main2">
                                            <span class="arrow-up-back"></span>
                                            <span class="arrow-up"></span>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0 small">Add at least 1 user to start the process</p>
                                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">+ Add new user</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Personal no</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                            <tbody>
                                                         
                                               <?php 
                                                     foreach($userlist as $list)
                                                      { ?>

                                                   <tr>
                                                     <td><?= $list['client_name'];?> </td>
                                                     <td><?= $list['project_name'];?></td> 
                                                    <td>
                                                         <a href="<?php echo base_url("Welcome/edit/".base64_encode($list['id'])); ?>" class="btn btn-primary">View</a>
                                                         <a href="<?php echo base_url("Welcome/edit/".base64_encode($list['id'])); ?>" class="btn btn-primary">Edit</a>
                                                         <a  href="<?php echo base_url(); ?>Welcome/delete/<?php echo $list['id']; ?>" class="btn btn-danger">Delete</a>
                                                   </td>

                                             </tr>  
                                           </tbody> 
                                                    <?php  } ?>
                                                             </table> 
                                                            
                                                         </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="headerwp">
                                    <h2>Included Advantages</h2>
                                </div>

                                <div class="adv-wrap">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tabb1">
                                                <div class="card-wrp">
                                                    <div class="card-wrp-in p20">
                                                        <img src="<?=base_url()?>assets/img/img1.png">
                                                        <h3>Membru Ceccar</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tabb12">
                                                <div class="card-wrp">
                                                    <div class="card-wrp-in p20">
                                                        <img src="<?=base_url()?>assets/img/img2.png">
                                                        <h3>Experienta contabila de peste 15 ani</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tabb13">
                                                <div class="card-wrp">
                                                    <div class="card-wrp-in p20">
                                                        <img src="<?=base_url()?>assets/img/img3.png">
                                                        <h3>Emitere in sub 5 minute</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tabb14">
                                                <div class="card-wrp">
                                                    <div class="card-wrp-in p20">
                                                        <img src="<?=base_url()?>assets/img/img4.png">
                                                        <h3>Nemultumit? <br>Banii inapo instant</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="tabb1" role="tabpanel">
                                            <div class="card">
                                                <div class="project-main">
                                                    <div class="project-header-in p20">
                                                        <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                                            type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabb12" role="tabpanel">
                                            <div class="card">
                                                <div class="project-main">
                                                    <div class="project-header-in p20">
                                                        <p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                                            type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabb13" role="tabpanel">
                                            <div class="card">
                                                <div class="project-main">
                                                    <div class="project-header-in p20">
                                                        <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                                            type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabb14" role="tabpanel">
                                            <div class="card">
                                                <div class="project-main">
                                                    <div class="project-header-in p20">
                                                        <p>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                                            type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="/<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                                                <img src="<?=base_url()?>assets/images/big/img1.jpg" alt="" class="w-100 ">
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
                    <form action="<?php echo base_url().'Welcome/createuser'?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label class="text-black font-w500">Project Name</label>
                            <input type="text" name="project_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Dadeline</label>
                            <div class="cal-icon"><input type="date" name="dadeline" class="form-control"><i class="far fa-calendar-alt"></i></div>
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Client Name</label>
                            <input type="text" name="client_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">CREATE</button>
                        </div> 
                    </form>

                </div>
            </div>
        </div>
    </div>
 
    <!-- Modal End: Add Project -->



   
</body>

</html>