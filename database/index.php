<?php
require_once 'src/Controller/UserController.php';
require_once 'src/Controller/CountryController.php';
require_once 'src/ConnectDb.php';

$pdo = ConnectDb::get();
$controllers = [
    'users' => new UserController($pdo),
    'countries' => new CountryController($pdo),

];

list($controllerKey, $actionKey)= explode ('/', ltrim ($_SERVER['PATH_INFO'], '/' ));

$controller = $controllers[$controllerKey];
var_dump ($controller);
$action = $actionKey . 'Action';
$result = $controller->$action();


$data = $result['data'];

$template = 'templates/'.$result['view'].'.php';
require_once $template;


/*
echo '<a href="user/index.php">Пользователи</a><br>';
echo '<a href="country/index.php">Страны</a><br>';
echo '<a href="city/index.php">Города</a><br>';
echo '<a href="profile/index.php">Профиль</a><br>';
*/