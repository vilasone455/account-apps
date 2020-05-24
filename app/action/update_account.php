<?php

require 'db.php';

$data = json_decode(file_get_contents("php://input"), TRUE);

$id = $data['acc_id'];
$name = $data['acc_name'];
$oldid = $data["old_id"];
$no = $data['acc_no'];
$res = array();

$sql = "update account set acc_name = '$name' , acc_id = $id where acc_no = $no";

$id_exist = "select acc_id from account where acc_id = $id";

$row_rs = mysqli_query($con , $id_exist);

if(!mysqli_query($con , $sql))
{
	$res["status"] = "failed";
	$res["error_desc"] = mysqli_error($con);
}
else{
	$res["status"] = "true";
}

if($oldid != $id){  // if user set new id
if(mysqli_num_rows($row_rs) > 0){
	$res["status"] = "failed";
	$res["id_exist_error"] = true;
}
}
mysqli_close($con);
echo json_encode($res);
?>
