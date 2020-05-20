<?php
class AccountController {
  // Properties
  public $id;
  public $name;

  // Methods

    function __construct($id , $name) {
    $this->name = $name;
    $this->id = $id;
  }

    function __construct($GetDataType) {
      if($GetDataType == "POST")
      {
        $this->GetData();
      }
  }

  function GetAllAccount(){
    require 'db.php';
    $sql = "select * from account_tb";
    $rs = mysqli_query($con , $sql);
    $res = array();

     while ($row = mysqli_fetch_array($rs)) 
       {
         $id = $row["acc_id"];
         $name = $row["acc_name"];
         $add = array('acc_id' =>  $id, 'acc_name' => $name);
         array_push($res, $add);
       }
    return $res;
  }

  public function GetData()
  {
      $this->id = $_POST["acc_id"];
      $this->name = $_POST["acc_name"];
  }

  function SaveData($account ac)
  {
    $this->id = $ac->id;
    $this->name = $ac->name;
  }

  function PrepareAdd(){
       require 'db.php';
       $sql = "select MAX(acc_id) as max_id from account_tb ";
       $rs = mysqli_query($con , $sql);
       $id = -1;
       while ($row = mysqli_fetch_array($rs)) 
       {
         $id = $row["max_id"];
         $id ++;
         break;
       }
       return $id;
  }


  function Add() 
  {
    require 'db.php';
    $id = mysqli_real_escape_string($con,  $this->id);
    $name = mysqli_real_escape_string($con,  $this->name);
    $sql = "insert into account_tb values($id , '$name')";
    mysqli_query($con , $sql);
  }

    function Update() 
  {
    require 'db.php';
    $id = mysqli_real_escape_string($con,  $this->id);
    $name = mysqli_real_escape_string($con,  $this->name);
    $sql = "update account_tb set acc_name = '$name' where acc_id = $id)";
    mysqli_query($con , $sql);
  }

  function Remove() 
  {
    require 'db.php';
    $id = mysqli_real_escape_string($con,  $this->id);
    $sql = "delete from account_tb where acc_id = $id)";
    mysqli_query($con , $sql);
  }

}
?>