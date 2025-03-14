<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state = $_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    //include'dbfiles/iqry_emp.php';
    //include'dbfiles/uqry_emp.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'template/headerfile.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <style>
        strong {
            color: red;
        }
        .store{
            color: #8888d8;
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Resigned Employee Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Resigned Employee Details

                            </h1>
                        </div>



                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div>
                    <!-- /.col -->






                    <div class="row">

                        <?php
                        $datatable = "emp";
                        $results_per_page = 84;
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"];
                        } else {
                            $page = 1;
                        };
                        $start_from = ($page - 1) * $results_per_page;
                        $sql = "SELECT * FROM " . $datatable . " where status!='' and state = '$state' ORDER BY empid desc LIMIT $start_from, " . $results_per_page;
                        $rs_result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        ?>
                        <div class="col-xs-12">
                            <div class="table-header">
                                Employees List
                            </div>
                            <div style="height:15px;"></div>
                            <form method="post" action="" class="form-horizontal">

                                <div class="form-group">



                                    <div class="col-sm-9">

                                        <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Emp Name or Email or Employeeid No or Aadhar ">
                                    </div>
                                    <div class="col-sm-3">

                                        <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                            Search
                                        </button>

                                    </div>
                                    <div class="col-sm-12" style: align="right"> <b><a href="resign_emp_excel.php?state=<?php echo $state?>" class="btn btn-primary btn-xs">XL Download</a></b></div>
                                </div>


                            </form>

                            <div class="table-responsive">
                                <table id="simple-table" class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>

                                            <th class="detail-col">S No</th>
                                            <th>Emp Name</th>
                                            <th>Emp Email</th>
                                            <th>Aaadhar No</th>
                                            <th class="hidden-480">User Name</th>
                                            <th class="hidden-480">Password</th>
                                            <th class="hidden-480">Edit</th>
                                            <th class="hidden-480">Notice Period</th>

                                            <th class="hidden-480">Download</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($_POST['bsearch'])) {
                                            $bsearch = $_POST['search'];
                                            $y = "select * from emp where status!='' and state = '$state' and (emp_name like  '%$bsearch%' or emp_email like  '%$bsearch%' or adharcardno like  '%$bsearch%' or employeeid like  '%$bsearch%' or adharcardno like  '%$bsearch%' ) ";
                                            $t = mysqli_query($link, $y) or die(mysqli_error($link));
                                            $i = 1;
                                            while ($t1 = mysqli_fetch_array($t)) {
                                               

                                        ?>

                                                <tr>

                                                    <td><?php echo $i; ?></td>


                                                    <td>
                                                        <?php echo $t1['emp_name']; ?>
                                                    </td>


                                                    <td><?php echo $t1['emp_email']; ?></td>

                                                    <td>
                                                        <?php echo $t1['adharcardno']; ?>
                                                    </td>

                                                    <td><?php echo $t1['username']; ?></td>

                                                    <td>
                                                        <?php echo $t1['password']; ?>
                                                    </td>
                                                    <td> <a href="edit_resignemp.php?state=<?php echo $state; ?>&id=<?php echo $t1['empid']; ?>">
                                                            <img src="images/edit.gif"></a>&nbsp;&nbsp;&nbsp;
                                                            <a href="update_resign.php?state=<?php echo $state; ?>&id=<?php echo $t1['empid']; ?>" onclick="return confirm('Are you sure want to <?php echo $t1['emp_name']; ?> rejoin ?')">
                                                            <span class="store glyphicon glyphicon-plus-sign btn-lg"></span></a></td>
                                                    <td>
                                                        <?php if($t1['start_date']!='' and $t1['last_date']!='' and $t1['reason1']!=''){?>
                                                            <a href="notice_period.php?state=<?php echo $state; ?>&id=<?php echo $t1['empid']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;
                                                        <?php } ?></td>
                                                    <td class="hidden-480"><a href="employeepdf.php?id=<?php echo $t1['empid']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;</td>



                                                </tr>




                                            <?php $i++;
                                            }
                                        } else { ?>

                                            <?php

                                            $i = 1;
                                            while ($rs1 = mysqli_fetch_array($rs_result)) {
                                          
                                            ?>
                                                <tr>

                                                    <td><?php echo $i; ?></td>


                                                    <td>
                                                        <?php echo $rs1['emp_name']; ?>
                                                    </td>

                                                    <td><?php echo $rs1['emp_email']; ?></td>

                                                    <td>
                                                        <?php echo $rs1['adharcardno']; ?>
                                                    </td>

                                                    <td><?php echo $rs1['username']; ?></td>

                                                    <td>
                                                        <?php echo $rs1['password']; ?>
                                                    </td>
                                                    <td> <a href="edit_resignemp.php?state=<?php echo $state; ?>&id=<?php echo $rs1['empid']; ?>">
                                                            <img src="images/edit.gif"></a>&nbsp;&nbsp;&nbsp;
                                                            <a href="update_resign.php?state=<?php echo $state; ?>&id=<?php echo $rs1['empid']; ?>" onclick="return confirm('are you sure want to <?php echo $rs1['emp_name']; ?> rejoin? ')">
                                                            <span class="store glyphicon glyphicon-plus-sign btn-lg"></span></a></td>
                                                    <td>
                                                        <?php if($rs1['start_date']!='' and $rs1['last_date']!='' and $rs1['reason1']!=''){?>
                                                            <a href="notice_period.php?state=<?php echo $state; ?>&id=<?php echo $rs1['empid']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;
                                                        <?php } ?></td>
                                                    <td class="hidden-480"><a href="employeepdf.php?id=<?php echo $rs1['empid']; ?>"><img src="images/pdf_icon.gif"></a>&nbsp;&nbsp;</td>




                                                </tr>

                                        <?php $i++;
                                            }
                                        } ?>





                                    </tbody>
                                </table>
                            </div>

                            <div align="center">
                                <?php
                                $state=$_GET['state'];
                                $sql = "SELECT COUNT(empid) AS total FROM " . $datatable;
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results



                                echo "<ul class='pagination'>";
                                echo "<li><a href='resign_emp_list.php?state=$state&page=" . ($page - 1) . "' class='button'>Previous</a></li>";

                                $i = 1;
                                while ($i <= $total_pages) {
                                    echo "<li><a href='resign_emp_list.php?state=$state&page=" . $i . "'>" . $i . "</></li>";
                                    $i++;
                                }

                                echo "<li><a href='resign_emp_list.php?state=$state&page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
                                echo "</ul>";
                                ?>

                            </div>
                        </div><!-- /.span -->
                    </div>




























                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
        </div><!-- /.main-content -->

        <?php include('template/footer.php'); ?>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse" style="margin-right:10px;">
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
    <?php mysqli_close($link); ?>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>