<?php

namespace App\Controllers;

use App\Helpers\Container;
use App\Models\Conference;
use App\Services\View;

class ConferencesController
{
    public function index()
    {
        echo "TEST@INDEX<br>";
        echo "Дефолтный метод TestController";
    }

    public function view(Conference $conference)
    {
        $conferences = $conference->all();
        Container::set(['conferences' => $conferences]);

        View::part('pages/test/view');
    }

    public function create(array $data, Conference $conference)
    {
        $conference->create($data);

        header('Location: /test/view');
    }
}