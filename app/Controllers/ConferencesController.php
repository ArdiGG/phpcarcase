<?php

namespace App\Controllers;

use App\Helpers\Container;
use App\Models\Conference;
use App\Requests\ConferenceRequest;
use App\Services\View;

class ConferencesController
{
    public function index(Conference $conference)
    {
        $conferences = $conference->all();
        Container::set(['conferences' => $conferences]);

        View::part('pages/conferences/index');
    }

    public function show(Conference $conference, int $id)
    {
        $conference = $conference->find($id);
        Container::set(['conference' => $conference]);

        View::part('pages/conferences/show');
    }

    public function create()
    {
        View::part('pages/conferences/create');
    }

    public function store(Conference $conference, array $data)
    {
        $data = ConferenceRequest::validate($data);

        if (!is_null($data)) {
            $conference->create($data);
        }

        header('Location: /conferences');
    }
}