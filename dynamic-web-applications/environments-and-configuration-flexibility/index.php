<?php

require "functions.php";

require "Database.php";

$config = require "config.php";

$db = new Database(config: $config["database"]);
$posts = $db->query(query: "SELECT * fROM posts")->fetchAll(mode: PDO::FETCH_ASSOC);


foreach ($posts as $post) {
    echo "<li>{$post["title"]}</li>";
}