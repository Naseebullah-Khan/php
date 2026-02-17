<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(key: Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
if (!Validator::email(value: $email)) {
    $errors["email"] = "Please enter a valid email address.";
}

if (!Validator::string(value: $password)) {
    $errors["password"] = "Please provide a valid password.";
}

if (!empty($errors)) {
    view(path: "session/create.view.php", attributes: [
        "errors" => $errors,
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();

if ($user) {
    if (password_verify(password: $password, hash: $user["password"])) {
        login(user: $user);
        header(header: "location: /");
        die();
    }
}

view(path: "session/create.view.php", attributes: [
    "errors" => [
        "email" => "No matching account found for that email address and password."
    ],
]);
