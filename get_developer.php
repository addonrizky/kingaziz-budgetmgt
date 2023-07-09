<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$sql = "select * from developer where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $developers_raw[] = $row;
}

$developer = ' <option class="dev-opt" value="">-- Pilih Bouwheer --</option>';
foreach ($developers_raw as $value) {
    $developer .= '<option class="dev-opt" value="'.$value["developer_code"].'">'.$value["developer_name"].'</option>';
}

$developer .= '<option class="dev-opt" value="add-master-developer"><a href="#">bouwheer lainnya ...</a></option>';

echo $developer

//<option value="020601087063504">PT BIMA SAKTI</option>
//<option value="020601087063505">PT Galaksi</option>

?>


