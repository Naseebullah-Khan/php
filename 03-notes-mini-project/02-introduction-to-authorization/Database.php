<?php
class Database
{
    public $connection;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query(data: $config, numeric_prefix: "", arg_separator: ";");

        $this->connection = new PDO(dsn: $dsn, options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = []): bool|PDOStatement
    {

        $statement = $this->connection->prepare(query: $query);

        $statement->execute(params: $params);

        return $statement;
    }
}