<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include('../dbfiles/etool_list.php');
include'dbfiles/org.php';
include'dbfiles/iqry_emp.php';
?>
<!DOCTYPE html>
<html lang="en">


<script>

function showHint52()
{
var str=document.getElementById("mrno").value;
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("patno").value=strar[1];
	
	document.getElementById("patname").value=strar[2];
	document.getElementById("fname").value=strar[3];
	document.getElementById("age").value=strar[4];
	document.getElementById("sex").value=strar[5];
	document.getElementById("doa").value=strar[6];
	document.getElementById("dichargedate").value=strar[7];
	document.getElementById("address").value=strar[8];
	document.getElementById("doctors").value=strar[9];
	document.getElementById("mobile").value=strar[10];
	var adate=document.getElementById("doa").value;
	var ddate=document.getElementById("dichargedate").value;
	showUser(str,adate,ddate);
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search166.php?q="+str,true);
xmlhttp.send();
}
function showUser(str,adate,ddate) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	
	document.getElementById("tlamount").value=strar[1];
	document.getElementById("ladamount").value=strar[2];
	document.getElementById("lbamount").value=strar[3];
	document.getElementById("hadamount").value=strar[4];

    }
  }
  xmlhttp.open("GET","search311.php?q="+str+"&adate="+adate+"&ddate="+ddate,true);
  xmlhttp.send();
}
</script>





 <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
   
   
   
   
   
   
   
   
   

   
   
 







<script>
function showHint5(str)
{
//var str=document.getElementById('mrno').value;
if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	
	document.getElementById("patname").value=strar[1];
	document.getElementById("age").value=strar[2];
	document.getElementById("sex").value=strar[3];
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search5.php?q="+str,true);
xmlhttp.send();
}

	</script>
<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
</style>
 <?php include'template/headerfile.php'; ?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
 <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>
    <style>
        strong{
            color:red;
        }
    </style>
  
 
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
           

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="qot_list"> Settings</a>
                            </li>
                            <li>
                                <a href=""> Assign Tools</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Assign Tools

                            </h1>
                        </div>
                        
                       
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                      <form name="frm" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
											<tr>
											  
											    <td align="right">Employee ID</td>
											     <td><input type="text" readonly value=""  readonly required name="empid" id="empid" class="form-control" onclick="window.open('employee_popup.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly"  required ></td>
												 <td align="right">Name of Employee </td>
											    <td><input  type="text"    class="form-control" readonly value="" required name="empname" id="empname"></td>
											</tr>
                                              <tr>
                                        <td align="right">State</td><td>
										<input type="text" required name="state" readonly id="state" class="form-control"></td>
										<td align="right"> Designation</td><td>
										  <input type="text" name="designation" id="designation" readonly required class="form-control"></td>
                                        </tr>   
									  <div align="right">

<button type="button" class='btn btn-success'  onclick="myFunction()">+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
										
                                        	<div class="form-group row">
                                                <div class="control-label col-md-6" >
                                                   <table class="table" >
												   <tr>
												   <th>Tool Name</th>
												   <th>Available Quantity</th>
												   <th>Quantity</th>
												  
												   </tr>
												   <?php 
												   $i=1;
												   foreach($result as $key=>$y){ ?>
												   <tr>
												   <td><input type="hidden" name="description[]"  data-row="<?php echo $i; ?>" id="description" value="<?php echo $y['tname'];?>"/><?php echo $y['tname'];?></td>
												     <td><input type="hidden" name="tqty[]"  data-row="<?php echo $i; ?>" id="tqty" value="<?php echo $y['tqty'];?>"/><?php echo $y['tname'];?></td>
												   <td><input type="text" name="days[]" id="days<?php echo $i; ?>" data-row="<?php echo $i; ?>" value="0" class='tet'/></td>
												  
												   </tr>
												   <?php $i++;}?>
												   </table>
                                                </div>
                                                												 
                                            </div>
                                        </table>
                                        
                                        <div>
   
                                            
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>
										
										
			

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="qot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div></div>
                                        </form>
                                        </div></div></div></div></div></div></div></div>
                                        </body>
                                        
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
									<script type="text/javascript">
		$(function(){
$('#hadamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#thamount').val());
    $('#hbamount').val(totalpoints - balance);
});



});

$(function(){
$('#drpamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tdramount').val());
    $('#drbal').val(totalpoints - balance);
});



});

$(function(){
$('#ladamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tlamount').val());
    $('#lbamount').val(totalpoints - balance);
});



});

$(function(){
$('#padamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tpamount').val());
    $('#pbamount').val(totalpoints - balance);
});



});
$(function(){
$('#concession').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#due').val());
    $('#namount').val(totalpoints - balance);
});



});
$(function(){
$('#procadamount').keyup(function() { 
    var balance = parseFloat($(this).val());
    var totalpoints = parseFloat($('#tprocamount').val());
    $('#procbamount').val(totalpoints - balance);
});



});
   
</script>

												
												
 
<script type="text/javascript">

$(document).on('keyup ','.tet',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );
	

	calculateTotal2();
	
	
	});
	
	
	
	$(document).on('keyup ','.tet4',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal3();
	
	});
	
	function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.tet4').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	$(document).on('keyup ','.tet2',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal4();
	
	});
	
	function calculateTotal4(){
	subTotal = 0 ; total = 0; 
	$('.tet2').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tlamount').val(subTotal.toFixed(2) );
	t=$('#tlamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	

}
	
	
	
	
	$(document).on('keyup ','.txt3',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal5();
	
	});
	
	function calculateTotal5(){
	subTotal = 0 ; total = 0; 
	$('.txt3').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tpamount').val(subTotal.toFixed(2) );
	t=$('#tpamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
		//var tt=document.getElementById("total").value;
//document.getElementById("total").value=eval(tt)+eval(t);

}
	
	$(document).on('keyup ','.txt8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal51();
	
	});
	
	function calculateTotal51(){
	subTotal = 0 ; total = 0; 
	$('.txt8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tprocamount').val(subTotal.toFixed(2) );
	t=$('#tprocamount').val();

	$('#txtTot1').val(subTotal.toFixed(2));
		//var tt=document.getElementById("total").value;
//document.getElementById("total").value=eval(tt)+eval(t);

}
	  //procadamount procbamount
	
	$(document).on('keyup ','.tet6',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal7();
	
	});
	
	function calculateTotal7(){
	subTotal = 0 ; total = 0; 
	$('.tet6').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#total').val(subTotal.toFixed(2) );
	t=$('#total').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	
	
	
	$(document).on('keyup ','.tet7',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal8();
	
	});
	
	function calculateTotal8(){
	subTotal = 0 ; total = 0; 
	$('.tet7').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#paid').val(subTotal.toFixed(2) );
	t=$('#paid').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	
	
	$(document).on('keyup ','.tet8',function(){
	
	id = $(this).attr('data-row');
	//alert(id);
	days = $('#days'+id).val();
	
	cost = $('#charge'+id).val();
		
	$amnt= $('#amount'+id).val( (parseFloat(days)*parseFloat(cost)).toFixed(2) );

	calculateTotal9();
	
	});
	
	function calculateTotal9(){
	subTotal = 0 ; total = 0; 
	$('.tet8').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#due').val(subTotal.toFixed(2) );
	t=$('#due').val();

	$('#txtTot1').val(subTotal.toFixed(2));
	
	
}
	
	
	function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#thamount').val(subTotal.toFixed(2) );
	t=$('#thamount').val();
	//alert(t);
	$('#txtTot1').val(subTotal.toFixed(2));
	t3=$('#txtTot1').val();
	//alert(t3);
	labtot=$("#labtot").val();
//pharmacytot=$("#pharmacytot").val();
t5=parseFloat(t3)+parseFloat(labtot)+parseFloat(pharmacytot);
$("#txtTot1").val(t5.toFixed(2));
$("#netamt").val(t5.toFixed(2));


hospitalpaid=$("#hosppaid").val();
hospdue=parseFloat(t)-parseFloat(hospitalpaid);
$("#hospdue").val(hospdue.toFixed(2));
labpaid=$("#labpaid").val();
pharmacypaid=$("#pharmacypaid").val();
tp=parseFloat(hospitalpaid)+parseFloat(labpaid)+parseFloat(pharmacypaid)
$("#totpaid").val(tp.toFixed(2));

tp1=$("#totpaid").val();
tdue=parseFloat(t5)-parseFloat(tp1);
$("#totdue").val(tdue.toFixed(2));
	
	//$('#txtTot1').val( subTotal.toFixed(2) );
	//$('#netamt').val( subTotal.toFixed(2) );
	
}

/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/
$(".txt").each(function(){
$(this).keyup(function(){
calculateTotal2();
});
});

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents(".form-group").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});


var i=2;
$(".addmore1").on('click',function(){
     
	var data ="<div class='form-group'>";
   
    data +="<div class='col-sm-12'>";          
    data +="<input type='checkbox' class='case'/><select class='text' id='mtype"+i+"' data-row='"+i+"' name='mtype[]'> <option value=''>Select Type</option><?php $r2 = $crud->getdata('select * from phr_prdtype_mast'); foreach($r2 as $key=>$r){?><option value='<?php echo $r['PRDTYPE_NAME']?>'><?php echo $r['PRDTYPE_NAME']?></option><?php }?></select><input type='text' class='text print-type10' id='pname"+i+"' data-row='"+i+"' name='pname[]' placeholder='Drug Name'/><input type='text' class=' ' id='generic"+i+"' data-row='"+i+"' name='generic[]' placeholder='Generic' style='width:90px;'/><input type='text' class=' ' id='dtime"+i+"' data-row='"+i+"' name='dtime[]' placeholder='Dosage Time' style='width:90px;'/><input type='text' class=' ' id='dadmin"+i+"' data-row='"+i+"' name='dadmin[]' placeholder='Route ' style='width:90px;'/><input type='text'  id='Days"+i+"' data-row='"+i+"' name='Days[]' placeholder='Days' style='width:50px;'/><input type='text'  id='qty"+i+"' data-row='"+i+"' name='qty[]' placeholder='Quantity' style='width:50px;'/><input type='text'  id='indication"+i+"' data-row='"+i+"' name='indication[]' placeholder='indication' style='width:90px;'/>";
   data +="<input type='hidden' name='ksr[]' value='1'/>";
    data +="</div></div>";
	
	
	
	
	
	$('.osu1').append(data);
	i++;
});



function calculateTotal21(){
	
	subTotal = 0 ; total = 0; 
	$('.tet1').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#pharmacytot').val(subTotal.toFixed(2) );
	t=$('#pharmacytot').val();

	
}
$(".txt1").each(function(){
$(this).keyup(function(){
calculateTotal21();

});
});

function calculateTotal22(){
	alert(hi);
	subTotal = 0 ; total = 0; 
	$('.txt2').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tdramount').val(subTotal.toFixed(2) );
	t=$('#tdramount').val();

	
}
$(".txt2").each(function(){
	alert(hi);
$(this).keyup(function(){
calculateTotal22();


});
});


function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
	
	
		
}

var ptot=document.getElementById("tlamount").value;


</script>
                                      
<!--<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt4").each(function(){
$(this).keyup(function(){
calculateSumk();
});
});
});
function calculateSumk(){
var sum=0;
$(".txt4").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot_gst").val(sum.toFixed(2));

}
</script> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->





</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
