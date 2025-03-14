<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state = $_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    //include'dbfiles/iqry_tool.php';
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
                                <a href="#">Employee</a>
                            </li>
                            <li>
                                <a href="#">Pending Tool list</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Pending Tool Details

                            </h1>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->






                    <div class="row">

                        <?php
                        $datatable = "employeetoollist";
                        $results_per_page = 50;
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"];
                        } else {
                            $page = 1;
                        };
                        $start_from = ($page - 1) * $results_per_page;
                        // $sql = "select id,employeeid,name,toolname,date,sum(qty) as qty from employeetoollist where state = '$state' group by toolname,employeeid ORDER BY employeeid ASC LIMIT $start_from, " . $results_per_page;
                        // $rs_result = mysqli_query($link, $sql) or die(mysqli_error($link));

                        $toolsQuery = "select tname from tool where state = '$state'";
                        $toolsQueryresult = mysqli_query($link, $toolsQuery) or die(mysqli_error($link));

                        ?>
                        <div class="col-xs-12">
                            <div class="table-header">
                                Pending Tool List
                            </div>
                            <div style="height:15px;"></div>
                            <form method="post" action="" class="form-horizontal">

                                <div class="form-group">



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Emp Name">
                                    </div>
                                    <div class="col-sm-3">
                                        <select id="toolname" name="toolname" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            while ($toolArray = mysqli_fetch_array($toolsQueryresult)) {
                                            ?>
                                                <option value="<?php echo $toolArray['tname'] ?>"><?php echo $toolArray['tname'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">

                                        <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <div class="table-responsive">
                                <table id="simple-table" class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>

                                            <th class="detail-col">S No</th>
                                            <th>Employee Id</th>
                                            <th>Employee name</th>
                                            <th>Tool Name</th>
                                            <!-- <th class="hidden-480">Quantity</th> -->

                                            <th class="hidden-480">Action</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($_POST['bsearch']) && $_POST['toolname'] != '') {
                                            $bsearch = $_POST['search'];
                                            $selectedool = $_POST['toolname'];
                                            if($bsearch == ''){
                                                $pendingQuery = "select * from emp where state = '$state' AND username not in (SELECT employeeid FROM employeetoollist where toolname = '$selectedool' and state = '$state')";
                                            }
                                            else {
                                                $pendingQuery = "select * from emp where state = '$state' AND username not in (SELECT employeeid FROM employeetoollist where toolname = '$selectedool' and state = '$state')  and emp_name like '%$bsearch %'";
                                            }
                                            //$y = "select id,employeeid,name,toolname,date,sum(qty) as qty from employeetoollist where state ='$state' and date <= '$expiredDate' and (employeeid like  '%$bsearch%' or name like '%$bsearch%' ) group by toolname,employeeid  ";
                                            $t = mysqli_query($link, $pendingQuery) or die(mysqli_error($link));
                                            $i = 1;
                                            while ($t1 = mysqli_fetch_array($t)) {
                                        ?>

                                                <tr>

                                                    <td><?php echo $i; ?></td>


                                                    <td>
                                                        <?php echo $t1['employeeid']; ?>
                                                    </td>

                                                    <td><?php echo $t1['emp_name']; ?></td>

                                                    <td><?php echo $selectedool; ?></td>

                                                    <td class="hidden-480">
                                                        <!--<a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteemployee.php?id=<?php echo $t1['employeeid']; ?>">-->
                                                        <!-- <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteexpiredtools.php?id=<?php echo $t1['id']; ?>&state=<?php echo $state ?>"><img src="images/Icon_Delete.png"></a> -->
                                                    </td>

                                                </tr>




                                            <?php $i++;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
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