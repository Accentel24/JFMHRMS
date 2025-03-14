<?php //include('config.php');
session_start();
//include('dbconnection/connection1.php');
$id=$_GET['id'];
$a="delete from dpr where id='$id'";
	$servername = "localhost";
   $username = "accentel_jfm";
   $password = "Jfm@35791$";
   $dbname = "accentel_jfm";


   $servernameS = "conceptgrammarschool.com";
   $usernameS = "conceptg_abdul";
   $passwordS = "tolichowki";
   $dbnameS = "conceptg_jyothi";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   $connS = new mysqli($servernameS, $usernameS, $passwordS, $dbnameS);

   // Check connection
  if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   if ($connS->connect_error) {
       die("Connection failed: " . $connS->connect_error);
   }

   

    if ($conn->query($a) === TRUE) {
     echo "Successfully Deleted";

    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $conn->error;
    }

    if ($connS->query($a) === TRUE) {
     print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='store_list.php';";
	print "</script>";
    } else {
      echo "Error: Go back and Try Again ! " . $sql . "<br>" . $connS->error;
    }
    $conn->close();
    $connS->close();
?>