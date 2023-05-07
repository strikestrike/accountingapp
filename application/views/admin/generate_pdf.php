<?php include 'layout/sidebar.php'; ?>
<!--Start: Page main heading -->

<div class="tab-content">
    <div class="tab-pane fade active show" id="list">
        <div class="tab-content project-list-group" id="ListViewTabLink">
            <div class="tab-pane fade" id="navpills-1">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        Personal Tab
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navpills-2">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        Income tab
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
            <div class="tab-pane fade active show" id="navpills-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-main2">
                            <span class="arrow-up-back"></span>
                            <span class="arrow-up"></span>

                            <?php if ($this->session->flashdata('success')) : ?>
                                <p class="text-success"><?php echo $this->session->flashdata('success');
                                                        ?></p>
                            <?php endif;  ?>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <p class="text-success"><?php echo $this->session->flashdata('error');
                                                        ?></p>
                            <?php endif;  ?>


                            <div class="text-center">
                                <a class="check-icon" href="javascript:void(0)"><img src="<?= base_url(); ?>assets/img/check-1.png"></a>
                                <p class="mb-4 small">Your document was generated. Please pay the invoice so you can
                                    download the file.</p>
                                <a class="video-btn btn-sm" download="" href="<?= base_url(); ?>Admin/personal_data_pdf">
                                    <img src="<?= base_url(); ?>assets/img/download.png" alt="play btn">
                                    <strong>Download</strong>
                                </a>

                            </div>
                            </form>


                            <a class="btn btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#payment"> Payment</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>





<div class="modal fade" id="payment">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Details </h5>

            </div>
            <div class="modal-body">

                <form action="<?= base_url('StripeController/submit') ?>" method="POST">
                    <input type="hidden" name="amount" value="100">
                    <input type="hidden" name="currency" value="INR">

                    <div class="form-group">
                        <label class="text-black font-w500">Card Holder Name<span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" class="form-control" id="cardhname" name="cardhname" placeholder="Card Holder Name" required>
                    </div>

                    <div class="form-group">
                        <label class="text-black font-w500">Card Number<span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" id="nr_modules" maxlength="16" id="card_no" name="card_no" class="form-control card-number" placeholder="Enter Card Number" required>

                    </div>




                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="text-black font-w500">Expiration Month<span style="color:red; font-size: 12px">*</span></label>
                                    <input type="text" id="exp_month" name="exp_month" class='form-control card-expiry-month' placeholder='MM' maxlength="2" required>
                                </div>

                                <div class="col-sm-6">
                                    <label class="text-black font-w500">Expiration Year<span style="color:red; font-size: 12px">*</span></label>
                                    <input type="text" id="exp_year" name="exp_year" class="form-control card-expiry-year" placeholder='YYYY' maxlength="4" required>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">CVC<span style="color:red; font-size: 12px">
                                *</span></label>

                        <input type="text" id="cvc" name="cvc" class="form-control card-cvc" placeholder="CVC" maxlength="3" required>
                    </div>



                    <div class="form-group">
                        <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CANCEL</button>&nbsp; &nbsp;
                        <button type="submit" name="addrentaltype" value="Submit" class="btn btn-primary">PAY
                            NOW</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.downloadable').click(function() {

            window.location.href = " <?php echo site_url('CONTROLLER_NAME/file_download') ?>?file_name=" + $(
                this).attr('href');
        });
    });
</script>