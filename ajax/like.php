<?php
session_start();
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

//обновляем значение поля лайк в базе данных и возвращаем новое число лайков
$news_id = $_POST['like'];
$login = $_POST['login'];
 if(!empty($_SESSION[session_id()])){
    $user = new lib\Users($login);

    $row = \lib\DBlink::getInstance()->query("SELECT * FROM likes WHERE `user_id`='{$user->getID()}' AND `news_id`='{$news_id}'")->fetch();
    if(!isset($row['news_id'])){
        \lib\DBlink::getInstance()->query("INSERT INTO likes (`user_id`, `news_id`) VALUES ('{$user->getID()}', '{$news_id}')");
        \lib\DBlink::getInstance()->query("UPDATE news SET love = love + 1 WHERE id = '{$news_id}'");

    } 
    $result = \lib\DBlink::getInstance()->query("SELECT * FROM news WHERE id = '{$news_id}'")->fetch();
        echo $result['love'];
 }


