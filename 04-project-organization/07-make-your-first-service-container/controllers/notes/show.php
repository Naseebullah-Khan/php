<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(key: Database::class);
$currentUserID = 1;


$id = $_GET["id"];
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->findOrFail();

authorize(condition: $note["user_id"] === $currentUserID, status: Response::FORBIDDEN);

view(
    path: "notes/show.view.php",
    attributes: [
        "heading" => "Note",
        "note" => $note,
    ]
);
