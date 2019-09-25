<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

//выделяем категорию специалиста из URL
$category = '';
if($_REQUEST['url'] == "http://blog.loc/admin/schedule"){
    $category = $_REQUEST['category'];
} else {
    $segments = explode('/', $_REQUEST['url']);
    $category = array_pop($segments);
}
$date = $_REQUEST['date'];


$arr = explode("-", $date);
list($year, $month, $day) = $arr;

$select_date = new DateTime("now");
$select_date->setDate($year, $month, $day);

$buffer = [];
$not_available_times = (lib\Queue::getNotesByDate($select_date->format('Y-m-d'), $category));

for ($h = 9; $h <= 20; ++$h){
    for ($i = 0; $i < 2; ++$i){
        $select_date->setTime(1 * $h, 30 * $i);
        if(!in_array($select_date->format('H:i:s'), $not_available_times)){
            $buffer[] = $select_date->format('H:i:s');
        } 
    }
}
$buffer = json_encode($buffer);
print_r($buffer);







