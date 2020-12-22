<?php

namespace App;

class Authorization
{
    public function __construct(Database $tabase, string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;

        if ($this->()) {
            return $this->getToken();
        }

        return false;
    }

    public function confirmUser()
    {

    }
    
    public function getToken()
    {
        return $this->database::select('users', 'token', '');
    }
}
