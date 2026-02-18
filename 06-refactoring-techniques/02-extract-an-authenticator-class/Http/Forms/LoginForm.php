<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password): bool
    {
        if (!Validator::email(value: $email)) {
            $this->errors["email"] = "Please enter a valid email address.";
        }

        if (!Validator::string(value: $password)) {
            $this->errors["password"] = "Please provide a valid password.";
        }
        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value): void
    {
        $this->errors[$key] = $value;
    }
}
