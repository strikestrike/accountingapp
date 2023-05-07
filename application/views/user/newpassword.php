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
                                        <h4 class="mb-4">Email introduced earlier</h4>


                                            <?php if($this->session->flashdata('error')){?>
                                            <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>  
                                            <?php } ?>
                                        <form action="<?= base_url('user/newpassword') ?>" method="POST" autocomplete="off">

                                    
                                           

                                           
                                            <div class="form-group">
                                                <label class="mb-1">Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('password'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Confirm Password <span style="color:red; font-size: 12px"> *</span></label>
                                                <input type="password" class="form-control" name="com_password" value="<?php echo set_value('com_password'); ?>">
                                                <span style="color:red; font-size: 12px"> <?php echo form_error('com_password'); ?></span>
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <!-- <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">I have read and agree to the Terms and Conditions Privacy Policy, I confirm that I am over 16 years old</label>
                                                    </div>
                                                </div> -->
                                            </div>

                                         <!--    <div class="form-row d-flex justify-content-between m1b-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">I want you to receive the best deals.</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block Continue-btn">Continue</button>
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