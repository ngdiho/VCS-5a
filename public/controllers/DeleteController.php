<?php
require_once '../../admin/controllers/UserController.php';
require_once "../config/routes.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $userId = $_GET["userid"];

    //echo $userId;
    $controller = new UserController();
    $rs = $controller->DeleteUser($userId);
    if($rs){
        header("location: ".ROUTE_HOME);
    }
    else {
        
    }
}