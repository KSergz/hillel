<?php
require_once 'autoload_custom.php';

$pdo = ConnectDb::get();


$userDb = new UserDb($pdo);

if (!empty($_POST) && key_exists('action', $_POST)) {
    switch ($_POST['action']){

        case 'create' : $userDb->createUser ($_POST['login'], $_POST['password']); break;
        case 'update' : $userDb->editUser ($_POST['id'], $_POST['login'], $_POST['password']); break;
        case 'delete' : $userDb->deleteUser ($_POST['id']); break;
    }

}

echo "<h1>Users</h1> <table border=\"1\" style=\"width:80%\">
  <a href='user_form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Login</th> 
    <th>Last login</th>
    <th>Password</th>
    <th>Action</th>
  </tr>";

/** @var User $user */

foreach ($userDb->getAllUsers () as $user) {
    echo "<tr>
        <td>{$user->getId()}</td>
        <td>{$user->getLogin()}</td>
        <td>{$user->getLastLogin()}</td>
        <td>{$user->getPassword ()}</td>
        <td>
            <a href='user_form.php?id={$user->getId()}'>Редактировать</a>
            <a href='delete.php?model=user&id={$user->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";







$countryDb = new CountryDb($pdo);

if (!empty($_POST) && key_exists('action', $_POST)) {
    switch ($_POST['action']){

        case 'create' : $countryDb->createCountry($_POST['name'], $_POST['phone_code'], $_POST['code']); break;
        case 'update' : $countryDb->editCountry($_POST['id'], $_POST['name'], $_POST['phone_code'], $_POST['code'] ); break;
        case 'delete' : $countryDb->deleteCountry($_POST['id']); break;
    }

}

echo "<h1>Countries</h1> <table border=\"1\" style=\"width:80%\">
  <a href='country_form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Country name</th> 
    <th>Phone code</th>
    <th>Code</th>
    <th>Action</th>
  </tr>";

/** @var Country $country */

foreach ($countryDb->getAllCountries ()  as $country) {
    echo "<tr>
        <td>{$country->getId()}</td>
        <td>{$country->getName()}</td>
        <td>{$country->getPhoneCode()}</td>
        <td>{$country->getCode()}</td>
        <td>
            <a href='country_form.php?id={$country->getId()}'>Редактировать</a>
            <a href='delete_country.php?id={$country->getId ()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";



/*

$cityDb = new CityDb($pdo);

if (!empty($_POST) && key_exists ('action', $_POST)){
    switch ($_POST['action']){
        case 'create' : $cityDb->createCity ($_POST['name'], $_POST['country_id']); break;
        case 'update' : $cityDb->editCity ($_POST['id'], $_POST['name'], $_POST['country_id']); break;
        case 'delete' : $cityDb->deleteCity ($_POST['id']); break;

    }

}

echo "<h1>Cities</h1> <table border=\"1\" style=\"width:100%\">
  <a href='city_form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Name</th> 
    <th>Country ID</th>
    <th>Action</th>
  </tr>";

/** @var City $city */
/*
foreach ($cityDb->getAllCities () as $city) {
    echo "<tr>
        <td>{$city->getId()}</td>
        <td>{$city->getName ()}</td>
        <td>{$city->getCountryId ()}</td>
        <td>
            <a href='city_form.php?id={$city->getId()}'>Редактировать</a>
            <a href='delete.php?model=city&id={$city->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";
*/