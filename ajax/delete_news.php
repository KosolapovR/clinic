<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';
$model = new \model\NewsModel($pdo);
echo $model->deleteNews($_POST['id']);

