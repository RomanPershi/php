<?php
$idproduct = $_POST['product'];
$mysql = new mysqli('localhost','root','root','somebase');
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
$query = "DELETE FROM `products_orders` WHERE `productid` = '$idproduct' and `orderid` = '$orderid'";
$mysql->query($query);
$query = "UPDATE `newcpu` SET `count` = `count` + 1 WHERE `id` = '$idproduct'";
$mysql->query($query);
$mysql->close();