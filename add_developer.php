<?php

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$developer_code = $_POST["developer_code"];
$developer_name = $_POST["developer_name"];

$sql = "INSERT INTO developer(developer_code, developer_name) 
            VALUES ('$developer_code', '$developer_name')";

$res = $mysqli->query($sql);

//echo json_encode($res);

$developer_added = '<option class="dev-opt" value="'.$developer_code.'">'.$developer_code.' - '.$developer_name.'</option>';

echo $developer_added;
