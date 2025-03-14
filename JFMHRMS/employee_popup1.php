
<?php
include("dbconnection/connection.php");

$empid = $_REQUEST['empid'];


$query = mysqli_query($link,"select emp_name,state,designation,employeeid from emp where empid='$empid'");
if($query){
	$row1 = mysqli_fetch_array($query);
	$emp_name = $row1['emp_name'];
	$state = $row1['state'];
	$designation = $row1['designation'];
	$employeeid = $row1['employeeid'];
	echo $emp_name.'#'.$state.'#'.$designation.'#'.	$employeeid;
  }

 ?>
