<?php
session_start();

if (isset($_SESSION["loggedin"])) {
    header("location: /");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/login.css" rel="stylesheet">
    <title>LOGIN</title>
</head>

<body class="bg-gradient-primary">

    <div class="banner">
        <div class="form-login">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <p class="text-danger"><?php
                                    if (!empty($_SESSION["message"])) {
                                        echo $_SESSION["message"];
                                        unset($_SESSION["message"]);
                                    }
                                    ?></p>
            <form action="../controllers/LoginController.php" method="POST">

                <div class="form-group">
                    <label>User name</label>
                    <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter User Name..." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password..." required>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../lib/jquery/jquery-3.5.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>