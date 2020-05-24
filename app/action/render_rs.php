  <?php

require 'db.php';

$search = mysqli_real_escape_string($con,   $_GET["search"]);

if (!ctype_digit($search)) 
{
    $sql = "select * from account_tb where acc_name LIKE '$search%' ";
}
else
{
    $sql = "select * from account_tb where acc_id = $search";
}

$rs = mysqli_query($con , $sql);

$no = 1;
while($row = mysqli_fetch_array($rs))
{
$id = $row["acc_id"];
$name = $row["acc_name"];
echo "<tr>";
echo "<th scope='row'>$no</th>";
echo "<td>$id</td>";
echo "<td>$name</td>";
echo "</tr>";
$no++;
}

mysqli_close($con);

?>
