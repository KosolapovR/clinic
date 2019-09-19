<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';
$model = new \model\NewsModel($pdo);
echo $model->addNews($_POST['date'], $_POST['subject'], $_POST['text'], $_POST['img_path']);

