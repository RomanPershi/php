<?php
function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

  $mysql = new mysqli('localhost','root','root','somebase');
  while ($a <= 1000000) {
    ini_set('memory_limit', '-1');
    $a++;
    $socket = random_int(1, 9);
    $manufacturer = random_int(1, 2);
    $family = random_int(1, 20);
    $memory= random_int(1, 4);
    $name = getRandomWord();
    $cores = random_int(1, 8);
    $frequency = getRandomWord();
    $tdp = random_int(1, 125);
    $threads = random_int(1, 16);
    $cost = random_int(1000, 100000);
    $warrante = random_int(1, 12);
    $date =  random_int(2010, 2022);
    $L2 = random_int(1, 4);
    $L3 =  random_int(1, 8);
    $techproc =  random_int(32, 64);
    $count =  random_int(1, 100);
    $photo =  getRandomWord();
  $query = "INSERT INTO `newcpu` (`id`, `cost`, `manid`, `socketid`, `famid`, `cores`,
   `memoryid`, `frequency`, `tdp`, `photo`, `name`,
    `warrante`, `date`, `threads`,
   `L2`, `L3`, `techproc`, `count`)
    VALUES (NULL, '$cost', '$manufacturer', '$socket', '$family', '$cores',
     '$memory', '$frequency', '$tdp', '$photo', '$name', '$warrante','$date',
      '$threads', '$L2', '$L3', '$techproc', '$count');";
      $mysql->query($query);

  }
    $mysql->close();
 ?>
