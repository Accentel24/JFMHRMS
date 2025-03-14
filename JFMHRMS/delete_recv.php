<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$x="delete from payment where id='$id'";
//exit;
$k=mysqli_query($link,$x) or die(mysqli_error($link));
if($k){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='bill_list4.php';";
	print "</script>";
	
}
mysqli_close($link);
?>