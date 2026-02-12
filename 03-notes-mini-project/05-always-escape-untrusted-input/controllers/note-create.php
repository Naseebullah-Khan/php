<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);

$heading = "Create Note";

$post = $_POST;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db->query("INSERT INTO notes (body, user_id) VALUES (?,?)", params: [$post["body"], 1]);
}

require "view/note-create.view.php";
