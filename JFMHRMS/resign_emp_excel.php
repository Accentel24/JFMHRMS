<?php 
include_once('config.php'); 
$state = $_GET['state'];
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 //$tsname=$_GET['user'];
$datatable="emp";
//	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM emp where status=!'' and state = '$state' ORDER BY empid desc";    
    //}else{
    // $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	// }

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:AA1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AA1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AA1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:AA1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:AL4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AL4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AL4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 
 $objPHPExcel->getActiveSheet()->getStyle("A6:AL6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A6:AL6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');


 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'EMPLOYEE LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:AA4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Employee ID');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Employee Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'DOB');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Gender');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Marital Status');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Father Name');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Mother Name');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Contact No');
$objPHPExcel->getActiveSheet()->SetCellValue('J6', 'Alter No');
$objPHPExcel->getActiveSheet()->SetCellValue('K6', 'Relation');
$objPHPExcel->getActiveSheet()->SetCellValue('L6', 'Related No');
$objPHPExcel->getActiveSheet()->SetCellValue('M6', 'No of Kids');
$objPHPExcel->getActiveSheet()->SetCellValue('N6', 'Name of Kids');
$objPHPExcel->getActiveSheet()->SetCellValue('O6', 'PAN No');
$objPHPExcel->getActiveSheet()->SetCellValue('P6', 'Adhar No');
$objPHPExcel->getActiveSheet()->SetCellValue('Q6', 'UAN No');
$objPHPExcel->getActiveSheet()->SetCellValue('R6', 'PF No');
$objPHPExcel->getActiveSheet()->SetCellValue('S6', 'ESI No');
$objPHPExcel->getActiveSheet()->SetCellValue('T6', 'Qualification');
$objPHPExcel->getActiveSheet()->SetCellValue('U6', 'Experience');
$objPHPExcel->getActiveSheet()->SetCellValue('V6', 'DOJ');
$objPHPExcel->getActiveSheet()->SetCellValue('W6', 'Designation');
$objPHPExcel->getActiveSheet()->SetCellValue('X6', 'Name of Bank');
$objPHPExcel->getActiveSheet()->SetCellValue('Y6', 'Bank Branch');
$objPHPExcel->getActiveSheet()->SetCellValue('Z6', 'Acc No');
$objPHPExcel->getActiveSheet()->SetCellValue('AA6', 'IFSC');
$objPHPExcel->getActiveSheet()->SetCellValue('AB6', 'TShirt');
$objPHPExcel->getActiveSheet()->SetCellValue('AC6', 'TShirt Issue Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AD6', 'TShirt Size');

$objPHPExcel->getActiveSheet()->SetCellValue('AE6', 'Phant');
$objPHPExcel->getActiveSheet()->SetCellValue('AF6', 'Phant Issue Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AG6', 'Phant Size');


$objPHPExcel->getActiveSheet()->SetCellValue('AH6', 'Safty Shoes');
$objPHPExcel->getActiveSheet()->SetCellValue('AI6', 'Shoes Issue Date');
$objPHPExcel->getActiveSheet()->SetCellValue('AJ6', 'Shoes Size');

$objPHPExcel->getActiveSheet()->SetCellValue('AK6', 'Id Card');
$objPHPExcel->getActiveSheet()->SetCellValue('AL6', 'Id Card Issue Date');
$sqy=mysqli_query($db,"SELECT * FROM emp where status!='' and state = '$state' ORDER BY empid desc");

/*$objPHPExcel->getActiveSheet()->getStyle("A6:Z6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');*/
       $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
/*$objPHPExcel->getActiveSheet()->getStyle("A6:Z6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());*/
$i=1;
$rowCount	=	7;

while($row=mysqli_fetch_array($sqy)){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['employeeid'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['emp_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['DOB'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['gender'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['maritalstatus'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['fname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row['mname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['contactno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['alternateno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['relation'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['rno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['nok'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['childname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['pan'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($row['adharcardno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($row['uan'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($row['PFNO'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($row['ESI_NO'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($row['qualification'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($row['experience'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($row['DOJ'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($row['designation'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($row['bname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper($row['branch'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($row['accno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount,mb_strtoupper($row['ifsc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount,mb_strtoupper($row['tshirt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount,mb_strtoupper($row['tshirt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount,mb_strtoupper($row['tsize'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount,mb_strtoupper($row['phant'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount,mb_strtoupper($row['phtdt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount,mb_strtoupper($row['psize'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount,mb_strtoupper($row['sshoes'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowCount,mb_strtoupper($row['shoesdt'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowCount,mb_strtoupper($row['ssize'],'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowCount,mb_strtoupper($row['idcard'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowCount,mb_strtoupper($row['idcarddt'],'UTF-8'));
	

/*	
	$ds="select * from dpr where store_code='$scode'";
	$result1=$db->query($ds) or die(mysql_error());
	$row1=$result1->fetch_assoc();
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row1['store_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row1['coordinator'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row1['superwisor'],'UTF-8'));
	
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['falt_desc'],'UTF-8'));
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($row1['city'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper(date('d-m-Y',strtotime($row['inv_date'])),'UTF-8'));
	
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($row['tot_base'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($row['tot_ser'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($row['tot_gst'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($row['net'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($row['ses'],'UTF-8'));*/
	$rowCount++;
$i++; 
}
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="resignemployee.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>