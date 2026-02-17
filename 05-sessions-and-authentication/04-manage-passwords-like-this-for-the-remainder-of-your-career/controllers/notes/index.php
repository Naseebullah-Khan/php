<?php

use Core\App;
use Core\Database;

$db = App::resolve(key: Database::class);

$notes = $db->query(query: "SELECT * FROM notes WHERE user_id = 1")->get();

view(
    path: "notes/index.view.php",
    attributes: [
        "heading" => "My Notes",
        "notes" => $notes,
    ]
);
