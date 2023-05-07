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
                                            <h4 class="mb-4"></h4>
                                            <h4 class="mb-4 mt-4">Admin Reset Password</h4>
                                        </div>
                                        <form action="<?= base_url('admin/forgetPassword')?>" method="post">
											<?php if ($this->session->flashdata('msg')) { ?>
												<div class="alert alert-danger">
														<?php echo $this->session->flashdata('msg'); ?>
												</div>
											<?php } ?>
                                            <?php if ($this->session->flashdata('msg-success')) { ?>
												<div class="alert alert-success">
														<?php echo $this->session->flashdata('msg-success'); ?>
												</div>
											<?php } ?>
                                            <div class="form-group mb-5 <?php if(form_error('email')) echo 'has-error';?>" >
                                                <label class="mb-1">Enter Email ID<span style="color:red; font-size: 12px"> *</span></label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                                <?php if(form_error('email')) echo form_error('email'); ?> 
                                            </div>
                                            <div class="text-center mb-4">
                                                <input type="submit" name="forgot" value="Sent Reset Password Link" class="btn btn-primary btn-block Continue-btn">
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
