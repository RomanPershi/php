<?php
require 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase
{

private    $link;

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
