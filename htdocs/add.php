<?php
$socket;//15
$manufacturer;
$family;
$memory;
$mysql = new mysqli('localhost','root','root','cpuz');
$result=$mysql->query("SELECT * FROM `memory`");
foreach ($result as $row) {
  if( strlen($_POST[preg_replace('/\s+/', '',$row["memname"])]) > 0)
  {
    $memory = $_POST[preg_replace('/\s+/', '',$row["memname"])];
  }
}
$result=$mysql->query("SELECT * FROM `famcpu`");
foreach ($result as $row) {
  if( strlen($_POST[preg_replace('/\s+/', '',$row["famname"])]) > 0)
  {
    $family = $_POST[preg_replace('/\s+/', '',$row["famname"])];
  }
}
$result=$mysql->query("SELECT * FROM `cpuman`");
foreach ($result as $row) {
  if( strlen($_POST[preg_replace('/\s+/', '',$row["mancpuname"])]) > 0)
  {
$manufacturer = $_POST[preg_replace('/\s+/', '',$row["mancpuname"])];
  }
}
$result=$mysql->query("SELECT * FROM `sockets`");
foreach ($result as $row) {
  if( strlen($_POST[preg_replace('/\s+/', '',$row["socketname"])]) > 0)
{
  $socket = $_POST[preg_replace('/\s+/', '',$row["socketname"])];
}
}
$name = $_POST['name'];
$cores = $_POST['cores'];
$frequency = $_POST['frequency'];
$tdp = $_POST['tdp'];
$threads = $_POST['threads'];
$cost = $_POST['cost'];
$warrante = $_POST['warrante'];
$date =  $_POST['date'];
$L2 =  $_POST['L2'];
$L3 =  $_POST['L3'];
$techproc =  $_POST['techproc'];
$count =  $_POST['count'];
$photo =  preg_replace('/\s+/', '',$_POST['photo']);
$query = "INSERT INTO `newcpu` (`id`, `cost`, `manid`, `socketid`, `famid`, `cores`,
 `memoryid`, `frequency`, `tdp`, `photo`, `name`,
  `warrante`, `date`, `threads`,
 `L2`, `L3`, `techproc`, `count`)
  VALUES (NULL, '$cost', '$manufacturer', '$socket', '$family', '$cores',
   '$memory', '$frequency', '$tdp', '$photo', '$name', '$warrante','$date',
    '$threads', '$L2', '$L3', '$techproc', '$count');";
$mysql->query($query);
$mysql->close();
header('Location: /insert.php');
?>
