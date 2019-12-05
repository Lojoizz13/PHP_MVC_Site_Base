<?php

//Сессия
session_start();

//Автолоуд
require_once("vendor/autoload.php");

//БД
//use components\Db;
//$db = Db::getConnection();

//Роутер
use components\Router;
$router = new Router();
$router->run();

