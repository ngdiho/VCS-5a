<?php
require_once '../../admin/controllers/UserController.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["userid"];

    //echo $userId;
    $controller = new UserController();
    $rs = $controller->DeleteUser($userId);
    if($rs){
        header("location: /StudentManagement/public/views/Home.php");
    }
    else {
        
    }
}