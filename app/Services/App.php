<?php

namespace App\Services;

use R;

class App
{
    public static function start()
    {
        self::db();
    }


    public static function db()
    {
        $config = require_once 'config/db.php';

        DB::setup("mysql:host={$config['host']};dbname={$config['db']}",
            $config['username'], $config['password']);
     }
}