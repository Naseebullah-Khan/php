<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);

$heading = "Create Note";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (strlen(string: $_POST["body"]) === 0) {
        $errors["body"] = "A body is required.";
    }

    if (strlen(string: $_POST["body"]) > 1000) {
        $errors["body"] = "A body cannot be longer than 1000 characters.";
    }

    if (empty($errors)) {
        $db->query(query: "INSERT INTO notes (body, user_id) VALUES (?,?)", params: [$_POST["body"], 1]);
    }

}

require "view/note-create.view.php";
