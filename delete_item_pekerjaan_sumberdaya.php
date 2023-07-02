<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_item_pekerjaan_sumberdaya = $_POST["delete_code"];

$mysqli->begin_transaction();

try {
    // get map sumberdaya - supplier
    $sql = "SELECT * FROM item_pekerjaan_sumberdaya WHERE kode_item_pekerjaan_sumberdaya = '$kode_item_pekerjaan_sumberdaya'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $kode_item_pekerjaan = $row["kode_item_pekerjaan"];
    $kode_sumberdaya_supplier = $row["kode_sumberdaya_supplier"];
    $koefisien = $row["koefisien"];
    $subtotal = $row["subtotal"];

    $sql = "INSERT INTO item_pekerjaan_sumberdaya_deleted(kode_item_pekerjaan_sumberdaya, kode_item_pekerjaan, kode_sumberdaya_supplier, koefisien, subtotal) 
            VALUES ('$kode_item_pekerjaan_sumberdaya', '$kode_item_pekerjaan', '$kode_sumberdaya_supplier', $koefisien, $subtotal)";
    $res = $mysqli->query($sql);

    $sql = "DELETE FROM item_pekerjaan_sumberdaya WHERE kode_item_pekerjaan_sumberdaya = '$kode_item_pekerjaan_sumberdaya'";
    $res = $mysqli->query($sql);


    // update subtotal item pekerjaan
    $sql = "UPDATE item_pekerjaan SET subtotal = subtotal - $subtotal WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $res = $mysqli->query($sql);

    $sql = "SELECT * FROM item_pekerjaan WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // update subtotal paket pekerjaan
    $kode_paket_pekerjaan_rap = $row["kode_paket_pekerjaan_rap"];
    $sql = "UPDATE paket_pekerjaan_rap SET subtotal = subtotal - $subtotal WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $res = $mysqli->query($sql);

    $sql = "SELECT * FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $obj = array(
        "deduct_amount" =>  $subtotal,
        "kode_paket_pekerjaan_rap" => $kode_paket_pekerjaan_rap,
        "kode_item_pekerjaan" => $kode_item_pekerjaan,
        "rap_code" =>  $row["rap_code"]
    );

    mysqli_commit($mysqli);

    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo "fail";
}
