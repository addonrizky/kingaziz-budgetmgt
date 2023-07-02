<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$sql = "select * from m_supplier where status = 1";
$result = $mysqli->query($sql);
while($row = mysqli_fetch_array($result))
{
    $supplier_raw[] = $row;
}

$supplier = ' <option class="supplier-opt" value="">-- pilih supplier --</option>';
foreach ($supplier_raw as $value) {
    $supplier .= '<option class="sumberdaya-opt" value="'.$value["kode_supplier"].'">'.$value["kode_supplier"].' - '.$value["supplier"].'</option>';
}

$supplier .= '<option class="supplier-opt" value="add-master-supplier"><a href="#">supplier lainnya ...</a></option>';

echo $supplier;
?>


