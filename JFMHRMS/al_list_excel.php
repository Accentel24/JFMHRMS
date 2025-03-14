<?php 
include_once('config.php'); 
$state=$_GET['state'];
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
header("Content-Type: application/xls");
header("Content-disposition: attachment; filename=spreadsheet.xls");
 

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:I4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:I4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A4:I4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 


 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' POINTMENT LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:I4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Employee ID');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Employee Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'State');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Aadhaar Number');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'joining Date');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Location');
$objPHPExcel->getActiveSheet()->SetCellValue('H6', 'Appointment order');
$objPHPExcel->getActiveSheet()->SetCellValue('I6', 'Designation');
$sqy=mysqli_query($db,"SELECT * FROM emp where state = '$state' ORDER BY empid desc");

$objPHPExcel->getActiveSheet()->getStyle("A6:I6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
       $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
       $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
       $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getStyle("A6:I6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$i=1;
$rowCount	=	7;

while($row=mysqli_fetch_array($sqy)){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['employeeid'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['emp_name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($state,'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['adharcardno'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['DOJ'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['branch'],'UTF-8'));
     if ($row['appointmentcategory'] === 'sup') {
        $appointmentcategory="Supervisor";
    } else if ($row['appointmentcategory'] === 'tm') {
        $appointmentcategory="Technical Manager";

    } else if ($row['appointmentcategory'] === 'mis') {
        $appointmentcategory="MIS Executive";

    } else if ($row['appointmentcategory'] === 'tech') {
        $appointmentcategory="Technician";
    }
    else{
        $appointmentcategory="";
    }
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($appointmentcategory,'UTF-8'));	
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['designation'],'UTF-8'));	
    $rowCount++;
$i++; 
}
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-appointment_list.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>