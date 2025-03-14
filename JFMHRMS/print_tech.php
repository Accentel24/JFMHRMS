<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Technician</title>
<script language="JavaScript" type="text/javascript">


function prnt(){
	

document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
<style>
@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:120px;
	font:"Times New Roman", Times, serif;
	font-size:12px;
  
}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
 .text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 8px 10px;
		width:200px;
    }
    
    .pageborder {
      position:relative;
      left: 0;
      right: 2px;
      top: 0;
      bottom: 0;
      border: 2px solid black;
    }
  
</style>
</head>

<body>
<div align="center" style="border:#CC6666">
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="window.close("");"/>
								</div>
<div class="book">
 <div class="page">
      <div class="pageborder">
        
       
         
        <?php 
			include('dbconnection/connection.php');
		$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from emp e where empid='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
	$apdate=$row['apt_date'];
		$name=$row['emp_name'];
		$address=$row['address'];
		$state=$row['state'];
		$join_date=$row['DOJ'];
		$location=$row['branch'];
	$sal_th=$row['sal_th'];
		//$certi1=$row['cert'];
		//$certi2=$row['certi2'];
		
		$category=$row['branch'];
	    $desig=$row['designation'];
		 ?>
		 <?php
		 	//include('dbconnection/connection.php');
		 
	
		 ?>
	
		 				
		 <img src="images/apjyothi.jpg" style="width:100%">	
          <h2 align="center"><u>LETTER OF APPOINTMENT</u></h2>
        <div>

        <p>Date:<b><?php 
        $t = strtotime($apdate);
        echo date('d-m-Y',$t);
        //echo date_format($apdate,"d-m-Y"); ?></b></p>
        <p>To:
        <br/><b><?php echo $address; ?></b></p>
           <p>Dear <b> Mr.<?php echo $name; ?></b></p>
           <p><b>Sub: Letter of Appointment-Reg.</b></p>
           <p>We are pleased to appoint you as a <b><?php echo $desig; ?></b>&nbsp;in our organization</p>
            
             <p><b>Job description:</b></p>
             <ul>
                 <li><p>Coordination for CM and PM execution at stores according to the schedules given.</p></li>
                 
                 <li><p>Coordination for works execution at Client sites.</p></li>
                 
                 <li><p>Further roles and responsibility will be shared by the Technical Manager.</p></li>
                  </ul>
                  
                   <p>Start Date:<b><?php echo $join_date; ?></b></p>
        <p>Location:<b><?php echo $location; ?></b></p>
           <p>Salary Take Home:<b><?php echo $sal_th; ?></b></p>
           <p>Employment as per this offer is subject to your being medically fit.</p>
           <p>Please sign and return duplicate copy of this letter in token of your acceptance.**</p>
                  
       <p>&nbsp;&nbsp;&nbsp;&nbsp; We congratulate you on your appointment and wish you a long and successful career with us. 
       We are confident that your contribution will take us further in our journey towards becoming world leaders.
       We assure you of our support for your professional development and growth.</p>
		 
</div>
		 </div>
		 </div>
		 <div class="pagebreak"> </div>
<div class="book">
		  <div class="page">
		 <div class="pageborder">
		 <p><b>Terms & Conditions:</b></p>
          <ol>
              <li><p>If you want to resign your job you must give a notice period of 1 month by written communication.</p></li>
              <li><p>Monthly salary will be calculated from 26th to 25th of Next month.</p></li>
               <li><p>Notice period salary will be settled along with No due at the time of Full and Final Settlement.</p></li>
              <li><p>If you are absent to your duties without intimation continuously for 7 days (including weekly off) then we consider this as your resigned to your duties and we will replace fill this vacancy with some other suitable profile without any notice.</p></li>
              <li><p>If we found that you’re involved in any theft/misappropriations in duties then you will be terminated from your duties with immediate effect without any notice.</p></li>
              <li><p>If any escalations received from our customers on your poor performance then you will be terminated from your duties with a minimal days of duration as a notice period of 10 days.</p></li>
              <li><p>At any period of a financial year company have reserved the right to change your working location, if fails to follow that instruction then we will consider this as you are resigned to your duties.</p></li>
              <li><p>You must produce your attendance sheet monthly wise from your respective working location and according to that sheet salary will be credited.</p></li>
              <li><p>If found any deviations in roles assigned given in Job description, 40% of net salary will be kept in hold for every month at the time of salary credit and the same amount will be credited after confirmation from your respective Coordinator/Manager.</p></li>
              <li><p>Full and Final Settlement will be made at Head Office only after successful completion of notice period for 1 month.</p></li>
               
        
          <br/>
          <p  align="right">Acceptance of Terms & Conditions by the Candidate.</p>
          <br/><br/><br/><br/><br/>
	   </div>
        </div>
        </div>
        </div>
</body>
</html>