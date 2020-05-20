<?php

$host = "localhost";
$name = "root";
$password = "";
$db = "account_db";

$admin = "top";

$con = mysqli_connect($host , $name , $password ) or die("connection error");
mysqli_select_db($con , $db) or die("error no database");
mysqli_set_charset($con , "utf8");
$admin = "top1";
?>