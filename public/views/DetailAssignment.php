<?php

require_once '../../admin/controllers/AssignmentController.php';
require_once '../../admin/models/Assignment.php';

session_start();

$assignId = $_GET["assignid"];

$controller = new AssignmentController();
$assign = $controller->GetAssignmentById($assignId);
$fileName = substr($assign->getFilePath(), strrpos($assign->getFilePath(), "/") + 1)

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
    <link href="../css/assignments.css" rel="stylesheet">
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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <span class="m-0 font-weight-bold text-primary">Assignment [ <?php echo $assign->getDescription() ?> ]</span>
                            </div>
                            <div class="card-body">
                                <span>File: <?php echo "<a href='#'>" . $fileName . "</a>" ?></span>
                                
                                <?php
                                if ($_SESSION["role"] == 2) {
                                    echo "<div style='display:inline-table;'>
                                            <a href='#' data-toggle='modal' data-target='#changeFileModal' class='btn btn-primary' style='display:inline-table;float: inherit;position: absolute;right: 20px;'>Change file</a><br /></br />
                                        </div><br/>
                                        <ul class='list-group'>
                                            <li class='list-group-item' style='background-color: #007bff;color: white;'>
                                                <div class='row'>
                                                    <div class='col-3'>Time submit</div>
                                                    <div class='col-sm-6'>File</div>
                                                    <div class='col-3'>Student</div>
                                                </div>
                                            </li>
                                        </ul>";

                                } else {
                                    echo "<br/><br/>
                                    <form>
                                        <div class='form-group'>
                                            <label for='customFile'>Turn in</label>
                                            <div class='custom-file'>
                                                <input type='file' name='file' class='custom-file-input' id='customFile' required>
                                                <label class='custom-file-label' for='customFile'>Choose file</label>
                                            </div>
                                        </div>
                                        <button class='btn btn-primary' type='submit'>Turn in</button>
                                    </form>";
                                }

                                ?>

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

    <!-- change file Modal-->
    <div class="modal fade" id="changeFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customFile">File</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" href="#">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../lib/jquery/jquery-3.5.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/sidebar.js"></script>

</body>

</html>