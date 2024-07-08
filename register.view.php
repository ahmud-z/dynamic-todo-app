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
                <h1>Create account</h1>
            </div>

            <?php if (isset($_GET["error"])) : ?>
                <div class="error-msg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M2.725 21q-.275 0-.5-.137t-.35-.363t-.137-.488t.137-.512l9.25-16q.15-.25.388-.375T12 3t.488.125t.387.375l9.25 16q.15.25.138.513t-.138.487t-.35.363t-.5.137zm1.725-2h15.1L12 6zM12 18q.425 0 .713-.288T13 17t-.288-.712T12 16t-.712.288T11 17t.288.713T12 18m0-3q.425 0 .713-.288T13 14v-3q0-.425-.288-.712T12 10t-.712.288T11 11v3q0 .425.288.713T12 15m0-2.5" />
                    </svg>
                    <p>
                        <?= $_GET["error"]; ?>
                    </p>
                </div>
            <?php endif ?>

            <div>
                <form action="register.php" method="POST">
                    <p>Username</p>
                    <input class="w-100 border p-6-5 f-sz-16" type="text" name="username" placeholder="Enter your name" required>
                    <p>Email</p>
                    <input class="w-100 border p-6-5 f-sz-16" type="email" name="email" placeholder="Enter your email" required>
                    <p>Password</p>
                    <input class="w-100 border p-6-5 f-sz-16" type="password" name="password" placeholder="Enter your password" required>
                    <button class="btn-primary w-100 p-tb-5">Register</button>
                </form>
            </div>
            <p>
                Already have an account? <a href="login.view.php">Log in</a>
            </p>
        </div>

    </div>
</body>

</html>