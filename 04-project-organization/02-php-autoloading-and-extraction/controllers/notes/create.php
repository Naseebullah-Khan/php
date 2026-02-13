<?php

require base_path(path: "Core/Validator.php");

$config = require base_path(path: "config.php");
$db = new Database(config: $config["database"]);


$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!Validator::string(value: $_POST["body"], min: 1, max: 1000)) {
        $errors["body"] = "A body of no more than 1000 characters is required.";
    }

    if (empty($errors)) {
        $db->query(query: "INSERT INTO notes (body, user_id) VALUES (?,?)", params: [$_POST["body"], 1]);
    }
}


view(
    path: "notes/create.view.php",
    attributes: [
        "heading" => "Create Note",
        "errors" => $errors,
    ]
);
