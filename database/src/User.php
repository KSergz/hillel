<?php

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
     * @param mixed $id
     */
    public function setId ($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $login
     */
    public function setLogin ($login): void
    {
        $this->login = $login;
    }

    /**
     * @param mixed $last_login
     */
    public function setLastLogin ($last_login): void
    {
        $this->last_login = $last_login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword ($password): void
    {
        $this->password = $password;
    }

    public function update(string $login,  string $password)
    {
        $this->setLogin ($login);
        $this->setPassword ($password);
    }
}
