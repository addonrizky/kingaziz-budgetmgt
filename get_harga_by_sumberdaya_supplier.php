<?php
$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$kode_supplier = $_POST["kode_supplier"];
$kode_sumberdaya = $_POST["kode_sumberdaya"];

$sql = "SELECT harga_supplier, satuan FROM sumberdaya_supplier a
        JOIN m_sumberdaya b ON a.kode_sumberdaya = b.kode_sumberdaya
        WHERE 
            a.status = 1
            AND b.status = 1";

if($kode_supplier != "") {
    $sql .= " AND a.kode_supplier = '$kode_supplier'";
}

if($kode_sumberdaya != "") {
    $sql .= " AND a.kode_sumberdaya = '$kode_sumberdaya'";
}

$sql .= " limit 1";
            
$result = $mysqli->query($sql);

$row = mysqli_fetch_array($result);

echo json_encode($row);
?>


