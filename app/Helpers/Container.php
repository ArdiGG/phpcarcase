<?php

namespace App\Helpers;

class Container
{
    public static array $data = [];

    public static function set(array $element)
    {
        self::$data[$element[0]] = $element[1];
    }

    public static function get(string $key)
    {
        $elements = self::$data[$key];

        return $elements;
    }
}