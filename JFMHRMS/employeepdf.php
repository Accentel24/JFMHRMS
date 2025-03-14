<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/uqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong{
            color:red;
        }
        table, th, td {
  border: 1px solid black;
 
}
table{
     width:100%;
}
    </style>
    <body class="no-skin">
        
         <?php 
         
         ob_start();?>

       
							
                      <?php $id=$_GET['id'];

//include('config.php');

$res=mysqli_query($link,"select * from emp where empid='$id'") or die(mysqli_error());
$rw=mysqli_fetch_array($res) or die(mysqli_error());
//$to=$rw['btype'];
//$msg=$rw['msg'];
$employeeId = $rw['employeeid'];
//echo($employeeId);
$certquery = mysqli_query($link,"select * from certificates where employeeid = '$employeeId'");
$crows=mysqli_num_rows($certquery);
//echo($check_num_rows);


 ?>         
                             <table border='1' style="width:90%" align="center" cellpadding="0" cellspacing='0'>
			<thead>
				<tr class="noBorder">
					<th colspan="14" style="border-right:none !important;font-size:18px;">
						<img src="images/exel_logo.jpg" />
					</th>
				</tr>
			</thead>
		
			</table>   
                                
            <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Employee Info</h1></p>
												   </div>
                                            <table  style="border:1px solid black;width:100%;" >
                                           <tr style="border:1px solid black;">
											    <td style="border:1px solid black; bold;" ><b>State</b></td>
											    <td style="border:1px solid black;"><?php echo $rw['state']; $state=$rw['state'];?></td>
											    <td style="border:1px solid black;bold;" ><b>Employee ID</b></td>
											     <td style="border:1px solid black;"><?php echo $rw['employeeid']?></td>
											</tr>     
											<tr style="border:1px solid black;">
											    <td style="border:1px solid black;" ><b>Name of Employee </b></td>
											    <td style="border:1px solid black;"><?php echo $rw['emp_name']?> </td>
											    <td style="border:1px solid black;" ><b>DOB</b></td>
											     <td style="border:1px solid black;"><?php echo date('Y-m-d',strtotime($rw["DOB"])) ?></td>
											</tr>
											  <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Gender</b></td><td style="border:1px solid black;" >
											

  <?php echo $rw['gender']?>
  
  
											</td>
											
                                            
                                        
											  
                                        <td style="border:1px solid black;" ><b>Marital Status</b></td>
										<td style="border:1px solid black;">
										<?php echo $rw['maritalstatus']?>
										</td>
                                        </tr>
                                        <tr style="border:1px solid black;" >
										  
										   <td style="border:1px solid black;" ><b>Wife  Name</b></td>
										   <td style="border:1px solid black;" >
											<?php echo $rw['wname']?></td> 
										    
										 <td style="border:1px solid black;" ><b>No of kids</b></td><td style="border:1px solid black;" >
											<?php echo $rw['nok']?></td> 
										 	
											 
										   </tr>
										   <tr style="border:1px solid black;">
										   <td style="border:1px solid black;" ><b>Children Names</b></td>
										 	<td style="border:1px solid black;" >
											   <?php echo $rw['childname']?>
											</td>
											</tr>
											   <tr style="border:1px solid black;">
											
											<td style="border:1px solid black;" ><b>Father  Name</b></td><td style="border:1px solid black;" >
											<?php echo $rw['fname'] ?></td>
                                      
											
											<td style="border:1px solid black;" ><b>Mother Name</b> </td><td style="border:1px solid black;" >
											<?php echo $rw['mname'] ?>
											
											</td>
</tr>
                                            <tr style="border:1px solid black;">
											
											<td style="border:1px solid black;" ><b>Contact No.</b></td><td style="border:1px solid black;" >
											<?php echo $rw['contactno']?></td>
                                      
											
											<td style="border:1px solid black;" ><b>Alternate Contact No.</b> </td><td style="border:1px solid black;" >
<?php echo $rw['alternateno']?>"
											
											</td>
</tr>
<tr style="border:1px solid black;">
<td style="border:1px solid black;" ><b>Family Member Contact No.</b> </td>
<td style="border:1px solid black;" >


     <?php echo $rw['relation']."- ".$rw['rno'];?>

</td>
<td style="border:1px solid black;" ><b>Email Id</b></td><td style="border:1px solid black;">
									<?php echo $rw['emp_email']?></td>
</tr>
                                        
                                          <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Adhar No</b></td><td style="border:1px solid black;" >
										<?php echo $rw['adharcardno']?></td>
										 <td style="border:1px solid black;" ><b> Adhar Photo</b></td><td style="border:1px solid black;" >
										
										</td>
                                        
                                        </tr>
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>PAN No</b>.</td><td style="border:1px solid black;">
										<?php echo $rw['pan']?></td>
										<td style="border:1px solid black;" ><b> PAN Card Photo</b></td><td style="border:1px solid black;" >
									
										</td>
										</tr>
										<tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>UAN No.</b></td><td style="border:1px solid black;">
									<?php echo $rw['uan']?></td>
                                         <td style="border:1px solid black;" ><b>PF No.</b></td><td style="border:1px solid black;">
										<?php echo $rw['PFNO']?></td>
                                        </tr>
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>ESI No.</b></td><td style="border:1px solid black;" >
										<?php echo $rw['ESI_NO']?></td>
                                     <td style="border:1px solid black;" ><b>DOJ</b></td><td style="border:1px solid black;" >
										<?php echo date('Y-m-d',strtotime($rw["DOJ"])) ?></td>
                                        </tr>
											 <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Qualification</b></td><td style="border:1px solid black;" >
									<?php echo $rw['qualification']?></td>
                                       <td style="border:1px solid black;" ><b>Experience</b></td><td style="border:1px solid black;">
									<?php echo $rw['experience']?></td>
                                        </tr>
                                         <tr style="border:1px solid black;">
                                          <td style="border:1px solid black;" ><b> Designation</b></td><td style="border:1px solid black;">
										 <?php echo $rw['designation']?>
										  <td style="border:1px solid black;" ><b>Photo</b></td><td style="border:1px solid black;" >
										
										    </td>
                                        </tr>	  
                                        <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>Address</b></td><td style="border:1px solid black;" >
										
										<?php echo $rw['address']?></td>
										<td style="border:1px solid black;" ><b>City</b></td><td style="border:1px solid black;" >
										 <?php echo $rw['city']?></td>
										</tr>
										
										 
                                    
										  <tr style="border:1px solid black;"><td style="border:1px solid black;" ><b>User Name</b></td><td style="border:1px solid black;" >
									<?php echo $rw['username']?>
										</td>
                                       
                                        </tr>
                                        
									   </table>		
                                        	
                                                  <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Bank Details</h1></p>
												   </div>  
                                                   <table  style="border:1px solid black; width:100%;">
                                                    
												   <tr style="border:1px solid black;">
									
                                          <td style="border:1px solid black;" > <b>Bank Name.</b></td><td style="border:1px solid black;">
										 <?php echo $rw['bname']?></td>
										  <td style="border:1px solid black;" ><b>Branch of Bank</b></td><td style="border:1px solid black;" >
										<?php echo $rw['branch']?>
										</td>
										  <td style="border:1px solid black;" ><b>IFSC Code</b></td><td style="border:1px solid black;" >
										<?php echo $rw['ifsc']?>
										</td>
                                        </tr>
                                        
                                        <tr style="border:1px solid black;">
                                        
                                          <td style="border:1px solid black;" ><b> Account No.</b></td><td style="border:1px solid black;">
										  <?php echo $rw['accno']?>
										 
										  <td style="border:1px solid black;" ><b>Photo of Passbook/ Cancelled Cheque</b></td><td style="border:1px solid black;" >
										
										</td>
                                        </tr>
                                       
												   </table>
												   
												   
                                                  <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Uniform Details</h1></p>
												   </div>  
                                                   <table  style="border:1px solid black; width:100%;">
                                                    
												   <tr style="border:1px solid black;">
									
                                          <td style="border:1px solid black;" > <b>T-Shirt</b></td><td style="border:1px solid black;">
										 <?php echo $rw['tshirt']?></td>
										  <td style="border:1px solid black;" ><b>T-Shirt Size</b></td><td style="border:1px solid black;" >
										<?php echo $rw['tsize']?>
										</td>
										  <td style="border:1px solid black;" ><b>T-Shirt Issue Date</b></td><td style="border:1px solid black;" >
										<?php echo $rw['tshtdt']?>
										</td>
                                        </tr>
                                        
                                        <tr style="border:1px solid black;">
                                        
                                          <td style="border:1px solid black;" ><b> Account No.</b></td><td style="border:1px solid black;">
										  <?php echo $rw['accno']?>
										 
										  <td style="border:1px solid black;" ><b>Photo of Passbook/ Cancelled Cheque</b></td><td style="border:1px solid black;" >
										
										</td>
                                        </tr>
                                       
												   </table>
												   <br/>
												   <div style=" text-align: center;background-color: rgba(0, 0, 255, 0.3);">
												   <p ><h1>Employee Position</h1></p>
												   </div>
												   <table  style="border:1px solid black; width:100%;" >
                                                     
                                                   
												   <tr  style="border:1px solid black;">
									
                                          <td style="border:1px solid black;" > <b>Level 1</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level1']?></td>
										   <td style="border:1px solid black;" > <b>Level 2</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level2']?></td>
										   <td style="border:1px solid black;" > <b>Level 3</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level3']?></td>
										  <td style="border:1px solid black;" > <b>Level 4</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level4']?></td>
                                        </tr>
                                        
                                        <tr style="border:1px solid black;">
                                        
                                          <td style="border:1px solid black;" > <b>Level 5</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level5']?></td>
										   <td style="border:1px solid black;"> <b>Level 6</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level6']?></td>
										   <td style="border:1px solid black;" > <b>Level 7</b></td><td style="border:1px solid black;">
										  <?php echo $rw['level7']?></td>
										  
                                        </tr>
                                       
												   </table>
												   
												   
                                               
									
										
                                      
                                        
                                      
                                  
                                        
                                        
                                        
		<!-- inlin
<?php
mysqli_close($link); 
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
    $qtno="employeeinfo.pdf";
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

require_once __DIR__ .'/vendor/autoload.php';
//$mpdf=new \mPDF('c','A4','','',10,10,10,10,0,0);
$mpdf= new \Mpdf\Mpdf();
$mpdf->writeHTML($body);
$mpdf->Output($qtno,'F');

echo  "<script type=\"text/javascript\"> 
 

   location.href = 'download.php?qt=$qtno';
   setTimeout(\"DoTheRedirect('employeelist.php?state=$state')\",parseInt(2*1000));
function DoTheRedirect(url) { window.location=url; }

</script>";
	

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>