<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta name="keywords" content="admin, dashboard" /> -->
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/toastr/css/toastr.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/custom-style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/main.js"></script>
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
        <!--Start: nav-header -->
        <div class="main-header">
            <div class="header-left">
                <a class="btn btn-primary back-palce d-flex align-items-center" href="javascript:window.history.go(-1);">
                    <i class='fas fa-long-arrow-alt-left mr-1'></i> Back
                </a>
                <a href="index.html" class="brand-logo d-md-none d-block">
                    <img src="img/logo.jpg" class="brand-title" alt="">
                </a>
                <ul class="d-md-flex d-none align-items-center">
					<li class="nav-item">
                        <a class="nav-link" href="<?= base_url()?>user/dashboard">Dashboard</a>
                    </li>
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
							<?php if(!empty($this->session->userdata('profile_image'))){?>
								<img src="<?= base_url(); ?>upload/profile_image/<?= $this->session->userdata('profile_image')?>" alt="">
							<?php }else {?>
							<img src="<?= base_url()?>assets/images/profile-pic.png" alt="">
							<?php }?>
                        </div>
                        <div class="user-info d-flex flex-column">
                            <span class=""><?= $this->session->userdata('user_name') ?></span>
                            <small><?= $this->session->userdata('email') ?></small>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="<?php echo base_url() . 'user/profile' ?>" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="ms-2">Profile </span>
                        </a>
                        <a href="email-inbox.html" class="dropdown-item ai-icon">
                            <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span class="ms-2">Inbox </span>
                        </a>
                        <a href="<?= base_url()?>user/logout" class="dropdown-item ai-icon">
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
		<?php include 'sidebar.php'; ?>
