<?php

namespace App;

class ConfigHelper
{
    public static function params($key)
    {
        $config = include __DIR__ . '/../../configuration.php';
        return $config[$key];
    }
}