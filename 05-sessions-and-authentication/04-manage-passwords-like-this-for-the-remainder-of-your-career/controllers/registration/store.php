<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST["email"];
$password = $_POST["password"];

// validate email and password
$errors = [];
if (!Validator::email(value: $email)) {
    $errors["email"] = "Please enter a valid email address.";
}

if (!Validator::string(value: $password, min: 8, max: 255)) {
    $errors["password"] = "Please provide a password of at least eight characters.";
}

if (!empty($errors)) {
    view(path: "registration/create.view.php", attributes: [
        "errors" => $errors,
    ]);
}

// check if email already exists in the database
$db = App::resolve(key: Database::class);
$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();

if ($user) {
    // if email already exists, redirect back to login page
    header(header: "Location: /");
    die();
} else {
    // if email does not exist, create a new user in the database, log the user in, and redirect
    $db->query("INSERT INTO users (email, password) VALUES (?, ?)", [$email, password_hash(password: $password, algo: PASSWORD_BCRYPT)]);
    $_SESSION["user"] = [
        "email" => $email,
    ];
    header(header: "Location: /");
    die();
}
