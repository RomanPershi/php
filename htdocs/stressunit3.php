<?php
require 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase
{

private    $link;

public function test4()
   {
     ini_set('memory_limit', '-1');
     $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");
       $query = "SELECT * FROM `newcpu`";
            $result = $pdo->query($query);
                 echo $query;
   }
}
 ?>
