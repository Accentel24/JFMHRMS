
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

include('dbconnection/connection.php');
$id = $_GET['id'];
$fileName = $id."-Data.xls"; 
header("Content-Type: application/xls");
header("Content-disposition: attachment; filename=\"$fileName\"");

 

  $state = $_GET['state'];
//$name=$_GET['user'];


            $sql="select * from `emp` where empid='$id'";
            
            $result=mysqli_query($link,$sql);
            $row=mysqli_fetch_assoc($result);
            
            $output .='
            
             <table border="1" >
                 
                  <tr><td colspan="9" rowspan="5"><img src="https://softdemo.in/hrms/images/apjyothi.jpg"></td></tr>
                    </table>
                   <table border="1" >
                   <tr> <td colspan="9" style="text-align:center"><b>Company Properties Reconciliation Form</b></td></tr>                            

                   <tr> <td colspan="9" style="text-align:left"><b>Form Consideration: <br/>
                   This is the form used for both declarion of Company properties taken by an Employee from Company and returning of Company properties from Employee to Company.
                   While returning of Company Properties will be called as No Due Cerrtificate.</b></td></tr> ';                            
              

                       if($result){
                                        $id = $row['employeeid'];
                                        $emp_name =$row['emp_name'];
                                        $emp_email =$row['emp_email'];
                                        $adharcardno =$row['adharcardno'];
                                        $username =$row['username'];
                                        $password =$row['password'];
                                        $DOJ =$row['DOJ'];
                                        $designation =$row['designation'];
                                        $state =$row['state'];
                
                    $output .= '                   
                                <tr>
                                        <td colspan="5"><b>employee id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : ' .$id.'</b></td>
                                        <td colspan="4"><b>Name of the Employee &nbsp&nbsp&nbsp&nbsp :</b> ' .$emp_name.'</td>
                                
                                </tr>
                                <tr>
                                        <td colspan="5"><b>Email address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</b> '.$emp_email.'</td>
                                        <td colspan="4"><b>DOJ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</b> ' .$DOJ.'</td>
                                       
                                        </tr>
                                <tr>
                                        <td colspan="5"><b>Designation&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</b> ' .$designation.'</td>             
                                        <td colspan="4"><b>State &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</b> ' .$state.'</td>
                                      
                                        </tr>
                                        </table>
                                        <br>';
                                       

                        }

                  $output .='
                  <br>
                  <table border="1">
                
                    <tr>

                        <td><b>S No</b></td>
                        <td><b>Item Description</b></td>
                        <td><b>Quantity</b></td>
                        <td><b>Price</b></td>
                        <td><b>Assigned Date</b></td>
                        <td><b>Employee Acknowledgement</b></td>
                        <td><b>Return Date</b></td>
                        <td><b>Company Representattive Acknowledgement</b></td>
                        <td><b>Remarks If any Damages</b></td>
                    </tr>';

                  $y = "select e.toolname, e.qty, t.tprice, e.date, e.returned from employeetoollist as e,tool as t where e.toolname = t.tname and e.employeeid = '$id' and e.state=t.state";
                    $t = mysqli_query($link, $y);
                 
                    if($t){
                        $i=1;     

                    while ($r = mysqli_fetch_array($t)) {
                    
                        $tool_name =$r['toolname'];
                        $qty =$r['qty'];
                        $date =$r['date'];
                        $tprice = $r['tprice'];
                        $returned=$r['returned'];

                  $output .='<tr>
                  <td> <b>'.$i.'</b></td>
                           <td> '.$tool_name.'</td>
                            <td> <b> '.$qty.' </b></td>
                            <td> <b>'.$tprice.' </b></td>
                           <td>'.$date.'</td>
                           <td>'.$returned.'</td>
                           <td></td>
                           <td></td>
                           <td></td>

                        </tr>
                    
                        ';
                       $i++;
                        
                    }
                }
        
                
                 $output .='</table>
                <br><table border="1">
                                <tr>
                                <th style = "text-align:center" colspan="9">Employee Declaration</td>
                                </tr>
                                <tr>
                                <td colspan="3" rowspan="3"><p>This is to confirm that I have received above said all the mentioned tools from
                                      Jyothi Facility Management PVT Ltd in working condition.<br>
                                I will return all of the company while leaving this job and i will accept to debit
                                my salary if any Damaged or Theft or Lost or failed to Return.</p></td>
                                <th colspan="3">Sign&Date</th>
                                <th colspan="3">Thumb</th>
                                </tr>
                                <tr>
                                <td colspan="3" rowspan="2"></td>
                                </tr> 
                </table><br/>
                <table border="1">
                                <tr>
                                <th style = "text-align:center" colspan="9">No Due Certificate Procedure</td>
                                </tr>
                                <tr>
                                <td colspan="3" rowspan="3"><p>This is to declarate that I am accepting to 
                                debit the penalty amount</br> from my salary towards Damaged/Not returned items value.</p></td>
                                <th colspan="3">Penalty Value</th>
                                <th colspan="3">Employee Sign for Acceptence</th>
                                </tr>
                                <tr>
                                <td colspan="3" rowspan="2"></td>
                                <td colspan="3" rowspan="2"></td>

                                </tr>
                              
                         </table>';
          
            
            echo $output;

                 
        
    

       
?>

