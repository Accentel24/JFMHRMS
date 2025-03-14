<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$r=mysqli_query($link,"delete from qot_bill where id='$id'") or die(mysqli_error($link));
if($r){
    header('Location:bill_list2.php');
}
?>