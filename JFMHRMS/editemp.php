<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state=$_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    //include('org1.php');


    include 'dbfiles/org.php';
    include 'dbfiles/uqry_emp.php';
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
                                <a href="#">Edit Employee Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="#">
                            <center style="color:#192436"><u><b>
                                        <h1>EDIT EMPLOYEE</h1>
                                    </b></u></center>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-info">
                                    <div class="box-header with-border">

                                    </div>
                                    <?php $id = $_GET['id'];

                                    //include('config.php');

                                    $res = mysqli_query($link, "select * from emp where empid='$id'") or die(mysqli_error());
                                    $rw = mysqli_fetch_array($res) or die(mysqli_error());
                                    //$to=$rw['btype'];
                                    //$msg=$rw['msg'];
                                    $employeeId = $rw['employeeid'];
                                    //echo($employeeId);
                                    $certquery = mysqli_query($link, "select * from certificates where employeeid = '$employeeId'");
                                    $crows = mysqli_num_rows($certquery);
                                    //echo($check_num_rows);


                                    ?>

                                    <form name="frm" method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="hidden" name="ses" value="<?php echo $name; ?>">
                                        <table class="table table-striped table-bordered table-hover">
                                            <tr>
                                                <td align="right">State:</td>
                                                <td><select name="state" id="state" required class="form-control">
                                                        <option value="<?php echo $rw['state']; ?>"><?php echo $rw['state']; ?></option>
                                                        <option value="">Select State</option>
                                                        <option value="AP">AP</option>
                                                        <option value="TS">TS</option>
                                                        <option value="KL">KL</option>
                                                        <option value="TN">TN</option>
                                                        <option value="KN">KN</option>
                                                    </select> </td>
                                                <td align="right">Employee ID</td>
                                                <td><input type="text" readonly value="<?php echo $rw['employeeid'] ?>" required name="eid" id="eid" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Name of Employee </td>
                                                <td><input type="text" class="form-control" value="<?php echo $rw['emp_name'] ?>" required name="empname" id="empname"></td>
                                                <td align="right">DOB</td>
                                                <td><input type="date" value="<?php echo date('Y-m-d', strtotime($rw["DOB"])) ?>" required name="dob" id="dob" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Gender</td>
                                                <td align="left">


                                                    <label><input type="radio" name="gender" value="Male" <?php if (strtolower($rw['gender']) == "male") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>Male</label>
                                                    <label><input type="radio" name="gender" value="female" <?php if (strtolower($rw['gender']) == "female") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>feMale</label>

                                                </td>




                                                <td align="right">Marital Status</td>
                                                <td>
                                                    <input type="radio" id="married" onchange="showchildren(this)" name="marstatus" value="married" <?php if (strtolower($rw['maritalstatus']) == "married") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                    <label for="married">Married</label>
                                                    <input type="radio" id="unmarried" name="marstatus" onchange="showchildren(this)" value="unmarried" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                                                    <label for="unmarried">unmarried</label>
                                                </td>
                                            </tr>
                                            <tr id="childrenblock" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                        echo 'hidden';
                                                                    } ?>>

                                                <td align="right">Wife Name</td>
                                                <td align="left">
                                                    <input type="text" value="<?php echo $rw['wname'] ?>" class="form-control" name="wname" id="wname" placeholder="Enter your Wife name">
                                                </td>

                                                <td align="right">No of kids</td>
                                                <td align="left">
                                                    <input type="number" name="nok" id="nok" value="<?php echo $rw['nok'] ?>" placeholder=" enter your number of kids " class="form-control" />
                                                </td>


                                            </tr>
                                            <tr id="childrennameblock" <?php if (strtolower($rw['maritalstatus']) == "unmarried") {
                                                                            echo 'hidden';
                                                                        } ?>>
                                                <td align="right">Children Names</td>
                                                <td align="left">
                                                    <textarea name="childname" id="childname" value="<?php echo $rw['childname'] ?>" class="form-control"><?php echo $rw['childname'] ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td align="right">Father Name</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['fname'] ?>" name="fname" id="fname">
                                                </td>


                                                <td align="right">Mother Name </td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['mname'] ?>" id="mname" name="mname">

                                                </td>
                                            </tr>
                                            <tr>

                                                <td align="right">Contact No.</td>
                                                <td align="left">
                                                    <input type="number" value="<?php echo $rw['contactno'] ?>" class="form-control" name="conno" id="conno">
                                                </td>


                                                <td align="right">Alternate Contact No. </td>
                                                <td align="left">
                                                    <input type="number" class="form-control" value="<?php echo $rw['alternateno'] ?>" id="aconno" name="aconno">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Family Member Contact No. </td>
                                                <td align="left">

                                                    <select name="relation" required>
                                                        <option value="<?php echo $rw['relation']; ?>"><?php echo $rw['relation']; ?></option>
                                                        <option value="">Relation</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Wife">Wife</option>
                                                    </select>
                                                    <input type="text" class="text" style="width:75% !important;" value="<?php echo $rw['rno']; ?>" name="rno" id="rno" required="required" />

                                                </td>
                                                <td align="right">Email Id</td>
                                                <td>
                                                    <input type="text" required name="email" id="email" value="<?php echo $rw['emp_email'] ?>" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td align="right">Adhar No</td>
                                                <td align="left">
                                                    <input type="number" class="form-control" value="<?php echo $rw['adharcardno'] ?>" name="adhar" id="adhar">
                                                </td>
                                                <td align="right"> Adhar Photo</td>
                                                <td align="left">
                                                    <input type="file" name="adharimg" id="adharimg" class="form-control" />
                                                    <?php
                                                    if ($rw['adharphoto'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['adharphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="right">PAN No.</td>
                                                <td>
                                                    <input type="text" required name="pan" value="<?php echo $rw['pan'] ?>" id="pan" class="form-control">
                                                </td>
                                                <td align="right"> PAN Card Photo</td>
                                                <td align="left">
                                                    <input type="file" name="panimg" id="panimg" class="form-control" />
                                                    <?php
                                                    if ($rw['panphoto'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['panphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">UAN No.</td>
                                                <td align="left">
                                                    <input type="text" required name="uan" value="<?php echo $rw['uan'] ?>" id="uan" class="form-control">
                                                </td>
                                                <td align="right">PF No.</td>
                                                <td>
                                                    <input type="text" required name="pf" value="<?php echo $rw['PFNO'] ?>" id="pf" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">ESI No.</td>
                                                <td align="left">
                                                    <input type="text" required name="esi" id="esi" value="<?php echo $rw['ESI_NO'] ?>" class="form-control">
                                                </td>
                                                <td align="right">DOJ</td>
                                                <td align="left">
                                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["DOJ"])) ?>" required name="doj" id="doj" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Qualification</td>
                                                <td align="left">
                                                    <input type="text" required name="qua" value="<?php echo $rw['qualification'] ?>" id="qua" class="form-control">
                                                </td>
                                                <td align="right">Experience</td>
                                                <td>
                                                    <input type="text" required name="exp" value="<?php echo $rw['experience'] ?>" id="exp" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right"> Designation</td>
                                                <td>
                                                    <input type="text" name="des" id="des" value="<?php echo $rw['designation'] ?>" required class="form-control">
                                                </td>
                                                <td align="right">Photo</td>
                                                <td align="left">
                                                    <input type="file" name="empimg" id="empimg" class="form-control" />

                                                    <?php
                                                    if ($rw['photo'] != "") {
                                                    ?>
                                                        <a href='<?php echo $rw['photo'] ?>' target="_blank" style="color:blue;">view image</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">Address</td>
                                                <td align="left">

                                                    <textarea required name="address" id="address" value="<?php echo $rw['address'] ?>" class="form-control"><?php echo $rw['address'] ?></textarea>
                                                </td>
                                                <td align="right">City</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" value="<?php echo $rw['city'] ?>" name="city" id="city">
                                                </td>
                                            </tr>



                                            <tr>
                                                <td align="right">User Name</td>
                                                <td align="left">
                                                    <input type="text" class="form-control" required value="<?php echo $rw['username'] ?>" id="uname" name="uname" placeholder="Enter User Name">
                                                </td>
                                                <td align="right">Password</td>
                                                <td>
                                                    <input type="text" class="form-control" required value="<?php echo $rw['password'] ?>" id="pwd" name="pwd" placeholder="Enter Password">
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
                                                                <input type="text" name="banknm" id="banknm" required class="form-control" value="<?php echo $rw['bname'] ?>">
                                                            </td>
                                                            <td align="right">Branch of Bank</td>
                                                            <td align="left">
                                                                <input type="text" class="form-control" required id="bb" name="bb" value="<?php echo $rw['branch'] ?>">
                                                            </td>
                                                            <<td align="right">IFSC Code</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control" required id="ifcs" name="ifcs" value="<?php echo $rw['ifsc'] ?>">
                                                                </td>
                                                        </tr>

                                                        <tr>

                                                            <td align="right"> Account No.</td>
                                                            <td>
                                                                <input type="text" name="acno" id="acno" required class="form-control" value="<?php echo $rw['accno'] ?>">
                                                            </td>

                                                            <td align="right">Photo of Passbook/ Cancelled Cheque</td>
                                                            <td align="left">
                                                                <input type="file" name="bankimg" id="bankimg" class="form-control" />
                                                                <?php
                                                                if ($rw['bphoto'] != "") {
                                                                ?>
                                                                    <a href='<?php echo $rw['bphoto'] ?>' target="_blank" style="color:blue;">view image</a>
                                                                <?php
                                                                }
                                                                ?>
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
                                                                <input type="text" name="level1" id="level1" value="<?php echo $rw['level1'] ?>" class="form-control">
                                                            </td>
                                                            <td align="right"> Level 2</td>
                                                            <td>
                                                                <input type="text" name="level2" id="level2" value="<?php echo $rw['level2'] ?>" class="form-control">
                                                            </td>
                                                            <td align="right"> Level 3</td>
                                                            <td>
                                                                <input type="text" name="level3" id="level3" value="<?php echo $rw['level3'] ?>" class="form-control">
                                                            </td>
                                                            <td align="right"> Level 4</td>
                                                            <td>
                                                                <input type="text" name="level4" id="level4" value="<?php echo $rw['level4'] ?>" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td align="right"> Level 5</td>
                                                            <td>
                                                                <input type="text" name="level5" id="level5" value="<?php echo $rw['level5'] ?>" class="form-control">
                                                            </td>
                                                            <td align="right"> Level 6</td>
                                                            <td>
                                                                <input type="text" name="level6" id="level6" value="<?php echo $rw['level6'] ?>" class="form-control">
                                                            </td>
                                                            <td align="right"> Level 7</td>
                                                            <td>
                                                                <input type="text" name="level7" id="level7" value="<?php echo $rw['level7'] ?>" class="form-control">
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

                                                            <td><input type="text" size="2" class="form-control" value="<?php echo $rw['tsize'] ?>" placeholder=" Enter Size" name="tsize" id="tsize"></td>

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
                                                            <td><input type="text" size="2" class="form-control" value="<?php echo $rw['psize'] ?>" placeholder="Enter Size" name="psize" id="psize"></td>
                                                            <td align="right"> Phant Issue Date:</td>
                                                            <td>
                                                                <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["phtdt"])) ?>" required name="phtdt" id="phtdt" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td align="right"> Safety Shoes:</td>
                                                            <td>
                                                                <label><input type="radio" name="sshoes" value="YES" <?php if (strtolower($rw['sshoes']) == "yes") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>YES</label>
                                                                <label><input type="radio" name="sshoes" value="NO" <?php if (strtolower($rw['sshoes']) == "no") {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>NO</label>
                                                            <td><input type="text" size="2" class="form-control" value="<?php echo $rw['ssize'] ?>" placeholder="Enter Size" name="ssize" id="ssize"></td>
                                                            <td align="right"> Shoes Issue Date:</td>
                                                            <td>
                                                                <input type="date" value="<?php echo date('Y-m-d', strtotime($rw["shoesdt"])) ?>" required name="shoesdt" id="shoesdt" class="form-control">
                                                            </td>
                                                            <td align="right"> ID Card:</td>
                                                            <td>
                                                                <label><input type="radio" name="idcard" value="YES" <?php if (strtolower($rw['idcard']) == "yes") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>YES</label>
                                                                <label><input type="radio" name="idcard" value="NO" <?php if (strtolower($rw['idcard']) == "no") {
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
                                                                    <h1>CERTIFICATE DETAILS </h1>
                                                                </b></u></center>
                                                        <br />
                                                        <?php
                                                         $crows;
                                                        $i = 1;
                                                        while ($i < 7) {
                                                            if ($i <= $crows) {
                                                                $certRes = mysqli_fetch_array($certquery) or die(mysqli_error());?>
                                                     <tr>
                                                                <td> <b><?php echo $i; ?>.</b></td>
                                                                <input type="hidden" name="<?php echo 'certid' . $i ?>" value="<?php echo $certRes['id'] ?>">
                                                                <td align="right"> Name of Certificate.</td>
                                                                <td>
                                                                    <input type="text" name="<?php echo 'cname' . $i ?>" id="<?php echo 'cname' . $i ?>" value="<?php echo $certRes['cername'] ?>" class="form-control">
                                                                </td>
                                                                <td align="right">Certificate No.</td>
                                                                <td align="left">
                                                                    <input type="text" class="form-control" id="<?php echo 'cno' . $i ?>" value="<?php echo $certRes['cerno'] ?>" name="<?php echo 'cno' . $i ?>">
                                                                </td>
                                                                <td align="right">Photo</td>
                                                                <td align="left">
                                                                    <input type="file" name="$fileName15" id="img1" class="form-control" />
                                                                </td>
                                                            </tr>       
                                                                
                                                           <?php } else {
                                                                $certRes = "";
                                                            }
                                                        ?>
                                                            
                                                        <? $i++;
                                                        }

                                                        ?>


                                                    </table>

                                                </div>

                                            </div>




                                        </table>




                                        <?php
                                        //	echo $aa="select * from employee where empid='$empid'";
                                        /*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/

                                        //$t=mysqli_query($link,$aa) or die(mysqli_error($link));
                                        ?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>


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
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->













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
    <?php mysqli_close($link); ?>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>