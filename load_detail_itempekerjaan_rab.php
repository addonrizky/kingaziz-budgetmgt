<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$kode_item_pekerjaan_rab = $_POST["kode_item_pekerjaan_rab"];
$kode_paket_pekerjaan_rab = $_POST["kode_paket_pekerjaan_rab"];

$sql = "SELECT *, a.margin AS margin, a.subtotal AS subtotal, a.subtotal_ori as subtotal_ori FROM item_pekerjaan_sumberdaya_rab a 
        JOIN item_pekerjaan_rab b ON a.kode_item_pekerjaan_rab = b.kode_item_pekerjaan_rab 
        JOIN sumberdaya_supplier c ON a.kode_sumberdaya_supplier = c.kode_sumberdaya_supplier
        JOIN m_sumberdaya d ON c.kode_sumberdaya = d.kode_sumberdaya
        WHERE a.kode_item_pekerjaan_rab = '$kode_item_pekerjaan_rab' ORDER BY a.created_on ASC" ;
$result = $mysqli->query($sql);

$i=1;
while($row = mysqli_fetch_array($result)){
    $sumberdaya .= '
    <tr kode-item-pekerjaan-sumberdaya-rab="'.$row["kode_item_pekerjaan_sumberdaya_rab"].'" kode-item-pekerjaan-rab="'.$row["kode_item_pekerjaan_rab"].'" kode-paket-pekerjaan-rab="'.$kode_paket_pekerjaan_rab.'" class="analisa-item-pekerjaan-'.$row["kode_item_pekerjaan_rab"].'" id="sumberdaya-'.$row["kode_item_pekerjaan_sumberdaya_rab"].'">
        <td id="'.$row["kode_item_pekerjaan_rab"].'">
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row["sumberdaya"].' 
        </td>
        <td>'.$row["satuan"].'</td>
        <td>'.$row["koefisien"].'</td>
        <td align="right">'.number_format($row["harga_supplier"], 0).'</td>
        <td class="harga-group-item" align="right">'.number_format($row["koefisien"] * $row["harga_supplier"], 0).'</td>
        <td class="margin-group-item">
            <span class="margin-val">'.$row["margin"].'</span>
            <span class="margin-edit-btn" mode="modify">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg>
            </span>
        </td>
        <td class="hargapenawaran-group-item" align="right">'.number_format($row["subtotal"], 0).'</td>
        <td class="profit-group-item" align="right">'.number_format((int)$row["subtotal"]-(int)$row["subtotal_ori"], 0).'</td>
        <td></td>
        <td>'.$row["volume_bq"].'</td>
        <td>'.$row["volume_bq"]*$row["koefisien"].'</td>
        <td>
        </td>
    </tr>
    ';
    $i++;
}

echo $sumberdaya;

?>


