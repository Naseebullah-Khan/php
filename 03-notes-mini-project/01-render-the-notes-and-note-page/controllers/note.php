<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);

$id = $_GET["id"];
$query = "SELECT * FROM notes WHERE id = ?";
$note = $db->query(query: $query, params: [$id])->fetch();
$heading = "Note";


require "view/note.view.php";
