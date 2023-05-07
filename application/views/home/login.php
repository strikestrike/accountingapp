<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-sm-12 mb-3">
                    <div class="text-center login_logo mb-1">
                        <img src="<?= base_url(); ?>assets/img/logo.jpg" alt="logo">
                    </div>
                </div>

                <div class="col-lg-11 col-xl-10">
                    <div class="authincation-content">
                        <div class="authincation-content-in">
                            <div class="row no-gutters">
                                <div class="col-xl-6">
                                    <div class="auth-form auth-form-p">
                                        <div class="text-center">
                                            <h1>Welcome</h1>
                                            <a href="<?= base_url() ?>googlelogin/login" class="btn google-btn"><img src="<?= base_url(); ?>assets/images/google.png"> Continue with Google</a>
                                        </div>

                                        <form action="<?= base_url('login') ?>" method="POST">
                                            <?= $this->session->flashdata('logError') ?>
                                            <?= $this->session->flashdata('msg') ?>
                                            <div class="form-group mb-5">
                                                <label class="mb-1">Email <span style="color:red; font-size: 12px"> *</span></label>

                                                <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('email'); ?></span>
                                                <label class="mb-1">Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <div class="position-relative password-toggle">
                                                    <input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" value="<?php echo set_value('password'); ?>" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter Password" id="id_password">
                                                    <i class="far fa-eye togglePassword" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                                </div>
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('password'); ?></span>
                                                <small><a href="<?= base_url() ?>user/forgot_pass">Forgot password</a></small>
                                            </div>
                                            <div class="text-center mb-4">
                                                <button type="submit" class="btn btn-primary btn-block Continue-btn">Login</button>
                                                <br>
                                                <a href="<?php echo base_url() . 'user/page_login' ?>" class=" btn btn-primary btn-block Continue-btn">Register here</a>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-0">Don't have an account? Do not worry!</p>
                                                <p>You can create one in the following steps</p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="img-login">
                                        <img src="<?= base_url(); ?>assets/img/login.jpg" alt="login" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // hide and show password
        $(".togglePassword").on("click", function() {
            const inputActive = $(this).siblings('input').prop("type");
            if (inputActive == "password") {
                $(this).siblings('input').prop('type', 'text');
                $(this).toggleClass("fa-eye-slash");
                $(this).toggleClass("fa-eye");
            } else {
                $(this).siblings('input').prop('type', 'password');
                $(this).toggleClass("fa-eye-slash");
                $(this).toggleClass("fa-eye");
            }
        });
    </script>
