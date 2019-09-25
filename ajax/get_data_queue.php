<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

foreach($_POST as $key => $val){
    if($val == 'все'){
        unset($_POST[$key]);
    }
}
$notes = lib\Queue::getNotes($_POST['category'], $_POST['doctor'], $_POST['login'], $_POST['date'], $_POST['time']);
echo json_encode($notes);