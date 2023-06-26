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
                        <a href="<?= base_url('user/verifyPersonalData/'.$personal_data_id) ?>" class="nav-link">Personal Data </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('user/chooseIncome') ?>" class="nav-link ">Income Type</a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-3" class="nav-link">Information Verification </a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-4" class="nav-link active">Document Release </a>
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


                                    <div class="text-center">
                                        <a class="check-icon" href="javascript:void(0)"><img src="<?= base_url() ?>assets/img/check-1.png"></a>
                                        <p class="mb-4 small">Your document was generated. Please pay the invoice so you can download the file.</p>
                                        <?php if (!empty($final_cost)) {
                                            if ($final_cost['status'] == 0) { ?>
                                                <a class="video-btn btn-sm shadow" href="javascript:void(0)" onclick="promptPayment()">
                                                    <img src="<?= base_url() ?>assets/img/download.png" alt="play btn">
                                                    <strong>Download</strong>
                                                </a>
                                            <?php } ?>
                                        <?php } else { ?>
                                                <a class="video-btn btn-sm mb-5 shadow" href="javascript:void(0)" onclick="downloadPDF();">
                                                    <img src="<?= base_url() ?>assets/img/download.png" alt="play btn">
                                                    <strong>Download</strong>
                                                </a>
                                        <?php } ?>

                                    </div>
									
                                    <?php if (!empty($final_cost)) {
											// print_r($final_cost);	
									?>
                                        <form action="<?= base_url('StripeController/checkoutSession') ?>" method="POST">
											<!-- <input type="hidden" value="<?= $final_cost['price'] ?>" id="costFinal"> -->
											<button class="btn btn-primary" type="button" id="checkout-button">Checkout</button>
										</form>
                                    <?php }?>

                                </div>
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
        <h3 class="text-center my-3"><a href="#">Personal Data</a></h3>
        <div class="project-main2">

            <span class="arrow-up-back"></span>
            <span class="arrow-up"></span>

            <div class="row text-center">
                <a class="check-icon" href="javascript:void(0)"><img src="img/check-1.png"></a>
                <p class="mb-4 small">Your document was generated. Please pay the invoice so you can download the file.</p>
                <a class="video-btn btn-sm" href="javascript:void(0)">
                    <img src="img/download.png" alt="play btn">
                    <strong>Download</strong>
                </a>


                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 text-center">
                    <a class="btn btn-primary" href="payment"> Payment</a>
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
<script src="https://js.stripe.com/v3/"></script>
<script>
	window.addEventListener('load', function() {
		var cost = "<?= $final_cost['price'] ?>";
		$("#checkout-button").click(function(){
			let data = {
                    "Content-Type": "application/json",
					"price": cost,
                }
			const stripe = Stripe('<?= $this->config->item('stripe_key') ?>');
			stripeCheckout(data, stripe)
		})
    });
</script>

<script>
	function stripeCheckout(data, stripe){
		let makePaymentURL = '<?= base_url('StripeController/checkoutSession') ?>'
		let payloadData = data
		$.post(makePaymentURL, payloadData).done((result) => {
			let sessionId = result.id;
			console.log(result)
			stripe.redirectToCheckout({
				sessionId: sessionId,
			}).then(function(result) {
				$(this).html('Make Featured').removeClass('disabled');
				manageAjaxErrors(result);
			});
		}).catch(error => {
			$(this).html('Make Featured').removeClass('disabled');
			manageAjaxErrors(error);
		});
	}
	function promptPayment() {
		Swal.fire({
			title: 'Warning',
			text: "Please make payment before download!",
			icon: 'warning',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ok'
		});
	}
	function downloadPDF() {
		let getDownloadLinkUrl = '<?php echo site_url('user/getDownloadLink'); ?>'
		$.get(getDownloadLinkUrl).done((resp) => {
			let result = JSON.parse(resp);
			if (result.success) {


				for (let link of result.links) {
					if (!link) {
						continue;
					}
					downloadUrl(link);
				}
			} else {
				toastr.error(result.message);
			}
		}).catch(error => {
			$(this).html('Make Featured').removeClass('disabled');
			manageAjaxErrors(error);
		});
	}

	function downloadUrl(url) {
		var iframe = document.createElement("iframe");
		iframe.src = url;
		iframe.style.display = "none";
		document.body.appendChild(iframe);
	}
</script>
