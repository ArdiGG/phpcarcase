<?php

namespace App\Services;

use PDO;

class DB
{
    private static PDO $pdo;

    public static function setup(string $dsn, string $user, string $password)
    {
        self::$pdo = new PDO($dsn, $user, $password);
    }

    public function findAll(string $table)
    {
        $query = "SELECT * FROM {$table};";

        $statement = self::$pdo->prepare($query);
        $statement->execute();

        $rows = $statement->fetchAll();

        return $rows;
    }

    public function findOne(string $table, string $only)
    {
        $query = "SELECT * FROM {$table} WHERE {$only};";

        $statement = self::$pdo->prepare($query);
        $statement->execute();

        $rows = $statement->fetch();

        return $rows;
    }

    public static function query(string $query)
    {
        $statement = self::$pdo->prepare($query);
        $res = $statement->execute();
    }

    public static function delete(string $table, int $id)
    {
        $query = "DELETE FROM {$table} WHERE id = '{$id}'";

        $statement = self::$pdo->prepare($query);
        $res = $statement->execute();

        return $res;
    }
}