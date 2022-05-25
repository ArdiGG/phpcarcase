<?php

namespace App\Helpers;

class Container
{
    public static array $data = [];

    public static function set(array $element)
    {
        self::$data = $element;
    }

    public static function get(string $key)
    {
        foreach (self::$data as $dKey => $value) {
            if($key === $dKey) {
                return $value;
            }
        }

        return null;
    }
}