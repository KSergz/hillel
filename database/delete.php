<?php
require_once 'autoload_custom.php';
$pdo = ConnectDb::get();
$id = $_GET['id'];
$userDb = new UserDb($pdo);

$user = $userDb->getUser($id);

echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>    
        <input type='hidden' name='id' value='{$user->getId()}'>
            Вы точно хотите удалить пользователя: {$user->getLogin()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/> 
";


/*
$countryDb = new CountryDb($pdo);
$country = $countryDb->getCountry ($id);
echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>    
        <input type='hidden' name='id' value='{$country->getId()}'>
            Вы точно хотите удалить страну: {$country->getName()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/> 
";



$cityDb = new CityDb($pdo);
$city = $cityDb->getCity ($id);

echo "
    <form id='delete' action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>    
        <input type='hidden' name='id' value='{$city->getId ()}'>
            Вы точно хотите удалить город: {$city->getName ()}?<br>
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>
    <form/> 
";

*/
//var_dump($_GET);