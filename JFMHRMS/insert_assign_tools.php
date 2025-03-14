<?php //include('config.php');

include('dbconnection/connection.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['submit'])) {
    $empid = $_POST['empid'];
    $empname = $_POST['empname'];
    $state = $_POST['state'];
    $date = date('Y-m-d');

    $cnt = count($_POST['toolname']);
    if ($cnt > 0 && $cnt == $cnt) {
        for ($i = 0; $i < $cnt; $i++) {
            
            if ($_POST['qty'][$i] != '') {
                $toolname = $_POST['toolname'][$i];
                $qty = $_POST['qty'][$i];

                $query = "INSERT INTO employeetoollist ( `employeeid`,`name`, `toolname`,`qty`,`date`,`state`) 
	VALUES 
 ('$empid','$empname','$toolname','$qty','$date','$state')";
 echo $query;
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
            }
        }
    }


    if ($res) {

        print "<script>";
        print "alert('Sucessfully Saved');";
        print "self.location='assigntoollist.php?state=$state';";
        print "</script>";
    }
}
