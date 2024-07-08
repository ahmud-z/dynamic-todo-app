<?php

require "connection.php";

session_start();

$id = $_GET['id'];
$userId = $_SESSION['userID'];

$db->query("DELETE FROM todo_items where id = $id AND user_id = $userId;");

header('Location: dashboard.view.php');