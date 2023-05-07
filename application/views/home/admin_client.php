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
                            <form class="form-inline" action="<?php echo base_url() . 'home/admin_client'; ?>"
                                method="post">


                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Name <span style="color:red; font-size: 12px"> *</span></label>
                                            <input type="text" name="name_surname" class="form-control"
                                                value="<?= !empty($name_surname)?$name_surname:'' ?>">
                                            <span style="color:red; font-size: 12px">
                                                <?php echo form_error('name_surname'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label>CNP <span style="color:red; font-size: 12px"> *</span></label>
                                            <input type="text" name="per_number" class="form-control"
                                                value="<?= !empty($per_number)?$per_number:'' ?>">
                                            <span style="color:red; font-size: 12px">
                                                <?php echo form_error('per_number'); ?></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="d-flex justify-content-end align-items-center">
                                    <input class="btn btn-primary text-nowrap" type='submit' name='submit'
                                        value='Apply Filter'>
                                    <!-- <p class="mb-0 small">Add at least 1 user to start the process</p> -->
                                    <!--  <a class="btn btn-primary text-nowrap" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> </a> -->
                                </div>
                            </form>



                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>


                                        <tr>
                                            <th>Name</th>
                                            <th>CNP</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $i = 1;
                                                                foreach($personal_data_list as $list)
                                                                {
                                                                   
                                                            ?>
                                        <tr>

                                            <td><?= $list['name_surname']; ?></td>
                                            <td> <?= $list['per_number'];  ?> </td>
                                            <td class="color-primary">
                                                <div class="d-flex">
                                                    <a href=" <?php echo base_url("Admin/edit_personal_data/".base64_encode($list['id'])) ?>"
                                                        class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit Personal
                                                        Data</a>



                                                    <a href="<?=base_url('Admin/choose_income_type')?>"
                                                        class="btn btn-primary shadow btn-xs1 sharp1 me-1">Edit
                                                        Declaration Data</a>


                                                    <a href="<?=base_url('Admin/generate_pdf')?>"
                                                        class="btn btn-primary shadow btn-xs1 sharp1 me-1">View
                                                        Declaration</a>

                                                    <a href="<?php echo base_url(); ?>home/admin_client_delete/<?php echo $list['id']; ?>"
                                                        onclick="return confirm('Are you sure to delete?')"
                                                        class="btn btn-danger shadow btn-xs1 sharp1">Delete</a>

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
</div>


<script>
function confirmation() {
    var result = confirm("Are you sure to delete?");
    if (result) {
        // Delete logic goes here
    }
}
</script>