<?php
$mysql = new mysqli('localhost','root','root','somebase');
$id =  $_POST['name'];
$query = "DELETE FROM `newcpu` WHERE `id` = '$id'";
$mysql->query($query);
$mysql->close();
header('Location: /insert.php');
?>
