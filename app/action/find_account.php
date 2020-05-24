<?php

function SearchAccount(){
require 'db.php';
$search = mysqli_real_escape_string($con,   $_GET["search"]);

if (!ctype_digit($search)) 
{
   $sql = "select * from account_tb where acc_name LIKE '$search%' ";
}
else
{
   // echo "number";
    $sql = "select * from account_tb where acc_id = $search";
}

$rs = mysqli_query($con , $sql);

return $rs;
}
//location => index
?>
