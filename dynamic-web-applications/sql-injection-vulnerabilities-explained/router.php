<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// // first way to route requests
// if ($uri === "/") {
//     require "controllers/index.php";
// } else if ($uri === "/about") {
//     require "controllers/about.php";
// } else if ($uri === "/contact") {
//     require "controllers/contact.php";
// }

// second way to route requests
$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
];

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

routeToController(uri: $uri, routes: $routes);