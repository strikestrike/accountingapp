<?php include 'layout/sidebar.php'; ?>
<style>
    .project-main2 .table thead th {
        width: auto;
    }

    .project-main2 table .color-primary .btn {
        padding: 5px 9px !important;
    }

    .project-main2 table .color-primary .btn i {
        pointer-events: none;
    }
</style>
<style>
    .pagination {

        text-align: center;
    }

    .pagination a {
        color: #007abe;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }
</style>
<div class="container-fluid d-md-block d-none">
    <div class="project-nav">
        <div class="card-action card-tabs card-tabs2 w-100">
            <ul class="nav nav-tabs style-2 w-100" id="ListViewTabLink">
                <li class="nav-item">
                    <a href="#navpills-1" class="nav-link " data-bs-toggle="tab" aria-expanded="false">Personal Data </a>
                </li>
                <li class="nav-item">
                    <a href="#navpills-2" class="nav-link active" data-bs-toggle="tab" aria-expanded="false">Income Type</a>
                </li>
                <li class="nav-item">
                    <a href="#navpills-3" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Information Verification </a>
                </li>
                <li class="nav-item">
                    <a href="#navpills-4" class="nav-link" data-bs-toggle="tab" aria-expanded="false">Document Release </a>
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

                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-primary text-nowrap invisible" href="javascript:void(0)"> Rental</a>
                                    <div class="text-danger"><?= validation_errors() ?></div>

                                </div>
                                <div class="table-responsive mt-4">
                                    <table class="table table-responsive-sm" id="tableID">
                                        <thead>
                                            <tr>

                                                <th>Date</th>
                                                <th>Rate BNR USD</th>
                                                <th>Rate BNR EURO</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            /* echo "<pre>";
                                             print_r($bnrlist);
                                             echo "</pre>"; */
                                            $i = 1;
                                            if (!empty($bnrlist)) {
                                                foreach ($bnrlist as $key => $value) { ?>
                                                    <tr>

                                                        <td><?= $value['date'] ?></td>
                                                        <td><?= $value['rate_bnr_usd'] ?></td>
                                                        <td><?= $value['rate_bnr_euro'] ?></td>
                                                        <td class="color-primary">
                                                            <a href='javascript:void(0);' class='editBNRBtn btn btn-primary shadow btn-xs1 sharp1' data-BNRId="<?= $value['id'] ?>"><i class='fas fa-edit'></i></a>
                                                            <a href='javascript:void(0);' class='deleteBNRBtn btn btn-danger shadow btn-xs1 sharp1' data-BNRId="<?= $value['id'] ?>"><i class='fas fa-trash'></i></a>

                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
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

<div class="modal fade" id="editBNR">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit BNR Exchange Rates </h5>
                <button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form id="editBNRForm" action="<?= base_url('admin/editBNR') ?>" method="POST">
                    <input type="text" id="BNRIdHidden" value="" name="id" hidden>
                    <div class="form-group">
                        <label class="text-black font-w500">Date<span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="date" id="edit_date" name="date" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('date'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Rate BNR USD<span style="color:red; font-size: 12px" required>
                                *</span></label>
                        <input type="text" id="edit_rate_bnr_usd" name="rate_bnr_usd" class="form-control">
                        <span style="color:red; font-size: 12px"> <?php echo form_error('rate_bnr_usd'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Rate BNR EURO<span style="color:red; font-size: 12px" required>
                                *</span></label>
                        <input type="text" id="edit_rate_bnr_euro" name="rate_bnr_euro" class="form-control">
                        <span style="color:red; font-size: 12px"> <?php echo form_error('rate_bnr_euro'); ?></span>
                        <div class="form-group mt-3">
                            <button type="reset" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
                            <button type="submit" value="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    /**
     * display edit form for updating 
     */


    $(".editBNRBtn").on('click', (e) => {
        e.preventDefault();
        if ($(e.target).attr("data-BNRId") !== "") {
            var BNRId = $(e.target).attr("data-BNRId");
            var data = {
                "id": BNRId
            }
            var url = 'getBNRById'
            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(response)

                {
                    $("#editBNR").modal('show');
                    var rate = JSON.parse(response);
                    console.log(rate[0]);
                    $("#editBNRForm input#edit_date").val(rate[0].date);
                    $("#editBNRForm input#edit_rate_bnr_usd").val(rate[0].rate_bnr_usd);
                    $("#editBNRForm input#edit_rate_bnr_euro").val(rate[0].rate_bnr_euro);
                    $("#BNRIdHidden").val(parseInt(rate[0].id));
                    console.log($("#editBNRForm input#BNRIdHidden"));
                }
            })
        } else {
            toastr.warning("No data available for this selection.");
        }
        //console.log(rateId)
    })

    $(".deleteBNRBtn").on('click', (e) => {
        e.preventDefault();
        // console.log($(e.target).attr("data-userId"));
        if ($(e.target).attr("data-BNRId") !== "") {
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
                    var userId = $(e.target).attr("data-BNRId");
                    var data = {
                        "id": userId
                    }
                    var url = 'deleteBNRById'
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'BNR Exchange Rates has been deleted successfully.',
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
</script>

<script>
    // Initialize the DataTable
    $(document).ready(function() {
        $('#tableID').DataTable({

            // Enable the searching
            // of the DataTable
            searching: true
        });
    });
</script>