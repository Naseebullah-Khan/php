<?php

require "functions.php";

require "Database.php";

$config = require "config.php";

$db = new Database(config: $config["database"]);

$id = $_GET["id"];

// There are two ways to prevent SQL injection vulnerabilities:

// // First
// $query = "SELECT * FROM posts WHERE id = ?";
// $post = $db->query(query: $query, params: [$id])->fetch();

// Second
$query = "SELECT * FROM posts WHERE id = :id";
$post = $db->query(query: $query, params: [":id" => $id])->fetch();

dd(value: $post);