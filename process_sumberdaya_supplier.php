<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$kode_sumberdaya = $_POST["kode_sumberdaya"];
$sumberdaya = $_POST["sumberdaya"];
$satuan = $_POST["satuan"];
$harga = $_POST["harga"];

$kode_supplier = $_POST["kode_supplier"];
$supplier = $_POST["supplier"];


$mysqli->begin_transaction();

try {

    $sql = "INSERT INTO m_sumberdaya(kode_sumberdaya, sumberdaya, satuan, harga) 
            VALUES ('$kode_sumberdaya', '$sumberdaya', '$satuan', $harga)";
    $res = $mysqli->query($sql);

    //echo $sql;

    if ($kode_supplier != "" && $supplier != "") {
        $sql = "INSERT INTO m_supplier(kode_supplier, supplier) 
                VALUES ('$kode_supplier', '$supplier')";
        $res = $mysqli->query($sql);
    }

    $kode_sumberdaya_supplier = $kode_sumberdaya . "-" . $kode_supplier;
    $sql = "INSERT INTO sumberdaya_supplier(kode_sumberdaya_supplier, kode_sumberdaya, kode_supplier, harga_supplier) 
            VALUES ('$kode_sumberdaya_supplier', '$kode_sumberdaya', '$kode_supplier', $harga)";
    $res = $mysqli->query($sql);


    // SUMBERDAYA RELOAD
    $sql = "select * from m_sumberdaya where status = 1";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $sumberdaya_raw[] = $row;
    }
    $sumberdaya_reload = '<option class="sumberdaya-opt" value="">-- pilih sumberdaya --</option>';
    foreach ($sumberdaya_raw as $value) {
        $sumberdaya_reload .= '<option class="sumberdaya-opt" value="' . $value["kode_sumberdaya"] . '">' . $value["kode_sumberdaya"] . ' - ' . $value["sumberdaya"] . '</option>';
    }
    $sumberdaya_reload .= '<option class="sumberdaya-opt" value="add-master-sumberdaya"><a href="#">sumberdaya lainnya ...</a></option>';


    // SUPPLIER RELOAD
    $sql = "select * from m_supplier where status = 1";
    $result = $mysqli->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $supplier_raw[] = $row;
    }
    $supplier_reload = ' <option class="supplier-opt" value="">-- pilih supplier --</option>';
    foreach ($supplier_raw as $value) {
        $supplier_reload .= '<option class="sumberdaya-opt" value="' . $value["kode_supplier"] . '">' . $value["kode_supplier"] . ' - ' . $value["supplier"] . '</option>';
    }
    $supplier_reload .= '<option class="supplier-opt" value="add-master-supplier"><a href="#">supplier lainnya ...</a></option>';

    mysqli_commit($mysqli);

    $obj = array(
        "sumberdaya_list" =>  $sumberdaya_reload, 
        "supplier_list" => $supplier_reload,
        "harga_supplier" => $harga,
        "satuan" => $satuan
    );

    echo json_encode($obj);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo json_encode($exception);
}
