  <?php

    require 'db.php';
    $sql = "select * from account";
    $rs = mysqli_query($con , $sql);
    $res = array();

     while ($row = mysqli_fetch_array($rs)) 
       {
         $no = $row["acc_no"];
         $id = $row["acc_id"];
         $name = $row["acc_name"];
         $add = array('acc_no' => $no ,'acc_id' =>  $id, 'acc_name' => $name , 'is_edit' => false) ;
         array_push($res, $add);
       }


echo json_encode($res);
?>
