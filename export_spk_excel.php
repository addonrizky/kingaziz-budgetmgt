<?php
session_start();
include 'util.php';
include 'activity.php';

require('./PhpSpreadsheet/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;

// constant
$start_data_row = 8;

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$rab_code = $_GET["rab_code"];

$sql = "SELECT * FROM rab a
        JOIN developer b ON a.developer_code = b.developer_code
        WHERE rab_code = '$rab_code'";
$result = $mysqli->query($sql);
$row_rab = mysqli_fetch_array($result);



$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$style_title = new Style();
$style_th = new Style();
$style_rab_code = new Style();
$style_rab_code_spec = new Style();
$style_project_desc = new Style();
$style_paket = new Style();
$style_empty_paket = new Style();
$style_item = new Style();

$style_title->applyFromArray(
    [
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 14,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'setAutoSize'    => true
    ]
);

$style_rab_code->applyFromArray(
    [
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 13,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_MEDIUM],
            'top'     => ['borderStyle' => Border::BORDER_MEDIUM],
            'right'   => ['borderStyle' => Border::BORDER_MEDIUM],
            'bottom'  => ['borderStyle' => Border::BORDER_MEDIUM],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'setAutoSize'    => true
    ]
);

$style_project_desc->applyFromArray(
    [
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 12,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
        'setAutoSize'    => true
    ]
);

$style_rab_code_spec->applyFromArray(
    [
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 13,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_MEDIUM],
            'top'     => ['borderStyle' => Border::BORDER_MEDIUM],
            'right'   => ['borderStyle' => Border::BORDER_MEDIUM],
            'bottom'  => ['borderStyle' => Border::BORDER_MEDIUM],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'fill' => array(
            'fillType' => Fill::FILL_SOLID,
            'startColor' => array('argb' => 'EED202')
        ),
        'setAutoSize'    => true
    ]
);

$style_th->applyFromArray(
    [
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color'    => ['argb' => '00FFFFFF'],
        ],
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_THIN],
            'top'     => ['borderStyle' => Border::BORDER_THIN],
            'right'   => ['borderStyle' => Border::BORDER_THIN],
            'bottom'  => ['borderStyle' => Border::BORDER_THIN],
        ],
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 12,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'setAutoSize'    => true
    ]
);

$style_paket->applyFromArray(
    [
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color'    => ['argb' => 'EFEFEF'],
        ],
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_THIN],
            'top'     => ['borderStyle' => Border::BORDER_DOTTED],
            'right'   => ['borderStyle' => Border::BORDER_THIN],
            'bottom'  => ['borderStyle' => Border::BORDER_DOTTED],
        ],
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 12,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'numberFormat' => [
            'formatCode' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            
        ],
        'setAutoSize'    => true
    ]
);

$style_empty_paket->applyFromArray(
    [
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_THIN],
            'top'     => ['borderStyle' => Border::BORDER_DOTTED],
            'right'   => ['borderStyle' => Border::BORDER_THIN],
            'bottom'  => ['borderStyle' => Border::BORDER_DOTTED],
        ],
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 12,
            'bold'      => true,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'setAutoSize'    => true
    ]
);

$style_item->applyFromArray(
    [
        'borders' => [
            'left'    => ['borderStyle' => Border::BORDER_THIN],
            'top'     => ['borderStyle' => Border::BORDER_DOTTED],
            'right'   => ['borderStyle' => Border::BORDER_THIN],
            'bottom'  => ['borderStyle' => Border::BORDER_DOTTED],
        ],
        'font' => [
            'name'      => 'Arial',
            'size' 		=> 12,
            'bold'      => false,
            'italic'    => false,
            'underline' => false,
            'strike'    => false,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
        'numberFormat' => [
            'formatCode' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            
        ],
        'setAutoSize'    => true
    ]
);


$spreadsheet->getActiveSheet()->duplicateStyle($style_title, 'B1:F2');
$spreadsheet->getActiveSheet()->duplicateStyle($style_rab_code, 'G1:G2');
$spreadsheet->getActiveSheet()->duplicateStyle($style_rab_code_spec, 'G2');
$spreadsheet->getActiveSheet()->duplicateStyle($style_project_desc, 'D4');
$spreadsheet->getActiveSheet()->mergeCells('B1:F1');
$spreadsheet->getActiveSheet()->mergeCells('B2:F2');
$spreadsheet->getActiveSheet()->mergeCells('D4:G4');

$activeWorksheet->setCellValue('B1', $row_rab["developer_name"]);
$activeWorksheet->setCellValue('B2', $row_rab["project_group"]);
$activeWorksheet->setCellValue('D4', $row_rab["description"]);
$activeWorksheet->setCellValue('G1', "RAB");
$activeWorksheet->setCellValue('G2', $row_rab["rab_code"]);


// table header
$spreadsheet->getActiveSheet()->duplicateStyle($style_th, 'B5:G6');
$spreadsheet->getActiveSheet()->mergeCells('B5:B6');
$spreadsheet->getActiveSheet()->mergeCells('C5:C6');
$spreadsheet->getActiveSheet()->mergeCells('D5:D6');
$spreadsheet->getActiveSheet()->mergeCells('E5:E6');
$spreadsheet->getActiveSheet()->mergeCells('F5:G5');

$spreadsheet->getActiveSheet()->getRowDimension('4')->setRowHeight(30);
$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(30);

$activeWorksheet->setCellValue('B5', "COA Pekerjaan");
$activeWorksheet->setCellValue('C5', "Item Pekerjaan");
$activeWorksheet->setCellValue('D5', "Vol");
$activeWorksheet->setCellValue('E5', "Sat");
$activeWorksheet->setCellValue('F5', "PT King Aziz");
$activeWorksheet->setCellValue('F6', "Harga Satuan");
$activeWorksheet->setCellValue('G6', "Subtotal");

foreach(range('B','G') as $columnID) {
    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}

$sql = "SELECT * FROM paket_pekerjaan_rab a 
        JOIN m_paket_pekerjaan b ON a.coa = b.coa 
        JOIN rab c ON a.rab_code = c.rab_code WHERE a.rab_code = '$rab_code'
        ORDER by a.created_on ASC" ;
$result = $mysqli->query($sql);

$i = $start_data_row;
$spreadsheet->getActiveSheet()->duplicateStyle($style_empty_paket, 'B'.($i-1).':G'.($i-1));
$spreadsheet->getActiveSheet()->getRowDimension($i-1)->setRowHeight(30);
while($row_paket = mysqli_fetch_array($result)){
    $activeWorksheet->setCellValue('B'.$i, $row_paket["coa"]); // coa
    $activeWorksheet->setCellValue('C'.$i, $row_paket["paket_pekerjaan"]); // paket pekerjaan
    $activeWorksheet->setCellValue('E'.$i, $row_paket["satuan"]); // satuan
    $activeWorksheet->setCellValue('G'.$i, number_format($row_paket["subtotal"], 0)); // subtotal
    $spreadsheet->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
    $spreadsheet->getActiveSheet()->duplicateStyle($style_paket, 'B'.$i.':G'.$i);
    $spreadsheet->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal('right');

    $activeWorksheet->setCellValue('C'.++$i, $row_paket["alias"]); // paket pekerjaan
    $spreadsheet->getActiveSheet()->duplicateStyle($style_item, 'B'.$i.':G'.$i);
    $spreadsheet->getActiveSheet()->getStyle('C'.$i)->getFont()->setBold(true);

    $kode_paket_pekerjaan_rab = $row_paket["kode_paket_pekerjaan_rab"];
    $sql = "SELECT *, a.subtotal AS subtotal, a.subtotal_ori AS subtotal_ori FROM item_pekerjaan_rab a 
        JOIN paket_pekerjaan_rab b ON a.kode_paket_pekerjaan_rab = b.kode_paket_pekerjaan_rab 
        JOIN m_pekerjaan c ON a.kode_pekerjaan = c.kode_pekerjaan 
        WHERE a.kode_paket_pekerjaan_rab = '$kode_paket_pekerjaan_rab' ORDER BY a.created_on" ;
    $result_item = $mysqli->query($sql);

    $i++;
    $j = 1;
    while($row_item = mysqli_fetch_array($result_item))
    {
        $activeWorksheet->setCellValue('C'.$i, $j . ". " .$row_item["pekerjaan"]); // paket pekerjaan
        $activeWorksheet->setCellValue('D'.$i, $row_item["volume_bq"]); // volume
        $activeWorksheet->setCellValue('E'.$i, $row_item["satuan"]); // satuan
        $activeWorksheet->setCellValue('F'.$i, number_format($row_item["subtotal"] / $row_item["volume_bq"]), 0); // harga_satuan
        $activeWorksheet->setCellValue('G'.$i, number_format($row_item["subtotal"], 0)); // subtotal
        $spreadsheet->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
        $spreadsheet->getActiveSheet()->duplicateStyle($style_item, 'B'.$i.':G'.$i);
        $spreadsheet->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal('right');
        $spreadsheet->getActiveSheet()->getStyle('F'.$i)->getAlignment()->setHorizontal('right');
        $i++;
    }

    //$i++;
}

$spreadsheet->getActiveSheet()->getStyle('B'.$i.':G'.$i)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B'.$i.':G'.$i)->getBorders()->getRight()->setBorderStyle(Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B'.$i.':G'.$i)->getBorders()->getLeft()->setBorderStyle(Border::BORDER_THIN);

$i++;
$activeWorksheet->setCellValue('F'.$i, "TOTAL");
$activeWorksheet->setCellValue('G'.$i, number_format($row_rab["total_biaya"]),0);
$spreadsheet->getActiveSheet()->duplicateStyle($style_paket, 'F'.$i.':G'.$i);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
$spreadsheet->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal('right');

$i++;
$activeWorksheet->setCellValue('F'.$i, "PPN 11%");
$ppn_nominal = $row_rab["total_biaya"] * 11/100;
$activeWorksheet->setCellValue('G'.$i, number_format($ppn_nominal, 0));
$spreadsheet->getActiveSheet()->duplicateStyle($style_paket, 'F'.$i.':G'.$i);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFont()->setBold(false);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF');
$spreadsheet->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal('right');

$i++;
$activeWorksheet->setCellValue('F'.$i, "GRAND TOTAL");
$activeWorksheet->setCellValue('G'.$i, number_format($row_rab["total_biaya"] + $ppn_nominal, 0));
$spreadsheet->getActiveSheet()->duplicateStyle($style_paket, 'F'.$i.':G'.$i);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFont()->setBold(false);
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':G'.$i)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF');
$spreadsheet->getActiveSheet()->getStyle('G'.$i)->getAlignment()->setHorizontal('right');
$i++;

$i++;

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="hello_world.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>