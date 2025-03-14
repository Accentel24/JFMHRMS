<?php //include('config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('dbconnection/connection.php');
$state=$_GET['state'];
if ($_SESSION['user']) {
	 $name = $_SESSION['user'];
	//include('org1.php');
	include 'dbfiles/org.php';
	include 'dbfiles/iqry_emp.php';
?>
	<!DOCTYPE html>
	<html lang="en">
	<style>
		.frmSearch {
			border: 1px solid #a8d4b1;
			background-color: #c6f7d0;
			margin: 2px 0px;
			padding: 40px;
			border-radius: 4px;
		}

		#country-list {
			float: left;
			list-style: none;
			margin-top: -3px;
			padding: 0;
			width: 190px;
			position: absolute;
		}

		#country-list li {
			padding: 10px;
			background: #f0f0f0;
			border-bottom: #bbb9b9 1px solid;
		}

		#country-list li:hover {
			background: #ece3d2;
			cursor: pointer;
		}
	</style>
	<?php include 'template/headerfile.php'; ?>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

	<style>
		strong {
			color: red;
		}
	</style>


	<script>
		function deleteRow() {
			var rr = document.getElementById("rows1").value

			if (rr != 0) {
				// var oRow = rr.parentNode.parentNode;
				document.getElementById("dynamic-table1").deleteRow(rr);
				var row = document.getElementById("rows1").value
				document.getElementById("rows").value = row - 1;
				total();
			} else {
				alert('Please Select Atleast One Row');
				return false;
			}
		}

		function ConfirmDialog() {
			var x = confirm("Are you sure to delete record?")
			if (x) {
				return true;
			} else {
				return false;
			}
		}

		function s2() {
			var curval = document.getElementById("adhar").value;
			
			var regexp=/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/;
			
                   $.ajax({
				type: "GET",
				url: "checkAadharCard.php",
				data: {
					keyword: curval
				},
				success: function(data) {
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					
					if (data) {
						$("#submit").prop('disabled', true);
					}

					else {
						
						$("#submit").prop('disabled', false);
					}
					//$("#pname"+i).css("background","#FFF");
				}
			});
                   
               
			
		}
	</script>

	<script>
		function showHint22(str){

			if (str.length == 0) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			}
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

					var show = xmlhttp.responseText;
					var strar = show.split(":");
					//document.getElementById("supname").value=strar[2];

					//document.getElementById("state").value=strar[1];

					//document.getElementById("city").value=strar[2];	
					document.getElementById("store_name").value = strar[1];
					document.getElementById("state").value = strar[2];
					document.getElementById("state_code").value = strar[3];
					//document.getElementById("addr").value=strar[4];	
					document.getElementById("gst_in").value = strar[4];
					document.getElementById("store_type").value = strar[5];

					document.getElementById("supervisor").value = strar[6];
					document.getElementById("cordinator").value = strar[7];
					document.getElementById("afm").value = strar[8];
					document.getElementById("company").value = strar[9];
				}
			}
			xmlhttp.open("GET", "get-apdata3.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>


	<script>
		function showchildren(z) {
			let childrenblock = document.getElementById("childrenblock");
			let childrennameblock = document.getElementById("childrennameblock");
			let hidden = childrenblock.getAttribute("hidden");
			if (z.value == "married") {
				childrenblock.removeAttribute("hidden");
				childrennameblock.removeAttribute("hidden");
			} else {
				childrenblock.setAttribute("hidden", "hidden");
				childrennameblock.setAttribute("hidden", "hidden");
				document.getElementById("nok").value = '';
				document.getElementById("wname").value = '';
				document.getElementById("childname").value = '';
				document.getElementById("container145").innerHTML = '';



			}
		}

		function changePartner(z) {
			let partnername = document.getElementById("partnername");
			let wname = document.getElementById("wname");
			if (z.value == "male") {
				partnername.textContent = "Wife Name";
				wname.placeholder = "Enter your Wife name"
			} else {
				partnername.textContent = "Husband Name";
				wname.placeholder = "Enter your Husband name"
			}
		}
	</script>


	<script>
		$(document).on('keyup', '.txt1', function() {
			var id = $(this).attr('data-row');

			var qty = document.getElementById('qty' + id).value;
			var price = document.getElementById('price' + id).value;


			bal = parseFloat(qty) * parseFloat(price);
			document.getElementById('amnt' + id).value = bal;
			calculateTotal1();
			calculateTotal1k();
			calculateTotal1kk();
			calculateTotal1kv();

		});


		$(document).on('keyup', '.txt20', function() {
			var id = $(this).attr('data-row');

			var amt = document.getElementById('amnt' + id).value;
			var sgst = document.getElementById('sgst' + id).value;
			var serv_amt = document.getElementById('serv_amt' + id).value;


			bal = (parseFloat(amt) * parseFloat(sgst)) / 100;
			alert(sgst);
			ser = (parseFloat(amt) * parseFloat(serv_amt)) / 100;
			document.getElementById('sgstamt' + id).value = bal;
			document.getElementById('serv_amnt' + id).value = ser;
			calculateTotal2();

		});

		$(document).on('keyup', '.txt21', function() {
			var id = $(this).attr('data-row');

			var amt = document.getElementById('amnt' + id).value;
			var cgst = document.getElementById('sgst' + id).value;


			bal = (parseFloat(amt) * parseFloat(cgst)) / 100;
			document.getElementById('cgstamt' + id).value = bal;
			calculateTotal3();

		});

		function calculateTotal1() {
			subTotal = 0;
			total = 0;
			$('.txt').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}


		function calculateTotal1kv() {
			subTotal = 0;
			total = 0;
			$('.txt7').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot_serv').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal1k() {
			subTotal = 0;
			total = 0;
			$('.txt4').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#tot_gst').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal1kk() {
			subTotal = 0;
			total = 0;
			$('.txt5').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#net').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal2() {
			subTotal = 0;
			total = 0;
			$('.txt50').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#sgsttotal').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}

		function calculateTotal3() {
			subTotal = 0;
			total = 0;
			$('.txt51').each(function() {

				if ($(this).val() != '') subTotal += parseFloat($(this).val());
			});
			$('#cgsttotal').val(subTotal.toFixed(2));
			//$('#bamount').val( subTotal.toFixed(2) );
		}
	</script>

	<body class="no-skin">
		<?php include 'template/logo.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.loadState('main-container')
				} catch (e) {}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try {
						ace.settings.loadState('sidebar')
					} catch (e) {}
				</script>

				<!-- /.sidebar-shortcuts -->
				<?php include 'template/sidemenu.php' ?>
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
								<a href=""> Add Employee</a>
							</li>

							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->
						<div class="#">
							<center style="color:#192436"><u><b>
										<h1>ADD EMPLOYEE</h1>
									</b></u></center>
						</div>

						<?php
						$a = "select `count` as cnt from qutcount where state='AP' ";
						$ssq = mysqli_query($link, $a);
						$r = mysqli_fetch_array($ssq);
						$cnt1 = $r['cnt'];

						$cnt =  21220000 + 1 + $cnt1;

						?>


						<!-- PAGE CONTENT BEGINS -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<form name="frm" method="post" action="" enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?php echo $id ?>">
											<input type="hidden" name="ses" value="<?php echo $name; ?>">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover">
													<tr>
														<td align="right">State:</td>
														<td>
															<input type="text" class="form-control" readonly id="state" name="state" value="<?php echo $state;?>">
														</td>
														<!-- <td><select name="state" id="state" required class="form-control">
																<option value="">Select State</option>
																<option value="AP">AP</option>
																<option value="TS">TS</option>
																<option value="KL">KL</option>
																<option value="TN">TN</option>
																<option value="KN">KN</option>
															</select> </td> -->

														<td align="right">Adhar No</td>
														<td align="left">
															<input type="number" value="" required class="form-control" name="adhar" id="adhar" onkeyup='s2()'>
															<div id='suggesstion-box'></div>
														</td>



													</tr>

													<tr>
														<td align="right">Name of Employee </td>
														<td><input type="text" class="form-control" value="" required name="empname" id="empname"></td>
														<td align="right">DOB</td>
														<td><input type="date" value="<?php echo date('Y-m-d'); ?>" required name="dob" id="dob" class="form-control"></td>
													</tr>
													<tr>
														<td align="right">Gender</td>
														<td align="left">

															<input type="radio" id="male" name="gender" value="male" onchange="changePartner(this)">
															<label for="male">Male</label>
															<input type="radio" id="female" name="gender" value="female" onchange="changePartner(this)">
															<label for="female">Female</label>
														</td>


														<td align="right">Marital Status</td>
														<td>
															<input type="radio" id="married" name="marstatus" value="married" onchange="showchildren(this)">
															<label for="married">Married</label>
															<input type="radio" id="unmarried" name="marstatus" value="unmarried" onchange="showchildren(this)">
															<label for="unmarried">unmarried</label>
														</td>
													</tr>

													<tr id="childrenblock" hidden="hidden">

														<td align="right" id="partnername">Wife Name</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="wname" id="wname" placeholder="Enter your Wife name">
														</td>

														<td align="right">No of kids</td>
														<td align="left">
															<input type="number" name="nok" id="nok" placeholder=" enter your number of kids " class="form-control" />
														</td>


													</tr>
													<tr id="childrennameblock" hidden="hidden">
														<td align="right">Children Names</td>
														<td align="left">
															<textarea name="childname" id="childname" class="form-control"></textarea>
														</td>
													</tr>
													<tr>

														<td align="right">Father Name</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="fname" id="fname">
														</td>


														<td align="right">Mother Name </td>
														<td align="left">
															<input type="text" class="form-control" value="" id="mname" name="mname">

														</td>
													</tr>

													<tr>

														<td align="right">Contact No.</td>
														<td align="left">
															<input type="number" value="" class="form-control" name="conno" id="conno">
														</td>


														<td align="right">Alternate Contact No. </td>
														<td align="left">
															<input type="number" class="form-control" value="" id="aconno" name="aconno">

														</td>
													</tr>
													<tr>
														<td align="right">Family Member Contact No. </td>
														<td align="left">

															<select name="rel" required>
																<option value="">Relation</option>
																<option value="Father">Father</option>
																<option value="Mother">Mother</option>
																<option value="Wife">Wife</option>
															</select>
															<input type="text" class="text" style="width:75% !important;" name="fno" id="rno" required="required" />

														</td>
														<td align="right">Email Id</td>
														<td>
															<input type="text" required name="email" id="email" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">Employee ID</td>
														<td><input type="text" readonly value="" required name="eid" id="eid" class="form-control"></td>


														<td align="right"> Adhar Photo</td>
														<td align="left">
															<input type="file" name="adharimg" id="adharimg" class="form-control" />
														</td>

													</tr>
													<tr>
														<td align="right">PAN No.</td>
														<td>
															<input type="text" required name="pan" id="pan" class="form-control">
														</td>
														<td align="right"> PAN Card Photo</td>
														<td align="left">
															<input type="file" name="panimg" id="panimg" class="form-control" />
														</td>
													</tr>
													<tr>
														<td align="right">UAN No.</td>
														<td align="left">
															<input type="text" required name="uan" id="uan" class="form-control">
														</td>
														<td align="right">PF No.</td>
														<td>
															<input type="text" required name="pf" id="pf" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">ESI No.</td>
														<td align="left">
															<input type="text" required name="esi" id="esi" class="form-control">
														</td>
														<td align="right">DOJ</td>
														<td align="left">
															<input type="date" value="<?php echo date('Y-m-d'); ?>" required name="doj" id="doj" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right">Qualification</td>
														<td align="left">
															<input type="text" required name="qua" id="qua" class="form-control">
														</td>
														<td align="right">Experience</td>
														<td>
															<input type="text" required name="exp" id="exp" class="form-control">
														</td>
													</tr>
													<tr>
														<td align="right"> Designation</td>
														<td>
															<input type="text" name="des" id="des" required class="form-control">
														</td>
														<td align="right">Photo</td>
														<td align="left">
															<input type="file" name="empimg" id="empimg" class="form-control" />
														</td>
													</tr>
													<tr>
														<td align="right">Address</td>
														<td align="left">

															<textarea required name="address" id="address" class="form-control"></textarea>
														</td>
														<td align="right">City</td>
														<td align="left">
															<input type="text" value="" class="form-control" name="city" id="city">
														</td>
													</tr>



													<tr>
														<td align="right">User Name <br />
															<p style="color:red;">(Will be same as employee id)</p>
														</td>
														<td align="left">
															<input type="text" class="form-control" readonly id="uname" name="uname" placeholder="Enter User Name">
														</td>
														<td align="right">Password<br />
															<p style="color:red;"> (Will be same as aadhar card no)</p>
														</td>
														<td>
															<input type="password" class="form-control" readonly id="pwd" name="pwd" placeholder="Enter Password">
														</td>
													</tr>

													<div class="form-group row">
														<div class="control-label col-md-6">

															<table class="table">
																<center style="color:#192436"><u><b>
																			<h1>BANK DETAILS</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> Bank Name.</td>
																	<td>
																		<input type="text" name="banknm" id="banknm" required class="form-control">
																	</td>
																	<td align="right">Branch of Bank</td>
																	<td align="left">
																		<input type="text" class="form-control" required id="bb" name="bb">
																	</td>
																	<td align="right">IFSC Code</td>
																	<td align="left">
																		<input type="text" class="form-control" required id="ifcs" name="ifcs">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Account No.</td>
																	<td>
																		<input type="text" name="acno" id="acno" required class="form-control">
																	</td>

																	<td align="right">Photo of Passbook/ Cancelled Cheque</td>
																	<td align="left">
																		<input type="file" name="bankimg" id="bankimg" class="form-control" />
																	</td>
																</tr>

															</table>
															<table class="table">
																<center style="color:#192436"><u><b>
																			<h1>Employee Position</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> Level 1</td>
																	<td>
																		<input type="text" name="level1" id="level1" class="form-control">
																	</td>
																	<td align="right"> Level 2</td>
																	<td>
																		<input type="text" name="level2" id="level2" class="form-control">
																	</td>
																	<td align="right"> Level 3</td>
																	<td>
																		<input type="text" name="level3" id="level3" class="form-control">
																	</td>
																	<td align="right"> Level 4</td>
																	<td>
																		<input type="text" name="level4" id="level4" class="form-control">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Level 5</td>
																	<td>
																		<input type="text" name="level5" id="level5" class="form-control">
																	</td>
																	<td align="right"> Level 6</td>
																	<td>
																		<input type="text" name="level6" id="level6" class="form-control">
																	</td>
																	<td align="right"> Level 7</td>
																	<td>
																		<input type="text" name="level7" id="level7" class="form-control">
																	</td>

																</tr>

															</table>


															<!-- <table class="table">
																<center style="color:#192436"><u><b>
																			<h1>Uniform Details</h1>
																		</b></u></center>
																<br />
																<tr>

																	<td align="right"> T-Shirt:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['tshirt']) == "yes") {
																																	echo 'checked';
																																} ?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['tshirt']) == "no") {
																																echo 'checked';
																															} ?>>NO</label>
																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="tsize" id="tsize"></td>

																	<td align="right"> T-Shirt Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["tshtdt"])) ?>" required name="tshtdt" id="tshtdt" class="form-control">
																	</td>
																	<td align="right"> Phant:</td>
																	<td>
																		<label><input type="radio" name="phant" value="YES" <?php if (strtolower($rw['phant']) == "yes") {
																																echo 'checked';
																															} ?>>YES</label>
																		<label><input type="radio" name="phant" value="NO" <?php if (strtolower($rw['phant']) == "no") {
																																echo 'checked';
																															} ?>>NO</label>

																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="psize" id="psize"></td>

																	<td align="right"> Phant Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["phtdt"])) ?>" required name="phtdt" id="phtdt" class="form-control">
																	</td>
																</tr>

																<tr>

																	<td align="right"> Safety Shoes:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['sshoes']) == "yes") {
																																	echo 'checked';
																																} ?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['sshoes']) == "no") {
																																echo 'checked';
																															} ?>>NO</label>
																	<td><input type="text" size="2" class="form-control" value="" placeholder=" Enter Size" name="ssize" id="ssize"></td>
																	<td align="right"> Shoes Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["shoesdt"])) ?>" required name="shoesdt" id="shoesdt" class="form-control">
																	</td>
																	<td align="right"> ID Card:</td>
																	<td>
																		<label><input type="radio" name="tshirt" value="YES" <?php if (strtolower($rw['idcard']) == "yes") {
																																	echo 'checked';
																																} ?>>YES</label>
																		<label><input type="radio" name="tshirt" value="NO" <?php if (strtolower($rw['idcard']) == "no") {
																																echo 'checked';
																															} ?>>NO</label>
																	<td align="right"> ID Card Issue Date:</td>
																	<td>
																		<input type="date" value="<?php echo date('Y-m-d', strtotime($rw["idcarddt"])) ?>" required name="idcarddt" id="idcarddt" class="form-control">
																	</td>

																</tr>

															</table> -->
															<table class="table">
																<center style="color:#192436"><u><b>
																			<h1>CERTIFICATE DETAILS</h1>
																		</b></u></center>
																<br />
																<tr>
																	<td> <b>1.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname1" id="cname1" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno1" name="cno1">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>

																<tr>
																	<td> <b>2.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname2" id="cname2" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno2" name="cno2">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td> <b>3.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname3" id="cname3" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno3" name="cno3">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td> <b>4.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname4" id="cname4" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno4" name="cno4">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td> <b>5.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname5" id="cname5" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno5" name="cno5">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>
																<tr>
																	<td> <b>6.</b></td>
																	<td align="right"> Name of Certificate.</td>
																	<td>
																		<input type="text" name="cname6" id="cname6" class="form-control">
																	</td>
																	<td align="right">Certificate No.</td>
																	<td align="left">
																		<input type="text" class="form-control" id="cno6" name="cno6">
																	</td>
																	<td align="right">Photo</td>
																	<td align="left">
																		<input type="file" name="$fileName15" id="img1" class="form-control" />
																	</td>
																</tr>


																</tr>


															</table>
															<center><a onclick="window.open('add_stock.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"><b style="color:red;font-size:18px;">Assign Stores</b></a></center>

															<br />
														</div>

													</div>


												</table>
											</div>




											<?php
											//$aa="select * from add_bill where id1='$id'";
											/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
											//$/t=mysqli_query($link,$aa) or die(mysqli_error($link));
											?>

											<!-- div.table-responsive -->

											<!-- div.dataTables_borderWrap -->

											<br />


											<div class="form-group">
												<div class="col-md-offset-4 col-md-8">


													<button class="btn btn-info" type="submit" name="submit" id="submit">
														<i class="ace-icon fa fa-save bigger-110"></i>
														Save
													</button>





													&nbsp; &nbsp; &nbsp;
													<a href="employeelist.php"><button class="btn btn-danger" type="button" name="button" id="Close">
															<i class="ace-icon fa fa-close bigger-110"></i>
															Close
														</button></a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
			<script src="assets/js/jquery-2.1.4.min.js"></script>
			<script type="text/javascript">
				$(".delete").on('click', function() {
					$('.case:checkbox:checked').parents("tr").remove();
					$('#check_all').prop("checked", false);
					calculateTotal1();
					calculateTotal2();
					calculateTotal3();
				});
				var i = 100;

				$(".addmore").on('click', function() {
					i++;
					var data = "<tr>";
					data += "<td><input type='checkbox' class='case'/></td>";
					data += "<td>" + i + "</td>";
					// data +="<td><input type='hidden' name='id1[]'  id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          

					data += "<td><input type='text' name='pname[]'  id='pname" + i + "' data-row='" + i + "' style='width:150px;' class='form-control pname" + i + "' onkeyup='s2(" + i + ")' onclick='showUser(this.value," + i + ")'> <div id='suggesstion-box" + i + "'></div>";
					data += "</td>";

					data += "<td><input type='text' name='serv_num[]' data-row='" + i + "' value='' style='width:60px;'  class='' id='serv_num" + i + "' /> </td>";
					data += "<td><input type='text' name='brand[]' required  value='' style='width:50px;'  id='brand" + i + "' />	   </td>";
					data += "<td> <input type='text' name='model[]' required  data-row='" + i + "'  value='' style='width:60px;' class=''   id='model" + i + "' /></td>";

					data += "<td><input type='text' name='hsn[]'  value='' style='width:50px;'  id='hsn" + i + "' />	   </td>";
					data += "<td> <input type='text' name='gst[]'  data-row='" + i + "'  value='' style='width:60px;' class='txt20'   id='gst" + i + "' /></td>";

					data += "<td><input type='text' name='uom[]'  id='uom" + i + "' value='' style='width:70px;' data-row='" + i + "'></td>";
					data += "<td><input type='text' name='price[]'  data-row='" + i + "' id='price" + i + "' style='width:70px;' value=''   /></td>";
					data += "<td><input type='text' name='qty[]'  data-row='" + i + "' onkeyup='qval(this.value," + i + ")' value='' style='width:60px;' class='txt1' id='qty" + i + "'  /> </td>";


					data += "<td><input type='text' name='amnt[]' data-row='" + i + "' value='' style='width:60px;'  class='txt tx6' id='amnt" + i + "' /> </td>";
					data += "<td><input type='text' name='serv_amnt[]' data-row='" + i + "' value='' style='width:60px;' class='txt7 '   id='serv_amnt" + i + "' /> </td>";

					data += "<td><input type='text' name='gst_amnt[]' data-row='" + i + "' value='' style='width:60px;' class='txt4 ' readonly  id='gst_amnt" + i + "' /> </td>";
					data += "<td><input type='text' name='serv_amt[]' data-row='" + i + "'  style='width:60px;'  class='' id='serv_amt" + i + "' value='6'/> </td>";
					data += "<td><input type='hidden' name='id[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='id" + i + "' /> </td>";
					data += "<td><input type='hidden' name='cap[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='cap" + i + "' /> </td>";

					data += "<td><input type='hidden' name='serv_code[]' data-row='" + i + "' value='' style='width:60px;' readonly class='' id='serv_code" + i + "' /> </td>";


					data += "</tr>";
					$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');


				});

				function select_all() {
					$('input[class=case]:checkbox').each(function() {
						if ($('input[class=check_all]:checkbox:checked').length == 0) {
							$(this).prop("checked", false);
						} else {
							$(this).prop("checked", true);
						}
					});
				}
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
			<script type="text/javascript">
				if ('ontouchstart' in document.documentElement)
					document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
			</script>
			<script src="assets/js/bootstrap.min.js"></script>

			<!-- page specific plugin scripts -->
			<script src="assets/js/jquery.dataTables.min.js"></script>
			<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
			<script src="assets/js/dataTables.buttons.min.js"></script>
			<script src="assets/js/buttons.flash.min.js"></script>
			<script src="assets/js/buttons.html5.min.js"></script>
			<script src="assets/js/buttons.print.min.js"></script>
			<script src="assets/js/buttons.colVis.min.js"></script>
			<script src="assets/js/dataTables.select.min.js"></script>

			<!-- ace scripts -->
			<script src="assets/js/ace-elements.min.js"></script>
			<script src="assets/js/ace.min.js"></script>
			<script type="text/javascript">
				function val(str, id) {
					cal = 0;
					cal1 = 0;
					cal12 = 0;
					//alert(id);
					var price = document.getElementById("price" + id).value;
					var qty = document.getElementById("qty" + id).value;
					var gst = document.getElementById("gst" + id).value;
					var serv_amt = document.getElementById("serv_code" + id).value;
					//var serv_amtk=document.getElementById("serv_amnt"+id).value;
					//alert(serv_amtk);

					//var cgst=document.getElementById("cgst"+id).value;
					//var gst=Math.abs(sgst)+Math.abs(cgst);
					cal = eval(price) * eval(qty);
					//alert(cal);
					//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
					cal12 = eval(price) * eval(qty) * eval(serv_amt) / 100;
					//alert(cal12);
					calk = (cal) + (cal12);
					//alert(calk);
					cal1 = eval(calk) * eval(gst) / 100;






					//document.getElementById("gst_amnt"+id).value=cal1;
					//alert(cal12);
					document.getElementById("serv_amnt" + id).value = Math.abs(cal12);
					//document.getElementById("serv_amnt"+id).value=cal12;


					document.getElementById("gst_amnt" + id).value = Math.abs(cal1);



				}

				function qval(str, id) {
					cal = 0;
					cal1 = 0;
					cal12 = 0;
					//alert(id);
					var price = document.getElementById("price" + id).value;
					var qty = document.getElementById("qty" + id).value;
					var gst = document.getElementById("gst" + id).value;
					var serv_amt = document.getElementById("serv_amt" + id).value;
					//var serv_amtk=document.getElementById("serv_amnt"+id).value;
					//alert(serv_amtk);

					//var cgst=document.getElementById("cgst"+id).value;
					//var gst=Math.abs(sgst)+Math.abs(cgst);
					cal = eval(price) * eval(qty);
					document.getElementById("amnt" + id).value = cal;

					//alert(cal);
					//document.getElementById("amnt"+id).value+document.getElementById("serv_amtk"+id).value=Math.abs(cal);	
					cal12 = eval(price) * eval(qty) * eval(serv_amt) / 100;
					//alert(cal12);
					calk = (cal) + (cal12);
					//alert(calk);
					cal1 = eval(calk) * eval(gst) / 100;
					//document.getElementById("gst_amnt"+id).value=cal1;
					//alert(cal12);
					document.getElementById("serv_amnt" + id).value = Math.abs(cal12);
					//document.getElementById("serv_amnt"+id).value=cal12;


					document.getElementById("gst_amnt" + id).value = Math.abs(cal1);

					calculateTotal1();
					calculateTotal1k();
					calculateTotal1kk();
					calculateTotal1kv();

				}
			</script>



	</body>

	</html>
<?php

} else {
	session_destroy();

	session_unset();

	header('Location:index.php?authentication failed');
}

?>