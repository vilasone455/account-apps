<?php

require 'db.php';

$data = json_decode(file_get_contents("php://input"), TRUE);
$search = mysqli_real_escape_string($con,  $data['search']);


if (!ctype_digit($search)) 
{
    $sql = "select * from account_tb where acc_name LIKE '$search%' ";
}
else
{
    $sql = "select * from account_tb where acc_id = $search";
}

$rs = mysqli_query($con , $sql);

$res = array();

 while ($row = mysqli_fetch_array($rs)) 
   {
     $id = $row["acc_id"];
     $name = $row["acc_name"];
     $add = array('acc_id' =>  $id, 'acc_name' => $name ) ;
     array_push($res, $add);
   }

echo json_encode($res);

?>
