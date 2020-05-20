<?php

require 'db.php';

$data = json_decode(file_get_contents("php://input"), TRUE);

$id = $data['acc_id'];

$sql = "delete from account where acc_id = $id";

$res = array();

if(!mysqli_query($con , $sql)){
$res["status"] = "failed";
$res["error_desc"] = mysqli_error($con);
}
else{
$res["status"] = "true";
}

echo json_encode($res);

?>
