
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../dbconnection/connection.php';


$parentid = $_REQUEST['id'];
$state = $_REQUEST['state'];
//$img=$_GET['img'];
//unlink('../photos/'.$img);
$query = "delete from add_tool_phr where id='$parentid'";
$rst = mysqli_query($link, $query) or die(mysqli_error($link));
if ($rst) {
    $childquery = "delete from tool_phr_master where id1='$parentid'";
    $childresult = mysqli_query($link, $childquery) or die(mysqli_error($link));
    //header('Location:../addemployee.php');
    if ($childresult) {
        print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='../ptoollist.php?state=$state';";
        print "</script>";
    }
}
?>