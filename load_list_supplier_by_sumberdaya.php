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

//echo $kode_sumberdaya;

$sql = "SELECT * FROM sumberdaya_supplier a
        JOIN m_supplier b ON a.kode_supplier = b.kode_supplier
        WHERE 
            a.status = 1 
            AND b.status = 1";

if($kode_sumberdaya != "") {
    $sql .= " AND a.kode_sumberdaya = '$kode_sumberdaya'";
}

$sql .= " GROUP BY a.kode_supplier";

$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $supplier_raw[] = $row;
}

$supplier = ' <option class="supplier-opt" value="">-- pilih supplier --</option>';
foreach ($supplier_raw as $value) {
    $supplier .= '<option class="supplier-opt" value="'.$value["kode_supplier"].'">'.$value["kode_supplier"].' - '.$value["supplier"].'</option>';
}

$supplier .= '<option class="supplier-opt" value="add-master-supplier"><a href="#">supplier lainnya ...</a></option>';

echo $supplier;
?>


