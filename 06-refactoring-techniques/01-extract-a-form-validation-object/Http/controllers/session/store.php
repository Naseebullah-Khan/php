<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(key: Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

$isFormValidated = $form->validate(email: $email, password: $password);

if (!$isFormValidated) {
    return view(
        path: "session/create.view.php",
        attributes: [
            "errors" => $form->errors(),
        ]
    );
}

$user = $db->query("SELECT * FROM users WHERE email = ?", [$email])->find();

if ($user) {
    if (password_verify(password: $password, hash: $user["password"])) {
        login(user: $user);
        header(header: "location: /");
        die();
    }
}

return view(path: "session/create.view.php", attributes: [
    "errors" => [
        "email" => "No matching account found for that email address and password."
    ],
]);
