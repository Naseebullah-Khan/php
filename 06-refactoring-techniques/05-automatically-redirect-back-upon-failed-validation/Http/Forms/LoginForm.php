<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email(value: $attributes["email"])) {
            $this->errors["email"] = "Please enter a valid email address.";
        }

        if (!Validator::string(value: $attributes["password"])) {
            $this->errors["password"] = "Please provide a valid password.";
        }
    }

    public static function validate($attributes): LoginForm
    {
        $instance = new static(attributes: $attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(): void
    {
        ValidationException::throw(errors: $this->errors, old: $this->attributes);
    }

    public function failed(): int
    {
        return count(value: $this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value): static
    {
        $this->errors[$key] = $value;

        return $this;
    }
}
