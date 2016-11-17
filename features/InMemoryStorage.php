<?php

class InMemoryStorage
{
    private $data = [];

    public function save($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getKeys()
    {
        return array_keys($this->data);
    }

    public function getFromKey($key)
    {
        return $this->data[$key];
    }
}
