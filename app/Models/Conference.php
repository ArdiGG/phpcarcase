<?php

namespace App\Models;

class Conference
{
    public function all()
    {
        $conferences = \R::findAll('conferences');

        return $conferences;
    }

    public function create(array $data)
    {
        $conference = \R::dispense('conferences');

        $conference->title = $data['title'];
        $conference->date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
        $conference->address = $data['address'];

        return \R::store($conference);
    }
}