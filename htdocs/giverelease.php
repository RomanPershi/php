<?php
$mysql = new mysqli('localhost', 'root', 'root', 'somebase');
$cooka = $_COOKIE['user'];
$result = $mysql->query("SELECT * FROM `user` WHERE `name` = '$cooka'");
$userid = NULL;
foreach ($result as $row) {
    $userid = $row['id'];
}
$mysql->query("INSERT INTO `orders` (`userid`) VALUES ('$userid');");
$mysql->close();
Header("Location: /admin.php");