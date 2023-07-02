<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_pekerjaan = $_POST["kode_pekerjaan"];
$pekerjaan = $_POST["pekerjaan"];
$satuan = $_POST["satuan"];
$volume = $_POST["volume"];

$sql = "INSERT INTO m_pekerjaan(kode_pekerjaan, pekerjaan, satuan) 
            VALUES ('$kode_pekerjaan', '$pekerjaan', '$satuan')";

$res = $mysqli->query($sql);

//echo json_encode($res);

$m_pekerjaan_added = '<option class="paket-opt" value="'.$kode_pekerjaan.'">'.$kode_pekerjaan.' - '.$pekerjaan.'</option>';

echo $m_pekerjaan_added;
