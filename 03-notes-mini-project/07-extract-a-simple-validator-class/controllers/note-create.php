<?php

require "Validator.php";

$config = require "config.php";
$db = new Database(config: $config["database"]);

$heading = "Create Note";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (!Validator::string(value: $_POST["body"], min: 1, max: 1000)) {
        $errors["body"] = "A body of no more than 1000 characters is required.";
    }

    if (empty($errors)) {
        $db->query(query: "INSERT INTO notes (body, user_id) VALUES (?,?)", params: [$_POST["body"], 1]);
    }

}

require "view/note-create.view.php";
