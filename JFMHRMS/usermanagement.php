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

												<div class="col-sm-4">
												<input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />

												<input id="empname" list="city1" class="form-control" name="empname">
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


											<div class="form-group">
												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="2" /><b>Settings</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" />Update Organization<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" />Tool Category<br />

												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="3" /><b>Andhra Pradesh</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="32" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="33" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="34" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="35" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="36" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="37" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="38" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="39" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="310" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="311" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="312" />Total Assets Report<br />


												</div>
												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="4" /><b>Telangana</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="410" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="411" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="412" />Total Assets Report<br />
												</div>

												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="5" /><b>kerala</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="58" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="59" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="510" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="511" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="512" />Total Assets Report<br />



												</div>


												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="6" /><b>Tamil Nadu</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="61" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="62" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="63" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="64" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="65" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="66" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="67" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="68" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="69" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="610" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="611" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="612" />Total Assets Report<br />


												</div>


												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="7" /><b>karnataka</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="76" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="77" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="78" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="79" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="710" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="711" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="712" />Total Assets Report<br />
												</div>


												<div class="col-sm-3">
													<input type="checkbox" name="menu[]" value="8" /><b>Odisha</b><br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" />Appointment List<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" />Relieving List <br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" />NOC<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" />Add Employee<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" />Resigned Employees<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="86" />Assign Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="87" />Expired Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="88" />Pending Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="89" />Assign Store<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="810" />Add Tools<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="811" />Add Tool Purchase<br />
													&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="812" />Total Assets Report<br />

												</div>


												<div class="form-group">



													<div class="col-sm-3">
														<input type="checkbox" name="menu[]" value="16" /><b>User Management</b>


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
										Users List
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
													<th>Emp Name</th>
													<th>User Name</th>
													<th>Password</th>



													<th></th>
												</tr>
											</thead>

											<tbody>
												<?php
												$q = "select a.user,a.empname,COALESCE(b.emp_name,c.emp_name) as emp_name,coalesce(b.password,c.password) as password from hrms_admin_login a 
left join employee b on a.empname=b.empid 
left join  emp c on a.empname=c.employeeid
where a.user!='admin'";
												$rs = mysqli_query($link, $q) or die(mysqli_error($link));
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

														<td class="hidden-480"><?php echo $rs1['emp_name']; ?></td>
														<td class="hidden-480"><?php echo $rs1['user']; ?></td>
														<td class="hidden-480"><?php echo $rs1['password']; ?></td>


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