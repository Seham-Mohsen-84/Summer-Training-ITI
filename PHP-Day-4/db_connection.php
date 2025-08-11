<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "summer_iti";
$port = 3307;

$conn = new PDO(
    "mysql:host=$db_host;port=$port;dbname=$db_name;charset=utf8",
    $db_user,
    $db_pass
);


if($conn){
    echo "<script>alter('Connected successfully')</script>";
}else{
    echo "<script>alter('Connection failed')</script>";
}