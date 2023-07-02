<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_item_pekerjaan_sumberdaya_rab = $_POST["kode_item_pekerjaan_sumberdaya_rab"];
$kode_item_pekerjaan_rab = $_POST["kode_item_pekerjaan_rab"];
$rab_code = $_POST["rab_code"];
$margin = $_POST["margin"];
$subtotal_ori = str_replace(",", "", $_POST["subtotal_ori"]);

$subtotal = $subtotal_ori + ($subtotal_ori * $margin) / 100;
$profit = $subtotal - $subtotal_ori;

//"SELECT * FROM item_pekerjaan_rab WHERE "

$mysqli->begin_transaction();

try {

    // update margin, subtotal item_pekerjaan_sumberdaya_rab
    $sql = "UPDATE item_pekerjaan_sumberdaya_rab SET margin = $margin, subtotal = $subtotal WHERE kode_item_pekerjaan_sumberdaya_rab = '$kode_item_pekerjaan_sumberdaya_rab'";
    $result = $mysqli->query($sql);
    
    $sql = "SELECT * FROM item_pekerjaan_sumberdaya_rab WHERE kode_item_pekerjaan_rab = '$kode_item_pekerjaan_rab'";
    $result = $mysqli->query($sql);
    $subtotal_item_pekerjaan_rab = 0;
    while($row = mysqli_fetch_array($result)){
        $subtotal_item_pekerjaan_rab += $row["subtotal"];
    }

    // update margin, subtotal item_pekerjaan_rab
    $sql = "SELECT * FROM item_pekerjaan_rab WHERE kode_item_pekerjaan_rab='$kode_item_pekerjaan_rab'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result);
    $kode_paket_pekerjaan_rab = $row["kode_paket_pekerjaan_rab"];
    $profit_item_pekerjaan_rab = $subtotal_item_pekerjaan_rab - $row["subtotal_ori"];
    $margin_item_pekerjaan_rab = $profit_item_pekerjaan_rab / $row["subtotal_ori"] * 100;
    
    $sql = "UPDATE item_pekerjaan_rab SET margin = $margin_item_pekerjaan_rab, subtotal = $subtotal_item_pekerjaan_rab WHERE kode_item_pekerjaan_rab = '$kode_item_pekerjaan_rab'";
    $result = $mysqli->query($sql);
    
    $sql = "SELECT * FROM item_pekerjaan_rab WHERE kode_paket_pekerjaan_rab = '$kode_paket_pekerjaan_rab'";
    $result = $mysqli->query($sql);
    $subtotal_paket_pekerjaan_rab = 0;
    while($row = mysqli_fetch_array($result)){
        $subtotal_paket_pekerjaan_rab += $row["subtotal"];
    }

    // update margin, subtotal paket_pekerjaan_rab
    $sql = "SELECT * FROM paket_pekerjaan_rab WHERE kode_paket_pekerjaan_rab='$kode_paket_pekerjaan_rab'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result);
    $rab_code = $row["rab_code"];
    $profit_paket_pekerjaan_rab = $subtotal_paket_pekerjaan_rab - $row["subtotal_ori"];
    $margin_paket_pekerjaan_rab = $profit_paket_pekerjaan_rab / ($row["subtotal_ori"]) * 100;

    $sql = "UPDATE paket_pekerjaan_rab SET margin = $margin_paket_pekerjaan_rab, subtotal = $subtotal_paket_pekerjaan_rab WHERE kode_paket_pekerjaan_rab = '$kode_paket_pekerjaan_rab'";
    $result = $mysqli->query($sql);

    $sql = "SELECT * FROM paket_pekerjaan_rab WHERE rab_code = '$rab_code'";
    $result = $mysqli->query($sql);
    $total_biaya = 0;
    while($row = mysqli_fetch_array($result)){
        $total_biaya += $row["subtotal"];
    }
//
    // update margin, subtotal rab
    $sql = "SELECT * FROM rab WHERE rab_code='$rab_code'";
    $result = $mysqli->query($sql);
    $row = mysqli_fetch_array($result);
    $profit_rab = $total_biaya - $row["total_biaya_ori"];
    $margin_rab = $profit_rab / $row["total_biaya_ori"] * 100;
    $sql = "UPDATE rab SET margin = $margin_rab, total_biaya = $total_biaya WHERE rab_code = '$rab_code'";
    $result = $mysqli->query($sql);

    $obj = array(
        "subtotal_item_pekerjaan_sumberdaya_rab" =>  number_format($subtotal, 0),
        "subtotal_item_pekerjaan_rab" => number_format($subtotal_item_pekerjaan_rab, 0),
        "subtotal_paket_pekerjaan_rab" => number_format($subtotal_paket_pekerjaan_rab, 0),
        "total_biaya" => number_format($total_biaya, 0),

        "margin_item_pekerjaan_sumberdaya_rab" => $margin,
        "margin_item_pekerjaan_rab" => round($margin_item_pekerjaan_rab, 2),
        "margin_paket_pekerjaan_rab" => round($margin_paket_pekerjaan_rab, 2),
        "margin_rab" => round($margin_rab, 2),
        
        "profit" => number_format($profit, 0),
        "profit_item_pekerjaan_rab" => number_format($profit_item_pekerjaan_rab, 0),
        "profit_paket_pekerjaan_rab" => number_format($profit_paket_pekerjaan_rab, 0),
        "profit_rab" => number_format($profit_rab, 0)
    );
    mysqli_commit($mysqli);
    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo json_encode($exception);
}
