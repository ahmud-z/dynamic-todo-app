<?php
session_start();
require "connection.php";

$todo = $_POST["todo"];

if ($todo == "") {
    header("location: dashboard.view.php?error=you must have to add some text");
    die();
}


$userID = $_SESSION["userID"];

$db->query("INSERT INTO todo_items(user_id, todo) values ($userID, '$todo')");

header('Location: dashboard.view.php');
