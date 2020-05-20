<?php
session_start();
require 'db.php';

$name = mysqli_real_escape_string($con,  $_POST['user_name']);
$pass = mysqli_real_escape_string($con,  $_POST['user_pass']);

$sql = "select * from user where user_name = '$name' and user_password = '$pass'";

$rs = mysqli_query($con , $sql);

if(mysqli_num_rows($rs)==1)
{
	 $row = mysqli_fetch_array($rs);
	 $_SESSION['user_id'] = $row["user_id"];
	 $_SESSION['user_name'] = $row["user_name"];
	 $_SESSION['user_role'] = $row["user_role"];

	 if($row["user_role"] == 0)
	 {
		header("location:../../index.php");
	 }elseif ($row["user_role"] == 1) 
	 {
	 	header("location:../../admin.html");
	 }
}else
{
	header("location:../../login.html");
}






?>