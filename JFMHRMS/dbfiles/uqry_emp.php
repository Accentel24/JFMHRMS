<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    $photoFullPath = "http://softdemo.in/hrms/";
        $employeeid = trim($_POST['eid']);
    $emp_name = trim($_POST['empname']);
   
    $DOB= trim($_POST['dob']);
    $fname= trim($_POST['fname']);
    $mname= trim($_POST['mname']);
    $wname = trim($_POST['wname']);
    $nok = trim($_POST['nok']);
    $childname = trim($_POST['childname']);
    $gender = trim($_POST['gender']);
    $pan = trim($_POST['pan']);
    $uan=trim($_POST['uan']);
    $PFNO=trim($_POST['pf']);
    $ESI_NO= trim($_POST['esi']);
    $maritalstatus = trim($_POST['marstatus']);
    $contactno = trim($_POST['conno']);
    $alternateno = trim($_POST['aconno']);
    $adharcardno = trim($_POST['adhar']);
    $address = trim($_POST['address']);
    $relation= trim($_POST['relation']);
    $rno = trim($_POST['rno']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $qualification = trim($_POST['qua']);
    $experience = trim($_POST['exp']);
    $DOJ = trim($_POST['doj']);
   $city=trim($_POST['city']);
    $designation = trim($_POST['des']);
    $ESI_NO = trim($_POST['esi']);
    $PFNO = trim($_POST['pf']);
    
    
     $tshirt = trim($_POST['tshirt']);
     $tshtdt = trim($_POST['tshtdt']);
     $tsize  =trim($_POST['tsize']);
     
       $phant = trim($_POST['phant']);
     $phtdt = trim($_POST['phtdt']);
     $psize  =trim($_POST['psize']);
     
     $sshoes = trim($_POST['sshoes']);
     $shoesdt = trim($_POST['shoesdt']);
     $ssize  =trim($_POST['ssize']);
       
       $idcard = trim($_POST['idcard']);
     $idcarddt = trim($_POST['idcarddt']); 
       
    //$photo= trim($_POST['img1']);
    $iname=$_FILES['empfile']['name'];
   if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	echo $iname =$date."-".$_FILES['empfile']['name'];
	$tmp = $_FILES['empfile']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $fileName15 =$date."-".$_FILES['empfile']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$fileName15 = ($fileName15);
	}else{
	 $fileName15 = ($image1);
	}
	$emp_email = trim(addslashes($_POST['email']));
	$username = trim(addslashes($_POST['uname']));
	$password = trim(addslashes($_POST['pwd']));
		$gender = trim(addslashes($_POST['gender']));
		$pan=trim(addslashes($_POST['pan']));
   $user=trim($_POST['user']);
   $id=trim($_POST['id']);
   $bname = trim(($_POST['banknm']));
	$branch = trim(($_POST['bb']));
	$ifsc = trim(($_POST['ifcs']));
	$accno = trim(($_POST['acno']));
	$level1 = trim(($_POST['level1']));
	$level2 = trim(($_POST['level2']));
	$level3 = trim(($_POST['level3']));
	$level4 = trim(($_POST['level4']));
	$level5 = trim(($_POST['level5']));
	$level6 = trim(($_POST['level6']));
	$level7 = trim(($_POST['level7']));
	$childname = trim(($_POST['childname']));
   

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
       $sql = "update emp set emp_name='$emp_name',DOB ='$DOB',gender='$gender',maritalstatus='$maritalstatus',contactno='$contactno',alternateno='$alternateno',
       adharcardno='$adharcardno',address='$address',city='$city',state='$state',qualification='$qualification',experience='$experience',DOJ='$DOJ',fname='$fname',mname='$mname',
       rno='$rno',wname='$wname',nok='$nok',childname='$childname',pan='$pan',designation='$designation',ESI_NO='$ESI_NO',PFNO='$PFNO',photo='$fileName15',emp_email='$emp_email',username='$username',password='$password',bname='$bname'
       ,branch='$branch',ifsc='$ifsc',accno='$accno',level1='$level1',level2='$level2',level3='$level3',level4='$level4',level5='$level5',level6='$level6',level7='$level7',tshirt='$tshirt',tshtdt='$tshtdt',tsize='$tsize',phant='$phant',phtdt='$phtdt',psize='$psize',
       sshoes='$sshoes',shoesdt='$shoesdt',ssize='$ssize', idcard='$idcard',idcarddt='$idcarddt'
       where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {
        
        for($i=1;$i<7;$i++)
         {
          $certid = trim($_POST['certid'.$i]);
          echo $cername=trim($_POST['cname'.$i]);   
          $cerno=trim($_POST['cno'.$i]);
         if($cername!='' && $certid!=''){
          $x2="update certificates set cername = '$cername' ,cerno= '$cerno' where id='$certid' and employeeid='$employeeid'";
        
         $res2 = mysqli_query($link, $x2) or die("could not connected" . mysqli_error($link)); 
          }
          else if($cername!='' && $certid==''){
              $x3="insert into certificates(cername,cerno,employeeid) 
            values('$cername','$cerno','$employeeid')";

            $res3 = mysqli_query($link, $x3) or die("could not connected" . mysqli_error($link)); 
          }

//if it is successfully update then display alert box in form
       
    }
    $iname=$_FILES['empimg']['name'];
    //echo("file name is ".$iname);
   if($iname!=""){
				 //echo "hi";
				 
	$iname =$employeeid.'empimg';
	$tmp = $_FILES['empimg']['tmp_name'];
	
	 $dir = "empphotos";
    $destination =  $dir . '/' . $iname;
	move_uploaded_file($tmp, $destination);
	$empPath = $photoFullPath.''.$destination;
	echo $empPath;
	$insertempimg="update emp set photo='$empPath' where empid='$id'";
 
    $insertempimgres = mysqli_query($link, $insertempimg) or die("could not connected" . mysqli_error($link));
 
	}
	
	$iname=$_FILES['adharimg']['name'];
	if($iname!=""){
				 echo "hi";
				 
	$iname =$employeeid.'adharimg';
	$tmp = $_FILES['adharimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
	$adharPath = $photoFullPath.''.$destination;
    $insertadharimg="update emp set adharphoto='$adharPath' where empid='$id' ";
 
    $insertadharimgres = mysqli_query($link, $insertadharimg) or die("could not connected" . mysqli_error($link));
	}
	
	$iname=$_FILES['panimg']['name'];
	if($iname!=""){
				 echo "hi";
				 
	$iname =$employeeid.'panimg';
	$tmp = $_FILES['panimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
		       $panPath = $photoFullPath.''.$destination;
		       $insertpanimg="update emp set panphoto='$panPath' where empid='$id' ";
 
    $insertpanimgres = mysqli_query($link, $insertpanimg) or die("could not connected" . mysqli_error($link));
	}
	
	$iname=$_FILES['bankimg']['name'];
	if($iname!=""){
				 echo "hi";
				 
	$iname =$employeeid.'bankimg';
	$tmp = $_FILES['bankimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
		        $bankPath = $photoFullPath.''.$destination;
		       $insertbankimg="update emp set bphoto='$bankPath' where empid='$id' ";
 
    $insertbankimgres = mysqli_query($link, $insertbankimg) or die("could not connected" . mysqli_error($link));
	}
    print "<script>";
        print "alert('Successfully Uploaded ');";
        //print "self.location='employeelist.php';";
        print "</script>";
   
    }
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from emp where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
$t=mysqli_fetch_array($res);
	$acyear=$t['lname'];
	$id1=$t['empid'];
	$city=$t['city'];
	$emp_email=$t['emp_email'];
	$emp_name=$t['emp_name'];
	$username=$t['username'];
	$password=$t['password'];
	$eid=$t['employeeid'];
	  $fname= $t['fname'];
    $mname= $t['mname'];
    $relation= $t['relation'];
     $rno= $t['rno'];
	$dob=$t['DOB'];
		$doj=$t['DOJ'];
	$gender=$t['gender'];
	$adhar=$t['adharcardno'];
	$pf=$t['PFNO'];
	$pan=$t['pan'];
	$uan=$t['uan'];
	$ESI_NO=$t['esi'];
	$qualification=$t['qua'];
	$experience=$t['exp'];
	$designation=$t['des'];
	$address=$t['address'];
		
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	
    $data = htmlspecialchars($data);
    return $data;
}

