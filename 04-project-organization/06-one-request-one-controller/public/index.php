<?php

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(callback: function ($class): void {
    $class = str_replace(search: "\\", replace: DIRECTORY_SEPARATOR, subject: $class);
    require base_path(path: "{$class}.php");
});

$router = new \Core\Router();


$routes = require base_path(path: "routes.php");
$uri = parse_url(url: $_SERVER["REQUEST_URI"])["path"];

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
