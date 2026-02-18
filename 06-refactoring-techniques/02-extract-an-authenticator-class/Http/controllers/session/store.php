<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate(email: $email, password: $password)) {
    if ((new Authenticator)->attempt(email: $email, password: $password)) {
        redirect(path: "/");
    }

    $form->error(key: "email", value: "No matching account found for that email address and password.");
}

return view(
    path: "session/create.view.php",
    attributes: [
        "errors" => $form->errors(),
    ]
);
