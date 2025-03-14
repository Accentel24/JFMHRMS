<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <title>JYOTHI FACILITY MANAGEMENT</title>
    <script type="text/javascript">
        function printt() {
            document.getElementById("prt").style.display = "none";
            document.getElementById("cls").style.display = "none";
            window.print();
        }

        function closs() {
            window.close();
        }
    </script>
    <style type="text/css">
        table {
            page-break-inside: auto;
            page-break-inside: auto;
            border-color: #fff;
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        thead,
        tfoot {
            border: none !important;
            border-color: #fff;
        }

        tr.noBorder th {
            border: none !important;
            border-color: #fff;
        }

        #tds {

            border: 0;
        }

        table {
            border-left: none !important;
            border-top: none !important;
            border-bottom: none !important;
            border-right: none !important;
        }

        .pageNumbering {
            display: block;
            font-weight: normal;
            font-size: 8pt;
            color: #666666;
            font-style: normal;
            font-family: Arial, Helvetica;
            text-decoration: none;
            text-align: right;
        }

        .pagenum:before {
            content: counter(page);
        }

        footer {
            font-size: 24px;
            color: #f00;
            width: 100%;
            text-align: center;
        }

        header {
            font-size: 9px;
            color: #f00;
            text-align: center;
        }

        @page {
            size: A4;
            margin: 11mm 9mm 11mm 5mm;

            @bottom {
                content: "Page " counter(page) " of " counter(pages)
            }
        }

        @media print {
            footer {
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            header {
                position: fixed;
                top: 0;
            }

            .content-block,
            p {
                page-break-inside: avoid;
            }

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>

<body>
    <div class="page">
        <?php //include('config.php');
        include('dbconnection/connection.php');
        $nocid = $_GET['id'];
        $q = mysqli_query($link, "select * from add_noc where id='$nocid'") or die(mysqli_error($link));
        $r = mysqli_fetch_array($q);
        $empid = $r['emp_id'];
        $empname = $r['emp_name'];

        $desig = $r['desig'];
        $doj = $r['doj'];
        $reason = $r['reason'];
        $resign = $r['resign'];
        $np = $r['np'];

        $supfb = $r['sup_fb'];
        $saladv = $r['sal_adv'];
        $salrv = $r['sal_rv'];
        $wirecerti = $r['wire_certi'];
        $wirerv = $r['wire_rv'];
        $other = $r['other'];
        $otherrv = $r['other_rv'];
        $tooldue = $r['tooldue'];
        $state = $r['state'];
        ?>





        <header>



            <!-- style="width:100%;height:120px;"-->
            <!-- <img src="jyothi.jpg" style="width:100%;height:120px;"/>-->
        </header>
        <table border='1' cellpadding="0" cellspacing='0' style="width:100%">
            <thead>
                <tr class="noBorder">
                    <th colspan="14" style="padding-top:120px;border-right:none !important;font-size:18px;"></th>
                </tr>
            </thead>
            <tfoot>
                <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;">
                    <th class="noBorder " colspan="14" style="padding-top:80px;"></th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
            <tr>
                <td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>Company Properties Reconciliation Form</b></td>
                </td>
            </tr>
            <tr>
                <td colspan="14">
                    <fieldset style="    border-right: 1px groove;
    border-left: 0px;
    border-top: 0px;
    border-bottom: 0px;">
                        <div style="border:0px solid #000;">
                            <table style="width: 100%">

                                <tr>
                                    <td>
                                        <b> Name of the Employee: <?php echo $empname ?> </b>
                                    </td>
                                    <td>
                                        <b> Employee ID: <?php echo $empid ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Date of joining: <?php echo $doj ?></b>
                                    </td>
                                    <td>
                                        <b>State: <?php echo $state ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Designation: <?php echo $desig ?></b>
                                    </td>
                                    <td>
                                        <b>Reason: <?php echo $reason ?></b>
                                    </td>
                                </tr>
                            </table>

                        </div>

    </div>

    </td>
    </tr>
    </td>
    </tr>

    <tr>
        <th>SNo</th>
        <th>Details</th>
        <th>Given/Returned</th>
        <th>Remarks</th>
    </tr>
    <tr>
        <th>1</th>
        <th>Resign letter given or not</th>
        <th><?php echo $resign; ?></th>
        <th></th>
    </tr>
    <tr>
        <th>2</th>
        <th>Notice period done or no</th>
        <th><?php echo $np; ?></th>
        <th></th>
    </tr>
    <tr>
        <th>3</th>
        <th>Supervisor feedback on No due clearance</th>
        <th><?php echo $supfb; ?></th>
        <th></th>
    </tr>
    <tr>
        <th>4</th>
        <th>Any salary advance pending</th>
        <th><?php echo $saladv; ?></th>
        <th><?php echo $salrv; ?></th>
    </tr>
    <tr>
        <th>5</th>
        <th>If wireman certificate applied through company, related amount paid company or not</th>
        <th><?php echo $wirecerti; ?></th>
        <th><?php echo $wirerv; ?></th>
    </tr>



    <?php
    include_once('dbconnection/connection.php');
    $bid = $r['id'];

    $aa = "select * from employeetoollist where employeeid='$empid'";

    $t = mysqli_query($link, $aa) or die(mysqli_error($link));
    $i = 6;
    while ($toolqueryarray = mysqli_fetch_array($t)) {

    ?>
        <tr>
            <th><?php echo $i; ?></th>
            <th><?php echo $toolqueryarray['toolname'] ?></th>
            <th><?php echo $toolqueryarray['returned'] ?></th>
            <th><?php echo $toolqueryarray['due'] ?></th>
        </tr>
    <?php
        $i++;
    }
    ?>

    <tr>
        <th><?php echo $i++; ?></th>
        <th>Tool Due</th>
        <th></th>
        <th><?php echo $tooldue; ?></th>
    </tr>

    <tr>
        <th><?php echo $i; ?></th>
        <th>If any other Dues to companies</th>
        <th><?php echo $other; ?></th>
        <th><?php echo $otherrv; ?></th>
    </tr>

    </tbody>

    </table>
    <table border='1' cellpadding="0" cellspacing='0' style="width:100%">
        <thead>
            <tr>
                <th colspan="3">Employee Declaration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3" style="width:70%">
                    This is to confirm that I have received above said all the mentioned tools from Jyothi Facility Management Pvt Ltd in working condition.
                    I will return all of them to the company while leaving this job and i will accept to debit my salary if any Damaged or Theft or Lost or failed to return.
                </td>
                <td style="width:15%">
                    Sign & Date
                </td>
                <td style="width:15%">
                    Thumb
                </td>
            </tr>
            <tr>
                <td style="width:15%" rowspan="2">
                    <br>
                    <br>
                    <br>

                </td>
                <td style="width:15%" rowspan="2">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
            </tr>
        </tbody>
    </table>
    <table border='1' cellpadding="0" cellspacing='0' style="width:100%">
        <thead>
            <tr>
                <th colspan="3">No Due Certificate Procedure</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3" style="width:70%">
                    This is to declarate that I am accepting to debit the penalty amount from my salary towards Damaged/Not returned items value.
                </td>
                <td style="width:15%">
                    Penalty Value
                </td>
                <td style="width:15%">
                    Employee Sign for Acceptence
                </td>
            </tr>
            <tr>
                <td style="width:15%" rowspan="2">
                    <?php echo $tooldue+$otherrv;?>
                </td>
                <td style="width:15%" rowspan="2">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
            </tr>
        </tbody>
    </table>
    <table align="center">
        <tr>
            <td height="20px"></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()" /></td>
            <td><input type="button" value="Close" id="cls" class="butt" onclick="window.close();" /></td>
        </tr>
    </table>
    <footer>
        <!--<div class="footer">Page: <span class="pagenum"></span></div>-->
        <!--<span class="pagenum"></span>-->
        <hr />
        <!-- <div>Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div>Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div>CIN:U64203TG2004PTC042772</div>-->


    </footer>
    </div>
</body>

</html>