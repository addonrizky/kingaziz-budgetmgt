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

$sql = "SELECT SUM(subtotal) AS total_amount_rap FROM paket_pekerjaan_rap WHERE rap_code = '$rap_code';";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);



echo isset($row["total_amount_rap"]) ? $row["total_amount_rap"] : 0;

?>


