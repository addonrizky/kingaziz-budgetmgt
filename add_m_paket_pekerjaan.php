<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

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
