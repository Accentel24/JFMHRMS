<?php 
include('dbconnection/connection.php');
 $id=$_GET['id'];
 $state=$_GET['state'];               
    $query="update emp set status='' where empid='$id' and state = '$state'";
    $sq=mysqli_query($link,$query) or die(mysqli_error($link));
                                								
			if($sq){						
											
			print "<script>";
			print "alert('Successfully appointed');";
			print "self.location='resign_emp_list.php?state=$state';";
			print "</script>";
            }
?>
									