<?php

$heading = "Create Note";

$post = $_POST;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    dd(value: $post);
}

require "view/note-create.view.php";
