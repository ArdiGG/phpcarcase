<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        echo "Главная страница<br>";
        echo "<a href='/test/view'>Перейти в тестированию</a>";
    }
}