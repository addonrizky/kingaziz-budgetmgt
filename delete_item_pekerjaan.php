<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$kode_item_pekerjaan = $_POST["delete_code"];

$mysqli->begin_transaction();

try {
    // delete item_pekerjaan_sumberdaya (the child)
    $sql = "SELECT * FROM item_pekerjaan_sumberdaya WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $result = $mysqli->query($sql);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $kode_item_pekerjaan_sumberdaya = $row["kode_item_pekerjaan_sumberdaya"];
        $kode_sumberdaya_supplier = $row["kode_sumberdaya_supplier"];
        $koefisien = $row["koefisien"];
        $subtotal = $row["subtotal"];

        $sql = "INSERT INTO item_pekerjaan_sumberdaya_deleted (kode_item_pekerjaan_sumberdaya, kode_sumberdaya_supplier, kode_item_pekerjaan, koefisien, subtotal) 
                VALUES ('$kode_item_pekerjaan_sumberdaya', '$kode_sumberdaya_supplier', '$kode_item_pekerjaan', $koefisien, $subtotal)";
        $res = $mysqli->query($sql);
    }

    $sql = "DELETE FROM item_pekerjaan_sumberdaya WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $res = $mysqli->query($sql);

    // delete item_pekerjaan (the parent)
    $sql = "SELECT * FROM item_pekerjaan WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $kode_paket_pekerjaan_rap = $row["kode_paket_pekerjaan_rap"];
    $kode_pekerjaan = $row["kode_pekerjaan"];
    $volume_bq = $row["volume_bq"];
    $subtotal = $row["subtotal"];

    
    $sql = "INSERT INTO item_pekerjaan_deleted(kode_item_pekerjaan, kode_pekerjaan, kode_paket_pekerjaan_rap, volume_bq, subtotal) 
            VALUES ('$kode_item_pekerjaan', '$kode_pekerjaan', '$kode_paket_pekerjaan_rap', $volume_bq, $subtotal)";
    $res = $mysqli->query($sql);

    $sql = "DELETE FROM item_pekerjaan WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $res = $mysqli->query($sql);


    // update subtotal item pekerjaan
    $sql = "UPDATE paket_pekerjaan_rap SET subtotal = subtotal - $subtotal WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $res = $mysqli->query($sql);

    $sql = "SELECT * FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $obj = array(
        "deduct_amount" =>  $subtotal,
        "kode_paket_pekerjaan_rap" => $kode_paket_pekerjaan_rap,
        "rap_code" => $row["rap_code"]
    );

    mysqli_commit($mysqli);
    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo "fail";
}
