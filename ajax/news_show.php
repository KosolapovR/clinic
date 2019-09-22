<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';
$model = new \model\NewsModel();
echo json_encode($model->getOneNews($_POST['id']));
