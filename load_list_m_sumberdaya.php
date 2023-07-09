<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$sql = "select * from m_sumberdaya where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $sumberdaya_raw[] = $row;
}

$sumberdaya = ' <option class="sumberdaya-opt" value="">-- pilih sumberdaya --</option>';
foreach ($sumberdaya_raw as $value) {
    $sumberdaya .= '<option class="sumberdaya-opt" value="'.$value["kode_sumberdaya"].'">'.$value["kode_sumberdaya"].' - '.$value["sumberdaya"].'</option>';
}

$sumberdaya .= '<option class="sumberdaya-opt" value="add-master-sumberdaya"><a href="#">sumberdaya lainnya ...</a></option>';

echo $sumberdaya;
?>


