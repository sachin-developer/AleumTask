<?php
session_start();
$time = date('Y-m-d H:i:s');
$end = $_SESSION['end_time'];

$startCount = strtotime($time);
$endCount = strtotime($end);

$diff = $endCount - $startCount;
echo gmdate("H:i:s",$diff);
?>