<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state = $_GET['state'];
$id = $_GET['id'];

if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');
    include 'dbfiles/org.php';
    //include'dbfiles/iqry_acyear.php';
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
                                <a href=""> Notice period</a>
                            </li>

                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Notice Period

                            </h1>
                        </div>

                        <?php $id = $_GET['id'];

                        //echo $id;

                        //include('config.php');
                        $res = mysqli_query($link, "select * from emp where status!='' and state = '$state' and empid='$id'") or die(mysqli_error());
                        $rw = mysqli_fetch_array($res) or die(mysqli_error());
                        ?>


                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">

                                        <form name="frm" method="post" action="resign_suc.php?state=<?php echo $state; ?>&empid=<?php echo $id;?>" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="ses" value="<?php echo $name; ?>">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>

                                          
                                                <td align="right">UserName</td>
                                                <td align="left"><input type="text" value="<?php echo $rw['username'] ?>" readonly class="form-control" name="username" id="username"></td>
                                                 
                                                <td align="right">Start Date</td>
                                                <td><input type="date" name="start_date" id="start_date" value="<?php echo $rw['start_date'] ?>" required class="form-control"></td>
                                                
                                                  </tr>

                                            <tr>
                                            <td align="right">Name</td>
                                            <td align="left"><input type="text" value="<?php echo $rw['emp_name'] ?>" readonly class="form-control" name="name" id="name"></td>
                                            <td align="right">Last Date</td>
                                            <td><input type="date" name="last_date" id="last_date" value="<?php echo $rw['last_date'] ?>" required class="form-control"></td>
                                            </tr>

                                            <tr>
                                            <td align="right">Reason1</td>
                                            <td align="left"><input type="text" value="<?php echo $rw['reason1'] ?>" required class="form-control" name="reason1" id="reason1"></td>
                                            <td align="right">Reason2</td>
                                            <td><input type="text" name="reason2" id="reason2" value="<?php echo $rw['reason2'] ?>"  class="form-control"></td>
                                            </tr>
                                            <tr>
                                            <td align="right">Reason3</td>
                                            <td align="left"><input type="text" value="<?php echo $rw['reason3'] ?>" class="form-control" name="reason3" id="reason3"></td>
                                            <td align="right">Reason4</td>
                                            <td><input type="text" name="reason4" id="reason4" value="<?php echo $rw['reason4'] ?>" class="form-control"></td>
                                            </tr>

                                            </table>
                                            <div>


                                                <div class="form-group">
                                                    <div class="col-md-offset-4 col-md-8">


                                                        <button class="btn btn-info" type="submit" name="update" id="update">
                                                            <i class="ace-icon fa fa-save bigger-110"></i>
                                                            Save
                                                        </button>





                                                        &nbsp; &nbsp; &nbsp;
                                                        <a href="al_list.php?id=<?php echo $state;?>"><button class="btn btn-danger" type="button" name="button" id="Close">
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