<?php

require_once "../config/routes.php";
require_once '../../admin/controllers/MessageController.php';
require_once '../../admin/models/Message.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $messid = trim($_POST["messid"]);
    $newmessage = trim($_POST["newmessage"]);
    $userid = trim($_POST["userid"]);

    echo $messid . " " . $newmessage . " " . $userid;

    // controller
    $messController = new MessageController();
    $rs = $messController->UpdateMessage($messid, $newmessage);

    if ($rs) {
        header("location: " . ROUTE_DETAIL_USER . '?userid=' . $userid);
    } else {
    }
}
