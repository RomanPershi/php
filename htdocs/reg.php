<?php
$login = filter_var(trim($_POST['reglogin']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['regpass']),FILTER_SANITIZE_STRING);
$pass = md5($pass."gfgsdfgdsfg123fd");
$mysql = new mysqli('localhost','root','root','english');
$result=$mysql->query("SELECT * FROM `logins` WHERE `login` = '$login'");
$user = $result->fetch_assoc();
if ($user == NULL)//2
{
$query = "INSERT INTO `logins` (`id`, `login`, `pass`)
  VALUES (NULL, '$login', '$pass' );";
  $mysql->query($query);
  $mysql->close();
  mkdir($login);
  setcookie('user',$login,time() + 3600*24,"/");
  $mysql = new mysqli('localhost','root','root','english');
$query = "CREATE TABLE $login (
id INT(111) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eng VARCHAR(111) NOT NULL,
png VARCHAR(111) NOT NULL,
day VARCHAR(111))";
$mysql->query($query);
$mysql->close();
  header('Location: /english.php');
}
else {
  $someerror="Такой пользователь уже существует";
Header("Location: /eng.php?get=$someerror");
}
?>
