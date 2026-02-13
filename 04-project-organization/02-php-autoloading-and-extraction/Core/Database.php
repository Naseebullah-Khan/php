<?php
class Database
{
    public $connection;
    public $statement;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query(data: $config, numeric_prefix: "", arg_separator: ";");

        $this->connection = new PDO(dsn: $dsn, options: [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function get(): mixed
    {
        return $this->statement->fetchAll();
    }

    public function query($query, $params = []): static
    {

        $this->statement = $this->connection->prepare(query: $query);

        $this->statement->execute(params: $params);

        return $this;
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): mixed
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
}