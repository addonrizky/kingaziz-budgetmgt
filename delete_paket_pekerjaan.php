<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_paket_pekerjaan_rap = $_POST["delete_code"];

$mysqli->begin_transaction();

try {
    // get array of item pekerjaan
    $sql = "SELECT * FROM item_pekerjaan WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $result = $mysqli->query($sql);

    $item_pekerjaan_obj = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $kode_pekerjaan = $row["kode_pekerjaan"];
        $kode_item_pekerjaan = $row["kode_item_pekerjaan"];
        $volume_bq = $row["volume_bq"];
        $subtotal = $row["subtotal"];

        $sql = "INSERT INTO item_pekerjaan_deleted (kode_item_pekerjaan, kode_pekerjaan, kode_paket_pekerjaan_rap, volume_bq, subtotal) 
                VALUES ('$kode_item_pekerjaan', '$kode_pekerjaan', '$kode_paket_pekerjaan_rap', $volume_bq, $subtotal)";
        $res = $mysqli->query($sql);

        $item_pekerjaan_obj[] = $row;
    }

    if (count($item_pekerjaan_obj) <= 0) {
        $sql = "SELECT * FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
        $result = $mysqli->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $coa = $row["coa"];
        $subtotal = $row["subtotal"];
        $rap_code = $row["rap_code"];
        $created_by = $row["created_by"];

        $sql = "INSERT INTO paket_pekerjaan_rap_deleted (kode_paket_pekerjaan_rap, coa, rap_code, subtotal, created_by) 
            VALUES ('$kode_paket_pekerjaan_rap', '$coa', '$rap_code', '$rap_code', $subtotal, '$created_by')";
        $res = $mysqli->query($sql);

        $sql = "DELETE FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
        $res = $mysqli->query($sql);
        
        $obj = array(
            "deduct_amount" =>  $subtotal,
            "rap_code" => $rap_code
        );

        mysqli_commit($mysqli);
        echo json_encode($obj);
        return;
    }

    $sql = "DELETE FROM item_pekerjaan WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $res = $mysqli->query($sql);

    $sql = "SELECT * FROM item_pekerjaan_sumberdaya WHERE ";
    $sql_delete = "DELETE FROM item_pekerjaan_sumberdaya WHERE ";
    // get array of item pekerjaan sumberdaya 
    $i = 0;
    foreach ($item_pekerjaan_obj as $item_pekerjaan) {
        $sql .= "kode_item_pekerjaan = '" . $item_pekerjaan["kode_item_pekerjaan"] . "'";
        $sql_delete .= "kode_item_pekerjaan = '" . $item_pekerjaan["kode_item_pekerjaan"] . "'";

        if ($i != count($item_pekerjaan_obj) - 1) {
            $sql .= " OR ";
            $sql_delete  .= " OR ";
        }

        $i++;
    }

    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $kode_item_pekerjaan_sumberdaya = $row["kode_item_pekerjaan_sumberdaya"];
        $kode_sumberdaya_supplier = $row["kode_sumberdaya_supplier"];
        $koefisien = $row["koefisien"];
        $subtotal = $row["subtotal"];

        $sql = "INSERT INTO item_pekerjaan_sumberdaya_deleted (kode_item_pekerjaan_sumberdaya, kode_sumberdaya_supplier, kode_item_pekerjaan, koefisien, subtotal) 
                VALUES ('$kode_item_pekerjaan_sumberdaya', '$kode_sumberdaya_supplier', '$kode_item_pekerjaan', $koefisien, $subtotal)";
        $res = $mysqli->query($sql);
    }

    $res = $mysqli->query($sql_delete);


    $sql = "SELECT * FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $coa = $row["coa"];
    $subtotal = $row["subtotal"];
    $rap_code = $row["rap_code"];
    $created_by = $row["created_by"];

    $sql = "INSERT INTO paket_pekerjaan_rap_deleted (kode_paket_pekerjaan_rap, coa, rap_code, subtotal, created_by) 
            VALUES ('$kode_paket_pekerjaan_rap', '$coa', '$rap_code', '$rap_code', $subtotal, '$created_by')";
    $res = $mysqli->query($sql);

    $sql = "DELETE FROM paket_pekerjaan_rap WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
    $res = $mysqli->query($sql);

    $obj = array(
        "deduct_amount" =>  $subtotal,
        "rap_code" => $rap_code
    );

    mysqli_commit($mysqli);
    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo "fail";
}
