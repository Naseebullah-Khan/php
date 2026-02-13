<?php

$config = require base_path(path: "config.php");
$db = new Database(config: $config["database"]);
$currentUserID = 1;

$id = $_GET["id"];
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->findOrFail();

authorize(condition: $note["user_id"] === $currentUserID);

view(
    path: "notes/show.view.php",
    attributes: [
        "heading" => "Note",
        "note" => $note,
    ]
);
