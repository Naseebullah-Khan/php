<?php

use Core\Database;

$config = require base_path(path: "config.php");
$db = new Database(config: $config["database"]);

$notes = $db->query(query: "SELECT * FROM notes WHERE user_id = 1")->get();

view(
    path: "notes/index.view.php",
    attributes: [
        "heading" => "My Notes",
        "notes" => $notes,
    ]
);
