<?php
namespace App\Controller;

use App\Model\Database\UserDb;
use App\Model\User;
use App\Serves\ConnectDb;
class UserController extends Controller
{
    /**
     * @var UserDb
     */
    private $userDb;

    public function __construct()
    {
        $this->userDb = new UserDb(ConnectDb::get());
    }

    public function showAction()
    {
        $users = $this->userDb->getAllUsers();
        $this->view(['users' => $users], 'users/show_user');

    }

    public function editAction()
    {

        if (array_key_exists('id', $_GET)) {
            $user = $this->userDb->getUser($_GET['id']);
        }

        $validates = [];
        $login = $user->getLogin();
        $password = $user->getPassword();

        if (array_key_exists('action', $_POST) && $_POST['action'] === 'add') {

            $login = $_POST['login'];
            $password = $_POST['password'];


            $this->validateLogin($validates, $login);
            $this->validatePassword($validates, $password);

            if (count($validates) === 0) {
                $user->update($login, $password);

                $this->userDb->edit($user);

                $this->redirect('/users/show');
            }
        }


        $this->view([
            'error' => $validates,
            'login' => $login,
            'password' => $password,

        ],
            'users/edit_user'
        );

    }

    public function createAction()
    {
        var_dump('createAction');
    }

    public function deleteAction()
    {
        if (array_key_exists('id', $_GET)) {
            $this->userDb->deleteUser($_GET['id']);
        }

        $this->redirect('/users/show');
    }

    private function validateLogin(&$validates, $login)
    {
        if (strlen($login) < 3 || strlen($login) > 50) {
            $validates['login'] = 'Логин должен быть больше 3 и меньше 50 символов!';
        }
    }

    private function validatePassword(&$validates, $password)
    {
        if (strlen($password) < 1 || strlen($password) > 25) {
            $validates['password'] = 'Пароль должен быть больше 1 и меньше 25 символов!';
        }
    }



    private function redirect($path = '/') {
        header(sprintf('Location: %s', $path));
        exit;
    }
}
