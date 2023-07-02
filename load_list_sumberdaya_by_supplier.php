<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_supplier = $_POST["kode_supplier"];

$sql = "SELECT * FROM sumberdaya_supplier a
        JOIN m_sumberdaya b ON a.kode_sumberdaya = b.kode_sumberdaya
        WHERE 
            a.status = 1 
            AND b.status = 1";

if($kode_supplier != "") {
    $sql .= " AND a.kode_supplier = '$kode_supplier'";
}

$sql .= " GROUP BY a.kode_sumberdaya";
            
$result = $mysqli->query($sql);

while($row = mysqli_fetch_array($result))
{
    $sumberdaya_raw[] = $row;
}

$sumberdaya = ' <option class="sumberdaya-opt" value="">-- pilih sumberdaya --</option>';
foreach ($sumberdaya_raw as $value) {
    $sumberdaya .= '<option class="sumberdaya-opt" value="'.$value["kode_sumberdaya"].'">'.$value["kode_sumberdaya"].' - '.$value["sumberdaya"].'</option>';
}

$sumberdaya .= '<option class="sumberdaya-opt" value="add-master-sumberdaya"><a href="#">sumberdaya lainnya ...</a></option>';

echo $sumberdaya;
?>


