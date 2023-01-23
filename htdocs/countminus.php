<?php
$mysql = new mysqli('localhost','root','root','somebase');
$id =  $_POST['countplus'];
$query = "UPDATE `newcpu` SET `count` = `count` - 1 WHERE `id` = '$id' and `count` > 0";
$mysql->query($query);
$mysql->close();

?>
