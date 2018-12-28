<?php

require_once '../src/Profile.php';
require_once '../src/ProfileDb.php';
require_once '../src/CityDb.php';
require_once '../src/UserDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);
$userDB = new UserDb($pdo);
$profileDb = new ProfileDb($pdo);

if (!empty($_POST)  && key_exists('action', $_POST)) {
    switch ($_POST['action']) {
        case 'create' : {
            $profile = new Profile();
            $profile->update($_POST['last_name'], $_POST['first_name'], $_POST['address'], $_POST['user_id'], $_POST['city_id'] );
            $profileDb->create($profile);
            break;
        }
        case 'update' : {
            $profile = $profileDb->getProfile($_POST['id']);
            $profile->update($_POST['last_name'], $_POST['first_name'], $_POST['address'], $_POST['user_id'], $_POST['city_id'] );

            $profileDb->edit($profile);
            break;
        }
        case 'delete' : $profileDb->delete($_POST['id']); break;
    }
}

echo "<h1>Профили</h1> <table border='1' style='width:80%'>
  <a href='../index.php'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Фамилия </th> 
    <th>Имя</th>
    <th>Адрес</th> 
    <th>ID пользователя</th>
    <th>ID города</th>
    <th>Действия</th>
  </tr>";

/** @var Profile $profile */
foreach ($profileDb->getAll() as $profile) {

    $user = $userDB->getUser ($profile->getUserId ());
    $city = $cityDb->getCity ($profile->getCityId ());


    echo "<tr>
        <td>{$profile->getId()}</td>
        <td>{$profile->getFirstName()}</td>
        <td>{$profile->getLastName()}</td>
        <td>{$profile->getAddress()}</td>
        <td>{$user->getLogin ()}</td>
        <td>{$city->getName ()}</td>
        <td>
            <a href='form.php?id={$profile->getId()}'>Редактировать</a>
            <a href='delete.php?id={$profile->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
