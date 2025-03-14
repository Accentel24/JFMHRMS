<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];
$state=$_GET["state"];

 $sql="SELECT sum(qty) as fullqty  FROM tool_phr_master WHERE toolname = '$q' and state = '$state'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {

  $fullqty = $row['fullqty'];
  }

$sql="SELECT sum(qty) as usedqty  FROM employeetoollist WHERE toolname = '$q' and state = '$state'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {

   $usedqty = $row['usedqty'];
  }
  $finalqty= $fullqty-$usedqty;
echo ":" . $finalqty;
?>     