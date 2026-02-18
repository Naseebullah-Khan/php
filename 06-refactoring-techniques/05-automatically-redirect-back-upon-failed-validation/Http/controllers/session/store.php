<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST["email"];
$password = $_POST["password"];

$form = LoginForm::validate(attributes: $attributes = ["email" => $email, "password" => $password]);

$singIn = (new Authenticator)->attempt(email: $attributes["email"], password: $attributes["password"]);

if (!$singIn) {
    $form->error(key: "email", value: "No matching account found for that email address and password.")->throw();
}

redirect(path: "/");
