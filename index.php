<?php
session_start();
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
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

