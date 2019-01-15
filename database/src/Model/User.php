<?php

namespace App\Model;

class User
{
    private $id;
    private $login;
    private $status;
    private $last_login;
    private $password;

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLastLogin()
    {
        return $this->last_login;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $login
     */
    public function setLogin ($login): void
    {
        $this->login = $login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword ($password): void
    {
        $this->password = $password;
    }


    public function update(string $login, string $password)
    {
        $this->setLogin($login);
        $this->setPassword($password);

    }
}
