<?php
require_once '../src/Profile.php';
require_once '../src/ProfileDb.php';
require_once '../src/ConnectDb.php';

$pdo = ConnectDb::get();
$profileDb = new ProfileDb($pdo);
$id = $_GET['id'];
$profile = $profileDb->getProfile ($id);

echo "
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='delete'>
        <input type='hidden' name='id' value='{$profile->getId ()}'>
             Вы точно хотите удалить профиль: {$profile->getLastName ()} {$profile->getFirstName ()} 
        <button>Подтвердить</button>
        <a href='index.php'>Отмена</a>       
    </form>
";
