<?php

namespace App\Models;

use App\Helpers\Validator;
use App\Services\DB;

class Conference extends Model
{
    public function all()
    {
        $conferences = DB::findAll('conferences');

        return $conferences;
    }

    public function find(int $id)
    {
        $conference = DB::findOne('conferences', "id = {$id}");

        return $conference;
    }

    public function create(array $data)
    {
        $title = $data['title'];
        $date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
        $address = substr($data['address'], 1, strlen($data['address']) - 2);
        $country = $data['country'];

        return DB::query("INSERT INTO conferences(title, date, address, country) VALUES('{$title}', '{$date}', '{$address}', '{$country}');");
    }

    public function update(int $id, array $data)
    {
        $title = $data['title'];
        $date = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
        $address = substr($data['address'], 1, strlen($data['address']) - 2);
        $country = $data['country'];

        DB::query("UPDATE conferences 
                            SET title = '{$title}', date = '{$date}', address = '{$address}', country =  '{$country}'
                                WHERE id = '{$id}';");
    }

    public function delete(int $id)
    {
        DB::delete('conferences', $id);
    }
}