<?php
define("ROOT", dirname(__FILE__));
require_once  ROOT . '/config/configuration.php';

//обновляем значение поля лайк в базе данных и возвращаем новое число лайков

$news_id = $_POST['like'];
$login = $_POST['login'];
 if(!empty($_SESSION[session_id()])){
    $user = new lib\Users($login);

    $row = $pdo->query("SELECT * FROM likes WHERE `user_id`='{$user->getID()}' AND `news_id`='{$news_id}'")->fetch();
    if(!isset($row['news_id'])){
        $pdo->query("INSERT INTO likes (`user_id`, `news_id`) VALUES ('{$user->getID()}', '{$news_id}')");
        $pdo->query("UPDATE news SET love = love + 1 WHERE id = '{$news_id}'");

    } 
    $result = $pdo->query("SELECT * FROM news WHERE id = '{$news_id}'")->fetch();
        echo $result['love'];
 }


