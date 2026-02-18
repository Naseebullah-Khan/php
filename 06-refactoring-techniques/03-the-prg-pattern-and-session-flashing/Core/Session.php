<?php

namespace Core;

class Session
{
    public static function has($key): bool
    {
        return (bool) static::get($key);
    }
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key, $default = null): mixed
    {
        // if (isset($_SESSION["flash"][$key])) {
        //     return $_SESSION["flash"][$key];
        // }
        // return $_SESSION[$key] ?? $default;
        return $_SESSION["flash"][$key] ?? $_SESSION[$key] ?? $default;
    }
    public static function flash($key, $value): void
    {
        $_SESSION["flash"][$key] = $value;
    }
    public static function unflash(): void
    {
        unset($_SESSION["flash"]);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie(name: "PHPSESSID", value: "", expires_or_options: time() - 3600, path: $params["path"], domain: $params["domain"], secure: $params["secure"], httponly: $params["httponly"]);
    }
}
