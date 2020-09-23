<?php

require_once "../config/routes.php";
require_once '../../admin/controllers/ChallengeController.php';

$chalid = trim($_POST["chalid"]);
$answer = trim($_POST["answer"]);

$controller = new ChallengeController();
$rs = $controller->CheckAnswer($chalid, $answer);

if ($rs === 1) {
    session_start();

    $_SESSION["correct"] = "true";
    header("location: " . ROUTE_DETAIL_CHALLENGE . "?chalid=" . $chalid);
} else {
    session_start();

    $_SESSION["correct"] = "false";
    header("location: " . ROUTE_DETAIL_CHALLENGE . "?chalid=" . $chalid);
}
