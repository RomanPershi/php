<?php
require 'vendor/autoload.php';

class UserTest extends \PHPUnit\Framework\TestCase
{

private    $link;
                          public function test1()
                             {
                               ini_set('memory_limit', '-1');
                                $query = "SELECT * FROM `newcpu` WHERE `name` like '%FX4300%' and (`famid` = '19') and (`memoryid` = '1') and (`socketid` = '6')";
                               $pdo =  new PDO("mysql:host=localhost;dbname=somebase;charset=utf8","root","root");
                               $pdo->query($query);
                               echo $query;

                          }

}
 ?>
