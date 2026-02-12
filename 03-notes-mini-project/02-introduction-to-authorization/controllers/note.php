<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);
$heading = "Note";
$currentUserID = 1;

$id = $_GET["id"];
// $query = "SELECT * FROM notes WHERE user_id = ? AND id = ?"; // it is not recommended because there is no difference between not found and unauthorized but it is just for demonstration purposes. In real world applications, you should return 404 if the note is not found and 403 if the user is unauthorized to access the note.
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->fetch();

if (!$note) {
    abort();
}

if ($note["user_id"] !== $currentUserID) {
    abort(code: Response::FORBIDDEN);
}


require "view/note.view.php";
