
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accounting App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">
</head>
<style>
    @media (max-width:768px) {
        .img-login {
            display: none!important;
        }
    }
</style>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-sm-12 mb-3">
                    <div class="text-center login_logo mb-1">
                        <img src="img/logo.jpg" alt="logo">
                    </div>
                </div>

                <div class="col-lg-11 col-xl-10">
                    <div class="authincation-content">
                        <div class="authincation-content-in">
                            <div class="row no-gutters">
                                <div class="col-xl-6">
                                    <div class="img-login">
                                        <img src="img/login.jpg" alt="login" class="img-responsive" />
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="auth-form auth-form-p">
                                        <h1>Welcome</h1>
                                        <h4 class="mb-4">Email introduced earlier</h4>
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="mb-1">Name</label>
                                                <input type="text" class="form-control" value="hello">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Password</label>
                                                <input type="password" class="form-control" value="Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1">Confirm Password</label>
                                                <input type="password" class="form-control" value="Password">
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">I have read and agree to the Terms and Conditions
Privacy Policy, I confirm that I am over 16 years old</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row d-flex justify-content-between m1b-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">I want you to receive the best deals.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block Continue-btn">Continue</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
