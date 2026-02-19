<?php

namespace Core\Middleware;

class Auth
{
    public function handle(): void
    {
        if (!$_SESSION["user"] ?? false) {
            header(header: "location: /login");
            die();
        }
    }
}
