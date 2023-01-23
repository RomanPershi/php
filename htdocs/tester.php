<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$mysql = new mysqli('localhost', 'root', 'root', 'somebase');
$cooka = $_COOKIE['user'];
$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$cooka'");
$userid = NULL;
foreach ($result as $row) {
    $userid = $row['id'];
}
$result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
$orderid = NULL;
foreach ($result as $row) {
    $orderid = $row['id'];
}
if ($orderid == NULL) {
    $mysql->query("INSERT INTO `orders` (`userid`) VALUES ('$userid');");
    $result = $mysql->query("SELECT * FROM `orders` WHERE `userid` = '$userid'");
    foreach ($result as $row) {
        $orderid = $row['id'];
    }
}
$result = $mysql->query("SELECT * FROM `products_orders` WHERE `orderid` = '$orderid'");
echo $result;
