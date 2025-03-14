<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$state = $_GET['state'];
$emploid = $_GET['id'];
if ($_SESSION['user']) {
  $name = $_SESSION['user'];
  //include('org1.php');
  include 'dbfiles/org.php';
  include 'dbfiles/uqry_noc.php';
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
  <script>
    function s2(i) {
      var curval = document.getElementById("pname" + i).value;
      $.ajax({
        type: "GET",
        url: "getdescriptionauto.php",
        data: {
          keyword: curval,
          id: i
        },
        success: function(data) {
          $("#suggesstion-box" + i).show();
          $("#suggesstion-box" + i).html(data);
          $("#pname" + i).css("background", "#FFF");
        }
      });
    }

    function selectCountry(val, i) {
      document.getElementById("pname" + i).value = val;
      $("#suggesstion-box" + i).hide();
    }
  </script>

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
  </script>
  <script>
    function getqty(str, ivalue) {
      if (str.length == 0) {
        document.getElementById("avlbqty" + ivalue).innerHTML = "";
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
          document.getElementById("avlbqty" + ivalue).value = strar[1];
        }
      }
      xmlhttp.open("GET", "getavblqty.php?q=" + str, true);
      xmlhttp.send();
    }

    function showHint22(str) {

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
    function showUser(str, id) {

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
          //document.getElementById("serv_num"+id).value=strar[1];	
          //document.getElementById("hsn"+id).value=strar[2];
          document.getElementById("gst" + id).value = strar[3];
          //document.getElementById("addr").value=strar[4];	
          //document.getElementById("uom"+id).value=strar[4];
          document.getElementById("price" + id).value = strar[5];
          //document.getElementById("serv_amt"+id).value=strar[6];


        }
      }
      xmlhttp.open("GET", "get_items.php?q=" + str, true);
      xmlhttp.send();
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
      //var serv_amt=document.getElementById('serv_amt'+id).value;


      bal = (parseFloat(amt) * parseFloat(sgst)) / 100;
      alert(sgst);
      // ser=(parseFloat(amt)*parseFloat(serv_amt))/100;
      document.getElementById('sgstamt' + id).value = bal;
      //  document.getElementById('serv_amnt'+id).value=ser;
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

    function qvalue(id) {
      console.log("cakked");
      sum = 0;
      var duevalue = document.getElementById("tool_rv" + id).value;

      $('.due').each(function() {
        if ($(this).val() != '') sum += parseFloat($(this).val());
      });

      $('#toolsdue').val(sum);


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
                <a href="qot_list"> Portfolio</a>
              </li>
              <li>
                <a href="">NOC</a>
              </li>

              <!--<li class="active">Blank Page</li>-->
            </ul><!-- /.breadcrumb -->

            <!-- /.nav-search -->
          </div>

          <div class="page-content">
            <!-- /.ace-settings-container -->
            <div class="page-header">
              <h1 align="center">
                NOC

              </h1>
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
                      <?php
                      $empquery = mysqli_query($link, "select * from add_noc where id='$emploid'");
                      $emprow1 = mysqli_fetch_array($empquery);
                      ?>
                      <input type="hidden" name="id" value="<?php echo $emprow1['id']; ?>">
                      <input type="hidden" name="ses" value="<?php echo $name; ?>">
                      <table class="table table-striped table-bordered table-hover">
                        <tr>

                          <td align="right">Employee ID</td>
                          <td><input type="text" readonly value="<?php echo $emprow1['emp_id']; ?>" readonly required name="empid" id="empid" class="form-control" readonly="readonly" required></td>
                          <td align="right">Name of Employee </td>
                          <td><input type="text" class="form-control" readonly value="<?php echo $emprow1['emp_name']; ?>" required name="empname" id="empname"></td>
                        </tr>
                        <tr>
                          <td align="right">DOJ</td>
                          <td>
                            <input type="text" required name="DOJ" value="<?php echo $emprow1['doj']; ?>" readonly id="DOJ" class="form-control">
                          </td>
                          <td align="right"> Designation</td>
                          <td>
                            <input type="text" name="designation" value="<?php echo $emprow1['desig']; ?>" id="designation" readonly required class="form-control">
                          </td>
                        </tr>

                        <tr>
                          <td align="right">Reson For Resignation</td>
                          <td>
                            <textarea name="reason" id="reason" value="<?php echo $emprow1['reason']; ?>" class="form-control" rows="2" cols="5"><?php echo $emprow1['reason']; ?></textarea>
                          </td>

                        </tr>




                      </table>


                      <div class="table-header">
                        Noc Clear List
                      </div>

                      <?php
                      ?>


                      <div>

                        <div class="table-responsive">
                          <table id="dynamic-table1" class="table table-striped table-bordered table-hover" style="font-size:16px">

                            <th>S.No</th>
                            <th>Criteria</th>
                            <th> Remarks(Yes/No)</th>
                            <th>Recoverable Value</th>

                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Resign letter given or not</td>
                                <td><input type="radio" id="resign" name="resign" value="Yes" <?php if ($emprow1['resign'] == 'Yes') {
                                                                                                echo "checked='checked'";
                                                                                              } ?>> <label for="resign">Yes</label>
                                  <input type="radio" id="resign" name="resign" value="No" <?php if ($emprow1['resign'] == 'No') {
                                                                                              echo "checked='checked'";
                                                                                            } ?>> <label for="resign">No</label>
                                </td>


                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Notice period done or no</td>
                                <td><input type="radio" id="np" name="np" value="Yes" <?php if ($emprow1['np'] == 'Yes') {
                                                                                                echo "checked='checked'";
                                                                                              } ?>> <label for="np">Yes</label>
                                  <input type="radio" id="np" name="np" value="No" <?php if ($emprow1['np'] == 'No') {
                                                                                              echo "checked='checked'";
                                                                                            } ?>> <label for="np">No</label>
                                </td>

                              </tr>
                              <!-- <tr>
                                <td>3</td>
                                <td>Uniform (T-Shirts - 2 or more) returned or not</td>
                                <td><input type="radio" id="uniform" name="uniform" value="Yes"> <label for="uniform">Yes</label>
                                  <input type="radio" id="uniform" name="uniform" value="No"> <label for="uniform">No</label>
                                </td>
                                <td>
                                  <input type="text" name="uniform_rv" id="uniform_rv" placeholder="if Yes" class="form-control">
                                </td>
                              </tr> -->
                              <!-- <tr>
                                <td>4</td>
                                <td>ID card returned or not</td>
                                <td><input type="radio" id="id_card" name="id_card" value="Yes"> <label for="idcard">Yes</label>
                                  <input type="radio" id="id_card" name="id_card" value="No"> <label for="idcard">No</label>
                                </td>
                                <td>
                                  <input type="text" name="idcard_rv" id="idcard_rv" placeholder="if Yes" class="form-control">
                                </td>
                              </tr> -->

                              <!-- <tr>
                                <td>5</td>
                                <td>Safety shoe returned or not</td>
                                <td><input type="radio" id="shoes" name="shoes" value="Yes"> <label for="shoes">Yes</label>
                                  <input type="radio" id="shoes" name="shoes" value="No"> <label for="shoes">No</label>
                                </td>
                                <td>
                                  <input type="text" name="shoes_rv" id="shoes_rv" placeholder="if Yes" class="form-control">
                                </td>
                              </tr> -->
                              <!-- <tr>
                                <td>6</td>
                                <td>Tools returned or not (If any shortage mention tool and Value)</td>
                                <td><input type="radio" id="tools" name="tools" value="Yes"> <label for="tools">Yes</label>
                                  <input type="radio" id="tools" name="tools" value="No"> <label for="tools">No</label>
                                </td>
                                <td>
                                  <input type="text" name="tools_rv" id="tools_rv" placeholder="if Yes" class="form-control">
                                </td>
                              </tr> -->
                              <tr>
                                <td>3</td>
                                <td>Supervisor feedback on No due clearance</td>
                                <td> <input type="text" name="sup_fb" id="sup_fb" value="<?php echo $emprow1['sup_fb']; ?>" required class="form-control"></td>


                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Any salary advance pending</td>
                                <td><input type="radio" id="sal_adv" name="sal_adv" value="Yes" <?php if ($emprow1['sal_adv'] == 'Yes') {
                                                                                                          echo "checked='checked'";
                                                                                                        } ?>> <label for="sal_adv">Yes</label>
                                  <input type="radio" id="sal_adv" name="sal_adv" value="No" <?php if ($emprow1['sal_adv'] == 'No') {
                                                                                                        echo "checked='checked'";
                                                                                                      } ?>> <label for="sal_adv">No</label>
                                </td>
                                <td>
                                  <input type="text" name="sal_rv" id="sal_rv" value="<?php echo $emprow1['sal_rv']; ?>" placeholder="if Yes" class="form-control">
                                </td>
                              </tr>

                              <tr>
                                <td>5</td>
                                <td>If wireman certificate applied through company, related amount paid company or not</td>
                                <td><input type="radio" id="wire_certi" name="wire_certi" value="Yes" <?php if ($emprow1['wire_certi'] == 'Yes') {
                                                                                                                echo "checked='checked'";
                                                                                                              } ?>> <label for="wire_certi">Yes</label>
                                  <input type="radio" id="wire_certi" name="wire_certi" value="No" <?php if ($emprow1['wire_certi'] == 'No') {
                                                                                                              echo "checked='checked'";
                                                                                                            } ?>> <label for="wire_certi">No</label>
                                </td>
                                <td>
                                  <input type="text" name="wire_rv" id="wire_rv" value="<?php echo $emprow1['wire_rv']; ?>" placeholder="if Yes" class="form-control">
                                </td>
                              </tr>
                              <?php
                              $employeeid = $emprow1['emp_id'];
                              $toolquery = mysqli_query($link, "select * from employeetoollist where employeeid='$employeeid'");
                              $id = 6;
                              $bid = 0;
                              while ($toolqueryarray = mysqli_fetch_array($toolquery)) {
                              ?>
                                <tr>
                                  <td name="tool_id[]"><?php echo $id; ?></td>
                                  <td><input type="text" name="tool_name[]" value="<?php echo $toolqueryarray['toolname'] ?>" id="tool_name<?php echo $id; ?>" hidden><?php echo $toolqueryarray['toolname'] ?></td>
                                  <td><input type="radio" id="tool_ret<?php echo $bid; ?>" name="tool_ret<?php echo $bid; ?>" <?php if ($toolqueryarray['returned'] == 'Yes') {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                      } ?> value="Yes"> <label for="tool_ret<?php echo $bid; ?>[]">Yes</label>
                                    <input type="radio" id="tool_ret<?php echo $bid; ?>" name="tool_ret<?php echo $bid; ?>" <?php if ($toolqueryarray['returned'] == 'No') {
                                                                                                                                      echo "checked='checked'";
                                                                                                                                    } ?> value="No"> <label for="tool_ret<?php echo $bid; ?>[]">No</label>
                                  </td>
                                  <td>
                                    <input type="number" class="due" name="tool_rv[]" id="tool_rv<?php echo $id; ?>" value="<?php echo $toolqueryarray['due'] ?>" onkeyup='qvalue(<?php echo $id ?>)' placeholder="if Yes" class="form-control">
                                  </td>
                                </tr>
                              <?php
                                $id++;
                                $bid++;
                              }

                              ?>
                              <tr>
                                <td><?php echo $id;
                                    $id++ ?></td>
                                <td>Tools due</td>
                                <td>
                                </td>
                                <td>
                                  <input type="number" name="toolsdue" id="toolsdue" value="<?php echo $emprow1['tooldue']; ?>" readonly class="form-control">
                                </td>
                              </tr>

                              <tr>
                                <td><?php echo $id; ?></td>
                                <td>If any other Dues to companies</td>
                                <td><input type="radio" id="other" name="other" <?php if ($emprow1['other'] == 'Yes') {
                                                                                          echo "checked='checked'";
                                                                                        } ?> value="Yes"> <label for="other">Yes</label>
                                  <input type="radio" id="other" name="other" <?php if ($emprow1['other'] == 'No') {
                                                                                        echo "checked='checked'";
                                                                                      } ?> value="No"> <label for="other">No</label>
                                </td>
                                <td>
                                  <input type="text" name="other_rv" value="<?php echo $emprow1['other_rv']; ?>" id="other_rv" placeholder="if Yes" class="form-control">
                                </td>
                              </tr>




                            </tbody>
                          </table>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-4 col-md-8">


                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                              <i class="ace-icon fa fa-save bigger-110"></i>
                              Save
                            </button>





                            &nbsp; &nbsp; &nbsp;
                            <a href="noc_list.php?state=<?php echo $state;?>"><button class="btn btn-danger" type="button" name="button" id="Close">
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

  </body>

  </html>
<?php

} else {
  session_destroy();

  session_unset();

  header('Location:index.php?authentication failed');
}

?>