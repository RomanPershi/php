<?php
$mysql = new mysqli('localhost','root','root','somebase');
$name = $_POST['name'];
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass = md5($pass."gfgsdfgdsfg123fd");
$query = "INSERT INTO `user` (`id`,`login`,`pass`,`name`,`mode`) VALUES (NULL,'$login','$pass','$name',0);";
$mysql->query($query);
$mysql->close();

$someerror = "Пользователь добавлен";
echo $someerror;
Header("Location: /register.php?get=$someerror");

 ?>
