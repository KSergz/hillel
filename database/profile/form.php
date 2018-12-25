<?php

require_once '../src/CityDb.php';
require_once '../src/UserDb.php';
require_once '../src/ConnectDb.php';
require_once '../src/ProfileDb.php';
require_once '../src/Profile.php';

$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);
$userDb = new UserDb($pdo);
$profileDb = new ProfileDb($pdo);


$cities = $cityDb->getAll ();
$users = $userDb->getAll ();
$profile = null;

if (key_exists('id', $_GET)) {
    /** @var Profile $profile */
    $profile = $profileDb->getProfile($_GET['id']);
}
if ($profile instanceof Profile) {
    echo "
    <h1>Редактировать профиль</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='update'>
        <input type='hidden' name='id' value='{$profile->getId()}'>
        <label>Фамилия</label><br>
        <input type='text' name='last_name' value='{$profile->getLastName ()}'><br>
        <label>Имя</label><br>
        <input type='text' name='first_name' value='{$profile->getFirstName ()}'><br>
        <label>Адрес</label><br>
        <input type='text' name='address' value='{$profile->getAddress ()}'><br>
        
        <label>ID пользователя</label><br>
        <select name='user_id'>";

    foreach ($users as $user) {
        if ($profile->getUserId () == $user->getId()) {
            echo "<option selected='selected' value='{$user->getId()}'>{$user->getLogin ()}</option>";
        } else {
            echo "<option value='{$user->getId()}'>{$user->getLogin ()}</option>";
        }
    }

    echo "</select><br>";

    echo "<label>ID города</label><br>
        <select name='city_id'>";

    foreach ($cities as $city) {
        if ($profile->getCityId () == $city->getId()) {
            echo "<option selected='selected' value='{$city->getId()}'>{$city->getName ()}</option>";
        } else {
            echo "<option value='{$city->getId ()}'>{$city->getName ()}</option>";
        }
    }

    echo "</select><br>

        <input type='submit' value='Сохранить'>
    </form>
";
}  else {
    echo "
    <h1>Добавить новый профиль</h1>
    <form action='index.php' method='post'>
   <input type='hidden' name='action' value='create'>
        <label>Фамилия</label><br>
        <input type='text' name='last_name' ><br>
        <label>Имя</label><br>
        <input type='text' name='first_name' ><br>
        <label>Адрес</label><br>
        <input type='text' name='address' ><br>
        
        <label>ID пользователя</label><br>
        <select name='user_id'>
            <option></option>";

            foreach ($users as $user) {
                echo "<option value='{$user->getId()}'>{$user->getLogin ()}</option>";
            }

      echo "</select><br>

      <label>ID города</label><br>
        <select name='city_id'>
            <option></option>";

            foreach ($cities as $city) {
                echo "<option value='{$city->getId()}'>{$city->getName ()}</option>";
            }

      echo "</select><br>

        <input type='submit' value='Добавить'>
    </form>
";
}

