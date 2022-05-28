<?php

namespace App\Models;

use App\Helpers\Validator;

class Conference extends Model
{
    public function all()
    {
        $conferences = \R::findAll('conferences');

        return $conferences;
    }

    public function find(int $id)
    {
        $conference = \R::findOne('conferences', "id = {$id}");

        return $conference;
    }

    public function create(array $data)
    {
            $conference = \R::dispense('conferences');

            $conference->title = $data['title'];
            $conference->date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
            $conference->address = $data['address'];
            $conference->country = $data['country'];

            return \R::store($conference);
    }

    public function update(int $id, array $data)
    {
        $conference = \R::load('conferences', $id);

        $conference->title = $data['title'];
        $conference->date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
        $conference->address = $data['address'];
        $conference->country = $data['country'];

        return \R::store($conference);
    }

    public function delete(int $id)
    {
        \R::trash('conferences', $id);
    }
}