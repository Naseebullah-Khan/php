<?php

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($url): bool
{
    return $_SERVER["REQUEST_URI"] === $url;
}

function abort($code = 404): never
{
    http_response_code(response_code: $code);
    require base_path(path: "view/{$code}.view.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort(code: $status);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract(array: $attributes);
    require base_path(path: "view/{$path}");
}

function login($user): void
{
    $_SESSION["user"] = [
        "email" => $user["email"],
    ];

    session_regenerate_id(delete_old_session: true);
}

function logout(): void
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();
    setcookie(name: "PHPSESSID", value: "", expires_or_options: time() - 3600, path: $params["path"], domain: $params["domain"], secure: $params["secure"], httponly: $params["httponly"]);
}
