<?php

require_once '../src/User.php';
require_once '../src/UserDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$userDb = new UserDb($pdo);

if (!empty($_POST)  && key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'create' : {
            $user = new User();
            $user->update ($_POST['login'], $_POST['password']);
            $userDb->create ($user);
            break;
        }
        case 'update' : {
            $user = $userDb->getUser ($_POST['id']);
            $user->update ($_POST['login'], $_POST['password']);
            $userDb->edit ($user);
            break;
        }
        case 'delete' : $userDb->delete($_POST['id']); break;
    }
}

echo "<h1>Users</h1> <table border='1' style='width:80%'>
  <a href='../index.php'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
    <th>Action</th>
  </tr>";

/** @var User $user */
foreach ($userDb->getAll() as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        <td>
            <a href='form.php?id={$user->getId()}'>Редактировать</a>
            <a href='delete.php?id={$user->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
