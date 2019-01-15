<?php

namespace App\Model\Database;

use App\Model\User;

class UserDb
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
/*
    public function editUser($id, $login, $password)
    {
        if (empty($login)) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }

        $stmt = $this->pdo->prepare("UPDATE user SET `login`=:login, `password`=:password WHERE id = :id");

        $stmt->bindValue('login', $login, \PDO::PARAM_STR);
        $stmt->bindValue('password', $password, \PDO::PARAM_STR);
        $stmt->bindValue('id', $id, \PDO::PARAM_INT);

        $result =  $stmt->execute();
        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
*/
    public function edit(User $user)
    {
        if (empty($user->getId())) {
            echo '<p style="color: red; size: ledger">Обьект user нужно создать!';
            return;
        }

        if (empty($user->getLogin ())) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }
        $userCheck = $this->getUserByName($user->getLogin ());

        if ($userCheck instanceof User && $userCheck->getId() != $user->getId()) {
            echo sprintf('<p style="color: red; size: ledger">Логин "%s" уже существует!', $user->getLogin ()) ;
            return;
        }
        $result = $this->pdo->exec(sprintf("UPDATE user SET `login`='%s', `password`='%s' WHERE id = %s",
            $user->getLogin (),
            $user->getPassword (),
            $user->getId ()
        ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    public function getUserByName($login)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM user WHERE `login` = '%s'", $login)
        );

        return $statement->fetchObject(User::class);
    }

    public function createUser($login, $password)
    {
        if (empty($login)) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }

        $stmt = $this->pdo->prepare("INSERT INTO user(`login`, `password`) VALUE (?, ?)");
        $result =  $stmt->execute([$login, $password]);

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    /**
     * @return User[]
     */
    public function getAllUsers()
    {
        $statement = $this->pdo->query("SELECT * FROM user");
        $statement->setFetchMode(
            \PDO::FETCH_CLASS,
            User::class
        );

        return $statement->fetchAll();
    }

    /**
     * @param $id
     * @return User
     */
    public function getUser($id)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM user WHERE id = %s", $id)
        );

        return $statement->fetchObject(User::class);
    }

    public function deleteUser($id)
    {
        $result = $this->pdo->exec(sprintf("DELETE FROM user WHERE id = %s", $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }
}
