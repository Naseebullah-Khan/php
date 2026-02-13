<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);
$heading = "Note";
$currentUserID = 1;

$id = $_GET["id"];
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->findOrFail();

authorize(condition: $note["user_id"] === $currentUserID);


require "view/notes/show.view.php";
