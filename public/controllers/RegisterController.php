<?php

require_once '../../config/config.php';
require_once '../../admin/controllers/UserController.php';
require_once '../../admin/models/User.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $repeatpassword = trim($_POST["repeatpassword"]);
    $fullname = trim($_POST["fullname"]);
    $phonenumber = trim($_POST["phonenumber"]);
    $email = trim($_POST["email"]);
    $role = isset($_POST['isteacher']) && $_POST['isteacher']  ? 2 : 1;

    if ($password !== $repeatpassword) {
        session_start();

        $_SESSION["register_error"] = REGISTER_REPEAT_PASSWORD_ERROR;

        header("location: /StudentManagement/public/views/Register.php");
    }

    $user = new User();
    $user->setUserName($username);
    $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
    $user->setFullName($fullname);
    $user->setPhoneNumber($phonenumber);
    $user->setEmail($email);
    $user->setRole($role);

    // controller
    $userController = new UserController();
    $rs = $userController->Register($user);

    if ($rs) {
        session_start();

        $_SESSION["message"] = REGISTER_SUCCESS;
        header("location: /StudentManagement/public/views/Login.php");
    } else {
    }
}
