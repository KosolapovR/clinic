<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

$date = $_POST['date'];
$time = $_POST['time'];
$url = $_POST['url'];
$login = $_POST['login'];
if($_POST['url'] == "http://blog.loc/admin/schedule"){
    $category = $_POST['category'];
} else {
    $category = array_pop(explode("/", $url));
}

$sess_id = array_pop(explode('=', $_POST['session']));

$user = new \lib\Users($login);
$notes = \lib\Queue::getNotesByUser($user);

$in_array = false;
//проверка существования записи этого юзера к данной категории докторов
foreach ($notes as $col) {
    if($category == $col['category']){
        $in_array = true;
        die('уже есть запись'); 
   }
}
//выбираем случайного доктора со свободным указанным временем
$doctors = \lib\DBlink::getInstance()->query("SELECT `name` FROM doctors WHERE `category` = '{$category}'")->fetchAll();
$doctor = $doctors[rand(0, count($doctors) - 1)]['name']; 
$doc = new \lib\Doctor($doctor);


//ищем свободного доктора в цикле
while(!$doc->isAvailableTime($date, $time)){
    $doctor = $doctors[rand(0, count($doctors) - 1)]['name']; 
    $doc = new \lib\Doctor($doctor);
}
if(!$in_array){
   \lib\Queue::addQueue($date, $time, $category, $user, $doctor); 
} else {
    echo json_encode($in_array);
    die();
}






if(\lib\DBlink::getInstance()->query("SELECT * FROM queue WHERE `doctor` = '{$doctor}' AND `date` = '{$date}' AND `time` = '{$time}'")->fetch()){
    echo 1;
    echo "<br>" . $doctor;
} else{
    echo 0;
    echo "<br>" . $doctor;
}



