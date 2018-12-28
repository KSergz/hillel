<?php
require_once 'src/UserDb.php';

class UserController
{
    /**
     * @var PDO
     */
    private $userDb;

    public function __construct (PDO $pdo)
    {
        $this->userDb = new UserDb($pdo);
    }

    public function showAction()
    {

        $users = $this->userDb->getAll();

        return[
            'data' => ['users' => $users],
            'view' => 'users/show_user'

        ];

    }

    public function editAction()
    {
        var_dump ('editAction');
    }

    public function createAction()
    {
        var_dump ('createAction');
    }

    public function deleteAction()
    {
        var_dump ('deleteAction');
    }

}