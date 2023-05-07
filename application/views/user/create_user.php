 <!--Start: Page main heading -->
 <div class="container-fluid page-sub-head d-md-block d-none">
 	<div class="d-flex flex-nowrap justify-content-between align-items-center">
 		<div class="100%">
 			<h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
 			<p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
 		</div>
 		<div class="ms-3 d-md-block d-none">
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
 				<ul class="nav nav-tabs style-2 w-100 d-md-flex d-none" id="ListViewTabLink">
 					<li class="nav-item">
 						<a href="javascript:void(0);" class="nav-link active">Personal Data </a>
 					</li>
 					<li class="nav-item">
 						<a href="javascript:void(0);" class="nav-link">Income Type</a>
 					</li>
 					<li class="nav-item">
 						<a href="javascript:void(0);" class="nav-link">Information Verification </a>
 					</li>
 					<li class="nav-item">
 						<a href="javascript:void(0);" class="nav-link">Document Release </a>
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
 					<div class="tab-pane fade active show" id="navpills-1">
 						<div class="row">
 							<div class="col-xl-12">
 								<div class="project-main2">
 									<span class="arrow-up-back"></span>
 									<span class="arrow-up"></span>
 									<div class="d-flex justify-content-between align-items-center">
 										<p class="mb-0 small">
 											<?php if (empty($personal_data_list)) { ?>
 												Add at least 1 user to start the process
 											<?php } ?>
 										</p>
 										<a class="btn btn-primary text-nowrap" href="<?= base_url() ?>user/personalData">+ Add user</a>
 									</div>
 									<?php
										// echo "<pre>";
										// print_r($personal_data_list);
										?>
 									<div class="table-responsive">
 										<table class="table table-responsive-sm">
 											<thead>
 												<tr>
 													<th>Name</th>
 													<th>Personal no</th>
 													<!-- <th>Progress</th> -->
 													<th class="text-center">File</th>
 												</tr>
 											</thead>
 											<tbody>
 												<?php
													if (!empty($personal_data_list)) {
														foreach ($personal_data_list as $key => $value) {
															echo "
																<tr>
																	<td>" . $value['name'] . "</td>
																	<td>" . $value['personal_number'] . "</td>
																";
															if ($value['steps_completed'] == 1) {
																echo "<td class='text-danger'>Income Type Pending</td>";
															} elseif ($value['steps_completed'] == 2) {
																echo "<td class='text-danger'>Information Verification Pending</td>";
															} elseif ($value['steps_completed'] == 3) {
																echo "<td class='text-danger'>Document Release Pending</td>";
															} elseif ($value['steps_completed'] == 4) {
																echo "<td class='text-success'>Document Released</td>";
															}
															echo "
																	<td class='color-primary'>
																		<div class='d-flex justify-content-center'>
																			<a href='javascript:void(0);' class='viewDecBtn btn btn-primary shadow btn-xs1 sharp1 me-1' data-userId=" . $value['id'] . "><i class='fas fa-eye'></i></a>
																			
																			<a href='".base_url('user/verifyPersonalData/'.$value['id'])."' class='editUserBtn btn btn-warning shadow btn-xs1 sharp1 me-1' data-userId=" . $value['id'] . "><i class='fas fa-edit'></i></a>

																			<a href='javascript:void(0);' class='deleteUserBtn btn btn-danger shadow btn-xs1 sharp1 me-1' data-userId=" . $value['id'] . "><i class='fas fa-trash'></i></a>
																		</div>
																	</td>
																</tr>
															";
															// <form action='user/editPersonalData' method='POST'>
															// 	<input type='hidden' name='id' value='".$value['id']."'>
															// 	<button type='submit'><i class='fas fa-edit'></i></button>
															// </form>
														}
													}
													?>
 											</tbody>
 										</table>
 									</div>
 								</div>
 							</div>
 						</div>

 						<div class="headerwp">
 							<h2>Included Advantages</h2>
 						</div>

 						<div class="adv-wrap">
 							<ul class="nav nav-tabs">
 								<li class="nav-item">
 									<a class="nav-link active" data-bs-toggle="tab" href="#tabb1">
 										<div class="card-wrp">
 											<div class="card-wrp-in p20">
 												<img src="<?= base_url() ?>assets/img/img1.png">
 												<h3>Membru Ceccar</h3>
 											</div>
 										</div>
 									</a>
 								</li>
 								<li class="nav-item">
 									<a class="nav-link" data-bs-toggle="tab" href="#tabb12">
 										<div class="card-wrp">
 											<div class="card-wrp-in p20">
 												<img src="<?= base_url() ?>assets/img/img2.png">
 												<h3>Experienta contabila de peste 15 ani</h3>
 											</div>
 										</div>
 									</a>
 								</li>
 								<li class="nav-item">
 									<a class="nav-link" data-bs-toggle="tab" href="#tabb13">
 										<div class="card-wrp">
 											<div class="card-wrp-in p20">
 												<img src="<?= base_url() ?>assets/img/img3.png">
 												<h3>Emitere in sub 5 minute</h3>
 											</div>
 										</div>
 									</a>
 								</li>
 								<li class="nav-item">
 									<a class="nav-link" data-bs-toggle="tab" href="#tabb14">
 										<div class="card-wrp">
 											<div class="card-wrp-in p20">
 												<img src="<?= base_url() ?>assets/img/img4.png">
 												<h3>Nemultumit? <br>Banii inapo instant</h3>
 											</div>
 										</div>
 									</a>
 								</li>
 							</ul>
 							<div class="tab-content">
 								<div class="tab-pane fade active show" id="tabb1" role="tabpanel">
 									<div class="card">
 										<div class="project-main">
 											<div class="project-header-in p20">
 												<p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
 													type and scrambled it to make a type specimen book.</p>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="tab-pane fade" id="tabb12" role="tabpanel">
 									<div class="card">
 										<div class="project-main">
 											<div class="project-header-in p20">
 												<p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
 													type and scrambled it to make a type specimen book.</p>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="tab-pane fade" id="tabb13" role="tabpanel">
 									<div class="card">
 										<div class="project-main">
 											<div class="project-header-in p20">
 												<p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
 													type and scrambled it to make a type specimen book.</p>
 											</div>
 										</div>
 									</div>
 								</div>
 								<div class="tab-pane fade" id="tabb14" role="tabpanel">
 									<div class="card">
 										<div class="project-main">
 											<div class="project-header-in p20">
 												<p>4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
 													type and scrambled it to make a type specimen book.</p>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="tab-pane fade" id="navpills-2">
 						<div class="project-main2">
 							<span class="arrow-up-back"></span>
 							<span class="arrow-up"></span>
 							<div class="d-flex justify-content-between align-items-center">
 								income tab
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
 			<img src="<?= base_url() ?>assets/img/note.png" alt="income type" class="me-2">
 			<h5 class="mb-0 text-black">Income Type</h5>
 		</div>
 		<div class="menu-blu">
 			<h4>Select one or more income sources</h4>
 			<a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
 				<img src="<?= base_url() ?>assets/img/paly.png" alt="play btn">
 				<span>Video Example</span>
 			</a>
 		</div>
 		<h3 class="text-center my-3"><a href="#">Personal Data</a></h3>
 		<div class="project-main2">

 			<span class="arrow-up-back"></span>
 			<span class="arrow-up"></span>

 			<div class="">
 				<p style="min-height:150px;"></p>
 				<a class="btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"><i class="fa fa-user"></i>+ Add new user</a>
 			</div>
 			<br>
 			<div class="form-group">
 				<h5>Name</h5>
 				<p></p>
 			</div>
 			<hr>
 			<div class="form-group">
 				<h5>Personal no</h5>
 				<p></p>
 			</div>
 			<hr>

 			<div class="d-flex justify-content-between align-items-center">
 				<div class="form-group">
 					<h5>File</h5>

 				</div>
 			</div>

 		</div>

 		<div class="headerwp">
 			<h2>Included Advantages</h2>
 		</div>

 		<div class="adv-wrap">
 			<ul class="nav nav-tabs">
 				<li class="nav-item">
 					<a class="nav-link active" data-bs-toggle="tab" href="#tabm1">
 						<div class="card-wrp">
 							<div class="card-wrp-in p20">
 								<img src="<?= base_url() ?>assets/img/img1.png">
 								<h3>Membru Ceccar</h3>
 							</div>
 						</div>
 					</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" data-bs-toggle="tab" href="#tabm12">
 						<div class="card-wrp">
 							<div class="card-wrp-in p20">
 								<img src="<?= base_url() ?>assets/img/img2.png">
 								<h3>Experienta contabila de peste 15 ani</h3>
 							</div>
 						</div>
 					</a>
 				</li>
 			</ul>
 			<div class="tab-content">
 				<div class="tab-pane fade active show" id="tabm1" role="tabpanel">
 					<div class="card">
 						<div class="project-main">
 							<div class="project-header-in p20">
 								<p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
 									it to make a type specimen book.</p>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="tab-pane fade" id="tabm12" role="tabpanel">
 					<div class="card">
 						<div class="project-main">
 							<div class="project-header-in p20">
 								<p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
 									it to make a type specimen book.</p>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>

 			<ul class="nav nav-tabs">
 				<li class="nav-item">
 					<a class="nav-link" data-bs-toggle="tab" href="#tabm13">
 						<div class="card-wrp">
 							<div class="card-wrp-in p20">
 								<img src="<?= base_url() ?>assets/img/img3.png">
 								<h3>Emitere in sub 5 minute</h3>
 							</div>
 						</div>
 					</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" data-bs-toggle="tab" href="#tabm14">
 						<div class="card-wrp">
 							<div class="card-wrp-in p20">
 								<img src="<?= base_url() ?>assets/img/img4.png">
 								<h3>Nemultumit? <br>Banii inapo instant</h3>
 							</div>
 						</div>
 					</a>
 				</li>
 			</ul>
 			<div class="tab-content">
 				<div class="tab-pane fade" id="tabm13" role="tabpanel">
 					<div class="card">
 						<div class="project-main">
 							<div class="project-header-in p20">
 								<p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
 									it to make a type specimen book.</p>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="tab-pane fade" id="tabm14" role="tabpanel">
 					<div class="card">
 						<div class="project-main">
 							<div class="project-header-in p20">
 								<p>2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
 									it to make a type specimen book.</p>
 							</div>
 						</div>
 					</div>
 				</div>
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

 <div class="footer d-md-none d-block">
 	<div class="next-button ">
 		<a class="btn btn-primary">Continue <i class="fas fa-long-arrow-alt-right"></i></a>
 	</div>
 </div>
 </div>
 <!-- End: Main wrapper -->

 <!-- Modal Start: Add Project -->
 <div class="modal fade" id="addProjectSidebar">
 	<div class="modal-dialog modal-dialog-centered" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title">Create Project</h5>
 				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
 			</div>
 			<div class="modal-body">
 				<form>
 					<div class="form-group">
 						<label class="text-black font-w500">Project Name</label>
 						<input type="text" class="form-control">
 					</div>
 					<div class="form-group">
 						<label class="text-black font-w500">Dadeline</label>
 						<div class="cal-icon"><input type="date" class="form-control"><i class="far fa-calendar-alt"></i></div>
 					</div>
 					<div class="form-group">
 						<label class="text-black font-w500">Client Name</label>
 						<input type="text" class="form-control">
 					</div>
 					<div class="form-group">
 						<button type="button" class="btn btn-primary">CREATE</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- Modal End: Add Project -->
 <script src="<?= base_url() ?>assets/js/processXML.js"></script>
 <script>
 	window.addEventListener('load', function() {
 		$(".deleteUserBtn").on('click', (e) => {
 			e.preventDefault();
 			// console.log($(e.target).attr("data-currencyId"));
 			if ($(e.target).attr("data-userId") !== "") {
 				Swal.fire({
 					title: 'Are you sure?',
 					text: "You won't be able to revert this!",
 					icon: 'warning',
 					showCancelButton: true,
 					confirmButtonColor: '#3085d6',
 					cancelButtonColor: '#d33',
 					confirmButtonText: 'Yes, delete it!'
 				}).then((result) => {
 					if (result.value) {
 						console.log(result);
 						var id = $(e.target).attr("data-userId");
 						var data = {
 							"id": id
 						}
 						var url = 'deleteUserById'
 						$.ajax({
 							url: url,
 							method: "POST",
 							data: data,
 							success: function(response) {
 								Swal.fire(
 									'Deleted!',
 									'Your record has been deleted.',
 									'success'
 								);
 								setTimeout(() => {
 									window.location.reload();
 								}, 1500)
 							},
 							error: () => {
 								toastr.error("Error in deleting.");
 							}
 						})
 					} else {
 						// toastr.error("error");
 					}
 				})

 			} else {
 				toastr.warning("Cannot delete, data doesn't exist.");
 			}
 		})

		$(".viewDecBtn").on('click', (e) => {
			e.preventDefault();
		})
 	})
 </script>
