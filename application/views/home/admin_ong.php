<?php include 'sidebar1.php'; ?>
  <div class="tab-content">
                    <div class="tab-pane fade active show" id="list">
                        <div class="tab-content project-list-group" id="ListViewTabLink">
                            <div class="tab-pane fade" id="navpills-1">

                                <div class="project-main2">
                                    <span class="arrow-up-back"></span>
                                    <span class="arrow-up"></span>
                                    <div class="d-flex justify-content-between align-items-center">
                                        income tab
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade active show" id="navpills-2">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="project-main2">
                                            <span class="arrow-up-back"></span>
                                            <span class="arrow-up"></span>
                                             <form class="form-inline" action="<?php echo base_url() . 'home/admin_ong'; ?>" method="post">


                                            <div class="row">
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Name   <span style="color:red; font-size: 12px"> *</span></label>
                                                        <input type="text" name="name_surname" class="form-control" value="<?= !empty($name_surname)?$name_surname:'' ?>" >
                                                         <span style="color:red; font-size: 12px"> <?php echo form_error('name_surname'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label> Registration No <span style="color:red; font-size: 12px"> *</span></label>
                                                        <input type="text" name="registration_no" class="form-control"  value="<?= !empty($registration_no)?$registration_no:'' ?>"  >
                                                           <span style="color:red; font-size: 12px"> <?php echo form_error('registration_no'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                        

                                            <div class="d-flex justify-content-end align-items-center">
                                                <input class="btn btn-primary text-nowrap"  type='submit' name='submit' value='Apply Filter'>
                                                <!-- <p class="mb-0 small">Add at least 1 user to start the process</p> -->
                                               <!--  <a class="btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> </a> -->
                                            </div>
                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-responsive-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Registration no</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                         <?php $i = 1;
                                                                foreach($crypto_income1_list as $list)
                                                                {
                                                                   
                                                                ?> 
                                                        <tr>
                                                  
                                                     <td><?= $list['name_surname']; ?></td>
                                                      <td> <?= $list['registration_no'];  ?> </td>
                                                             <td class="color-primary">
                                                                <div class="d-flex">
                                         <a href="<?php echo base_url("Admin/ong_view/".base64_encode($list['id'])) ?>" class="btn btn-primary shadow btn-xs1 sharp1 me-1">View</a>


                                         <a href="<?php echo base_url("Admin/crypto_income1/".base64_encode($list['id'])) ?>"   onclick="return confirm('Are you sure to Approve?')" class="btn btn-primary shadow btn-xs1 sharp1 me-1">Approve</a>


                                                     <a href="<?php echo base_url(); ?>home/admin_ong_delete/<?php echo $list['id']; ?>" onclick="return confirm('Are you sure to Delete?')"  class="btn btn-danger shadow btn-xs1 sharp1">Delete</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                         <?php  } ?>
                                                    </tbody>
                                                </table>
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

            
  <script>
    
       function confirmation(){
    var result = confirm("Are you sure to Approve?");
    if(result){
        // Delete logic goes here
    }
}
  </script>

    <script>
    
    function deleteion(){
    var result = confirm("Are you sure to delete?");
    if(result){
        // Delete logic goes here
    }
}
  </script>


           <!--  <div class="container-fluid d-md-none d-block">
                <div class="d-flex flex-nowrap justify-content-between align-items-center mb-4">
                    <div class="100%">
                        <h4 class="mb-0 text-black font-weight-bold">Project Name</h4>
                        <p class="text-black fs-12 mb-0">E simplu, alegi tipul venitului, introduce datele, platesti si descarci declaratia. </p>
                    </div>
                </div>
                <div class="copyright m-0 py-2 d-flex align-items-center">
                    <img src="<?= base_url(); ?>assets/img/note.png" alt="income type" class="me-2">
                    <h5 class="mb-0 text-black">Income Type</h5>
                </div>
                <div class="menu-blu">
                    <h4>Select one or more income sources</h4>
                    <a class="video-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar">
                        <img src="<?= base_url(); ?>assets/img/paly.png" alt="play btn">
                        <span>Video Example</span>
                    </a>
                </div>
                <h3 class="text-center my-3"><a href="#">Income Type</a></h3>
                <div class="project-main2">

                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Registration no</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="">
                        <a class="btn btn-primary text-nowrap" href="javascript:void(0)">Apply filter</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <h5>Name</h5>
                        <p>Lonionesou</p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h5>Registration no</h5>
                        <p>293654</p>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-group">
                            <a class="btn btn-primary">View</a>
                            <a class="btn btn-primary">Approve</a>
                            <a class="btn btn-danger">Delete</a>
                        </div>
                    </div>

                </div>
              </div> -->

       


  