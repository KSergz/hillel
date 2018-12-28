<?php
require_once 'src/User.php';
class UserDb
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByName($login)
    {
        $statement = $this->pdo->query(
            sprintf("SELECT * FROM user WHERE `login` = '%s'", $login)
        );

        return $statement->fetchObject('User');
    }

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

    public function create(User $user)
    {
        if (empty($user->getLogin ())) {
            echo '<p style="color: red; size: ledger">Поле логин полжно не должно быть пустым!';
            return;
        }

        $userCheck = $this->getUserByName($user->getLogin ());

        if ($userCheck instanceof User) {
            echo sprintf('<p style="color: red; size: ledger">Логин "%s" уже существует!', $user->getLogin ()) ;
            return;
        }

        $result = $this->pdo->exec(sprintf("INSERT INTO user(`login`, `password`) VALUE ('%s', '%s')",
            $user->getLogin (),
            $user->getPassword ()

            ));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }

    /**
     * @return User[]
     */
    public function getAll()
    {
        $statement = $this->pdo->query("SELECT * FROM user");
        $statement->setFetchMode(
            PDO::FETCH_CLASS,
            'User'
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

        return $statement->fetchObject('User');
    }

    public function delete($id)
    {
        $result = $this->pdo->exec(sprintf("DELETE FROM user WHERE id = %s", $id));

        if ($result === false) {
            var_dump($this->pdo->errorInfo());
        }
    }


}
