<?php 
include_once('config.php'); 
$state=$_GET['state'];
include('PHPExcel-1.8/Classes/PHPExcel.php');
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
header("Content-Type: application/xls");
header("Content-disposition: attachment; filename=spreadsheet.xls");
 

$objPHPExcel	=	new	PHPExcel();
$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
 $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true)->getColor()->setRGB('ffffff');
 $objPHPExcel->getActiveSheet()->setCellValue('A1', 'JYOTHI FACILITY MANAGEMENT PVT.LTD');
 $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->mergeCells('A4:F4');
 $objPHPExcel->getActiveSheet()->getStyle("A4:F4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
 $objPHPExcel->getActiveSheet()->getStyle("A4:F4")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

 


 $objPHPExcel->getActiveSheet()->setCellValue('A4', $state.' ADD TOOL LIST');
 $objPHPExcel->getActiveSheet()->getStyle("A4:F4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'SNo');
$objPHPExcel->getActiveSheet()->SetCellValue('B6', 'Tool Category');
$objPHPExcel->getActiveSheet()->SetCellValue('C6', 'Name of the Tool');
$objPHPExcel->getActiveSheet()->SetCellValue('D6', 'Tool Price');
$objPHPExcel->getActiveSheet()->SetCellValue('E6', 'Total Purchased');
$objPHPExcel->getActiveSheet()->SetCellValue('F6', 'Balance');
$sqy=mysqli_query($db,"select * from tool where state = '$state'");

$objPHPExcel->getActiveSheet()->getStyle("A6:F6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('0000FF');
       $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
       $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
       $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
       $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
       $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
     
        $objPHPExcel->getActiveSheet()->getStyle("A6:F6")->getFont()->setBold(true)->getColor()->setRGB('ffffff');

$i=1;
$rowCount	=	7;

while($row=mysqli_fetch_array($sqy)){
    $toolname = $row['tname'];

    $sql = "SELECT sum(qty) as fullqty  FROM tool_phr_master WHERE toolname = '$toolname' and state = '$state'";
    $result1 = mysqli_query($db, $sql);
    while ($row1 = mysqli_fetch_array($result1)) {
        $fullqty = $row1['fullqty'];
    }

    $sql1 = "SELECT sum(qty) as usedqty  FROM employeetoollist WHERE toolname = '$toolname' and state='$state'";
    $result1 = mysqli_query($db, $sql1);
    while ($row1 = mysqli_fetch_array($result1)) {
        $usedqty = $row1['usedqty'];
    }

   $balance= $fullqty - $usedqty;
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($i,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['tcname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['tname'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['tprice'],'UTF-8'));
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($fullqty,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($balance,'UTF-8'));
		
    $rowCount++;
$i++; 
}
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$state.'-Addtool_list.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>