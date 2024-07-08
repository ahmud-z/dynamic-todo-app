<?php
require "connection.php";
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' ");

if (mysqli_num_rows($result) == 1) {


    $user = mysqli_fetch_assoc($result);


    $_SESSION["userID"] =  $user['id'];

    header("location:dashboard.view.php");
    die();
}
