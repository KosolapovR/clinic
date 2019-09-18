<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

$data = [];
foreach($_POST as $key => $value){
    if(!empty($value)){
        $data[$key] = $_POST[$key];
    }
}
//print_r($_POST);
$model = new \model\NewsModel($pdo);
$model->updateNews($_POST['id'], $data);
echo json_encode($model->getOneNews($_POST['id'])); 


