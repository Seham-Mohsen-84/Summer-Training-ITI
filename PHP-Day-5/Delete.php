<?php

session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("Location: Login.php");
}

require_once 'db_connection.php';
$DB = new Database();
$id = $_GET['id'] ?? null;

if ($id) {
   $result = $DB->Delete("users","id = '$id'");

    if ($result) {
        header("Location: Users.php");
        exit;
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No ID provided.";
}
