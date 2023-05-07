<?php include 'layout/sidebar.php'; ?>
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

                            <form method='POST' action='<?php echo base_url('Admin/crypto_income'); ?>' enctype='multipart/form-data'>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                        <p class="mb-0 small">Account Statement Import</p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
                                        <label class="mb-0 small">Load a xlsx file</label>
                                        <a class="load-doc-icon" href="javascript:void(0)">
                                            <i class="fas fa-camera"></i>
                                            <input type="file" name="file" onchange="checkfile(this);" required />

                                        </a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex justify-content-end">
                                        <!-- <a  href="<?= base_url('Admin/dividents_verification'); ?>" data-bs-toggle="modal" data-bs-target="Admin/dividents_verification">
                                                         <img src="<?= base_url(); ?>assets/img/u.png" alt="">&nbsp; Process data</a> -->

                                        <input type="submit" name="save" class="btn btn-primary" value="Process data">
                                        <!--  <button class="btn btn-primary" name="" type="submit"> <img
                                                src="<?= base_url(); ?>assets/img/u.png" alt="">&nbsp; Process data 
                                        </button> -->
                                        <hr>
                                    </div>
                                    <br><br><br>
                                    <div class="basic-form">
                                        <form>

                                            <div class="row form-group">
                                                <div class="col-xl-9 col-lg-9 col-sm-6">


                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-sm-6">
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
                            </form>
                        </div>

                    </div>
                </div>




                <script>
                    function checkfile(sender) {
                        var validExts = [".xlsx", ".xls", ".csv"];
                        var fileExt = sender.value;
                        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                        if (validExts.indexOf(fileExt) < 0) {
                            alert("Invalid file selected, valid files are of " +
                                validExts.toString() + " types.");
                            document.getElementById("form-id").reset();
                            return false;
                        } else return true;
                    }
                </script>
                
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
    <div class="tab-pane fade" id="boxed">
        <div class="tab-content" id="BoxedViewTabLink">
            <div class="tab-pane fade show active" id="boxed_navpills-1">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-primary">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-danger">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="boxed_navpills-2">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-info">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="boxed_navpills-3">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-warning">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="boxed_navpills-4">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4">
                        <div class="card project-boxed">
                            <div class="img-bx">
                                <img src="images/big/img1.jpg" alt="" class="w-100 ">
                                <span class="badge badge-danger">Progress</span>
                            </div>
                            <div class="card-header align-items-start">
                                <div>
                                    <p class="fs-14 mb-2 text-primary">#P-000441425</p>
                                    <h6 class="fs-18 font-w500 mb-3">
                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding
                                            Persona for Etza.id</a>
                                    </h6>
                                    <div class="text-dark fs-14 text-nowrap">
                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th,
                                        2020
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Deadline</span> :
                                        <span class="text-black ml-2">Monday, Sep 26th 2020</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Client</span> :
                                        <span class="text-black ml-2">Kevin Sigh</span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="mb-0 title">Person in charge</span> :
                                        <span class="text-black desc-text ml-2">Yuri Hanako</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>