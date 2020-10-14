<?php
session_start();

require_once '../../admin/controllers/MessageController.php';
require_once '../../admin/models/Message.php';
require_once "../config/routes.php";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: " . ROUTE_LOGIN);
    exit;
}

$controller = new MessageController();
$messList = $controller->GetReceiveMessages($_SESSION["id"]);

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
                    <div class="container" style="width: 70%; padding: 15px;">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">Received messages</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class='list-group-item' style="color: white; background-color: #4e73df">
                                        <div class='row'>
                                            <div class='col-3'>Time</div>
                                            <div class='col-sm-7'>Content</div>
                                            <div class='col-2'>From</div>
                                        </div>
                                    </li>
                                    <?php
                                    
                                    if (sizeof($messList) == 0) {
                                        echo "<li class='list-group-item'>
                                                No received message now
                                            </li>";
                                    } else {
                                        foreach ($messList as $mess) {
                                            echo "<li class='list-group-item'>
                                                    <div class='row'>
                                                        <div class='col-3'>{$mess->getCreateDate()}</div>
                                                        <div class='col-sm-7'>{$mess->getContent()}</div>
                                                        <div class='col-2'>{$mess->getSendName()}</div>
                                                    </div>
                                                </li>";
                                        }
                                    }

                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
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
    <script src="../js/home.js"></script>
    <script src="../js/sidebar.js"></script>

</body>

</html>