<?php
require_once 'autoload_custom.php';
$pdo = ConnectDb::get();
$id = $_GET['id'];


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


//var_dump($_GET);