<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
include '../dbconnection/connection.php';


error_log("called");
//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    error_log("inside submit ");
    $photoFullPath = "http://softdemo.in/hrms/";
    //reading form data
    //$empid=trim($_POST['empid']);
    echo $emp_name = trim($_POST['empname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $maritalstatus = trim($_POST['marstatus']);
    $contactno = trim($_POST['conno']);
    $alternateno = trim($_POST['aconno']);
    $adharcardno = trim($_POST['adhar']);
    $address = trim($_POST['address']);
    $fname=trim($_POST['fname']);
    $wname=trim($_POST['wname']);
    $mname=trim($_POST['mname']);
    $relation=trim($_POST['rel']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $qualification = trim($_POST['qua']);
    $experience = trim($_POST['exp']);
    $DOJ = trim($_POST['doj']);
    $designation = trim($_POST['des']);
    $UANNO = trim($_POST['uan']);
    $PANNO = trim($_POST['pan']);
    $ESI_NO = trim($_POST['esi']);
    $PFNO = trim($_POST['pf']);
    //$photo= trim($_POST['img1']);
	$emp_email = trim(($_POST['email']));
	$username = trim(($_POST['uname']));
	$password = trim(($_POST['pwd']));
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
	
   $user=trim($_POST['user']);
   $employeeid='JFM'.'$state';
   
ECHO $x="insert into emp(emp_name,DOB,gender,maritalstatus,contactno,alternateno,adharcardno,address,city,state,qualification,experience,
 DOJ,designation,uan,pan,ESI_NO,PFNO,photo,emp_email,username,password,user,bname,branch,ifsc,accno,level1,level2,level3,level4,level5,level6,level7,childname,fname,mname,wname,relation,tshirt,tshtdt,tsize,phant,phtdt,psize,sshoes,shoesdt,ssize,idcard,idcarddt) 
 values('$emp_name','$dob','$gender','$maritalstatus','$contactno','$alternateno','$adharcardno','$address','$city','$state','$qualification','$experience',
 '$DOJ','$designation','$UANNO','$PANNO','$ESI_NO','$PFNO',' $fileName15','$emp_email','$username','$adharcardno','$user','$bname','$branch','$ifsc','$accno','$level1','$level2','$level3','$level4','$level5','$level6','$level7','$childname','$fname','$mname','$wname','$relation','$tshirt','$tshtdt','$tsize','$phant','$phtdt','$psize','$sshoes','$shoesdt','$ssize','$idcard','$idcarddt')";
 $res = mysqli_query($link, $x) or die("could not connected" . mysqli_error($link));
 //if the form variables are not empty then update data into database
 error_log("query done");
    if ($res) {
         $last_id = $link->insert_id;
         $employeeid='JFM'.$state.$last_id;
$x1="update emp set employeeid='$employeeid',username='$employeeid' where empid='$last_id' ";
 
 $res1 = mysqli_query($link, $x1) or die("could not connected" . mysqli_error($link));
 
 for($i=1;$i<7;$i++)
 {
  echo $cername=trim($_POST['cname'.$i]);   
  $cerno=trim($_POST['cno'.$i]);
  if($cername!=''){
  $x2="insert into certificates(cername,cerno,employeeid) 
 values('$cername','$cerno','$employeeid')";

 $res2 = mysqli_query($link, $x2) or die("could not connected" . mysqli_error($link)); 
  }
  

  
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
}
$iname=$_FILES['empimg']['name'];
   if($iname!=""){
				// echo "hi";
				 
	$iname =$employeeid.'empimg';
	$tmp = $_FILES['empimg']['tmp_name'];
	
	 $dir = "empphotos";
    $destination =  $dir . '/' . $iname;
	move_uploaded_file($tmp, $destination);
	$empPath = $photoFullPath.''.$destination;
	$insertempimg="update emp set photo='$empPath' where empid='$last_id' ";
 
    $insertempimgres = mysqli_query($link, $insertempimg) or die("could not connected" . mysqli_error($link));
 
	}
	
	$iname=$_FILES['adharimg']['name'];
	if($iname!=""){
				// echo "hi";
				 
	$iname =$employeeid.'adharimg';
	$tmp = $_FILES['adharimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
	$adharPath = $photoFullPath.''.$destination;
    $insertadharimg="update emp set adharphoto='$adharPath' where empid='$last_id' ";
 
    $insertadharimgres = mysqli_query($link, $insertadharimg) or die("could not connected" . mysqli_error($link));
	}
	
	$iname=$_FILES['panimg']['name'];
	if($iname!=""){
				// echo "hi";
				 
	$iname =$employeeid.'panimg';
	$tmp = $_FILES['panimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
		       $panPath = $photoFullPath.''.$destination;
		       $insertpanimg="update emp set panphoto='$panPath' where empid='$last_id' ";
 
    $insertpanimgres = mysqli_query($link, $insertpanimg) or die("could not connected" . mysqli_error($link));
	}
	
	$iname=$_FILES['bankimg']['name'];
	if($iname!=""){
				// echo "hi";
				 
	$iname =$employeeid.'bankimg';
	$tmp = $_FILES['bankimg']['tmp_name'];
	
	 $dir = "empphotos";
		       $destination =  $dir . '/' . $iname;
		       move_uploaded_file($tmp, $destination);
		        $bankPath = $photoFullPath.''.$destination;
		       $insertbankimg="update emp set bphoto='$bankPath' where empid='$last_id' ";
 
    $insertbankimgres = mysqli_query($link, $insertbankimg) or die("could not connected" . mysqli_error($link));
	}
	
	//inserting into jfm2324 db
$link1=mysqli_connect("localhost","a16673ai_payamath","Payamath@2016","a16673ai_jfm2324");
	$xx="insert into emp(emp_name,DOB,gender,maritalstatus,contactno,alternateno,adharcardno,address,city,state,qualification,experience,
 DOJ,designation,uan,pan,ESI_NO,PFNO,photo,emp_email,username,password,user,bname,branch,ifsc,accno,level1,level2,level3,level4,level5,level6,level7,childname,fname,mname,wname,relation,tshirt,tshtdt,tsize,phant,phtdt,psize,sshoes,shoesdt,ssize,idcard,idcarddt) 
 values('$emp_name','$dob','$gender','$maritalstatus','$contactno','$alternateno','$adharcardno','$address','$city','$state','$qualification','$experience',
 '$DOJ','$designation','$UANNO','$PANNO','$ESI_NO','$PFNO',' $fileName15','$emp_email','$username','$adharcardno','$user','$bname','$branch','$ifsc','$accno','$level1','$level2','$level3','$level4','$level5','$level6','$level7','$childname','$fname','$mname','$wname','$relation','$tshirt','$tshtdt','$tsize','$phant','$phtdt','$psize','$sshoes','$shoesdt','$ssize','$idcard','$idcarddt')";
 $res = mysqli_query($link1, $xx) or die("could not connected" . mysqli_error($link1));
  $last_id = $link1->insert_id;
$xxx="update emp set employeeid='$employeeid',username='$employeeid' where empid='$last_id' ";
$res1 = mysqli_query($link1, $xxx) or die("could not connected" . mysqli_error($link1));

$link2=mysqli_connect("localhost","a16673ai_payamath","Payamath@2016","a16673ai_jfm2425");
	$xx="insert into emp(emp_name,DOB,gender,maritalstatus,contactno,alternateno,adharcardno,address,city,state,qualification,experience,
 DOJ,designation,uan,pan,ESI_NO,PFNO,photo,emp_email,username,password,user,bname,branch,ifsc,accno,level1,level2,level3,level4,level5,level6,level7,childname,fname,mname,wname,relation,tshirt,tshtdt,tsize,phant,phtdt,psize,sshoes,shoesdt,ssize,idcard,idcarddt) 
 values('$emp_name','$dob','$gender','$maritalstatus','$contactno','$alternateno','$adharcardno','$address','$city','$state','$qualification','$experience',
 '$DOJ','$designation','$UANNO','$PANNO','$ESI_NO','$PFNO',' $fileName15','$emp_email','$username','$adharcardno','$user','$bname','$branch','$ifsc','$accno','$level1','$level2','$level3','$level4','$level5','$level6','$level7','$childname','$fname','$mname','$wname','$relation','$tshirt','$tshtdt','$tsize','$phant','$phtdt','$psize','$sshoes','$shoesdt','$ssize','$idcard','$idcarddt')";
 $res = mysqli_query($link2, $xx) or die("could not connected" . mysqli_error($link2));
  $last_id = $link2->insert_id;
$xxx="update emp set employeeid='$employeeid',username='$employeeid' where empid='$last_id' ";
$res1 = mysqli_query($link2, $xxx) or die("could not connected" . mysqli_error($link2));
 
//if it is successfully update then display alert box in form
      print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='employeelist.php?state=$state';";
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

