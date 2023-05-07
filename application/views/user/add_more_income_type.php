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
                                <a href="<?= base_url('user/verifyPersonalData/'.$_SESSION['personal_data_id']) ?>" class="nav-link">Personal Data </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">Information Verification </a>
                            </li>
                            <li class="nav-item">
                                <a href="generatePdf" class="nav-link">Document Release </a>
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
                            <div class="tab-pane fade active show" id="navpills-2">
                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <?php  if(!empty($this->session->flashdata('step-error'))){  ?>
                                            <p class="alert alert-warning"><?= $this->session->flashdata('step-error') ?></p>
                                        <?php } ?>
                                        <p class="small mb-0">Want to add more income type? Choose from the given options.</p>
                                        <p class="small mb-0">Or<a href="generatePdf"> click here</a> to continue to payment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="container-fluid d-md-none d-block">
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
                <h3 class="text-center my-3"><a href="#">Income Type</a></h3>
                <div class="project-main2">

                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>

                    <div class="row text-center">
                        <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                            <p class="mb-0 small">Choose at lease one type of income to proceed.</p>
                        </div>

                        <hr>
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
        $(".sidebarDisabled").removeClass("sidebarDisabled");
    });
    </script>
