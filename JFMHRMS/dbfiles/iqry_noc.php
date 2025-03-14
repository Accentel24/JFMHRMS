<?php

if (isset($_POST['submit'])) {
    $empid = trim($_POST['empid']);
    $empname = trim($_POST['empname']);
    $DOJ = trim($_POST['DOJ']);
    $designation = trim($_POST['designation']);
    $reason = trim($_POST['reason']);

    $resign = trim($_POST['resign']);
    $np = trim($_POST['np']);
    $sup_fb = trim($_POST['sup_fb']);
    $sal_adv = trim($_POST['sal_adv']);
    $sal_rv = trim($_POST['sal_rv']);
    $wire_certi = trim($_POST['wire_certi']);
    $wire_rv = trim($_POST['wire_rv']);
    $other = trim($_POST['other']);
    $other_rv = trim($_POST['other_rv']);
    $toolsdue = trim($_POST['toolsdue']);

    $addnocquery = "INSERT INTO add_noc ( `emp_id`,`emp_name`, `desig`,`doj`,`reason`,`resign`,`np`,`sup_fb`, `sal_adv`,`sal_rv`,`wire_certi`,`wire_rv`,`other`,`other_rv`,`state`,`tooldue`) 
 	VALUES 
    ('$empid','$empname','$designation','$DOJ','$reason','$resign','$np','$sup_fb','$sal_adv','$sal_rv','$wire_certi','$wire_rv','$other','$other_rv','$state','$toolsdue')";


    $cnt = count($_POST['tool_rv']);
    if ($cnt > 0 && $cnt == $cnt) {
        for ($i = 0; $i < $cnt; $i++) {
            $toolret = $_POST['tool_ret' . $i];
            $due = $_POST['tool_rv'][$i];
            $toolname = $_POST['tool_name'][$i];
            $query = "UPDATE employeetoollist SET `returned`='$toolret',`due`= '$due' WHERE employeeid = '$empid' and toolname = '$toolname'";
            $res = mysqli_query($link, $query) or die(mysqli_error($link));
        }
    }


    $addnocres = mysqli_query($link, $addnocquery) or die("could not connected" . mysqli_error($link));


    if ($addnocres) {

        //if it is successfully update then display alert box in form
        print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='noc_list.php?state=$state';";
        print "</script>";
    }
}

?>
