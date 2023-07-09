<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$rap_code = $_POST["rap_code"];
$coa = $_POST["coa"];
$kode_paket_pekerjaan_rap = $_POST["kode_paket_pekerjaan_rap"];

$sql = "INSERT INTO paket_pekerjaan_rap(kode_paket_pekerjaan_rap, rap_code, coa) 
            VALUES ('$kode_paket_pekerjaan_rap','$rap_code', '$coa')";

$res = $mysqli->query($sql);

//echo json_encode($res);


$sql = "SELECT * FROM paket_pekerjaan_rap a 
        JOIN rap b ON a.rap_code = b.rap_code
        JOIN m_paket_pekerjaan c ON c.coa = a.coa 
        WHERE a.kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'" ;
$result = $mysqli->query($sql);

///print_r($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if(!isset($lastnum) || !is_numeric($lastnum)){
    $lastnum = 0;
}
$i = $lastnum + 1;

$paket_added .= '
    <tr class="analisa" id="paket-'.$kode_paket_pekerjaan_rap.'" parent-kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'">
        <td class="list-item-pekerjaan">
            '.$row["coa"].'
            <span  style="cursor:pointer" class="icon-paket-pekerjaan-'.$row["kode_paket_pekerjaan_rap"].' analisa-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
            </span>
        </td>
        <td>'.$row["paket_pekerjaan"].'</td>
        <td></td>
        <td>'.$row["satuan"].'</td>
        <td></td>
        <td></td>
        <td id="subtotal-paket-'.$kode_paket_pekerjaan_rap.'" align="right">'.$row["subtotal"].'</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <span kode_paket_pekerjaan_rap="'.$row["kode_paket_pekerjaan_rap"].'" rap_code="'.$row["rap_code"].'" paket_pekerjaan="'.$row["paket_pekerjaan"].'" style="cursor:pointer" class="svg-hapus-paket-pekerjaan" id="svg-hapus-paket-pekerjaan-'.$row["kode_paket_pekerjaan_rap"].'" data-toggle="modal" data-target="#confirmationModal" type="button">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                />
                </svg>
            </span>
        </td>
    </tr>
';

echo $paket_added;
