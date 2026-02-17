<?php

$router->get(uri: "/", controller: "controllers/index.php");
$router->get(uri: "/about", controller: "controllers/about.php");
$router->get(uri: "/contact", controller: "controllers/contact.php");

$router->get(uri: "/notes", controller: "controllers/notes/index.php")->only(key: "auth");
$router->get(uri: "/note", controller: "controllers/notes/show.php")->only(key: "auth");
$router->delete(uri: "/note", controller: "controllers/notes/destroy.php")->only(key: "auth");

$router->get(uri: "/notes/create", controller: "controllers/notes/create.php")->only(key: "auth");
$router->post(uri: "/notes", controller: "controllers/notes/store.php")->only(key: "auth");

$router->get(uri: "/note/edit", controller: "controllers/notes/edit.php")->only(key: "auth");
$router->patch(uri: "/note", controller: "controllers/notes/update.php")->only(key: "auth");

$router->get(uri: "/register", controller: "controllers/registration/create.php")->only(key: "guest");
$router->post(uri: "/register", controller: "controllers/registration/store.php")->only(key: "guest");

$router->get(uri: "/login", controller: "controllers/session/create.php")->only(key: "guest");
$router->post(uri: "/session", controller: "controllers/session/store.php")->only(key: "guest");
$router->delete(uri: "/session", controller: "controllers/session/destroy.php")->only(key: "auth");
