<?php
session_start();
require 'config.php';

$data=$_SESSION['all_result']??[];

$spreadsheet=new Spreadsheet();
$sheet=$spreadsheet->getActiveSheet();

if($data){
    $col=1;
    foreach(array_keys($data[0]) as $c){
        $sheet->setCellValueByColumnAndRow($col,1,$c);
        $col++;
    }

    $rowNum=2;
    foreach($data as $row){
        $col=1;
        foreach($row as $v){
            $sheet->setCellValueByColumnAndRow($col,$rowNum,$v);
            $col++;
        }
        $rowNum++;
    }
}

$writer=new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="resultado.xlsx"');

$writer->save('php://output');
exit;
?>