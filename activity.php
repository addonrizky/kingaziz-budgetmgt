<?php
    function log_activity($mysqli, $activity_name, $session_id, $client_ip_address) { 
        $sql = "INSERT INTO activity_log(activity_name, session_id, client_ip_address) VALUES ('$activity_name', '$session_id', '$client_ip_address')";
        $res = $mysqli->query($sql);
    }
?>