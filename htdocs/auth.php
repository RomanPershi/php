<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass = md5($pass."gfgsdfgdsfg123fd");
$mysql = new mysqli('localhost','root','root','cpuz');
$result=$mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `pass`='$pass'");
$user = $result->fetch_assoc();
if ($user == NULL)//2
{
  $someerror="Неверный логин или пароль";
Header("Location: /admin.php?get=$someerror");
}
else{
setcookie('user',$user['name'],time() + 3600*24,"/");
$mysql->close();
header('Location: /admin.php');//3
}
 ?>
