<?php

namespace App\Helpers;

class Container
{
    public static $data = [];

    public static function set(array $element)
    {
        $key = key($element);

        self::$data[$key] = $element[$key];
    }

    public static function get(string $key)
    {
        $elements = self::$data[$key];

        return $elements;
    }
}