<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

    protected $routes = [];

    protected function add($uri, $controller, $method = "GET"): static
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null,
        ];
        // $this->routes[] = compact("uri", "controller", "method");
        return $this;
    }

    public function get($uri, $controller): Router
    {
        return $this->add(uri: $uri, controller: $controller, method: "GET");
    }

    public function post($uri, $controller): Router
    {
        return $this->add(uri: $uri, controller: $controller, method: "POST");
    }

    public function delete($uri, $controller): Router
    {
        return $this->add(uri: $uri, controller: $controller, method: "DELETE");
    }

    public function put($uri, $controller): Router
    {
        return $this->add(uri: $uri, controller: $controller, method: "PUT");
    }

    public function patch($uri, $controller): Router
    {
        return $this->add(uri: $uri, controller: $controller, method: "PATCH");
    }

    public function only($key): static
    {
        $this->routes[array_key_last(array: $this->routes)]["middleware"] = $key;
        return $this;
    }

    public function route($uri, $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper(string: $method)) {
                // if ($route["middleware"] === "guest") {
                //     (new Guest)->handle();
                // }
                // if ($route["middleware"] === "auth") {
                //     (new Auth)->handle();
                // }
                // if ($route["middleware"]) {
                //     $middleware = Middleware::MAP[$route["middleware"]];
                //     (new $middleware)->handle();
                // }
                Middleware::resolve(key: $route["middleware"]);

                return require base_path(path: $route["controller"]);
            }
        };

        $this->abort();
    }

    protected function abort($code = 404): never
    {
        http_response_code(response_code: $code);
        require base_path(path: "view/{$code}.view.php");
        die();
    }
}
