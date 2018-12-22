<?php
require_once 'autoload_custom.php';
$pdo = ConnectDb::get();
$cityDb = new CityDb($pdo);

$city = null;

if (key_exists('id', $_GET)) {

    /**@var City $city */
    $city = $cityDb->getCity($_GET['id']);



}

if (!$city) {
    echo "
    <h1>Добавить новый город</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='action' value='create'
        <label>City</label><br>
        <input type='text' name='city'><br>
        <label>Country ID</label><br>
        <input type='text'  name='country_id'><br>
        <input type='submit' value='Добавить'>
    </form>
";
}  else {
    echo "
    <h1>Редактировать город</h1>
    <form action='index.php' method='post'>
        <input type='hidden' name='id' value='{$city->getId ()}'>
        <input type='hidden' name='action' value='update'
        <label>Название города</label><br>
        <input type='text' name='name' value='{$city->getName ()}'><br>
        <label>Country ID</label><br>
        <input type='text' name='country_id' value='{$city->getCountryId ()}' ><br>
        <input type='submit' value='Сохранить'>
    </form>
";
}
