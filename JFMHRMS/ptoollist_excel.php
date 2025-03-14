<?php 
include_once('config.php'); 
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
$state=$_GET['state'];

// $sqy = "SELECT * FROM tool_phr_master where state = '$state' ORDER BY id ASC ";
$sqy = "SELECT * FROM tool_phr_master join  add_tool_phr on tool_phr_master.id1=add_tool_phr.id where add_tool_phr.state = '$state' ORDER BY tool_phr_master.id ASC";


$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:G4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');


 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' PURCHASE TOOL LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:G4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Tool Name');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Tool Price');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Supplier Name');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Invoice No');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Invoice Date');
$objPHPExcel->getActiveSheet()->SetCellValue('G6', 'Quantity');

$objPHPExcel->getActiveSheet()->getStyle("A6:G6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setRGB('0000ff');


      // $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(10);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);

        $objPHPExcel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
        $result			=	$db->query($sqy) or die(mysql_error());
        $i=1;
        $rowCount	=	7;

while($row=$result->fetch_assoc()){
    
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['toolname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['rate'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['supname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['inv_no'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['inv_date'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['qty'],'UTF-8'));
	$rowCount++;
$i++; 
}
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-Ptoollist.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>