<?php

require_once "../config/routes.php";
require_once '../../admin/controllers/AssignmentController.php';

session_start();

if ($_SESSION["role"] == 1) {
    header("location: " . ROUTE_ACCESSDENIED);
} else {
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/StudentManagement/admin/assignments/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $description = trim($_POST["description"]);
            $dueto = trim($_POST["dueto"]);

            $assignmentController = new AssignmentController();
            $rs = $assignmentController->AddAssignment($description, $target_file, $dueto);

            if ($rs) {
                header("location: " . ROUTE_ASSIGNMENTS);
            } else {
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
