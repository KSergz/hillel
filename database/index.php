<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Serves\ConnectDb;
use PHPRouter\Route;
use PHPRouter\RouteCollection;
use PHPRouter\Router;

try {
    $collection = new RouteCollection();
    #Users
    #
    $collection->attachRoute(new Route('/users/show', array(
        '_controller' => 'App\Controller\UserController::showAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/users/edit', array(
        '_controller' => 'App\Controller\UserController::editAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/users/edit', array(
        '_controller' => 'App\Controller\UserController::editAction',
        'methods' => 'POST'
    )));
    $collection->attachRoute(new Route('/users/delete', array(
        '_controller' => 'App\Controller\UserController::deleteAction',
        'methods' => 'GET'
    )));
    #Users
    #
    #
    #Countries

    $collection->attachRoute(new Route('/countries/show', array(
        '_controller' => 'App\Controller\CountryController::showAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/countries/edit', array(
        '_controller' => 'App\Controller\CountryController::editAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/countries/edit', array(
        '_controller' => 'App\Controller\CountryController::editAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/countries/delete', array(
        '_controller' => 'App\Controller\CountryController::deleteAction',
        'methods' => 'GET'
    )));

    $collection->attachRoute(new Route('/countries/add', array(
       '_controller' => 'App\Controller\CountryController::addAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/countries/add', array(
        '_controller' => 'App\Controller\CountryController::addAction',
        'methods' => 'POST'
    )));
    #Countries
    #
    #
    #Cities

    $collection->attachRoute(new Route('/cities/show', array(
        '_controller' => 'App\Controller\CitiesController::showAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/cities/edit', array(
        '_controller' => 'App\Controller\CitiesController::editAction',
        'methods' => 'GET'
    )));
    $collection->attachRoute(new Route('/cities/edit', array(
        '_controller' => 'App\Controller\CitiesController::editAction',
        'methods' => 'POST'
    )));

    $collection->attachRoute(new Route('/cities/delete', array(
        '_controller' => 'App\Controller\CitiesController::deleteAction',
        'methods' => 'GET'
    )));
    #Cities
    #
    #

    $collection->attachRoute(new Route('/', array(
        '_controller' => 'App\Controller\MainController::indexAction',
        'methods' => 'GET'
    )));

    $router = new Router($collection);
    $route = $router->matchCurrentRequest();

} catch (\LogicException $e) {
    echo ($e->getMessage());
}
