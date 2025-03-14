<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>NOC</title>
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
	font-size:16px;
  
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
		$q=mysqli_query($link,"select * from add_noc where id='$id'") or die(mysqli_error($link));
		$row=mysqli_fetch_array($q);
	$apdate=$row['apdate'];
		$name=$row['name'];
		$address=$row['address'];
		$state=$row['state'];
		$join_date=$row['join_date'];
		$location=$row['location'];
	$sal_th=$row['sal_th'];
		$certi1=$row['certi1'];
		$certi2=$row['certi2'];
		
		$category=$row['category'];
	    $desig=$row['desig'];
		 ?>
		 <?php
		 	//include('dbconnection/connection.php');
		 
	
		 ?>
	
		 				
		 <h1 align="center"><u>JYOTHI FACILITY MANAGEMENT PVT LTD</u></h1>	
          <h3 align="center"><u>No Due</u></h3>
        <div>
<table >
    <tr><td>Employee ID:</td><td></td>
    <td>Name of the Employee:</td> <td></td></tr>
     
      <tr><td>Designation:</td><td></td>
       <td>Location:</td> <td></td></tr>
       
       <tr><td>Date of Joining:</td> <td></td>
       <td>Reason for Resignation: </td> <td></td></tr>
</table>
   
        
                                           
                                            <table id="table" >

														<th>S.No</th>
														<th>Criteria</th>
														<th> Remarks</th>
                                                        <th>Recoverable Value</th>
                                                     
														<tbody>
                                                       <tr><td>1</td>
                                              <td>Resign letter given or not</td>
                                              <td>   </td>
                                             
										  
                                              </tr>
                                             <tr><td>2</td>
                                              <td>Notice period done or no</td>
                                              <td>   </td>
                                              </tr>
                                              
                                              <tr><td>3</td>
                                              <td>Uniform (T-Shirts - 2 or more) returned or not</td>
                                              <td>  </td>
                                              <td> </td>
                                              </tr>
                                              
                                              
                                              <tr><td>4</td>
                                              <td>ID card returned or not</td>
                                              <td>  </td>
                                              <td>   </td>
                                              </tr>
                                              
											   <tr><td>5</td>
                                              <td>Safety shoe returned or not</td>
                                              <td>  </td>
                                              <td>  </td>
                                              
                                              </tr>
                                                 <tr><td>6</td>
                                              <td>Tools returned or not (If any shortage mention tool and Value)</td>
                                              <td> </td>
                                              <td> </td>
                                              </tr>
                                                 <tr><td>7</td>
                                              <td>Supervisor feedback on No due clearance</td>
                                              <td>  </td>
                                              
										
                                              </tr>
                                                 <tr><td>8</td>
                                              <td>Any salary advance pending</td>
                                              <td> </td>
                                              <td> </td>
                                              </tr>
                                              
                                                <tr><td>9</td>
                                              <td>If wireman certificate applied through company, related amount paid company or not</td>
                                              <td> </td>
                                              <td> </td>
                                              </tr>
                                              
                                                <tr><td>10</td>
                                              <td>If any other Dues to companies</td>
                                              <td> </td>
                                              <td> </td>
                                              </tr>
                                                        
                                                    
                                                    
                                        
										</tbody>
                                        </table>
                                        <br/><br/><br/>
          <p  align="right">Authorized Signatory</p>
          
          </div>
        </div>
        </div>
        </div>
</body>
</html>