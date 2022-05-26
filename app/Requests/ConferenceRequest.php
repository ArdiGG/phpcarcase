<?php

namespace App\Requests;

use App\Helpers\Validator;

class ConferenceRequest
{
    public static function validate(array $data)
    {
        $data['title'] = Validator::clean($data['title']);
        $data['date'] = Validator::clean($data['date']);
        $data['time']= Validator::clean($data['time']);
        $data['address'] = Validator::clean($data['address']);

        if (!empty($title) && !empty($date) && !empty($address) && Validator::check_length($title, 2, 50) && Validator::check_length($address, 2, 100)) {
            return $data;
        }

        return null;
    }
}