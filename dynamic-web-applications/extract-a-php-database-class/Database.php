<?php
class Database
{
    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=create-a-mysql-database;user=root;password=root;charset=utf8mb4";

        $this->connection = new PDO(dsn: $dsn);

    }
    public function query($query): bool|PDOStatement
    {

        $statement = $this->connection->prepare(query: $query);

        $statement->execute();

        return $statement;
    }
}