<?php

use Core\Database;
use Core\Response;

$config = require base_path(path: "config.php");
$db = new Database(config: $config["database"]);
$currentUserID = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // First find the note
    $id = $_POST["id"];
    $query = "SELECT * FROM notes WHERE id = ?";
    $note = $db->query(query: $query, params: [$id])->findOrFail();

    // Second Check the authorization
    authorize(condition: $note["user_id"] === $currentUserID, status: Response::FORBIDDEN);

    // Third delete the note from database
    $query = "DELETE FROM notes WHERE id = ?";
    $note = $db->query(query: $query, params: [$id]);

    // Lastly redirect to notes page
    header("location: /notes");
    exit();
} else {
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
}
