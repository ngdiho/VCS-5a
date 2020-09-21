<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Class Manager</title>

    <link href="../lib/fontawesome/css/all.css">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/sidebar.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <script defer src="../lib/fontawesome/js/all.js"></script>
    <!--load all styles -->
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php include 'commons/Sidebar.php' ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include 'commons/Navtop.php' ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <p class="text-danger">
                        <?php
                        if (!empty($_SESSION["message"])) {
                            echo $_SESSION["message"];
                            unset($_SESSION["message"]);
                        }
                        ?>
                    </p>

                    <form style="margin: 30px;" action="../controllers/RegisterController.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input name="phonenumber" type="text" class="form-control" id="phone" required>
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input name="isteacher" class="form-check-input" type="checkbox"> Is Teacher
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input name="username" type="text" class="form-control" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"> Password</label>
                                    <input name="password" type="password" class="form-control" id="pwd" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Repeat Password</label>
                                    <input name="repeatpassword" type="password" class="form-control" id="pwd" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../controllers/LogoutController.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../lib/jquery/jquery-3.5.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/sidebar.js"></script>

</body>

</html>