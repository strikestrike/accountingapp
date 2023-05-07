<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">
</head>

<body>
    <!--Preloader Start-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--Preloader end-->

   

        <!--Start: Page main heading -->
        <div class="container-fluid page-sub-head">
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
               
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="list">
                        <div class="tab-content project-list-group" id="ListViewTabLink">
                            <div class="tab-pane fade active show" id="navpills-1">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="project-main2">
                                            <span class="arrow-up-back"></span>
                                            <span class="arrow-up"></span>

                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                                    <p class="mb-0 small">Retrieving information from <br>2021 &#8243;Project name&#8243;</p>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex flex-column align-items-center">
                                                    <p class="mb-0 small">Load document</p>
                                                    <a class="load-doc-icon" href="javascript:void(0)"><i class="fas fa-camera"></i></a>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3 d-flex justify-content-end">
                                                    <a class="btn btn-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addProjectSidebar"> <img src="img/u.png" alt="">&nbsp; Process data</a>
                                                </div>
                                                <hr>
                                            </div>

                                            <h6 class="text-center">I don't have the old form, please add your personal data</h6>

                                            <div class="basic-form">
                                                <form>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Salutation</label>
                                                        <div class="col-sm-9">
                                                            <div>
                                                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Mr</label>
                                                                <label class="radio-inline me-3"><input type="radio" name="optradio"> Mrs</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Name Surname</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" placeholder="Aasasasa">
                                                                </div>
                                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                                    <input type="text" class="form-control" placeholder="asad">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Personal number</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" placeholder="12354678910111213">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Mobile number</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" placeholder="12345678910">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">National Id Data</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" placeholder="Assasa">
                                                                </div>
                                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                                    <input type="text" class="form-control" placeholder="Assasa">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Birthday</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input name="datepicker" class="datepicker-default form-control" id="datepicker">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" placeholder="Assasa">
                                                                </div>
                                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                                    <input type="text" class="form-control" placeholder="Assasa">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-sm-12 mt-2 mt-sm-0">
                                                                    <input type="text" class="form-control" placeholder="Assasa">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary"><img src="img/save.png" alt="">&nbsp;&nbsp; Save</button>
                                                        </div>
                                                    </div>
                                                </form>
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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
                                                        <a href="javascript:void(0);" class="text-black user-name">Build Branding Persona for Etza.id</a>
                                                    </h6>
                                                    <div class="text-dark fs-14 text-nowrap">
                                                        <i class="fa fa-calendar-o mr-3" aria-hidden="true"></i> Created on Sep 8th, 2020
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

    
</body>

</html>