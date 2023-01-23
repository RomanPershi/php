<?php

$date = date('Y-m-d H:i:s');
$mysql = new mysqli('localhost','root','root','words');
$timestamp = strtotime($date);
$table = $_COOKIE['user'];
$word = $_POST["someField"];
$trans = $_POST['trans'];
$query = "INSERT INTO `$table` (`id`, `eng`,`trans`, `day`)
  VALUES (NULL, '$word','$trans', '$timestamp');";
	$mysql->query($query);
  $mysql->close();
	if ( 0 < $_FILES['file']['error'] ) {

	}
	else {
			move_uploaded_file($_FILES['file']['tmp_name'],preg_replace('/\s+/', '',$_COOKIE['user']."/".$_POST["someField"].".png"));
	}
?>
