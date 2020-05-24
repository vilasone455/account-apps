<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$name = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$con = mysqli_connect($host , $name , $password );

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_select_db($con , $db) or die("error no database");
mysqli_set_charset($con , "utf8");

?>