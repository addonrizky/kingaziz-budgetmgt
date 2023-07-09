<?php

session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$coa = $_POST["coa"];
$paket_pekerjaan = $_POST["paket_pekerjaan"];
$satuan = $_POST["satuan"];
$alias = $_POST["alias"];

$sql = "INSERT INTO m_paket_pekerjaan(coa, paket_pekerjaan, satuan, alias) 
            VALUES ('$coa', '$paket_pekerjaan', '$satuan', '$alias')";

$res = $mysqli->query($sql);

//echo json_encode($res);

$m_paket_added = '<option class="paket-opt" value="'.$coa.'">'.$coa.' - '.$paket_pekerjaan.'</option>';

echo $m_paket_added;
