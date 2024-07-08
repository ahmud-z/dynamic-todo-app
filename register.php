<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $db->query("SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) < 1) {
        $db->query("INSERT INTO users(username, email, password) values ('$username', '$email', '$password');");
        header("location:dashboard.view.php");
        die();
    } else {
        header("location:register.view.php?error=email already exist");
    }
}
