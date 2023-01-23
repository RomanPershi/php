<?php

$date = date('Y-m-d H:i:s');
$mysql = new mysqli('localhost','root','root','english');
$timestamp = strtotime($date);
echo $timestamp;
?>
