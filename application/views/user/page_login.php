<style>
    .password-toggle {
        display: flex;
        align-items: center;
    }

    .password-toggle input {
        padding-right: 30px;
    }

    .password-toggle i {
        position: absolute;
        right: 10px;
    }
</style>

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
                                    <div class="img-login">
                                        <img src="<?= base_url(); ?>assets/img/login.jpg" alt="login" class="img-responsive" />
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="auth-form auth-form-p">
                                        <h1>Welcome</h1>



                                        <?php if ($this->session->flashdata('error')) { ?>
                                            <p style="color:red"><?php echo $this->session->flashdata('error'); ?></p>
                                        <?php } ?>
                                        <form action="<?= base_url('user/page_login') ?>" method="POST" autocomplete="off">


                                            <div class="form-group">
                                                <label class="mb-1">Email <span style="color:red; font-size: 12px">
                                                        *</span></label>
                                                <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                                            </div>
                                            <span style="color:red; font-size: 12px">
                                                <?php echo form_error('email'); ?></span>
                                            <div class="form-group">
                                                <label class="mb-1">Password <span style="color:red; font-size: 12px">
                                                        *</span></label>
                                                <div class="position-relative password-toggle">
                                                    <input type="password" onKeyPress="if(this.value.length >8) return false;" class="form-control" name="password" value="<?php echo set_value('password'); ?>" id="id_password" required>
                                                    <i class="far fa-eye togglePassword" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                                </div>
                                                <span style="color:red; font-size: 12px">
                                                    <?php echo form_error('password'); ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label class="mb-1">Confirm Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <div class="position-relative password-toggle">
                                                    <input type="password" onKeyPress="if(this.value.length >8) return false;"  class="form-control" name="com_password" value="<?php echo set_value('com_password'); ?>" id="id_password" required>
                                                    <i class="far fa-eye togglePassword" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
                                                </div>

                                                <span style="color:red; font-size: 12px">
                                                    <?php echo form_error('com_password'); ?></span>
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox"  class="form-check-input" id="basic_checkbox_1" required>
                                                        <label class="form-check-label" for="basic_checkbox_1">I have
                                                            read and agree to the Terms and Conditions Privacy Policy, I
                                                            confirm that I am over 16 years old</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row d-flex justify-content-between m1b-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1" required>
                                                        <label class="form-check-label" for="basic_checkbox_1">I want
                                                            to receive the best deals.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block Continue-btn">Continue</button>
                                                <br>
                                                <a href="<?php echo base_url() . 'user/login' ?>" class=" btn btn-primary btn-block Continue-btn">Already Account</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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