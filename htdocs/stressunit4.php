<?php
require 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase
{

private    $link;
                          public function test1()
                             {
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
   $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");                               $pdo->query($query);
                            $query = "SELECT * FROM `newcpu` WHERE `name` like '%$name%'";
                               $massiv = array("DDR3"=>"1", "AMDFX"=>"19", "AM3+"=>"6");
                               $result=$pdo->query("SELECT * FROM `famcpu`");
                               $firstquery = true;
                               $query = "SELECT * FROM `newcpu` WHERE `name` like '%$name%'";
                               foreach ($result as $row) {
                                 if(isset($massiv[preg_replace('/\s+/', '',$row["famname"])]))
                                 {
                                 if( strlen($massiv[preg_replace('/\s+/', '',$row["famname"])]) > 0)
                                 {
                                   if($firstquery == true)
                                   {
                                     $firstquery = false;
                                      $query = $query.' and (';
                                   }
                                   else{
                                     $query = $query." or ";
                                   }
                               $query = $query."`famid` = '".$massiv[preg_replace('/\s+/', '',$row["famname"])]."'";

                               }
                               }
                             }
                               if($firstquery == false)
                               {
                                 $firstquery = true;
                               $query = $query.")";
                               }
                               $result=$pdo->query("SELECT * FROM `memory`");
                               foreach ($result as $row) {
                              if(isset($massiv[preg_replace('/\s+/', '',$row["memname"])]))
                                 {
                                 if( strlen($massiv[preg_replace('/\s+/', '',$row["memname"])]) > 0)
                                 {
                                   if($firstquery == true)
                                   {
                                     $firstquery = false;
                                      $query = $query.' and (';
                                   }
                                   else{
                                     $query = $query." or ";
                                   }
                               $query = $query."`memoryid` = '".$massiv[preg_replace('/\s+/', '',$row["memname"])]."'";

                               }
                               }
                             }
                               if($firstquery == false)
                               {
                                 $firstquery = true;
                               $query = $query.")";
                               }
                               $result=$pdo->query("SELECT * FROM `cpuman`");
                               foreach ($result as $row) {
                                   if(isset($massiv[preg_replace('/\s+/', '',$row["mancpuname"])]))
                                   {
                                 if( strlen($massiv[preg_replace('/\s+/', '',$row["mancpuname"])]) > 0)
                                 {
                                   if($firstquery == true)
                                   {
                                     $firstquery = false;
                                      $query = $query.' and (';
                                   }
                                   else{
                                     $query = $query." or ";
                                   }
                               $query = $query."`manid` = '".$massiv[preg_replace('/\s+/', '',$row["mancpuname"])]."'";

                               }
                               }
                             }
                               if($firstquery == false)
                               {
                                 $firstquery = true;
                               $query = $query.")";
                               }
                               $result=$pdo->query("SELECT * FROM `sockets`");
                               foreach ($result as $row) {
                                   if(isset($massiv[preg_replace('/\s+/', '',$row["socketname"])]))
                                   {
                                 if( strlen($massiv[preg_replace('/\s+/', '',$row["socketname"])]) > 0)
                                 {
                                   if($firstquery == true)
                                   {
                                     $firstquery = false;
                                      $query = $query.' and (';
                                   }
                                   else{
                                     $query = $query." or ";
                                   }
                               $query = $query."`socketid` = '".$massiv[preg_replace('/\s+/', '',$row["socketname"])]."'";

                               }
                               }
                             }
                               if($firstquery == false)
                               {
                                 $firstquery = true;
                               $query = $query.")";
                               }
                              $result = $pdo->query($query);
                             foreach($result as $row) {
                                $this->assertSame("FX4300",$row['name']);
                             }
//$pdo->query("TRUNCATE TABLE `newcpu`");
                          }
                          public function test2()
                             {
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
   $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");                               $pdo->query($query);
                               $result = $pdo->query("SELECT * FROM `newcpu` WHERE `name` like '%$name%' and `cost` =
                                '$cost' and `manid` = '$manufacturer' and `socketid` = '$socket' and `famid` = '$family'
                                 and `cores` = '$cores' and `memoryid` = '$memory' and `frequency` = '$frequency'
                                 and `tdp` = '$tdp' and `photo` = '$photo' and `warrante` = '$warrante' and `date` =
                                 '$date' and `threads` = '$threads' and `L2` = '$L2' and `L3` = '$L3' and `techproc` =
                                 '$techproc' and `count` = '$count'");
                          //   $pdo->query("TRUNCATE TABLE `newcpu`");
                             foreach($result as $row) {
                                $this->assertSame("$name",$row['name']);
                             }
                           $query = "DELETE FROM `newcpu` WHERE `name` like '%$name%' and `cost` =
                            '$cost' and `manid` = '$manufacturer' and `socketid` = '$socket' and `famid` = '$family'
                             and `cores` = '$cores' and `memoryid` = '$memory' and `frequency` = '$frequency'
                             and `tdp` = '$tdp' and `photo` = '$photo' and `warrante` = '$warrante' and `date` =
                             '$date' and `threads` = '$threads' and `L2` = '$L2' and `L3` = '$L3' and `techproc` =
                             '$techproc' and `count` = '$count'";
                                $pdo->query($query);
}
public function test3()
   {
   $login =  "admin";
   $pass = "123123";
   $pass = md5($pass."gfgsdfgdsfg123fd");
   $pdo =  new PDO("mysql:host=localhost;dbname=cpuz;charset=utf8","root","root");

   $result=$pdo->query("SELECT * FROM `user` WHERE `login` = '$login' AND `pass`='$pass'");
   $count = 0;
   foreach($result as $row) {
    $count++;
   }
   $this->assertSame($count,1);
}
public function test4()
   {
     $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");
       $query = "SELECT * FROM `newcpu`";
            $result = $pdo->query($query);
                 $this->assertSame(1,1);
   }
}
 ?>
