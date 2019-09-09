<?php
session_start();
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
ini_set('display_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(__FILE__));

require_once  ROOT . '/config/configuration.php';
require_once  'vendor/autoload.php';


require_once  CORE . '/Router.php';


    
Router::run();



