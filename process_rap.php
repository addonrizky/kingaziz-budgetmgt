<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$lastnum = $_POST["lastnum"];
$rap_code = $_POST["rap_code"];
$description = $_POST["description"];
$developer_code = $_POST["developer_code"];

$sql = "INSERT INTO rap(rap_code, `description`, developer_code) 
            VALUES ('$rap_code', '$description', '$developer_code')";

$res = $mysqli->query($sql);

//echo json_encode($res);


$sql = "SELECT * FROM rap a 
        JOIN developer b ON a.developer_code = b.developer_code 
        JOIN m_status c ON a.status = c.kode_status 
        WHERE a.rap_code = '$rap_code' " ;
$result = $mysqli->query($sql);

///print_r($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if(!isset($lastnum) || !is_numeric($lastnum)){
    $lastnum = 0;
}
$i = $lastnum + 1;
$rap_added = '
<tr class="rap-object" id="item-rap-'.$i.'">
    <th scope="row">'.$i.'</th>
    <td><a id="'.$rap_code.'" class="list-analisa" data-toggle="modal" data-target="#ModalSlide-RAP">'.$row["description"].'</a></td>
    <td>'.$row["developer_name"].'</td>
    <td>'.date('Y-m-d',strtotime($row["created_on"])).'</td>
    <td>'.$row["status_desc"].'</td>
    <td>edit | delete</td>
</tr>';

echo $rap_added;
