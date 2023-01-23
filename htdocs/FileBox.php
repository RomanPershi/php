<?php

class FileBox extends AbstractBox
{
    private static $obj;

    private final function __construct()
    {
        $this->load();
    }

    public static function getConnect()
    {
        if (!isset(self::$obj)) {
            self::$obj = new FileBox();
        }
        return self::$obj;
    }

    public function save()
    {
        file_put_contents('data.json', json_encode($this->data));
    }

    public function load()
    {
        $result = json_decode(file_get_contents("data.json"), true);
        foreach (array_keys($result) as $part) {
            $this->data[$part] = $result[$part];
        }
    }
}