<?php

require "connection.php";

session_start();

$id = $_POST['id'];
$status = $_POST['status'];

$userId = $_SESSION['userID'];

$db->query("UPDATE todo_items SET is_completed = $status WHERE id = $id;");