<?php
require_once "../config/routes.php";

session_start();
unset($_SESSION["id"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["fullname"]);

header("location: ".ROUTE_HOME);
