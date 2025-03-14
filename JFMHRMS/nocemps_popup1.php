
<?php
include("dbconnection/connection.php");

$empid = $_REQUEST['empid'];


$query = mysqli_query($link,"select emp_name,DOJ,designation,employeeid from emp where empid='$empid'");
if($query){
	$row1 = mysqli_fetch_array($query);
	$emp_name = $row1['emp_name'];
	//$fname = $row1['fname'];
	$designation = $row1['designation'];
	$employeeid = $row1['employeeid'];
	//$address = $row1['address'];
	$DOJ = $row1['DOJ'];
	//$DOR = $row1['DOR'];
		echo $emp_name.'#'.$fname.'#'.$designation.'#'.	$employeeid.'#'.$address.'#'.$DOJ.'#'.$DOR;
  }

 ?>
