<?php
session_start();

$data = array();

if( !isset($_SESSION["user_name"]) ){
    	$data["role"] = "none";
}
else {
    if($_SESSION['user_role'] != 1){
        header("location:index.php");
        $data["role"] = "user";
    }
    else if($_SESSION["user_role"] == 1){
  		$data["role"] = "admin";
    }
}

echo json_encode($data);

?>