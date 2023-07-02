<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

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

echo $developer

//<option value="020601087063504">PT BIMA SAKTI</option>
//<option value="020601087063505">PT Galaksi</option>

?>


