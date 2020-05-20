  <?php

require 'find_account.php';

$rs = SearchAccount();

$ishave = false;
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
$ishave = true;
$no++;
}

if($ishave == false){
   // echo "Dont Found Data";
}

?>
