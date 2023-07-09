<?php
session_start();
include 'util.php';
include 'activity.php';

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$activity_name =  basename(__FILE__, '.php');
$session_id = session_id();
$client_ip_address = get_client_ip();
log_activity($mysqli, $activity_name, $session_id, $client_ip_address);

$start_week = date_create("2023-04-17");

for($i=0; $i<600; $i++){
    if($i != 0){
        $start_week = $start_week->modify('+1 day');;
    } 
    $week[$i]["start_date"] = date_format($start_week, "Y-m-d");
    $week[$i]["end_date"] = date_format($start_week->modify('+6 day'), "Y-m-d");
}

$script = "INSERT INTO week_2023(week_code, start_date, end_date, planned_balance_start, planned_balance_end, actual_balance, bri_balance, bni_balance, btn_balance, mandiri_balance, bsi_bisnis_balance, bsi_giro_balance) VALUES ";
$i=67;

$sql = "SELECT * FROM week_2023 WHERE week_code = '" . ($i-1) . "'";
print_r($sql);
$weekByWeekCode = $mysqli->query($sql);
$rowWeek = mysqli_fetch_array($weekByWeekCode);
print_r($rowWeek);

foreach ($week as $value) {
    if($i == 67){
        $script .= "('".$i."', '".$value['start_date']."', '".$value['end_date']."', ".$rowWeek["planned_balance_start"].", ".$rowWeek["planned_balance_end"].", ".$rowWeek["actual_balance"].", ".$rowWeek["bri_balance"].", ".$rowWeek["bni_balance"].", ".$rowWeek["btn_balance"].", ".$rowWeek["mandiri_balance"].", ".$rowWeek["bsi_bisnis_balance"].", ".$rowWeek["bsi_giro_balance"].")";
    } else {
        $script .= ",('".$i."', '".$value['start_date']."', '".$value['end_date']."', ".$rowWeek["planned_balance_start"].", ".$rowWeek["planned_balance_end"].", ".$rowWeek["actual_balance"].", ".$rowWeek["bri_balance"].", ".$rowWeek["bni_balance"].", ".$rowWeek["btn_balance"].", ".$rowWeek["mandiri_balance"].", ".$rowWeek["bsi_bisnis_balance"].", ".$rowWeek["bsi_giro_balance"].")";
    }

    $i++;
}

print_r($script);
echo "<br />";

print_r($script);

/* Start transaction */
$mysqli->begin_transaction();

try {
    /* Insert some values */
    print_r($mysqli->query($script));
    $mysqli->commit();
} catch (mysqli_sql_exception $exception) {
    echo "AAHAA";
    $mysqli->rollback();
    throw $exception;
}

?>