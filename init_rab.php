<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$rap_code = $_POST["rap_code"];
echo "rap code : " . $rap_code . "<br />";

$mysqli->begin_transaction();

try {
    // fill rab
    $sql = "SELECT * FROM rap WHERE rap_code = '$rap_code'";
    $result = $mysqli->query($sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo json_encode($row);
    
    $description = $row["description"];
    $developer_code = $row["developer_code"];
    $rab_code = "rab-" . $row["rap_code"];

    // fill paket pekerjaan    
    $sql = "SELECT * FROM paket_pekerjaan_rap WHERE rap_code = '$rap_code'";
    $result = $mysqli->query($sql);

    $total_biaya_rab = 0;

    $paket_pekerjaan_obj = array();
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $kode_paket_pekerjaan_rab = "rab-" . $row["kode_paket_pekerjaan_rap"];
        $coa = $row["coa"];
        $rab_code = "rab-" . $row["rap_code"];
        $subtotal = $row["subtotal"];
        $subtotal_ori = $row["subtotal"];
       
        $sql = "INSERT INTO paket_pekerjaan_rab (kode_paket_pekerjaan_rab, coa, rab_code, subtotal, subtotal_ori) 
                VALUES ('$kode_paket_pekerjaan_rab', '$coa', '$rab_code', $subtotal, $subtotal_ori)";
        $res = $mysqli->query($sql);

        $paket_pekerjaan_obj[] = $row;
        $total_biaya_rab +=  $subtotal_ori;
    }

    $sql = "INSERT INTO rab (`description`, developer_code, rab_code, total_biaya, total_biaya_ori) 
            VALUES ('$description', '$developer_code', '$rab_code', $total_biaya_rab, $total_biaya_rab)";
    $res = $mysqli->query($sql);

    // fill item pekerjaan
    $i = 0;
    $item_pekerjaan_obj = array();
    foreach($paket_pekerjaan_obj as $paket_pekerjaan){ 
        $kode_paket_pekerjaan_rap = $paket_pekerjaan["kode_paket_pekerjaan_rap"];
        $sql = "SELECT * FROM item_pekerjaan WHERE kode_paket_pekerjaan_rap = '$kode_paket_pekerjaan_rap'";
        $result = $mysqli->query($sql);

        echo "<br /><br />" . $sql . "<br /><br />";

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $kode_item_pekerjaan_rab = "rab-" . $row["kode_item_pekerjaan"];
            $kode_pekerjaan = $row["kode_pekerjaan"];
            $kode_paket_pekerjaan_rab = "rab-" . $row["kode_paket_pekerjaan_rap"];
            $satuan = $row["satuan"];
            $volume_bq = $row["volume_bq"];
            $subtotal = $row["subtotal"];
            $subtotal_ori = $row["subtotal"];
           
            $sql = "INSERT INTO item_pekerjaan_rab (kode_item_pekerjaan_rab, kode_pekerjaan, kode_paket_pekerjaan_rab, satuan, volume_bq, subtotal, subtotal_ori) 
                    VALUES ('$kode_item_pekerjaan_rab', '$kode_pekerjaan', '$kode_paket_pekerjaan_rab', '$satuan', $volume_bq, $subtotal, $subtotal_ori)";
            $res = $mysqli->query($sql);
    
            $item_pekerjaan_obj[] = $row;
        }
    }

    // fill item sumberdaya
    $i = 0;
    foreach($item_pekerjaan_obj as $item_pekerjaan){ 
        $kode_item_pekerjaan = $item_pekerjaan["kode_item_pekerjaan"];
        $sql = "SELECT * FROM item_pekerjaan_sumberdaya WHERE kode_item_pekerjaan = '$kode_item_pekerjaan'";
        $result = $mysqli->query($sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $kode_item_pekerjaan_sumberdaya_rab = "rab-" . $row["kode_item_pekerjaan_sumberdaya"];
            $kode_sumberdaya_supplier = $row["kode_sumberdaya_supplier"];
            $kode_item_pekerjaan_rab = "rab-" . $row["kode_item_pekerjaan"];
            $koefisien = $row["koefisien"];
            $subtotal = $row["subtotal"];
            $subtotal_ori = $row["subtotal"];
           
            $sql = "INSERT INTO item_pekerjaan_sumberdaya_rab (kode_item_pekerjaan_sumberdaya_rab, kode_sumberdaya_supplier, kode_item_pekerjaan_rab, koefisien, subtotal, subtotal_ori) 
                    VALUES ('$kode_item_pekerjaan_sumberdaya_rab', '$kode_sumberdaya_supplier', '$kode_item_pekerjaan_rab', '$koefisien', $subtotal, $subtotal_ori)";
            $res = $mysqli->query($sql);
    
            $item_pekerjaan_obj[] = $row;
        }
    }

    $sql = "UPDATE rap SET status = 1 WHERE rap_code = '$rap_code'";
    $result = $mysqli->query($sql);


    mysqli_commit($mysqli);
    echo json_encode("OK");
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($mysqli);
    print_r($exception);
    echo "fail";
}
