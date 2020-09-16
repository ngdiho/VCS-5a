<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <!-- Custom fonts for this template-->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/css.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <p class="text-danger"><?php
                                                    session_start();
                                                    if (!empty($_SESSION["register_error"])) {
                                                        echo $_SESSION["register_error"];
                                                        unset($_SESSION["register_error"]);
                                                    }
                                                    ?></p>

                            <form class="user" action="../controllers/RegisterController.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control form-control-user" id="exampleInputEmail" placeholder="Full Name" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleFirstName" placeholder="Email" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" name="phonenumber" class="form-control form-control-user" id="exampleLastName" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="User Name" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeatpassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" name="isteacher" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Is Teacher?</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="Login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../lib/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>