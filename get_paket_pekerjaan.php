<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$sql = "select * from m_paket_pekerjaan where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $paket_raw[] = $row;
}

$paket = ' <option class="dev-opt" value="">-- Pilih Paket --</option>';
foreach ($paket_raw as $value) {
    $paket .= '<option class="paket-opt" value="'.$value["coa"].'">'.$value["coa"].' - '.$value["paket_pekerjaan"].'</option>';
}

$paket .= '<option class="paket-opt" value="add-master-paket"><a href="#">paket lainnya ...</a></option>';

echo $paket

//<option value="020601087063504">PT BIMA SAKTI</option>
//<option value="020601087063505">PT Galaksi</option>

?>


