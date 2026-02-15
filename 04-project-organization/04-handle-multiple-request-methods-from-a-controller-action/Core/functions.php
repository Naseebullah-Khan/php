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
