<?php
$idproduct = $_POST['product'];
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
$mysql->query("INSERT INTO `products_orders` (`orderid`, `productid`) VALUES ('$orderid','$idproduct');");
$query = "UPDATE `newcpu` SET `count` = `count` - 1 WHERE `id` = '$idproduct' and `count` > 0";
$mysql->query($query);
$mysql->close();
