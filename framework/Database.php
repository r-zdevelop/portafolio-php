<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=portafolio;charset=utf8mb4';
        $this->connection = new PDO($dsn, 'admin', 'admin');
    }

    public function query($sql)
    {
        return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}