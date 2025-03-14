<?php
include('dbconnection/connection.php');
$keyword=$_GET["keyword"];
$state = $_GET['state'];


    $query =mysqli_query($link,"SELECT   *  FROM   emp WHERE adharcardno = '$keyword' and status=''");
    if(mysqli_num_rows($query)> 0){
          $msg="user already exist!";
         echo "<script> alert('$msg'); window.self.location</script>";

       echo("<p><font color=Red><b>User Already Registered!</b></font></p>");
    }
?>
