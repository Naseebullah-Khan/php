<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $user = App::resolve(key: Database::class)->query("SELECT * FROM users WHERE email = ?", [$email])->find();

        if ($user) {
            if (password_verify(password: $password, hash: $user["password"])) {
                $this->login(user: $user);

                return true;
            }
        }
        return false;
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
        Session::destroy();
    }
}
