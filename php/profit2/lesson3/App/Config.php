<?php

namespace App;

class Config
{

    public $data = [];
    protected static $state = null;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function getConfig()
    {
        if (!isset(self::$state)) {
            self::$state = new self();
        }
        return self::$state;
    }
}
