<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_paket_pekerjaan_rab = $_POST["kode_paket_pekerjaan_rab"];

$sql = "SELECT *, a.subtotal AS subtotal, a.subtotal_ori AS subtotal_ori FROM item_pekerjaan_rab a 
        JOIN paket_pekerjaan_rab b ON a.kode_paket_pekerjaan_rab = b.kode_paket_pekerjaan_rab 
        JOIN m_pekerjaan c ON a.kode_pekerjaan = c.kode_pekerjaan 
        WHERE a.kode_paket_pekerjaan_rab = '$kode_paket_pekerjaan_rab' ORDER BY a.created_on" ;
$result = $mysqli->query($sql);

$i=1;
while($row = mysqli_fetch_array($result)){
    $rab .= '
    <tr kode-paket-pekerjaan-rab="'.$kode_paket_pekerjaan_rab.'" class="analisa-paket-pekerjaan-'.$row["kode_paket_pekerjaan_rab"].'" id="item-'.$row["kode_item_pekerjaan_rab"].'">
        <td id="'.$row["kode_item_pekerjaan_rab"].'">
        </td>
        <td>
            '.$i.'. '.$row["pekerjaan"].' 
            <span kode-paket-pekerjaan-rab="'.$kode_paket_pekerjaan_rab.'" class="icon-item-pekerjaan-'.$row["kode_paket_pekerjaan_rab"].'" id="'.$row["kode_item_pekerjaan_rab"].'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
            </span>
        </td>
        <td>'.$row["satuan"].'</td>
        <td></td>
        <td></td>
        <td id="subtotal-item-'.$row["kode_item_pekerjaan_rab"].'" align="right">'.number_format((int)$row["subtotal_ori"], 0).'</td>
        <td class="margin-item-pekerjaan">'.$row["margin"].'</td>
        <td class="subtotal-item-pekerjaan" align="right">'.number_format($row["subtotal"], 0).'</td>
        <td class="profit-item-pekerjaan" align="right">'.number_format((int)$row["subtotal"]-(int)$row["subtotal_ori"], 0).'</td>
        <td></td>
        <td>'.$row["volume_bq"].'</td>
        <td></td>
        <td>
        </td>
    </tr>
    ';
    $i++;
}

echo $rab;

?>


