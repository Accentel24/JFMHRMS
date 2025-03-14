<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if ($_SESSION['user']) {
	$name = $_SESSION['user'];
	//include('org1.php');


	include 'dbfiles/org.php';
	//include'dbfiles/iqry_emp.php';
?>
	<!DOCTYPE html>
	<html lang="en">
	<?php include 'template/headerfile.php'; ?>
	<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
	<style>
		strong {
			color: red;
		}
	</style>
	<script>
		function ConfirmDialog() {
			var x = confirm("Are you sure to delete record?")
			if (x) {
				return true;
			} else {
				return false;
			}
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
								<i class="ace-icon fa fa-user"></i>
								<a href="#">User Management</a>
							</li>

							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->
						<div class="page-header">
							<h1 align="center">
								Employee Details

							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="box box-info">
									<div class="box-header with-border">
										<h3 class="box-title">Employee Details</h3>
									</div>

									<form class="form-horizontal" enctype="multipart/form-data" method="post" action="user_insert.php">
										<div class="box-body">
											<!-- /Employee Photo-->
											<div class="form-group">
												<label for="lblempfile" class="col-sm-2 control-label">Employee Name:</label>

												<?php
												$id = $_REQUEST['id'];

												$m = mysqli_query($link, "select ab.empid,ab.emp_name from (select empid,emp_name from employee union select employeeid as empid,emp_name from emp)ab where empid='$id'") or die(mysqli_error($link));
												$m1 = mysqli_fetch_array($m);
												?>

												<div class="col-sm-4">
													<input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />
													<input id="empname" list="city1" class="form-control" name="empname" value="<?php echo $str = $m1['empid']; ?>">
													<datalist id="city1">

														<?php
														include_once('dbconnection/connection.php');
														$sql = "select ab.empid,ab.emp_name from (select empid,emp_name from employee union select employeeid as empid,emp_name from emp)ab order by ab.emp_name";  // Query to collect records
														$r1 = mysqli_query($link, $sql) or die(mysqli_error($link));
														while ($row = mysqli_fetch_array($r1)) {
															echo  "<option value=\"$row[empid]\">$row[emp_name]</option>"; // Format for adding options 
														}
														////  End of data collection from table /// 

														echo "</datalist>";
														include_once('dbconnection/connection.php');
														?>
												</div>

											</div>
											<?php
											$t = mysqli_query($link, "select * from hrms_hr_user where emp_id='$id'") or die(mysqli_error($link));
											while ($row1 = mysqli_fetch_array($t)) {
												$menu = $row1['menus'];
												if ($menu == "2") {
													$menu2 = "2";
												}
												if ($menu == "21") {
													$menu21 = "21";
												}
												if ($menu == "22") {
													$menu22 = "22";
												}
												if ($menu == "3") {
													$menu3 = "3";
												}
												if ($menu == "31") {
													$menu31 = "31";
												}
												if ($menu == "32") {
													$menu32 = "32";
												}
												if ($menu == "33") {
													$menu33 = "33";
												}
												if ($menu == "34") {
													$menu34 = "34";
												}
												if ($menu == "35") {
													$menu35 = "35";
												}
												if ($menu == "36") {
													$menu36 = "36";
												}
												if ($menu == "37") {
													$menu37 = "37";
												}
												if ($menu == "38") {
													$menu38 = "38";
												}
												if ($menu == "39") {
													$menu39 = "39";
												}
												if ($menu == "310") {
													$menu310 = "310";
												}
												if ($menu == "311") {
													$menu311 = "311";
												}
												if ($menu == "312") {
													$menu312 = "312";
												}

												if ($menu == "5") {
													$menu5 = "5";
												}
												if ($menu == "51") {
													$menu51 = "51";
												}
												if ($menu == "52") {
													$menu52 = "52";
												}
												if ($menu == "53") {
													$menu53 = "53";
												}
												if ($menu == "54") {
													$menu54 = "54";
												}
												if ($menu == "55") {
													$menu55 = "55";
												}
												if ($menu == "56") {
													$menu56 = "56";
												}
												if ($menu == "57") {
													$menu57 = "57";
												}
												if ($menu == "58") {
													$menu58 = "58";
												}
												if ($menu == "59") {
													$menu59 = "59";
												}
												if ($menu == "510") {
													$menu510 = "510";
												}
												if ($menu == "511") {
													$menu511 = "511";
												}
												if ($menu == "512") {
													$menu512 = "512";
												}


												if ($menu == "4") {
													$menu4 = "4";
												}
												if ($menu == "41") {
													$menu41 = "41";
												}
												if ($menu == "42") {
													$menu42 = "42";
												}
												if ($menu == "43") {
													$menu43 = "43";
												}
												if ($menu == "44") {
													$menu44 = "44";
												}
												if ($menu == "45") {
													$menu45 = "45";
												}
												if ($menu == "46") {
													$menu46 = "46";
												}
												if ($menu == "47") {
													$menu47 = "47";
												}
												if ($menu == "48") {
													$menu48 = "48";
												}
												if ($menu == "49") {
													$menu49 = "49";
												}
												if ($menu == "410") {
													$menu410 = "410";
												}
												if ($menu == "411") {
													$menu411 = "411";
												}
												if ($menu == "412") {
													$menu412 = "412";
												}


												if ($menu == "6") {
													$menu6 = "6";
												}
												if ($menu == "61") {
													$menu61 = "61";
												}
												if ($menu == "62") {
													$menu62 = "62";
												}
												if ($menu == "63") {
													$menu63 = "63";
												}
												if ($menu == "64") {
													$menu64 = "64";
												}
												if ($menu == "65") {
													$menu65 = "65";
												}
												if ($menu == "66") {
													$menu66 = "66";
												}
												if ($menu == "67") {
													$menu67 = "67";
												}
												if ($menu == "68") {
													$menu68 = "68";
												}
												if ($menu == "69") {
													$menu69 = "69";
												}
												if ($menu == "610") {
													$menu610 = "610";
												}
												if ($menu == "611") {
													$menu611 = "611";
												}
												if ($menu == "612") {
													$menu612 = "612";
												}


												if ($menu == "7") {
													$menu7 = "7";
												}
												if ($menu == "71") {
													$menu71 = "71";
												}
												if ($menu == "72") {
													$menu72 = "72";
												}
												if ($menu == "73") {
													$menu73 = "73";
												}
												if ($menu == "74") {
													$menu74 = "74";
												}
												if ($menu == "75") {
													$menu75 = "75";
												}
												if ($menu == "76") {
													$menu76 = "76";
												}
												if ($menu == "77") {
													$menu77 = "77";
												}
												if ($menu == "78") {
													$menu78 = "78";
												}
												if ($menu == "79") {
													$menu79 = "79";
												}
												if ($menu == "710") {
													$menu710 = "710";
												}
												if ($menu == "711") {
													$menu711 = "711";
												}
												if ($menu == "712") {
													$menu712 = "712";
												}
												if ($menu == "8") {
													$menu8 = "8";
												}

												if ($menu == "81") {
													$menu81 = "81";
												}
												if ($menu == "82") {
													$menu82 = "82";
												}
												if ($menu == "83") {
													$menu83 = "83";
												}
												if ($menu == "84") {
													$menu84 = "84";
												}
												if ($menu == "85") {
													$menu85 = "85";
												}
												if ($menu == "86") {
													$menu86 = "86";
												}
												if ($menu == "87") {
													$menu87 = "87";
												}
												if ($menu == "88") {
													$menu88 = "88";
												}
												if ($menu == "89") {
													$menu89 = "89";
												}
												if ($menu == "810") {
													$menu810 = "810";
												}
												if ($menu == "811") {
													$menu811 = "811";
												}
												if ($menu == "812") {
													$menu812 = "812";
												}
												if ($menu == "16") {
													$menu16 = "16";
												}
											}
											?>

											<div class="form-group">
												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="2" <?php if ($menu2 == '2') {
																										echo "checked='checked'";
																									} ?> /><b>Settings</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" <?php if ($menu21 == '21') {
																																echo "checked='checked'";
																															} ?> />Update Organization<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" <?php if ($menu22 == '22') {
																																echo "checked='checked'";
																															} ?> />Tool Category<br />

												</div>
												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="3" <?php if ($menu3 == '3') {
																										echo "checked='checked'";
																									} ?> /><b>Andhra Pradesh</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" <?php if ($menu31 == '31') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="32" <?php if ($menu32 == '32') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="33" <?php if ($menu33 == '33') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="34" <?php if ($menu34 == '34') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="35" <?php if ($menu35 == '35') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="36" <?php if ($menu36 == '36') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="37" <?php if ($menu37 == '37') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="38" <?php if ($menu38 == '38') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="39" <?php if ($menu39 == '39') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="310" <?php if ($menu310 == '310') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="311" <?php if ($menu311 == '311') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="312" <?php if ($menu312 == '312') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="4" <?php if ($menu4 == '4') {
																										echo "checked='checked'";
																									} ?> /><b>Telangana</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" <?php if ($menu41 == '41') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" <?php if ($menu42 == '42') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" <?php if ($menu43 == '43') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" <?php if ($menu44 == '44') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" <?php if ($menu45 == '45') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" <?php if ($menu46 == '46') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" <?php if ($menu47 == '47') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" <?php if ($menu48 == '48') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" <?php if ($menu49 == '49') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="410" <?php if ($menu410 == '410') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="411" <?php if ($menu411 == '411') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="412" <?php if ($menu412 == '412') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="5" <?php if ($menu5 == '5') {
																										echo "checked='checked'";
																									} ?> /><b>kerala</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" <?php if ($menu51 == '51') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" <?php if ($menu52 == '52') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" <?php if ($menu53 == '53') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" <?php if ($menu54 == '54') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" <?php if ($menu55 == '55') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" <?php if ($menu56 == '56') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" <?php if ($menu57 == '57') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="58" <?php if ($menu58 == '58') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="59" <?php if ($menu59 == '59') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="510" <?php if ($menu510 == '510') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="511" <?php if ($menu511 == '511') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="512" <?php if ($menu512 == '512') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="6" <?php if ($menu6 == '6') {
																										echo "checked='checked'";
																									} ?> /><b>Tamil Nadu</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="61" <?php if ($menu61 == '61') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="62" <?php if ($menu62 == '62') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="63" <?php if ($menu63 == '63') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="64" <?php if ($menu64 == '64') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="65" <?php if ($menu65 == '65') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="66" <?php if ($menu66 == '66') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="67" <?php if ($menu67 == '67') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="68" <?php if ($menu68 == '68') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="69" <?php if ($menu69 == '69') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="610" <?php if ($menu610 == '610') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="611" <?php if ($menu611 == '611') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="612" <?php if ($menu612 == '612') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="7" <?php if ($menu7 == '7') {
																										echo "checked='checked'";
																									} ?> /><b>karnataka</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" <?php if ($menu71 == '71') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" <?php if ($menu72 == '72') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" <?php if ($menu73 == '73') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" <?php if ($menu74 == '74') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" <?php if ($menu75 == '75') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="76" <?php if ($menu76 == '76') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="77" <?php if ($menu77 == '77') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="78" <?php if ($menu78 == '78') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="79" <?php if ($menu79 == '79') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="710" <?php if ($menu710 == '710') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="711" <?php if ($menu711 == '711') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="712" <?php if ($menu712 == '712') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="8" <?php if ($menu8 == '8') {
																										echo "checked='checked'";
																									} ?> /><b>Odisha</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" <?php if ($menu81 == '81') {
																																echo "checked='checked'";
																															} ?> />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" <?php if ($menu82 == '82') {
																																echo "checked='checked'";
																															} ?> />Relieving List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" <?php if ($menu83 == '83') {
																																echo "checked='checked'";
																															} ?> />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" <?php if ($menu84 == '84') {
																																echo "checked='checked'";
																															} ?> />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" <?php if ($menu85 == '85') {
																																echo "checked='checked'";
																															} ?> />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="86" <?php if ($menu86 == '86') {
																																echo "checked='checked'";
																															} ?> />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="87" <?php if ($menu87 == '87') {
																																echo "checked='checked'";
																															} ?> />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="88" <?php if ($menu88 == '88') {
																																echo "checked='checked'";
																															} ?> />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="89" <?php if ($menu89 == '89') {
																																echo "checked='checked'";
																															} ?> />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="810" <?php if ($menu810 == '810') {
																																echo "checked='checked'";
																															} ?> />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="811" <?php if ($menu811 == '811') {
																																echo "checked='checked'";
																															} ?> />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="812" <?php if ($menu812 == '812') {
																																echo "checked='checked'";
																															} ?> />Total Assets Report<br />

												</div>

												
												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="16" <?php if ($menu16 == '16') {
																										echo "checked='checked'";
																									} ?> /><b>User Management</b>


												</div>
												
											</div>



											<!-- /Employee Name< -->

											<!-- /Admission No -->


											<!-- /Roll.No -->






											<div class="form-group">
												<div class="col-md-offset-4 col-md-8">
													<button class="btn btn-info" type="submit" name="submit" id="submit">
														<i class="ace-icon fa fa-save bigger-110"></i>
														Save
													</button>

													&nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button>
													&nbsp; &nbsp; &nbsp;
													<a href="usermanagement.php"><button class="btn btn-danger" type="button" name="button" id="Close">
															<i class="ace-icon fa fa-close bigger-110"></i>
															Close
														</button></a>
												</div>
											</div>
											<br />
											<!-- /.box-body -->

											<!-- /.box-footer -->
									</form>
								</div>
							</div>
						</div>
						<!-- PAGE CONTENT BEGINS -->

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->


					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row">
								<div class="col-xs-12">



									<div class="table-header">
										Employees List
									</div>

									<!-- div.table-responsive -->

									<!-- div.dataTables_borderWrap -->
									<div>
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														<label class="pos-rel">
															<input type="checkbox" class="ace" />
															<span class="lbl"></span>
														</label>
													</th>
													<th>S No</th>

													<th>User Name</th>


													<th></th>
												</tr>
											</thead>

											<tbody>
												<?php
												$q = "select * from hrms_admin_login where user!='admin'";
												$rs = mysqli_query($link, $q) or die(mysqli_error());
												$i = 1;
												while ($rs1 = mysqli_fetch_array($rs)) {

												?>
													<tr>

														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
														<td><?php echo $i; ?></td>



														<td class="hidden-480"><?php echo $rs1['user']; ?></td>


														<td class="hidden-480"><a href="edituser.php?id=<?php echo $rs1['empname']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
															<a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteuser.php?id=<?php echo $rs1['empname']; ?>"><img src="images/Icon_Delete.png"></a>
														</td>



													</tr>
												<?php $i++;
												} ?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div>










				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
		</div><!-- /.main-content -->

		<?php include('template/footer.php'); ?>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
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
		<script src="assets/js/jquery-ui.custom.min.js"></script>

		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>



		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script>
			$(document).ready(function() {

				$("#success-alert").hide();
				$("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
					$("#success-alert").alert('close');
					window.location.href = window.location.href;
				});
				//$( '#validation-form' ).reset();


				$('.date-picker').datepicker({
						autoclose: true,
						todayHighlight: true
					})
					//show datepicker when clicking on the icon
					.next().on(ace.click_event, function() {
						$(this).prev().focus();
					});



				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization










			});
		</script> <!-- inline scripts related to this page -->
	</body>

	</html>
<?php

} else {
	session_destroy();

	session_unset();

	header('Location:index.php?authentication failed');
}

?>