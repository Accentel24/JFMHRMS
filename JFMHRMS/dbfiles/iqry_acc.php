<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    
    $aname = trim($_POST['aname']);
	$aprice = trim(addslashes($_POST['aprice']));
	//$ifsc = trim(addslashes($_POST['qty']));
   $user=trim($_POST['user']);
   $e1 = trim(addslashes($_POST['e1']));
   $e2 = trim(addslashes($_POST['e2']));
 //  $e3 = trim(addslashes($_POST['e3']));

 $res = mysqli_query($link, "insert into acces(aname,aprice) values('$aname','$aprice')") or die("could not connected" . mysqli_error($link));
 //if the form variables are not empty then update data into database
   
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addacc.php';";
        print "</script>";
    }
   
            
   

}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

