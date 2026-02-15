<?php

use Core\Validator;
use Core\Database;

$config = require base_path(path: "config.php");
$db = new Database(config: $config["database"]);


$errors = [];

if (!Validator::string(value: $_POST["body"], min: 1, max: 1000)) {
    $errors["body"] = "A body of no more than 1000 characters is required.";
}

if (!empty($errors)) {
    return view(
        path: "notes/create.view.php",
        attributes: [
            "heading" => "Create Note",
            "errors" => $errors,
        ]
    );
}

if (empty($errors)) {
    $db->query(query: "INSERT INTO notes (body, user_id) VALUES (?,?)", params: [trim($_POST["body"]), 1]);
    header("location: /notes");
    die();
}


view(
    path: "notes/create.view.php",
    attributes: [
        "heading" => "Create Note",
        "errors" => $errors,
    ]
);
