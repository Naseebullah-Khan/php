<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(key: Database::class);

$currentUserID = 1;

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
header(header: "location: /notes");
exit();
