<?php //include('config.php');
session_start();
//include('dbconnection/connection.php');
$state = $_GET['state'];
if ($_SESSION['user']) {
    $name = $_SESSION['user'];
    $tsname = $_SESSION['user'];
    //include('org1.php');
    //$y=mysqli_query($link,"select * from employee where emp_name='$name'");
    //$y1=mysqli_fetch_array($y);
    //$email=$y1['emp_email'];

    //include'dbfiles/org.php';
    //include'dbfiles/iqry_acyear.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include 'template/headerfile.php'; ?>
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

        function openAddNew() {
            var data = document.getElementById("nocempid").value;
            if (data == "") {
                alert("please select an employee");
            } else {
                console.log('add_noc.php?id=' + data + '&state=<?php echo $state; ?>');
                location.href = 'https://softdemo.in/hrms/add_noc.php?id=' + data + '&state=<?php echo $state; ?>';
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
                                <a href="#">NOC List</a>
                            </li>

                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>


                    <!-- PAGE CONTENT BEGINS -->

                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!--<a href="addbill.php"><button type="button" class="btn-success btn-sm ">Add New</button></a>-->

                            <div class="table-header">
                                NOC List
                            </div>
                            <br />
                            <!-- div.table-responsive -->
                            <div style="margin-bottom:20px;">
                                <?php if (($tsname == "8919765662") or ($tsname == "9985744288") or ($tsname == "9985894749") or ($tsname == "9959419056") or ($tsname == "9182198721") or ($tsname == "9666466368")) {
                                } else { ?>



                                    <div class="col-sm-9">

                                        <input type="text" readonly value="" placeholder="select employee" readonly required name="nocempid" id="nocempid" class="form-control" onclick="window.open('nocemps_popup.php?state=<?php echo $state ?>','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')" readonly="readonly" required>
                                    </div>
                                    <div class="col-sm-3">

                                        <button class="btn btn-info" onclick="openAddNew()"> Add New </button>
                                    </div>
                                    <br />
                                    <br />
                                    <br />


                                <?php } ?>
                            </div>
                            <form method="post" action="" class="form-horizontal">

                                <div class="form-group">



                                    <div class="col-sm-4">

                                        <input type="text" class="form-control " id="search" name="search" placeholder="Search By Name  or State or Location" />
                                    </div>
                                    <div class="col-sm-3">

                                        <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                            <i class="ace-icon fa fa-search bigger-110"></i>
                                            Search
                                        </button>
                                    </div>
                                    <!--<div class="col-sm-2"><b><a href="qut_ap_excel.php" class="btn btn-primary btn-xs">XL Download</a></b></div>
				    <div class="col-sm-1"><b>
					 <a onclick="window.open('qut_ap_print.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')"
												   class="btn btn-primary btn-xs">
					
					
					Print</a></b></div>-->
                                </div>

                            </form>



                            <div style="overflow-x:auto;">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <!--<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>-->
                                            <th>S No</th>

                                            <th>Name</th>
                                            <th>State</th>
                                            <th>joining Date</th>
                                            <th>Designation</th>

                                            <th>Reason</th>
                                            <th>Tools Due</th>
                                            <th>Edit</th>
                                            <?php if (($tsname != "admin")) {
                                            } else { ?>

                                            <?php } ?>

                                            <th>Print</th>
                                            <th>Pdf Download</th>




                                    </thead>

                                    <tbody>

                                        <?php
                                        include('dbconnection/connection.php');


                                        $datatable = "add_noc";
                                        $results_per_page = 30;
                                        if (isset($_GET["page"])) {
                                            $page  = $_GET["page"];
                                        } else {
                                            $page = 1;
                                        };
                                        $start_from = ($page - 1) * $results_per_page;


                                        if (isset($_POST['bsearch'])) {
                                            $bsearch = $_POST['search'];
                                            // $y="select a.store_name,a.city,b.quet_num,b.store_code,b.inv_date,b.id
                                            //from add_qot b,dpr a where a.store_code=b.store_code order by b.id desc ";
                                            $y = "select * from add_noc where name like '%$bsearch%' and state = '$state' order by id desc";
                                        } 
                                        //else
										// 		if (isset($_POST['submitkk'])) {
                                        //     //$qot_nun=$_POST['qot_nun'];
                                        //     $store_code = $_POST['store_code'];
                                        //     $store_name = $_POST['store_name'];
                                        //     $coordinator = $_POST['coordinator'];
                                        //     $superwisor = $_POST['superwisor'];
                                        //     $city = $_POST['city'];
                                        //     $status = $_POST['status'];
                                        //     /*echo $y="select  a.quet_num,a.store_code,a.inv_date,a.status,a.id from add_qot a,dpr b where a.quet_num='$qot_nun'
										// 		 or b.store_code='$store_code' or b.store_name='$store_name' or b.coordinator='$coordinator'
										// 		 or b.superwisor='$superwisor' or b.city='$city' or a.status='$status'

										// 		 order by id desc";*/

                                        //     $y = "select  a.quet_num,a.store_code,a.inv_date,a.status,a.id,a.ses from add_qot a,dpr b where
												
												
										// 	(('$store_code' <> ' ' and locate('$store_code', a.store_code) <> 0) or ('$store_code' = ' '  and 1 = 1) ) and
										// 	(('$store_name' <> ' ' and locate('$store_name', b.store_name) <> 0) or ('$store_name' = ' '  and 1 = 1) ) and
										// 	(('$coordinator' <> ' ' and locate('$coordinator', b.coordinator) <> 0) or ('$coordinator' = ' '  and 1 = 1) ) and
										// 	(('$city' <> ' ' and locate('$city', b.city) <> 0) or ('$city' = ' '  and 1 = 1) ) and
										// 	(('$status' <> ' ' and locate('$status', a.status) <> 0) or ('$status' = ' '  and 1 = 1) ) and a.store_code=b.store_code";
                                        // } 
                                        else {

                                            $y = "SELECT * FROM " . $datatable . " where state = '$state' ORDER BY id desc LIMIT $start_from, " . $results_per_page;
                                        }

                                        $t = mysqli_query($link, $y) or die(mysqli_error($link));
                                        $i = $start_from;
                                        $start = 1;
                                        $ro = 0;
                                        $ts = 0;
                                        $tg = 0;
                                        $n = 0;

                                        while ($rs1 = mysqli_fetch_array($t)) {
                                            $user = $rs1['ses'];


                                        ?>

                                            <tr>

                                                <!--<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>-->
                                                <td><?php echo $i + $start; ?></td>


                                                <td class="hidden-480"><?php echo $rs1['emp_name']; ?></td>
                                                <td class="hidden-480"><?php echo $rs1['state']; ?></td>

                                                <td class="hidden-480"><?php echo $rs1['doj']; ?></td>
                                                <td class="hidden-480"><?php echo $rs1['desig']; ?></td>


                                                <td class="hidden-480"><?php echo $rs1['reason']; ?></td>

                                                <td class="hidden-480"><?php echo $rs1['tooldue']; ?></td>

                                                <td class="hidden-480">



                                                    <?php

                                                    if ($tsname == 'admin') { ?>
                                                        <a href="edit_noc_details.php?state=<?php echo $state;?>&id=<?php echo $rs1['id']; ?>">
                                                            <img src="images/edit.gif"></a>
                                                        <?php     } else {
                                                        echo $user;
                                                        echo $tsname;
                                                        if ($tsname == $user) { ?>
                                                            <a href="edit_noc_details.php?state=<?php echo $state;?>&id=<?php echo $rs1['id']; ?>">
                                                                <img src="images/edit.gif"></a>
                                                        <?php  } else { ?>

                                                            <img src="images/edit.gif">
                                                    <?php }
                                                    }
                                                    ?>



                                                </td>
                                                <?php if (($tsname != "admin")) {
                                                } else { ?>

                                                <?php } ?>

                                                <td class="hidden-480">

                                                    <a onclick="window.open('noc_print.php?id=<?php echo $rs1['id']; ?>','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" class="btn btn-primary btn-xs"><img src="images/printer.png"></a>
                                                </td>



                                                <td class="hidden-480">
                                                    <a href="noc_pdf.php?id=<?php echo $rs1['id']; ?>" class=""><img src="images/pdf_icon.gif" width="30" height="30"></a>

                                                </td>

                                            </tr>
                                        <?php $i++;
                                        }


                                        ?>


                                    </tbody>
                                </table>






                                <div align="center">
                                    <?php
                                    $sql = "SELECT COUNT(id) AS total FROM " . $datatable. " where state = '$state'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results




                                    echo "<ul class='pagination'>";
                                    echo "<li><a href='noz_list.php?page=" . ($page - 1) . "' class='button'>Previous</a></li>";

                                    echo "<li><a>" . $page . "</></li>";

                                    echo "<li><a href='noc_list.php?page=" . ($page + 1) . "' class='button'>NEXT</a></li>";
                                    echo "</ul>";
                                    ?>

                                </div>



                            </div>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->

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
            jQuery(function($) {
                //initiate dataTables plugin
                var myTable =
                    $('#dynamic-table')
                    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .DataTable({
                        bAutoWidth: false,
                        "aoColumns": [{
                                "bSortable": false
                            },
                            null, null, null, null, null, null, null,
                            {
                                "bSortable": false
                            }
                        ],
                        "aaSorting": [],




                        select: {
                            style: 'multi'
                        }
                    });



                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons(myTable, {
                    buttons: [{
                            "extend": "colvis",
                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            columns: ':not(:first):not(:last)'
                        },
                        {
                            "extend": "copy",
                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "csv",
                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "excel",
                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "pdf",
                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "print",
                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            autoPrint: false,
                            message: 'This print was produced using the Print button for DataTables'
                        }
                    ]
                });
                myTable.buttons().container().appendTo($('.tableTools-container'));

                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function(e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function(e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if (div.length == 1)
                            div.tooltip({
                                container: 'body',
                                title: div.parent().text()
                            });
                        else
                            $(this).tooltip({
                                container: 'body',
                                title: $(this).text()
                            });
                    });
                }, 500);





                myTable.on('select', function(e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                    }
                });
                myTable.on('deselect', function(e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                    }
                });




                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function() {
                    var th_checked = this.checked; //checkbox inside "TH" table header

                    $('#dynamic-table').find('tbody > tr').each(function() {
                        var row = this;
                        if (th_checked)
                            myTable.row(row).select();
                        else
                            myTable.row(row).deselect();
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
                    var row = $(this).closest('tr').get(0);
                    if (this.checked)
                        myTable.row(row).deselect();
                    else
                        myTable.row(row).select();
                });



                $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });



                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox


                //select/deselect a row when the checkbox is checked/unchecked




                /********************************/
                //add tooltip for small view action buttons in dropdown menu


                //tooltip placement on right or left



                /***************/






                /**
                 //add horizontal scrollbars to a simple table
                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                 {
                 horizontal: true,
                 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                 size: 2000,
                 mouseWheelLock: true
                 }
                 ).css('padding-top', '12px');
                 */


            })

            function myFunction() {
                // Declare variables
                var input, filter, table, tr, td, i, occurrence;

                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 2; i < tr.length; i++) {
                    occurrence = false; // Only reset to false once per row.
                    td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        currentTd = td[j];
                        if (currentTd) {
                            if (currentTd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                                occurrence = true;
                            }
                        }
                    }
                    if (!occurrence) {
                        tr[i].style.display = "none";
                    }
                }
            }
        </script><!-- inline scripts related to this page -->
    </body>

    </html>
<?php

} else {
    session_destroy();

    session_unset();

    header('Location:index.php?authentication failed');
}

?>