<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$sql = "select * from m_pekerjaan where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $pekerjaan_raw[] = $row;
}

$pekerjaan = ' <option class="pekerjaan-opt" value="">-- Pilih Pekerjaan --</option>';
foreach ($pekerjaan_raw as $value) {
    $pekerjaan .= '<option class="pekerjaan-opt" value="'.$value["kode_pekerjaan"].'">'.$value["kode_pekerjaan"].' - '.$value["pekerjaan"].'</option>';
}

$pekerjaan .= '<option class="pekerjaan-opt" value="add-master-pekerjaan"><a href="#">pekerjaan lainnya ...</a></option>';

echo $pekerjaan;

//<option value="020601087063504">PT BIMA SAKTI</option>
//<option value="020601087063505">PT Galaksi</option>

?>


