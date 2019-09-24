<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

echo lib\Users::deleteUser($_POST['login']);
