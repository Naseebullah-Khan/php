<?php

use Core\Authenticator;
use Core\Session;
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

Session::flash(key: "errors", value: $form->errors());

redirect(path: "/login");
