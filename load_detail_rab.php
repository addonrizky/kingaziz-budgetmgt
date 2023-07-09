<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$rab_code = $_POST["rab_code"];

$sql = "SELECT *, a.margin as margin FROM paket_pekerjaan_rab a 
        JOIN m_paket_pekerjaan b ON a.coa = b.coa 
        JOIN rab c ON a.rab_code = c.rab_code WHERE a.rab_code = '$rab_code'
        ORDER by a.created_on ASC" ;
$result = $mysqli->query($sql);



$i=0;
while($row = mysqli_fetch_array($result)){
    $rab .= '
    <tr class="analisa" id="paket-'.$row["kode_paket_pekerjaan_rab"].'" parent-kode-paket-pekerjaan-rab="'.$row["kode_paket_pekerjaan_rab"].'">
        <td class="list-item-pekerjaan">
            '.$row["coa"].'
            <span  style="cursor:pointer" class="icon-paket-pekerjaan-'.$row["kode_paket_pekerjaan_rab"].' analisa-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
            </span>
        </td>
        <td>'.$row["paket_pekerjaan"].'</td>
        <td>'.$row["satuan"].'</td>
        <td></td>
        <td></td>
        <td id="subtotal-paket-'.$row["kode_paket_pekerjaan_rab"].'" align="right">'.number_format($row["subtotal_ori"], 0).'</td>
        <td class="margin-paket-pekerjaan">'.$row["margin"].'</td>
        <td class="subtotal-paket-pekerjaan" align="right">'.number_format($row["subtotal"], 0).'</td>
        <td class="profit-paket-pekerjaan" align="right">'.number_format((int)$row["subtotal"]-(int)$row["subtotal_ori"], 0).'</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        </td>
    </tr>
    ';
    $i++;
}

echo $rab;

?>


