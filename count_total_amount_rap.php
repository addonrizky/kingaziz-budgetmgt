<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$rap_code = $_POST["rap_code"];

$sql = "SELECT SUM(subtotal) AS total_amount_rap FROM paket_pekerjaan_rap WHERE rap_code = '$rap_code';";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);



echo isset($row["total_amount_rap"]) ? $row["total_amount_rap"] : 0;

?>


