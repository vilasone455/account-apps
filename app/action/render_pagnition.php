<?php

require 'db.php';

$data = json_decode(file_get_contents("php://input"), TRUE);

$item_per_page = $data["page_rate"];
$page_num = $data["page"];

$res = array();

$start_page = ($page_num - 1) * $item_per_page;

//calculus page list

$count_sql = "select acc_id from account";

$count_rs = mysqli_query($con , $count_sql);

$row_count = mysqli_num_rows($count_rs);

$r = $row_count / $item_per_page ;

$totalpage = (int)$r;

if(fmod($row_count,$item_per_page) != 0){
	$totalpage++;
}

//

$sql = "select * from account limit $start_page , $item_per_page";
$rs = mysqli_query($con , $sql);

  while ($row = mysqli_fetch_array($rs)) 
       {
       	 $no = $row["acc_no"];
         $id = $row["acc_id"];
         $name = $row["acc_name"];
         $add = array('acc_no' => $no ,'acc_id' =>  $id, 'acc_name' => $name , 'is_edit' => false) ;
         array_push($res, $add);
       }

$return_data = array();
$return_data["account"] = $res;
$return_data["total_page"] = $totalpage;
$return_data["total_acc"] = $row_count;

echo json_encode($return_data);

?>
