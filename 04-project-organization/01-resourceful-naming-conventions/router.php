<?php

function routeToController($uri, $routes): void
{
    if (array_key_exists(key: $uri, array: $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404): never
{
    http_response_code(response_code: $code);
    require "view/{$code}.view.php";
    die();
}

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = require "routes.php";

routeToController(uri: $uri, routes: $routes);