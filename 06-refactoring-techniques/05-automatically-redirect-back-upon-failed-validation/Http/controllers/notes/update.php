<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Core\Response;

$db = App::resolve(key: Database::class);
$currentUserID = 1;

$id = $_POST["id"];
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->findOrFail();

authorize(condition: $note["user_id"] === $currentUserID, status: Response::FORBIDDEN);


$errors = [];

if (!Validator::string(value: $_POST["body"], min: 1, max: 1000)) {
    $errors["body"] = "A body of no more than 1000 characters is required.";
}

if (!empty($errors)) {
    return view(
        path: "notes/edit.view.php",
        attributes: [
            "heading" => "Edit Note",
            "errors" => $errors,
            "note" => $note,
        ]
    );
}

if (empty($errors)) {
    $db->query(query: "UPDATE notes SET body = ? WHERE id = ?", params: [trim(string: $_POST["body"]), $id]);
    header(header: "location: /notes");
    die();
}
