<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';
if (isset($_POST['insert'])) {
//reading form data
     $rname = trim($_POST['rname']);
     $user = trim($_POST['user']);
      $remarks = trim($_POST['remarks']);
    
//department name validation if the value is empty display error other wise asssign a value
 
    
    //if the form variables are not empty then insert data into database
    
        $sql = "insert into  roomtype(ROOMTYPE,AUTH_BY,REMARKS) values('$rname','$user','$remarks')";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully insert then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Inserted Successfully </b> </div>';
        }
    
}


//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['update'])) {
    //reading form data
    $rname = trim($_POST['rname']);
    $remarks = trim($_POST['remarks']);
   $user=trim($_POST['user']);
    $id=trim($_POST['id']);

 
 //if the form variables are not empty then update data into database
   
       $sql = "update roomtype set ROOMTYPE='$rname',AUTH_BY='$user',REMARKS='$remarks' where ROOMTYPE_ID='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
        $msg = '<div class="alert alert-success" id="success-alert"><b>Data Updated Successfully </b> </div>';
    }
   
            
   

}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

