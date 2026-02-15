<?php

$router->get(uri: "/", controller: "controllers/index.php");
$router->get(uri: "/about", controller: "controllers/about.php");
$router->get(uri: "/contact", controller: "controllers/contact.php");

$router->get(uri: "/notes", controller: "controllers/notes/index.php");
$router->get(uri: "/note", controller: "controllers/notes/show.php");
$router->delete(uri: "/note", controller: "controllers/notes/destroy.php");

$router->get(uri: "/notes/create", controller: "controllers/notes/create.php");
$router->post(uri: "/notes", controller: "controllers/notes/store.php");
