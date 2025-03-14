<?php //include('config.php');

include('dbconnection/connection.php');
$state = $_GET['state'];
$id = $_GET['id'];
if(isset($_POST['update'])){
   
    $id = $_POST['id'];
	$start_date = $_POST['start_date'];
	$last_date= $_POST['last_date'];
    $reason1= $_POST['reason1'];
    $reason2= $_POST['reason2'];
    $reason3= $_POST['reason3'];
    $reason4= $_POST['reason4'];
	

 $x="update emp set start_date ='$start_date' ,last_date = '$last_date' ,reason1 = '$reason1',reason2 = '$reason2',reason3 = '$reason3',reason4 = '$reason4'
 where empid='$id'";
	
 $res = mysqli_query($link, $x) or die("could not connected" . mysqli_error($link));
	   
	  if ($res) {
	      print "<script>";
        print "alert('Successfully Updated ');";
        print "self.location='resign_emp_list.php?state=$state';";
        print "</script>";
	  }
	
}



?>
