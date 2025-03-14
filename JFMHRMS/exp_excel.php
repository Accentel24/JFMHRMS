<?php 
include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
 //$tsname=$_GET['user'];
$datatable="emp";
//	if(($tsname=='admin') or ($tsname=='durgarao') or ($tsname=='vishnu')){
     $y="SELECT * FROM expenses where state='AP' ORDER BY empid desc";    
    //}else{
    // $y="SELECT * FROM ".$datatable."  where status='work to be started' and ses='$tsname'  ORDER BY id desc";
	// }

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:G6');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:G6');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 


 $objPHPExcel->getActiveSheet()->setCellValue('A4', 'EXPENSES LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'DATE');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'STATE');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'DESCRIPTION');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'AMOUNT');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'USER');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'STATUS');

$sqy=mysqli_query($db,"SELECT * FROM expenses where state='AP' ORDER BY empid desc");  

/*$objPHPExcel->getActiveSheet()->getStyle("A6:Z6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');*/
       $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16);
       
/*$objPHPExcel->getActiveSheet()->getStyle("A6:Z6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
$result			=	$db->query($y) or die(mysql_error());*/
$i=1;
$rowCount	=	7;

while($row=mysqli_fetch_array($sqy)){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['edate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['state'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['expdesc'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['amount'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['user'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['status'],'UTF-8'));

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
header('Content-Disposition: attachment;filename="apexpenses.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>