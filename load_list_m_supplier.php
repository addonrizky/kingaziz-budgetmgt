<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$sql = "select * from m_supplier where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $supplier_raw[] = $row;
}

$supplier = ' <option class="supplier-opt" value="">-- pilih supplier --</option>';
foreach ($supplier_raw as $value) {
    $supplier .= '<option class="sumberdaya-opt" value="'.$value["kode_supplier"].'">'.$value["kode_supplier"].' - '.$value["supplier"].'</option>';
}

$supplier .= '<option class="supplier-opt" value="add-master-supplier"><a href="#">supplier lainnya ...</a></option>';

echo $supplier;
?>


