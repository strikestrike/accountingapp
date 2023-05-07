<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="admin, dashboard" />
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom-style.css" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--Start: nav-header -->
        <div class="main-header">
            <div class="header-left has-link-border">
                <a href="index.html" class="brand-logo">
                    <img src="<?= base_url(); ?>assets/img/logo.jpg" class="brand-title" alt="">
                </a>
                <ul class="d-md-flex d-none align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active">Smart Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Reports</a>
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
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="ms-2">Profile </span>
                        </a>
                        <a href="email-inbox.html" class="dropdown-item ai-icon">
                            <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class="ms-2">Inbox </span>
                        </a>
                        <a href="<?php echo base_url(); ?>user/logout" class="dropdown-item ai-icon">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
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


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body mx-auto">
            <div class="container-fluid content-max-width">

                <div class="project-nav">
                    <div class="card-action card-tabs  me-auto">
                        <ul class="nav nav-tabs style-2" id="ListViewTabLink">
                            <li class="nav-item">
                                <a href="#navpills-1" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-2" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Information Verification </a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="true">Document Release </a>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="list">
                        <div class="tab-content project-list-group" id="ListViewTabLink">
                            <div class="tab-pane fade active show" id="navpills-1">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card">
                                            <div class="project-main pb-0">
                                                <div class="project-header d-flex align-items-center mb-0">
                                                    <img src="<?= base_url(); ?>assets/img/Declaratia-unica.png" alt="" class="mr-3">
                                                    <a href="<?= base_url(); ?>Admin/create_user">Declaratia unica</a>
                                                </div>
                                                <h2>Plateste si apoi descarca <br>Declaratia Unica</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navpills-2">
                                <div class="card">


                                </div>

                            </div>
                            <div class="tab-pane fade" id="navpills-3">
                                <div class="card">


                                </div>


                            </div>
                            <div class="tab-pane fade" id="navpills-4">
                                <div class="card">


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="container-fluid section-account ">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#collapseOne"> Personal Data</a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="project-main pb-0">
                                    <div class="project-header d-flex align-items-center mb-0">
                                        <img src="<?= base_url(); ?>assets/img/Declaratia-unica.png" alt="" class="mr-3">
                                        <h4>Declaratia unica</h4>
                                    </div>
                                    <h2>Plateste si apoi descarca <br>Declaratia Unica</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                Income Type
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                                Information Verification
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                                Document Release
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-bs-parent="#accordion">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
            Content body end
        ***********************************-->

        <div class="footer d-md-none d-block">
            <div class="next-button ">
                <a class="btn btn-primary">Continue <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
    <script>
        jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var hrefTarget = jQuery(this).attr('href');
            if (hrefTarget == '#boxed') {
                jQuery('#BoxedViewTabLink').removeClass('d-none');
                jQuery('#ListViewTabLink').addClass('d-none');

            } else if (hrefTarget == '#list') {
                jQuery('#ListViewTabLink').removeClass('d-none');
                jQuery('#BoxedViewTabLink').addClass('d-none');
            }

        });
    </script>

</body>

</html>