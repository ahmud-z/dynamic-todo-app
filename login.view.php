<?php
session_start();


if (isset($_SESSION["userID"])) {
    header("location:dashboard.view.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="component.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <div>
                <h1>Login</h1>
            </div>
            <div>
                <form action="login.php" method="POST">
                    <p>Email</p>
                    <input class="w-100 border p-6-5 f-sz-16" type="text" name="email" placeholder="Username or email">
                    <p>Password</p>
                    <input class="w-100 border p-6-5 f-sz-16" type="text" name="password" placeholder="Password">
                    <button class="btn-primary w-100 p-tb-5">Log in</button>
                </form>
            </div>
            <p>
                Don't have an account? <a href="register.view.php">Sign up</a>
            </p>
        </div>

    </div>
</body>

</html>