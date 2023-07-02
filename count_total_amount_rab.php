<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$rab_code = $_POST["rab_code"];

$sql = "SELECT SUM(subtotal) AS total_amount_rab FROM paket_pekerjaan_rab WHERE rab_code = '$rab_code';";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

$obj = array(
    "total_biaya" =>  isset($row["total_amount_rab"]) ? number_format($row["total_amount_rab"],0) : 0,
);

$sql = "SELECT * FROM rab WHERE rab_code = '$rab_code';";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);

$obj["total_biaya_ori"] = number_format($row["total_biaya_ori"], 0);
$obj["profit"] = number_format($row["total_biaya"] - $row["total_biaya_ori"], 0);
$obj["margin"] = $row["margin"];

//echo isset($row["total_amount_rab"]) ? $row["total_amount_rab"] : 0;
echo json_encode($obj);

?>