<?php include 'layout/sidebar.php'; ?>

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
                                <a class="btn btn-primary text-nowrap" href="<?= base_url('Admin/personal_data'); ?>"
                                    data-bs-toggle="modal" data-bs-target="Admin/personal_data"> Add new user</a>

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


                                        <?php $i = 1;
                                            foreach($personal_data_list as $list)
                                                                {
                                                                   
                                                            ?>                    
                                        <tr>

                                            <td><?= $list['name_surname']; ?></td>
                                            <td> <?= $list['per_number'];  ?> </td>
                                            <td class="color-primary">
                                                <div class="d-flex">
                                                <a href="<?php echo base_url(); ?>admin/personaldata_view/<?php echo $list['id']; ?>"  class="btn btn-primary shadow btn-xs1 sharp1 me-1">View</a>
                                               <a href=" <?php echo base_url("admin/personal_edit/".base64_encode($list['id'])) ?>"class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit</a>
                                               <a href="<?php echo base_url(); ?>admin/create_user_delete/<?php echo $list['id']; ?>" onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger shadow btn-xs1 sharp1">Delete</a>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


    <script>
    
    function deleteion(){
    var result = confirm("Are you sure to delete?");
    if(result){
        // Delete logic goes here
    }
}
  </script>
                <div class="headerwp">
                    <h2>Included Advantages</h2>
                </div>

                <div class="adv-wrap">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tabb1">
                                <div class="card-wrp">
                                    <div class="card-wrp-in p20">
                                        <img src="<?= base_url(); ?>assets/img/img1.png">
                                        <h3>Membru Ceccar</h3>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabb12">
                                <div class="card-wrp">
                                    <div class="card-wrp-in p20">
                                        <img src="<?= base_url(); ?>assets/img/img2.png">
                                        <h3>Experienta contabila de peste 15 ani</h3>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabb13">
                                <div class="card-wrp">
                                    <div class="card-wrp-in p20">
                                        <img src="<?= base_url(); ?>assets/img/img3.png">
                                        <h3>Emitere in sub 5 minute</h3>
                                    </div>
                                </div>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tabb14">
                                <div class="card-wrp">
                                    <div class="card-wrp-in p20">
                                        <img src="<?= base_url(); ?>assets/img/img4.png">
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
                                        <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabb12" role="tabpanel">
                            <div class="card">
                                <div class="project-main">
                                    <div class="project-header-in p20">
                                        <p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabb13" role="tabpanel">
                            <div class="card">
                                <div class="project-main">
                                    <div class="project-header-in p20">
                                        <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabb14" role="tabpanel">
                            <div class="card">
                                <div class="project-main">
                                    <div class="project-header-in p20">
                                        <p>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of
                                            type and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navpills-2" style="display : none">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        income tab
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navpills-3" style="display : none">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        information tab
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navpills-4" style="display : none">
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
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-danger">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
            <div class="tab-pane fade " id="boxed_navpills-2" style="display: none;">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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
                                <img src="<?= base_url(); ?>assets/images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-danger">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                stroke="#575757" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
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