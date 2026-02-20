<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "/vendor/autoload.php";

session_start();

require BASE_PATH . "Core/functions.php";


$router = new \Core\Router();

require base_path(path: "bootstrap.php");


$routes = require base_path(path: "routes.php");
$uri = parse_url(url: $_SERVER["REQUEST_URI"])["path"];

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route(uri: $uri, method: $method);
} catch (ValidationException $exception) {
    Session::flash(key: "errors", value: $exception->errors);
    Session::flash(key: "old", value: $exception->old);

    redirect(path: $router->perviousUrl());
}

Session::unflash();
