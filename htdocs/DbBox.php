<?php

class DbBox extends AbstractBox
{
    private static $obj;
    private static $mysql;

    private final function __construct()
    {
        self::$mysql = new mysqli('localhost', 'root', 'root', 'tz');
    }

    public static function getConnect()
    {
        if (!isset(self::$obj)) {
            self::$obj = new DbBox();
        }
        return self::$obj;
    }

    public function save()
    {
        $query = "INSERT INTO `tz` (`arrkey`,`value`) VALUES ";
        $buf = true;
        $delete_query = "DELETE FROM `tz` WHERE ";
        foreach (array_keys($this->data) as $part) {
            $var = $this->data[$part];
            if (!$buf) {
                $query = $query . ',';
                $delete_query = $delete_query." or `arrkey` = '$part'";
            } else {
                $delete_query = $delete_query."`arrkey` = '$part' ";
                $buf = false;
            }
            $query = $query . "('$part','$var')";
        }
        $query = $query . ';';
        echo $delete_query;
        self::$mysql->query($delete_query);
        self::$mysql->query($query);
    }

    public function load()
    {
        $result = self::$mysql->query("SELECT * FROM `tz`");
       foreach ($result as $part)
       {
           $this->data[$part['arrkey']] = $part['value'];
       }
    }
}