<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_paket_pekerjaan_rap = $_POST["kode_paket_pekerjaan_rap"];

$sql = "SELECT *, a.subtotal AS subtotal_item FROM item_pekerjaan a 
        JOIN paket_pekerjaan_rap b ON a.kode_paket_pekerjaan_rap = b.kode_paket_pekerjaan_rap 
        JOIN m_pekerjaan c ON a.kode_pekerjaan = c.kode_pekerjaan 
        WHERE a.kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap' ORDER BY a.created_on" ;
$result = $mysqli->query($sql);



$i=1;
while($row = mysqli_fetch_array($result)){
    $rap .= '
    <tr kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="analisa-paket-pekerjaan-'.$row["kode_paket_pekerjaan_rap"].'" id="item-'.$row["kode_item_pekerjaan"].'">
        <td id="'.$row["kode_item_pekerjaan"].'">
        </td>
        <td>
            '.$i.'. '.$row["pekerjaan"].' 
            <span kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="icon-item-pekerjaan-'.$row["kode_paket_pekerjaan_rap"].'" id="'.$row["kode_item_pekerjaan"].'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                    <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
            </span>
        </td>
        <td>'.$row["satuan"].'</td>
        <td></td>
        <td></td>
        <td id="subtotal-item-'.$row["kode_item_pekerjaan"].'" align="right">'.number_format((int)$row["subtotal_item"], 0).'</td>
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
    $i++;
}

$rap .= '
    <tr kode-paket-pekerjaan-rap="'.$kode_paket_pekerjaan_rap.'" class="analisa-paket-pekerjaan-add-'.$kode_paket_pekerjaan_rap.'">
        <td colspan="9"></td>
        <td><a data-toggle="modal" data-target="#ModalSlide-FormPekerjaan" href="#" id="'.$kode_paket_pekerjaan_rap.'" class="new-pekerjaan-form">+tambah pekerjaan ... </a></td>
    </tr>
';

echo $rap;

?>


