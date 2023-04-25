<?php
print_r($_POST);

$mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

$cash_code = $_POST["cash_code"];
$cashflow_type = $_POST["cashflow_type"];
$spk_code = $_POST["spk_code"];
$desc = $_POST["desc"];
$planned_amount = $_POST["planned_amount"];
$due_date = $_POST["due_date"];
$bank_code = $_POST["bank_code"];
$transaction_refnum = $_POST["transaction_refnum"];

if($cashflow_type == 'D'){
    $planned_amount = $planned_amount * -1;
}

$sql = "select * from week_2023 where '$due_date' between `start_date` AND `end_date`";
$result = $mysqli->query($sql);

$current_week = mysqli_fetch_array($result, MYSQLI_ASSOC);
$current_week_code = $current_week["week_code"];
$next_week_code = $current_week_code + 1;

$current_planned_balance_end = $current_week["planned_balance_end"] + $planned_amount;
//$next_planned_balance_start = $week["planned_balance_end"] + $planned_amount;

$sql = "select * from week_2023 where week_code = $next_week_code";
$result = $mysqli->query($sql);

$next_week = mysqli_fetch_array($result, MYSQLI_ASSOC);
$next_planned_balance_start = $next_week["planned_balance_start"] + $planned_amount;

$sql = "INSERT INTO cashflow(cash_code, cashflow_type, spk_code, `desc`, planned_amount, due_date, bank_code, transaction_refnum, week_code) 
            VALUES ('$cash_code', '$cashflow_type', '$spk_code', '$desc', $planned_amount, '$due_date', '$bank_code', '$transaction_refnum', '$current_week_code')";

$sql2 = "UPDATE week_2023 SET planned_balance_end = (planned_balance_end + $planned_amount) WHERE week_code >= $current_week_code";
$sql3 = "UPDATE week_2023 SET planned_balance_start = (planned_balance_start + $planned_amount) WHERE week_code > $current_week_code";

/* Start transaction */
$mysqli->begin_transaction();

try {
    /* Insert some values */
    print_r($mysqli->query($sql));

    $mysqli->query($sql2);
    $mysqli->query($sql3);
    $mysqli->commit();
} catch (mysqli_sql_exception $exception) {
    echo "AAHAA";
    $mysqli->rollback();
    throw $exception;
}
