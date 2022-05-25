<?php

namespace App\Models;

use App\Helpers\Validator;

class Conference
{
    public function all()
    {
        $conferences = \R::findAll('conferences');

        return $conferences;
    }

    public function create(array $data)
    {
        $title = Validator::clean($data['title']);
        $date = Validator::clean($data['date']);
        $time = Validator::clean($data['time']);
        $address = Validator::clean($data['address']);

        if (!empty($title) && !empty($date) && !empty($address) && Validator::check_length($title, 2, 50) && Validator::check_length($address, 2, 100)) {

            $conference = \R::dispense('conferences');

            $conference->title = $title;
            $conference->date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
            $conference->address = $address;

            return \R::store($conference);
        }
    }
}