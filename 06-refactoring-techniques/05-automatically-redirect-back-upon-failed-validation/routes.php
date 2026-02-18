<?php

$router->get(uri: "/", controller: "index.php");
$router->get(uri: "/about", controller: "about.php");
$router->get(uri: "/contact", controller: "contact.php");

$router->get(uri: "/notes", controller: "notes/index.php")->only(key: "auth");
$router->get(uri: "/note", controller: "notes/show.php")->only(key: "auth");
$router->delete(uri: "/note", controller: "notes/destroy.php")->only(key: "auth");

$router->get(uri: "/notes/create", controller: "notes/create.php")->only(key: "auth");
$router->post(uri: "/notes", controller: "notes/store.php")->only(key: "auth");

$router->get(uri: "/note/edit", controller: "notes/edit.php")->only(key: "auth");
$router->patch(uri: "/note", controller: "notes/update.php")->only(key: "auth");

$router->get(uri: "/register", controller: "registration/create.php")->only(key: "guest");
$router->post(uri: "/register", controller: "registration/store.php")->only(key: "guest");

$router->get(uri: "/login", controller: "session/create.php")->only(key: "guest");
$router->post(uri: "/session", controller: "session/store.php")->only(key: "guest");
$router->delete(uri: "/session", controller: "session/destroy.php")->only(key: "auth");
