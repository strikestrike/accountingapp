
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
                <h3 class="text-center my-3"><a href="#">Income Type</a></h3>
                <div class="project-main2">

                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>CNP</label>
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
                        <h5>Personal no</h5>
                        <p>12345 468/4683</p>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-group">
                            <a class="btn btn-primary">Edit Personal</a>
                            <a class="btn btn-primary">Edit Declaration Data</a>
                            <a class="btn btn-primary">View Declaration</a>
                            <a class="btn btn-danger">Delete</a>
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
    
    <!-----End: Chat Box------>
    <div class="chatbox">
        <div class="chatbox-close"></div> 
        <div class="custom-tab-1">
            <div class="chatbox-close-btn">
                <i class="fas fa-times"></i>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="chat" role="tabpanel">
                    <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                            <div>
                                <h6 class="mb-1">Chat List</h6>
                                <p class="mb-0">Show All</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                            <ul class="contacts">
                                <li class="name-first-letter">A</li>
                                <li class="active dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Archie Parker</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Alfie Mason</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>AharlieKane</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">B</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Bashid Samim</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Breddie Ronan</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Ceorge Carson</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">D</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Darry Parker</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Denry Hunter</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">J</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Jack Ronan</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Jacob Tucker</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>James Logan</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/3.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Joshua Weston</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">O</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/4.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Oliver Acker</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?= base_url(); ?>assets/images/avatar/5.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Oscar Weston</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card chat dz-chat-history-box d-none">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);" class="dz-chat-history-back">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
                            </a>
                            <div>
                                <h6 class="mb-1">Chat with Khelesh</h6>
                                <p class="mb-0 text-success">Online</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><i class="fas fa-user-circle text-primary me-2"></i> View profile</li>
                                    <li class="dropdown-item"><i class="fas fa-users text-primary me-2"></i> Add to close friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    You are welcome
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am looking for your next templates
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Ok, thank you have a good day
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Bye, see you
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    You are welcome
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am looking for your next templates
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Ok, thank you have a good day
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="<?= base_url(); ?>assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Bye, see you
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <textarea class="form-control" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="alerts" role="tabpanel">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                            <div>
                                <h6 class="mb-1">Notications</h6>
                                <p class="mb-0">Show All</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
                            <ul class="contacts">
                                <li class="name-first-letter">SEVER STATUS</li>
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont primary">KK</div>
                                        <div class="user_info">
                                            <span>David Nester Birthday</span>
                                            <p class="text-primary">Today</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">SOCIAL</li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont success">RU</div>
                                        <div class="user_info">
                                            <span>Perfection Simplified</span>
                                            <p>Jame Smith commented on your status</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">SEVER STATUS</li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont primary">AU</div>
                                        <div class="user_info">
                                            <span>AharlieKane</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont info">MO</div>
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="notes">
                    <div class="card mb-sm-3 mb-md-0 note_card">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                            <div>
                                <h6 class="mb-1">Notes</h6>
                                <p class="mb-0">Add New Nots</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                            <ul class="contacts">
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>New order placed..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>Youtube, a video-sharing website..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>john just buy your product..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!----Start: Chat Box---->

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
<!-- Required vendors -->
    <script src="<?= base_url(); ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/just-validate/package/dist/just-validate.production.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/toastr/js/toastr.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.js"></script>
    <script src="<?= base_url(); ?>assets/js/styleSwitcher.js"></script>
    <script>
        jQuery('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var hrefTarget = jQuery(this).attr('href');
            if (hrefTarget == '#boxed') {
                jQuery('#BoxedViewTabLink').removeClass('d-none');
                jQuery('#ListViewTabLink').addClass('d-none');

            } else if (hrefTarget == '#list') {
                jQuery('#ListViewTabLink').removeClass('d-none');
                jQuery('#BoxedViewTabLink').addClass('d-none');
            }

        });
    </script>
	<script>
		toastr.options = {
			"closeButton": true,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		
		<?php if($this->session->flashdata('success')){ ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		<?php }else if($this->session->flashdata('error')){  ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php }else if($this->session->flashdata('warning')){  ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
		<?php }else if($this->session->flashdata('info')){  ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>");
		<?php } ?>
		$('.validation-errors > p').delay(3000).fadeOut(800);
	</script>

</body>

</html>
