<?php

namespace App\Controllers;

use App\Services\View;

class ErrorController extends Controller
{
    public function index()
    {
        self::not_found_page();
    }

    public static function not_found_page()
    {
        View::part('errors/404');
    }
}