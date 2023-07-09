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
$kode_paket_pekerjaan_rap = $_POST["kode_paket_pekerjaan_rap"];

$sql = "SELECT * FROM item_pekerjaan_sumberdaya a 
        JOIN item_pekerjaan b ON a.kode_item_pekerjaan = b.kode_item_pekerjaan 
        JOIN sumberdaya_supplier c ON a.kode_sumberdaya_supplier = c.kode_sumberdaya_supplier
        JOIN m_sumberdaya d ON c.kode_sumberdaya = d.kode_sumberdaya
        WHERE a.kode_item_pekerjaan = '$kode_item_pekerjaan' ORDER BY a.created_on ASC" ;
$result = $mysqli->query($sql);

$i=1;
while($row = mysqli_fetch_array($result)){
    $sumberdaya .= '
    <tr kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="analisa-item-pekerjaan-'.$row["kode_item_pekerjaan"].'" id="sumberdaya-'.$row["kode_item_pekerjaan_sumberdaya"].'">
        <td id="'.$row["kode_item_pekerjaan"].'">
        </td>
        <td>
            '.$row["sumberdaya"].' 
        </td>
        <td>'.number_format($row["koefisien"], 2).'</td>
        <td>'.$row["satuan"].'</td>
        <td></td>
        <td align="right">'.number_format($row["harga_supplier"], 0).'</td>
        <td align="right">'.number_format($row["koefisien"] * $row["harga_supplier"], 0).'</td>
        <td></td>
        <td>'.$row["volume_bq"].'</td>
        <td>'.$row["volume_bq"]*$row["koefisien"].'</td>
        <td>
            <span kode_item_pekerjaan_sumberdaya="'.$row["kode_item_pekerjaan_sumberdaya"].'" kode_item_pekerjaan="'.$row["kode_item_pekerjaan"].'" sumberdaya="'.$row["sumberdaya"].'" style="cursor:pointer" class="svg-hapus-pekerjaan-sumberdaya" id="svg-hapus-pekerjaan-sumberdaya-'.$row["kode_item_pekerjaan_sumberdaya"].'" data-toggle="modal" data-target="#confirmationModal" type="button">
                <svg  
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
            </span>
        </td>
    </tr>
    ';
    $i++;
}

$sumberdaya .= '
    <tr kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" kode_item_pekerjaan="'.$kode_item_pekerjaan.'" class="analisa-item-pekerjaan-add-'.$kode_item_pekerjaan.'">
        <td colspan="10"></td>
        <td><a data-toggle="modal" data-target="#ModalSlide-FormSumberdaya" href="#" id="'.$kode_item_pekerjaan.'" class="new-sumberdaya-form">+tambah sumberdaya ... </a></td>
    </tr>
';

echo $sumberdaya;

?>


