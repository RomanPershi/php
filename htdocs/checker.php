<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
$pass = md5($pass."gfgsdfgdsfg123fd");
$mysql = new mysqli('localhost','root','root','english');
$result=$mysql->query("SELECT * FROM `logins` WHERE `login` = '$login' AND `pass`='$pass'");
$user = $result->fetch_assoc();
if ($user == NULL)//2
{
  $someerror="Неверный логин или пароль";
Header("Location: /eng.php?get=$someerror");
}
else{
setcookie('user',$user['login'],time() + 3600,"/");
$mysql->close();
header('Location: /english.php');//3
}
 ?>
