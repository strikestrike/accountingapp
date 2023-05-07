  <style>
    a.disabled {
  pointer-events: none;
  cursor: default;
}
  </style>
  <!-- Start: Main wrapper -->
    <div id="main-wrapper">
        <!--Start: nav-header -->
        <div class="main-header">
            <div class="header-left">
                <a class="btn btn-primary back-palce d-flex align-items-center" href="#">
                    <i class='fas fa-long-arrow-alt-left mr-1'></i> Back
                </a>
                <a href="index.html" class="brand-logo d-md-none d-block">
                    <img src="<?= base_url(); ?>assets/img/logo.jpg" class="brand-title" alt="">
                </a>
                <ul class="d-md-flex d-none align-items-center">
                    <li class="nav-item">
                        <a class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Unique statement</a>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <div class="dropdown user-profile d-md-block d-none">
                    <a class="dropdown-toggle d-flex align-items-center" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <div class="user_img">
                            <img src="<?= base_url(); ?>assets/images/profile/pic1.jpg" alt="user image" />
                        </div>
                        <div class="user-info d-flex flex-column">
                            <span class="">Johndoe</span>
                            <small>Super Admin</small>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="app-profile.html" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="ms-2">Profile </span>
                        </a>
                        <a href="email-inbox.html" class="dropdown-item ai-icon">
                            <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span class="ms-2">Inbox </span>
                        </a>
                        <a href="page-login.html" class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="ms-2">Logout </span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-block">
                    <a href="#" class="text-black">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
        <!--End: nav-header -->

              <!-----Start: Sidebar------>
        <div class="deznav">
            <div class="deznav-scroll-in"></div>

          <!--   <div class="dez-scroll">
                <a class="btn" data-bs-toggle="collapse" href="#"> 
                    ONG List
                    <span>From 190 RON</span>
                </a>

                <div id="collapsedez" class="collapse">
                    <ul>

                          <li>
                            <a href="#" class="ai-icon" aria-expanded="false">
                                <div class="form-check">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                System Configuration
                                <span>From 190 Ron</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="ai-icon" aria-expanded="false">
                                <div class="form-check">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                System Configuration
                                <span>From 190 Ron</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="ai-icon" aria-expanded="false">
                                <div class="form-check">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                Pricing
                                <span>From 190 Ron</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="ai-icon" aria-expanded="false">
                                <div class="form-check">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                Client List
                                <span>From 190 Ron</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> -->


            <div class="deznav-scroll d-md-block d-none">
                <div class="deznav-scroll-wrp has-footer">
                    <div class="copyright m-0 py-2 px-5 d-flex align-items-center">
                        <img src="<?= base_url(); ?>assets/img/note.png" alt="income type">
                        <h5 class="mb-0 text-black">Income Type</h5>
                    </div>
                    <div class="menu-blu">
                        <h4>Select one or more income sources</h4>
                        <a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
                            <img src="<?= base_url(); ?>assets/img/paly.png" alt="play btn">
                            <span>Video Example</span>
                        </a>
                    </div>

                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="<?php echo base_url().'home/system_configration'?>" class="ai-icon" aria-expanded="false">
                                <div class="form-check checkbox55">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                <span class="nav-text">System Configuration</span>
                                <div class="nov-sub-text">From 190 Ron</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'home/admin_pricing'?>" class="ai-icon" aria-expanded="false">
                                <div class="form-check checkbox55">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                <span class="nav-text">Pricing</span>
                                <div class="nov-sub-text">From 190 Ron</div>
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url().'home/admin_ong'?>" class="ai-icon" aria-expanded="false">
                                <div class="form-check checkbox55">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                <span class="nav-text">ONG List</span>
                                <div class="nov-sub-text">From 190 Ron</div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'home/admin_client'?>" class="ai-icon" aria-expanded="false">
                                <div class="form-check checkbox55">
                                    <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="">
                                </label>
                                </div>
                                <span class="nav-text">Client List</span>
                                <div class="nov-sub-text">From 190 Ron</div>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-----End: Sidebar------>


 <!--Start: Page main heading -->
        <div class="container-fluid page-sub-head d-md-block d-none">
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
            <div class="container-fluid d-md-block d-none">
                <div class="project-nav">
                    <div class="card-action card-tabs card-tabs2 w-100">
                        <ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
                         
                        <li class="nav-item">
                                <a href="#navpills-1" class="nav-link disabled" data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-3" class="nav-link disabled" data-bs-toggle="tab" aria-expanded="false">Information Verification </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-4" class="nav-link disabled" data-bs-toggle="tab" aria-expanded="false">Document Release </a>
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