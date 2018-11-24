<?php
require_once 'autoload_custom.php';

$plane = new Airplane('Mriya', 1000, 3000, 'ракетное топливо', 'воздушный транспорт',300000, 100, 500);

$ship = new Ship('Черная Жемчужина', 200, 350, 'уголь', 'водный транспорт', 5000, 20,500);

$train = new Train('Поезд', 55, 800, 'дизельное топливо','рельсовый', 2000, 10, 500);

$car = new Autotruck('Mack', 15, 50, 'бензин', 'сухопутный транспорт',800, 0.4, 500);


try {
    echo "Состояние: {$car->getAction()}<br>";
    $car->beginMovement(500);
    echo "Состояние: {$car->getAction()}<br>";
    $car->stopMovement();
    $car->loading(20);
    echo "Состояние: {$car->getAction()}<br>";
    $car->beginMovement();
    echo "Состояние: {$car->getAction()}<br>";
    $car->stopMovement();
    $car->unloading(2);
    echo "Состояние: {$car->getAction()}<br>";
    $car->beginMovement ();
    $car->stopMovement();
    $car->fuelling (700);
    echo "Состояние: {$car->getAction ()}<br>";
var_dump ($car);
} catch (Exception $exception) {
    echo "<p style='color: red'>Программа не вытолнена: {$exception->getMessage()}</p>";
} finally {
    echo "Первый блок finally<br>";
}
