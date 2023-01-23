<?php

$date = date('Y-m-d H:i:s');
$mysql = new mysqli('localhost','root','root','words');
$timestamp = strtotime($date);
$table = $_COOKIE['user'];
$repeat = $_POST['repeat'];
$result=$mysql->query("SELECT * FROM `$table` WHERE `day` < '$timestamp' and `id` != '$repeat' ORDER BY RAND() LIMIT 1");
$user = $result->fetch_assoc();
if (file_exists($table.'/'.$user['eng'].'.jpg')){
  $user['type'] = '.jpg';
}
else{
  $user['type'] = '.png';
}
if ($user == NULL)//2
{
echo json_encode($user);
}
else {
echo json_encode($user);
}
?>
