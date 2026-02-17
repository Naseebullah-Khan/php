<?php

$router->get(uri: "/", controller: "controllers/index.php");
$router->get(uri: "/about", controller: "controllers/about.php");
$router->get(uri: "/contact", controller: "controllers/contact.php");

$router->get(uri: "/notes", controller: "controllers/notes/index.php")->only(key: "auth");
$router->get(uri: "/note", controller: "controllers/notes/show.php");
$router->delete(uri: "/note", controller: "controllers/notes/destroy.php");

$router->get(uri: "/notes/create", controller: "controllers/notes/create.php");
$router->post(uri: "/notes", controller: "controllers/notes/store.php");

$router->get(uri: "/note/edit", controller: "controllers/notes/edit.php");
$router->patch(uri: "/note", controller: "controllers/notes/update.php");

$router->get(uri: "/register", controller: "controllers/registration/create.php")->only(key: "guest");
$router->post(uri: "/register", controller: "controllers/registration/store.php");
