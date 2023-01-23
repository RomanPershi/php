<?php
require 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase
{

private    $link;

                          public function test2()
                             {
                               ini_set('memory_limit', '-1');
                               $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");
                               $socket = 6;
                               $manufacturer = 1;
                               $family = 19;
                               $memory= 1;
                               $name = "FX4300";
                               $cores = 4;
                               $frequency = "3.5";
                               $tdp = 125;
                               $threads = 4;
                               $cost = 5000;
                               $warrante = 12;
                               $date =  2013;
                               $L2 = 4;
                               $L3 =  8;
                               $techproc =  32;
                               $count =  5;
                               $photo =  "fx4300.jpg";
                               $query = "INSERT INTO `newcpu` (`id`, `cost`, `manid`, `socketid`, `famid`, `cores`,
                                `memoryid`, `frequency`, `tdp`, `photo`, `name`,
                                 `warrante`, `date`, `threads`,
                                `L2`, `L3`, `techproc`, `count`)
                                 VALUES (NULL, '$cost', '$manufacturer', '$socket', '$family', '$cores',
                                  '$memory', '$frequency', '$tdp', '$photo', '$name', '$warrante','$date',
                                   '$threads', '$L2', '$L3', '$techproc', '$count');";
                               $pdo->query($query);

                                 echo $query;
                          //   $pdo->query("TRUNCATE TABLE `newcpu`");


}
}
 ?>
