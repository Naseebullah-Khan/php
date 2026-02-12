<?php

$config = require "config.php";
$db = new Database(config: $config["database"]);

$notes = $db->query(query: "SELECT * FROM notes WHERE user_id = 1")->get();

$heading = "My Notes";

require "view/notes.view.php";
