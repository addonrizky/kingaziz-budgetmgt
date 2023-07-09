<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$kode_item_pekerjaan_sumberdaya = $_POST["kode_item_pekerjaan_sumberdaya"];
$kode_item_pekerjaan = $_POST["kode_item_pekerjaan"];
$kode_sumberdaya = $_POST["kode_sumberdaya"];
$kode_supplier = $_POST["kode_supplier"];
$koefisien = $_POST["koefisien"];
$subtotal = $_POST["subtotal"];
$last_item = $_POST["last_item"];

$mysqli->begin_transaction();

try {
    // get map sumberdaya - supplier
    $sql = "SELECT * FROM sumberdaya_supplier WHERE kode_sumberdaya = '$kode_sumberdaya' AND kode_supplier = '$kode_supplier'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $kode_sumberdaya_supplier = $row["kode_sumberdaya_supplier"];

    $sql = "INSERT INTO item_pekerjaan_sumberdaya(kode_item_pekerjaan_sumberdaya, kode_item_pekerjaan, kode_sumberdaya_supplier, koefisien, subtotal) 
            VALUES ('$kode_item_pekerjaan_sumberdaya', '$kode_item_pekerjaan', '$kode_sumberdaya_supplier', $koefisien, $subtotal)";
    $res = $mysqli->query($sql);

    //echo $sql;

    // update subtotal item pekerjaan
    $sql = "UPDATE item_pekerjaan SET subtotal = subtotal + $subtotal WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $res = $mysqli->query($sql);


    $sql = "SELECT e.sumberdaya, e.satuan, a.koefisien, c.harga_supplier, a.subtotal, b.volume_bq, b.kode_paket_pekerjaan_rap 
        FROM item_pekerjaan_sumberdaya a 
        JOIN item_pekerjaan b ON a.kode_item_pekerjaan = b.kode_item_pekerjaan
        JOIN sumberdaya_supplier c ON a.kode_sumberdaya_supplier = c.kode_sumberdaya_supplier 
        JOIN m_supplier d ON c.kode_supplier = d.kode_supplier
        JOIN m_sumberdaya e ON c.kode_sumberdaya = e.kode_sumberdaya
        WHERE a.kode_item_pekerjaan_sumberdaya  = '$kode_item_pekerjaan_sumberdaya'";

    $result = $mysqli->query($sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // update subtotal paket pekerjaan
    $kode_paket_pekerjaan_rap = $row["kode_paket_pekerjaan_rap"];
    $sql = "UPDATE paket_pekerjaan_rap SET subtotal = subtotal + $subtotal WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $res = $mysqli->query($sql);

    if (!isset($lastnum) || !is_numeric($lastnum)) {
        $lastnum = 0;
    }
    $i = $lastnum + 1;

    $item_sumberdaya_added = '
    <tr kode-paket-pekerjaan-rap="' . $kode_paket_pekerjaan_rap . '" class="analisa-item-pekerjaan-' . $kode_item_pekerjaan . '" id="sumberdaya-' . $kode_item_pekerjaan_sumberdaya . '">
        <td></td>
        <td>' . $row["sumberdaya"] . '</td>
        <td>' . number_format($row["koefisien"], 2) . '</td>
        <td>' . $row["satuan"] . '</td>
        <td></td>
        <td align="right">' . number_format($row["harga_supplier"], 0) . '</td>
        <td align="right">' . number_format($row["subtotal"], 0) . '</td>
        <td></td>
        <td>' . $row["volume_bq"] . '</td>
        <td>' . ($row["volume_bq"] * $row["koefisien"]) . '</td>
        <td>
            <span kode_item_pekerjaan_sumberdaya="'.$kode_item_pekerjaan_sumberdaya.'" kode_item_pekerjaan="'.$kode_item_pekerjaan.'" sumberdaya="'.$row["sumberdaya"].'" style="cursor:pointer" class="svg-hapus-pekerjaan-sumberdaya" id="svg-hapus-pekerjaan-sumberdaya-'.$kode_item_pekerjaan_sumberdaya.'" data-toggle="modal" data-target="#confirmationModal" type="button">
                <svg  
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
            </span>
        </td>
    </tr>
';

    // get latest item pekerjaan
    $sql = "SELECT * FROM item_pekerjaan WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $latest_item_subtotal = $row["subtotal"];

    // get latest paket pekerjaan
    $sql = "SELECT * FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $latest_paket_subtotal = $row["subtotal"];
    $rap_code = $row["rap_code"];

    $obj = array(
        "sumberdaya" =>  $item_sumberdaya_added, 
        "kode_paket_pekerjaan_rap" => $kode_paket_pekerjaan_rap,
        "rap_code" => $rap_code,
        "item_subtotal" => number_format($latest_item_subtotal, 0), 
        "paket_subtotal" => number_format($latest_paket_subtotal, 0)
    );
    mysqli_commit($mysqli);
    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo json_encode($exception);
}
