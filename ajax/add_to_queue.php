<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

$date = $_POST['date'];
$time = $_POST['time'];
$url = $_POST['url'];
$login = $_POST['login'];
$category = array_pop(explode("/", $url));
$sess_id = array_pop(explode('=', $_POST['session']));

$user = new \lib\Users($login);
$notes = \lib\Queue::getNotesByUser($user, \lib\DBlink::getInstance());
$in_array = false;
foreach ($notes as $col) {
    if($category == $col['category']){
        //echo "уже существует запись к " . $col['category'];
        $in_array = true;
    }
}
if(!$in_array){
   \lib\Queue::addQueue($date, $time, $category, $user, \lib\DBlink::getInstance()); 
} else {
    echo json_encode($in_array);
}


