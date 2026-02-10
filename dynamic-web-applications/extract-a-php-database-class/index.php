<?php

require "functions.php";

require "Database.php";


$db = new Database();
// $posts = $db->query("SELECT * fROM posts")->fetchAll(mode: PDO::FETCH_ASSOC);
$post = $db->query(query: "SELECT * fROM posts where id = 2")->fetch(mode: PDO::FETCH_ASSOC);

dd(value: $post);

// foreach ($posts as $post) {
//     echo "<li>{$post["title"]}</li>";
// }