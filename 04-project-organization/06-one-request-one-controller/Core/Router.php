<?php

namespace Core;

class Router
{

    protected $routes = [];

    protected function add($uri, $controller, $method = "GET")
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
        ];
        // $this->routes[] = compact("uri", "controller", "method");
    }

    public function get($uri, $controller)
    {
        $this->add($uri, $controller, "GET");
    }

    public function post($uri, $controller)
    {
        $this->add($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        $this->add($uri, $controller, "DELETE");
    }

    public function put($uri, $controller)
    {
        $this->add($uri, $controller, "PUT");
    }

    public function patch($uri, $controller)
    {
        $this->add($uri, $controller, "PATCH");
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {

                return require base_path($route["controller"]);
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
