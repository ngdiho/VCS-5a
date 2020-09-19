<?php

require_once '../../admin/controllers/UserController.php';
require_once '../../admin/models/User.php';
require_once '../../admin/controllers/MessageController.php';
require_once '../../admin/models/Message.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["userid"];
    //echo $userId;
    $controller = new UserController();
    $rs = $controller->GetUserById($userId);
}

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
    <link href="../css/detailuser.css" rel="stylesheet">
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
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <img style="width: 100%;" src="../assets/images/user_icon.png" alt="" class="img-rounded img-responsive" />
                            </div>
                            <div class="col">
                                <blockquote>
                                    <h1><?php echo $rs->getFullName() ?></h1> <small><cite title="Source Title">Gotham, United Kingdom <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                                </blockquote>
                                <p>
                                    <i class="fas fa-envelope-open-text"></i> <?php echo $rs->getEmail() ?>
                                    <br /> <i class="fas fa-phone-square"></i> <?php echo $rs->getPhoneNumber() ?>
                                </p>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <span class="m-0 font-weight-bold text-primary">Send message</span>
                                        <span class="text-success">
                                            <?php
                                            if (!empty($_SESSION["message"])) {
                                                echo $_SESSION["message"];
                                                unset($_SESSION["message"]);
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <form action="../controllers/SendMessageController.php" method="POST">
                                            <input type="text" name="receiveid" hidden value="<?php echo $rs->getUserID() ?>" />
                                            <div class="col">
                                                <textarea name="message"></textarea>
                                            </div>
                                            <div class="col">
                                                <button style="float: right;" class="btn btn-primary" type="submit">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <span class="m-0 font-weight-bold text-primary">Messages sent to <?php echo $rs->getUserName() ?></span>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class='list-group-item' style="color: white; background-color: #438ffc">
                                        <div class='row'>
                                            <div class='col-3'>Time</div>
                                            <div class='col-sm-7'>Content</div>
                                            <div class='col-2'>From</div>
                                        </div>
                                    </li>
                                    <?php

                                    $messController = new MessageController();
                                    $messList = $messController->GetSentMessages($_SESSION["id"], $rs->getUserID());
                                    foreach ($messList as $mess) {
                                        echo "<li class='list-group-item'>
                                                <div class='row'>
                                                    <div class='col-3'>{$mess->getCreateDate()}</div>
                                                    <div class='col-sm-7'>{$mess->getContent()}</div>
                                                    <div class='col-2'>
                                                        <a class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                                        <a class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a>
                                                    </div>
                                                </div>
                                            </li>";
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
    <script src="../js/sidebar.js"></script>

</body>

</html>