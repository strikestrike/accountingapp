<?php $i = 1; ?>
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
    <div class="container-fluid">
        <div class="project-nav">
            <div class="card-action card-tabs card-tabs2 w-100">
                <ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
                    <li class="nav-item">
                        <a href="<?= base_url('user/verifyPersonalData/'.$personalData['id']) ?>" class="nav-link">Personal Data </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link active">Income Type</a>
                    </li>
                    <li class="nav-item">
						<?php if($personalData['steps_completed'] >= 2){ ?>
							<a href="dividentVerification" class="nav-link">Information Verification</a>
						<?php } else { ?>
							<a href="javascript:void(0);" class="nav-link">Information Verification </a>
						<?php } ?>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('user/generatePdf') ?>" class="nav-link">Document Release </a>
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
                    <div class="tab-pane fade active show" id="navpills-2">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <form action="<?= base_url() ?>user/saveDividentsIncome" enctype="multipart/form-data" method="POST">
                                        <div class="row justify-content-between align-items-center">
                                            <?php if (!empty($dividentIncome)) { ?>
                                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                                    <p class="mb-0 small">You have imported your data, now please proceed to verification.</p>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                                    <p class="mb-0 small">Account Statement Import</p>
                                                    <p class="mb-0 small ">Or</p>
                                                    <p class="mb-0 small">If you don't have a valid .xls file, <a href="<?= base_url() . 'user/dividentVerification' ?>">click here</a></p>
                                                </div>
                                            <?php } ?>
                                            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
												<div class="upload-excel-wrapper d-flex flex-column align-items-center">
													<p class="mb-0 small">Load a xlsx file</p>
													<a class="load-doc-icon" href="javascript:void(0)">
														<i class="fas fa-camera"></i>
														<input class="upload_excel" type="file" name="upload_excel">
													</a>
												</div>
												<div class="upload-excel-icon d-none">
													<img src="<?= base_url() ?>assets/img/excel-icon.png" alt="">
													<p></p>
													<button type="button" class="upload-cancel-btn">X</button>
												</div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex justify-content-end">
                                                <?php if (!empty($dividentIncome)) { ?>
                                                    <?php if($personalData['steps_completed'] < 2){ ?>
                                                        <a href="javascript:void(0);" class="btn btn-success proceedToDividentVerification"><i class="fas fa-forward"></i> Final Submit</a>
                                                    <?php }elseif($personalData['steps_completed'] >= 2){ ?>
                                                        <a href="dividentVerification" class="btn btn-primary nextStep"><i class="fas fa-forward"></i> Next</a>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <button class="btn btn-primary"> <img src="<?= base_url() ?> assets/img/u.png" alt="">&nbsp; Process data</a>
                                                    <?php } ?>
                                            </div>
                                            <hr>
                                        </div>
                                    </form>
                                    <div class="basic-form">
                                        <form id="finalCostForm">

                                            <div class="row form-group">
                                                <div class="col-xl-9 col-lg-9 col-sm-6">
                                                    <?php if (!empty($dividentIncome)) { ?>
                                                        <div class="table-responsive">
                                                            <div class="table-title">
                                                                <h5>Your processed data</h5>
                                                            </div>
                                                            <table class="table">
                                                                <thead>
                                                                    <th scope="col">S.No.</th>
                                                                    <th scope="col">Country</th>
                                                                    <th scope="col">Divident</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    // echo "<pre>";print_r($dividentIncome);echo "</pre>";
                                                                    foreach ($dividentIncome as $key => $value) {
                                                                        echo "
                                                                                <tr>
                                                                                    <td>" . $i++ . "</td>
                                                                                    <td>" . $value['country'] . "</td>
                                                                                    <td>" . $value['SUM(divident)'] . "</td>
                                                                                </tr>
                                                                            ";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-sm-6">
                                                    <div class="white-box price-box">
                                                        <h2>Price</h2>
                                                        <h3>Cost Final</h3>
                                                        <p>0 Ron</p>
                                                        <input type="hidden" id="finalCostInput" name="cost_final" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
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
                    <div class="tab-pane fade" id="navpills-4">
                        <div class="project-main2">
                            <span class="arrow-up-back"></span>
                            <span class="arrow-up"></span>
                            <div class="d-flex justify-content-between align-items-center">
                                doc release tab
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid d-none">
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
                    <p class="mb-0 small">Account Statement Report</p>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
                    <p class="mb-0 small">Load document</p>
                    <a class="load-doc-icon" href="javascript:void(0)"><i class="fas fa-camera"></i></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 text-center">
                    <a class="btn btn-primary" href="javascript:void(0)"> Process data</a>
                </div>
                <hr>
            </div>



            <div class="basic-form">
                <form>



                    <div class="mt-5 row">
                        <div class="col-8">
                            <div class="white-box">
                                <h2>Price</h2>
                                <h3>Cost Final</h3>
                                <p>129 Ron</p>
                            </div>
                        </div>
                    </div>


                </form>
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
    window.addEventListener('load', () => {

		$('.upload_excel').change(function(evt){
			$(".upload-excel-wrapper").addClass('d-none');
			$(".upload-excel-icon").removeClass('d-none');
			$(".upload-excel-icon p").text(evt.target.files[0].name);
		});

		$('.upload-cancel-btn').click(function(){
			$(".upload-excel-wrapper").removeClass('d-none');
			$(".upload-excel-icon").addClass('d-none');
			$('.upload_excel').val('');
		})

        var modules = <?= json_encode($dividentModulesPrice) ?>;
        // console.log(modules);
        setPrice(modules);

        // $(".proceedToDividentVerification").click(()=>{
        //     saveFinalCost();
        // });

        $(".proceedToDividentVerification").click(() => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Proceed!'
            }).then((result) => {
                if (result.value) {
                    console.log(result);
                    var id = <?= !empty($_SESSION['personal_data_id']) ? $_SESSION['personal_data_id'] : '""' ?>;
                    var data = {
                        "id": id,
                        "type": 'divident'
                    }
                    var url = 'step2Completed'
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                    'Submitted!',
                                    'Your data has been submitted successfully.',
                                    'success'
                                )
                                .then(function() {
                                    saveFinalCost();
                                });
                            // setTimeout(() => {
                            // 	window.location.reload();
                            // }, 2000)
                        },
                        error: () => {
                            toastr.error("Error in submitting your data.");
                        }
                    })
                } else {
                    // toastr.error("error");
                }
            })
        })
    })
</script>

<script>
    function setPrice(data='') {
        var countForm = <?= --$i ?>;
        console.log(countForm);
        for (const key in data) {
            // console.log(data[key]);
            if (data[key].number_of_modules == countForm) {
                $(".price-box p").html(data[key].price + " RON");
                $("#finalCostInput").val(data[key].price);
            }
        }
    }


    function saveFinalCost() {
        var data = {
            'final_cost' : $('#finalCostInput').val(),
            'personal_data_id' : <?= $_SESSION['personal_data_id'] ?>
        }
        $.ajax({
            url: "<?= base_url('user/saveDividentFinalCost') ?>",
            method: "post",
            data: data,
            success : function(response){
                window.location.href = "<?= base_url('user/dividentVerification') ?>";
            },
            error: function(){
                alert('cannot save final cost');
            }
        })
    }
    
</script>
