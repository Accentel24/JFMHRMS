
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

include('dbconnection/connection.php');

$state = $_GET['state'];

$fileName = $state."-Assets.xls"; 
header("Content-Type: application/xls");
header("Content-disposition: attachment; filename=\"$fileName\"");

 
            
            $output .='
            
             <table border="1" >
                 <tr>
                 <th rowspan="4" style="background-color:skyblue">S.NO</th>
                 <th rowspan="4" style="background-color:skyblue">Name Of The Employee</th>
                 <th rowspan="4" style="background-color:skyblue">Email Address</th>
                 <th rowspan="4" style="background-color:skyblue">Designation</th>
                 <th rowspan="4" style="background-color:skyblue">JFM ID</th>
                 <th rowspan="4" style="background-color:skyblue">Scrum Id</th>
                 <th rowspan="4" style="background-color:skyblue">AAdhar Number</th>
                 <th rowspan="4" style="background-color:skyblue">Contact Number</th>
                 <th rowspan="4" style="background-color:skyblue">Date Of Joining</th>
                 <th rowspan="4" style="background-color:skyblue">Location</th>
                 <th rowspan="4" style="background-color:skyblue">Sup Name</th>
                 <th rowspan="4" style="background-color:skyblue">State</th>
                 <th rowspan="4" style="background-color:skyblue">City</th>
                 <th rowspan="4" style="background-color:skyblue">Status</th>
                 <th rowspan="4" style="background-color:skyblue">AFM Name</th>';

                 $sq="select tname from tool where state='$state'";
                 $toolcol=0;
                 $toolnotassigned=0;
                 $re=mysqli_query($link,$sq);
                 if($re){
                     while($row = mysqli_fetch_array($re)){
                         $tname = $row['tname'];
                         $toolcol++;
     
                      $output .=
                      '<th rowspan="4" style="background-color:lightgreen">'.$tname.'</th>
                       ';
     
                     }
                    
     
                 }
     
               $output .='
               <th rowspan="4" style="background-color:yellow">Employee Wise Total requirements</th>
                      <th rowspan="4" style="background-color:yellow">CPRF Status for the left candidates</th>
                      <th rowspan="4" style="background-color:yellow">Remarks SUP</th>
                       </tr>
                 <tr></tr> 
                 <tr></tr>
                 <tr></tr>';                            

                 $sql="select * from emp where state='$state'";         
                 $result=mysqli_query($link,$sql);

             if($result){
                        $sn=1;     

                        while ($row = mysqli_fetch_array($result)) {
                            $toolnotassigned=$toolcol;
                            $emp_name =$row['emp_name'];
                            $emp_email =$row['emp_email'];
                            $designation =$row['designation'];
                            $username =$row['username'];
                            $adharcardno =$row['adharcardno'];
                            $contactno=$row['contactno'];
                            $DOJ =$row['DOJ'];
                            $address=$row['address'];
                            $state =$row['state'];
                            $city=$row['city'];
                            $status=$row['status'];
                            $password =$row['password'];
                            $id = $row['employeeid'];
                                      
                
                    $output .= '                   
                                <tr>
                                <td>'.$sn.'</td>
                                <td>' .$emp_name.'</td>
                                <td>'.$emp_email.'</td>
                                <td>'.$designation.'</td>
                                <td>'.$id.'</td>
                                <td></td>
                                <td>'.$adharcardno.'</td>
                                <td>'.$contactno.'</td>
                                <td>'.$DOJ.'</td>
                                <td>'.$address.'</td>
                                <td></td>
                                <td>'.$state.'</td>
                                <td>'.$city.'</td>
                                <td>'.$status.'</td>
                                <td></td>';
                                $sn++;
                         
                        

                             $s="select * from employeetoollist where employeeid = '$id' and state='$state'";

                                $res=mysqli_query($link,$s);
                                if($res){
                                    $tooldates=array();
                                    for($i=0; $i<$toolcol; $i++){
                                        $tooldates[$i]='<td></td>';
                                    }
                                    while($row = mysqli_fetch_array($res)){
                                        
                                        $date =$row['date'];
                                        $toolname =$row['toolname'];
                                      


                                    if($toolname=="ID Card"){
                                        $toolnotassigned--;
                                    $tooldates[0]='<td>'.$date.'</td>';                                       
                                    }


                                    else if($toolname=="T-Shirt(Uniform)"){
                                        
                                        $toolnotassigned--;
                                        $tooldates[1]='<td>'.$date.'</td>';             
                                    }                 

                                    else if($toolname=="Safety shoes"){
                                        $toolnotassigned--;                                               
                                        $tooldates[2]='<td>'.$date.'</td>';   
                                    }   


                                    else if($toolname=="Safety helmet"){
                                        $toolnotassigned--;                                           
                                        $tooldates[3]='<td>'.$date.'</td>';           
                                    }
                                                   
                        
                                    else if($toolname=="Safety Belt"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[4]='<td>'.$date.'</td>';   
                                    }
                          
                                    else if($toolname=="Clamp Meter with the thermometer. (Meco)"){
                                        $toolnotassigned--;                                        
                                        $tooldates[5]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Air Blower"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[6]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Drilling Machine"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[7]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=='Cutting plier 8" taparia'){  
                                        $toolnotassigned--;                                      
                                        $tooldates[8]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="screwdriver set"){
                                        $toolnotassigned--;                                        
                                        $tooldates[9]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Line Tester 814"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[10]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Safety Goggles white"){
                                        $toolnotassigned--;                                        
                                        $tooldates[11]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Screwdriver 903"){
                                        $toolnotassigned--;                                        
                                        $tooldates[12]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Ring Spanner Set"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[13]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Double-end spanner set (6-32)"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[14]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Measuring Tape-5 mts"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[15]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Allen Key Set MM"){   
                                        $toolnotassigned--;                                     
                                        $tooldates[16]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Allen Key Set Inches"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[17]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Hammer 800gms"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[18]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Electrical Hand Gloves"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[19]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Nose Plier"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[20]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Wire Striper"){ 
                                        $toolnotassigned--;                                      
                                        $tooldates[21]='<td>'.$date.'</td>';     
                                    } 
                                    else if($toolname=="Thermometer"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[22]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Torchlight"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[23]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Pipe Wrench"){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[24]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Drill Bit Set"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[25]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=='Screw Spanner 12"'){ 
                                        $toolnotassigned--;                                       
                                        $tooldates[26]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Hacksaw Frame"){
                                        $toolnotassigned--;                                        
                                        $tooldates[27]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="CRIMPING TOOLS ( 0.5 SQMM TO 16 SQMM"){  
                                        $toolnotassigned--;                                      
                                        $tooldates[28]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Tool Bag"){
                                        $toolnotassigned--;                                        
                                        $tooldates[29]='<td>'.$date.'</td>';     
                                    }
                                    else if($toolname=="Hydrometer"){ 
                                        $toolnotassigned--;                                     
                                        $tooldates[30]='<td>'.$date.'</td>';     
                                    }

                                    // else if($toolname=="1"){                                        
                                    //     $tooldates[31]='<td>'.$date.'</td>';     
                                    // }
                                    // else if($toolname=="aa"){                                        
                                    //     $tooldates[32]='<td>'.$date.'</td>';     
                                    // }
                                    // else if($toolname=="ggg"){                                        
                                    //     $tooldates[33]='<td>'.$date.'</td>';     
                                    // }
                                    // else if($toolname=="id"){                                        
                                    //     $tooldates[34]='<td>'.$date.'</td>';     
                                    // }
                                    
                    }
                    for($i=0; $i<count($tooldates); $i++){
                        $output .=$tooldates[$i];
                    }
                          
               }
               $output .='<td>'.$toolnotassigned.'</td>
               <td></td>
               <td></td>
                                    
                                    </tr>';
                            }
                        }       
                        $output .='</table>';
            echo $output;
?>

