<?php 
include('dbconnection/connection.php');
session_start();
$state = $_GET['state'];
if($_SESSION['user'])
{
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function validate(){
var emp_value ="";
	//var selected=false;
  for (var i=0; i < document.docpat.empid.length; i++){
   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){

	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="emps_popup1.php"
			  url=url+"?empid="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("GET",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		  //alert(showdata);
		  var strar = showdata.split("#");
		
		  if(strar.length>0){
			 //window.opener.location.reload();
			 //window.location.reload(); 
	 //alert(strar.length);
		//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;

	//alert('<%=current_date%>')
	
			opener.document.getElementById("empname").value=strar[0];
			//opener.document.getElementById("fname").value=strar[1];
			opener.document.getElementById("designation").value=strar[2];
			opener.document.getElementById("empid").value=strar[3];
			//opener.document.getElementById("address").value=strar[4];
			opener.document.getElementById("DOJ").value=strar[5];
			//opener.document.getElementById("dor").value=strar[6];
			
			

			
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
	</head>

	<body>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names or Employee Id">
	
                      <!-- <form name="frm" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td></td><td>Search: <input type="text" name="emp_name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>-->

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>EMPLOYEEID.</TH><TH>EMPLOYEE NAME</TH><TH>DOJ</TH></tr>
<?php 
			  include("dbconnection/connection.php");
			  
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['emp_name'];
					
			    if($n != "")
				{
					$sq=mysqli_query($link,"select  empid,emp_name,DOJ from emp where state = '$state'");
				}
			   if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['empid'];
			  $h = $res['emp_name'];
			  $r = $res['DOJ'];
			  $emid=$res['employeeid'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $emid ?></td><td><?php echo $h ?></td><td><?php echo $r;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				  $x="select empid,emp_name,DOJ,employeeid from emp where state = '$state'";
				$sq=mysqli_query($link,$x) or die(mysqli_error($link));
	 
			if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['empid'];
			  $h = $res['emp_name'];
			$r=$res['DOJ'];
			$emid=$res['employeeid'];
			 ?>
             <tr height="25px">
			 <td style="text-align:center;">
             <input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/><?php echo $emid ?></td>
			 <td><?php echo $h ?></td>
			 <td><?php echo $r;?></td>
			 
			 </tr>
             <?php }
			 
			 }
			 }
			 ?></table>
              <?php if($rows==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
	
	
</body>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("expense_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    td1 = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText  ;
      txtValue2 = td1.textContent || td1.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</html>
<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>