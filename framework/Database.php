<?php

namespace Framework;

use PDO;

class Database
{
    private $connection;
    private $stmt;

    public function __construct()
    {
        // $dsn = 'mysql:host=127.0.0.1;dbname=portafolio;charset=utf8mb4';
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            config('host'),
            config('dbname'),
            config('charset')
        );
        $this->connection = new PDO($dsn, config('user'), config('password'), config('options', []));
    }

    public function query($sql, $params = [])
    {
        $this->stmt = $this->connection->prepare($sql);
        $this->stmt->execute($params);
        return $this;
    }

    public function get()
    {
        $result = $this->stmt->fetchAll();
        if (!$result) {
            exit('404 Not Found');
        }
        return $result;
    }

    public function first()
    {
        return $this->stmt->fetch();
    }

    public function firstOrFail()
    {
        $result = $this->first();
        if (!$result) {
            exit('404 Not Found');
        }
        return $result;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}