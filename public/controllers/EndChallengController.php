<?php

require_once "../config/routes.php";
require_once '../../admin/controllers/ChallengeController.php';

$controller = new ChallengeController();

$rs = $controller->EndChallenge();
if($rs){
    header("Location: " . ROUTE_CHALLENGE);
} else {
    
}
