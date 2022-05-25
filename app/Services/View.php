<?php

namespace App\Services;

class View
{
    public static function part(string $part_name)
    {
        require_once 'views/' . $part_name . '.php';
    }
}