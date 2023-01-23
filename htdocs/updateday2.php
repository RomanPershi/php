<?php

$date = date('Y-m-d H:i:s');
$mysql = new mysqli('localhost','root','root','english');
$timestamp = strtotime($date);
$table = $_COOKIE['user'];
$id =  $_POST['repeat'];
$id2 =  $_POST['dat'];
$summ = 0;
if ($id == 1)
{
  $summ = $timestamp+10*3600

}
else{
    $summ = $timestamp+24*$id*3600
}
$query = "UPDATE `$table` SET `day` = '$summ' WHERE `id` = '$id2'";
$mysql->query($query);
$mysql->close();

?>
