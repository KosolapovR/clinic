<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");//HTTP/1.1
ini_set('display_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(__FILE__));

require_once  ROOT . '/config/configuration.php';


require_once  CORE . '/Router.php';

Router::run();
