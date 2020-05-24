<?php

require 'db.php';

$data = json_decode(file_get_contents("php://input"), TRUE);
$id = mysqli_real_escape_string($con,  $data['acc_id']);
$name = mysqli_real_escape_string($con,  $data['acc_name']);

$id_exist = "select acc_id from account where acc_id = $id";

$res = array();

$row_rs = mysqli_query($con , $id_exist);

$sql = "insert into account values('' , $id , '$name')";

if(!mysqli_query($con , $sql))
{
	 $res["status"] = "failed";
}
else
{
	$res["status"] = "yes";
}


if(mysqli_num_rows($row_rs) > 0){
	$res["id_exist_error"] = true;
	$res["status"] = "failed";
}

mysqli_close($con);

echo json_encode($res);
//require 'render_account.php';
?>
