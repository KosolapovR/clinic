<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';
echo \lib\Doctor::addDoc($_POST['name'], $_POST['description'], $_POST['category'], $_POST['img_path']);
