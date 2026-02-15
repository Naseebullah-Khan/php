<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key): mixed
    {
        if (!array_key_exists(key: $key, array: $this->bindings)) {
            throw new \Exception(message: "No matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];

        return call_user_func(callback: $resolver);
    }
}
