<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Relieving cum Experience letter</title>
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
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="window.close();"/>
								</div>
<div class="book">
 <div class="page">
      <div class="pageborder">
        
       
         
        <?php 
			include('dbconnection/connection.php');
		$id=$_REQUEST['id'];
		$q=mysqli_query($link,"select * from emp where empid='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
	$fname=$row['fname'];
		$name=$row['emp_name'];
		$designation=$row['designation'];
		$uan=$row['uan'];
		$DOJ=$row['DOJ'];
		$DOR=$row['DOR'];
	
		 ?>
		 <?php
		 	//include('dbconnection/connection.php');
		 
	
		 ?>
	    <img src="images/apjyothi.jpg" style="width:100%">

		 	<p>Date:<b><?php 
        echo date('d-m-Y'); ?></b></p>			
		 	
          <h2 align="center"><u>TO WHOM SO EVER IT MAY CONCERN</u></h2>
        <div>
         <p><b>Sub:Relieving cum Experience letter.</b></p>
        
        <p>This is to certify that Mr/Mrs. <?php echo $name; ?>&nbsp; D/o / S/o.<?php echo $fname; ?> was employed with us as an      ‘<?php echo $designation; ?>’ in our company, from <?php echo $DOJ; ?> &nbsp;to <?php echo $DOR; ?>. </p>
           
         <p>Her/His roles and responsibilities are given below as our employee.</p>         
              <p><?php echo $address; ?></p>    
          <br/>
          <p>PF UAN No.<?php echo $uan; ?></p>
          <p>Retention bonus:Not Applicatble</p>
          <p>During the period we found her sincere, hardworking and a keen learner. </p>
          <p>We wish her all the best in his future endeavors.</p>
          <p>For Jyothi Facility Management,</p><br/><br/>
          <p  align="left">Authorized Signatory.</p>
          <br/><br/><br/><br/><br/>
	   </div>
        </div>
        </div>
        </div>
</body>
</html>