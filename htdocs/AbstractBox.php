<?php

class AbstractBox
{
    public $data;

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getData($key)
    {
        return $this->data[$key];
    }
}