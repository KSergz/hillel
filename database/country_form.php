<?php
require_once 'autoload_custom.php';

$pdo = ConnectDb::get();
$countryDb = new CountryDb($pdo);

$country = null;

if (key_exists('id', $_GET)) {
    /** @var Country $country */

    $country = $countryDb->getCountry ($_GET['id']);


}

if (!$country) {
    echo "
    <h1>Добавить Country</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='create'
        <label>Country name</label><br>
        <input type='text' name='name'><br>
        <label>Phone code</label><br>
        <input type='text'  name='phone_code'><br>
        <label>Code</label><br>
        <input type='text'  name='code'><br>
        <input type='submit' value='Добавить'>
    </form>
";
}  else {
    echo "
    <h1>Редактировать Country</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='update'>
        <input type='hidden' name='id' value='{$country->getId ()}'>
        <label>Country name</label><br>
        <input type='text' name='name' value='{$country->getName ()}'><br>
        <label>Phone code</label><br>
        <input type='text' name='phone_code' value='{$country->getPhoneCode ()}' ><br>
        <label>Code</label><br>
        <input type='text' name='code' value='{$country->getCode()}'><br>
        <input type='submit' value='Сохранить'>
    </form>
";
}
