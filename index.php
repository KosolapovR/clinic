<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header('Pragma: no-cache');
if(isset($_COOKIE['auth'])){
   $_SESSION[session_id()] = explode("/////", $_COOKIE['auth'])[0];
}

ini_set('display_errors', 1);
ini_set('log_errors', 'On');
ini_set('error_log', dirname(__FILE__) . '/error.log');
error_reporting(E_ALL);


// инициализируем константы путей, БД ...
define("ROOT", dirname(__FILE__));

require_once  ROOT . '/config/configuration.php';

//запускаем роутер
require_once  CORE . '/Router.php';
Router::run();
lib\Category::getCountDoctors('hirurg');

