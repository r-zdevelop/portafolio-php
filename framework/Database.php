<?php

class Database
{
    private $connection;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=portafolio;charset=utf8mb4';
        $this->connection = new PDO($dsn, 'admin', 'admin');
    }

    public function query($sql, $params = [])
    {
        $this->stmt = $this->connection->prepare($sql);
        $this->stmt->execute($params);
        return $this;
    }

    public function get()
    {
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result) {
            exit('404 Not Found');
        }
        return $result;
    }

    public function firstOrFail()
    {
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
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