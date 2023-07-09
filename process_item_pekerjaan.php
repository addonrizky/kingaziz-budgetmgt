<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$kode_item_pekerjaan = $_POST["kode_item_pekerjaan"];
$kode_pekerjaan = $_POST["kode_pekerjaan"];
$kode_paket_pekerjaan_rap = $_POST["kode_paket_pekerjaan_rap"];
$volume_bq = $_POST["volume_bq"];
$last_item = $_POST["last_item"];


$sql = "INSERT INTO item_pekerjaan(kode_item_pekerjaan, kode_pekerjaan, kode_paket_pekerjaan_rap, volume_bq) 
            VALUES ('$kode_item_pekerjaan', '$kode_pekerjaan', '$kode_paket_pekerjaan_rap', $volume_bq)";

$res = $mysqli->query($sql);

//echo json_encode($res);


$sql = "SELECT *, a.subtotal AS subtotal_item FROM item_pekerjaan a
        JOIN paket_pekerjaan_rap b ON a.kode_paket_pekerjaan_rap = b.kode_paket_pekerjaan_rap
        JOIN m_pekerjaan c ON c.kode_pekerjaan = a.kode_pekerjaan 
        WHERE a.kode_item_pekerjaan  = '$kode_item_pekerjaan'" ;
$result = $mysqli->query($sql);

///print_r($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if(!isset($lastnum) || !is_numeric($lastnum)){
    $lastnum = 0;
}
$i = $lastnum + 1;

$item_pekerjaan_added = '
    <tr kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="analisa-paket-pekerjaan-'.$kode_paket_pekerjaan_rap.'" id="item-'.$kode_item_pekerjaan.'">
        <td></td>
        <td>
            '.($last_item+1).". ".$row["pekerjaan"].'
            <span kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="icon-item-pekerjaan-'.$kode_paket_pekerjaan_rap.'" id="'.$kode_item_pekerjaan.'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
            </span>
        </td>
        <td></td>
        <td>'.$row["satuan"].'</td>
        <td>'.$row["kode_item_pekerjaan"].'</td>
        <td></td>
        <td id="subtotal-item-'.$kode_item_pekerjaan.'" align="right">'.number_format($row["subtotal_item"], 0).'</td>
        <td></td>
        <td>'.$row["volume_bq"].'</td>
        <td></td>
        <td>
            <span kode_item_pekerjaan="'.$row["kode_item_pekerjaan"].'" kode_paket_pekerjaan_rap="'.$row["kode_paket_pekerjaan_rap"].'" pekerjaan="'.$row["pekerjaan"].'" style="cursor:pointer" class="svg-hapus-item-pekerjaan" id="svg-hapus-item-pekerjaan-'.$row["kode_item_pekerjaan"].'" data-toggle="modal" data-target="#confirmationModal" type="button">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                    data-toggle="modal" data-target="#confirmationModal" type="button" 
                />
                
                </svg>
            </span>
        </td>
    </tr>
';

//$item_pekerjaan_added = "<tr><td>wehehehe</td></tr>";

echo $item_pekerjaan_added;
