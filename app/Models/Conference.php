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

    public function prepareData(array $data): array
    {
        $data['date'] = isset($data['time']) ? $data['date'] . ' ' . $data['time'] : $data['date'];
        $data['country'] = $data['country'] === 'default' ? null : $data['country'];

        return $data;
    }

    public function create(array $data)
    {
        $data = $this->prepareData($data);

        DB::query("INSERT INTO conferences(title, date, address, country) VALUES('{$data['title']}', '{$data['date']}', '{$data['address']}', '{$data['country']}');");
    }

    public function update(int $id, array $data)
    {
        $data = $this->prepareData($data);

        DB::query("UPDATE conferences 
                            SET title = '{$data['title']}', date = '{$data['date']}', address = '{$data['address']}', country =  '{$data['country']}'
                                WHERE id = '{$id}';");
    }

    public function delete(int $id)
    {
        DB::delete('conferences', $id);
    }
}