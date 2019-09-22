<?php

namespace lib;

/**
 * Description of Queue
 *
 * @author Роман
 */
class Queue 
{
    public static function timeAvailable($date, $time)
    {
        $stmt = \lib\DBlink::getInstance()->query("SELECT * FROM `queue` WHERE `date`='{$date}' AND `time`='{$time}'");
        if ($stmt !== null){
            return false;
        } else {
            return true;
        }
    }
    public static function getNotesByUser(Users $user){
        $stmt = \lib\DBlink::getInstance()->query("SELECT * FROM `queue` WHERE `user`='{$user->getLogin()}'");
        return $stmt->fetchAll();
    }
    public static function getNotesByDate($date, $category){
        $buffer = []; 
        $stmt = \lib\DBlink::getInstance()->query("SELECT * FROM `queue` WHERE `date`='{$date}' AND `category`='{$category}'");
        while($row = $stmt->fetch()){
            $buffer[] = $row['time'];
        }
        sort($buffer);
        return $buffer; 
    }
    
    public static function addQueue($date, $time, $category, Users $user){
        $login = $user->getLogin();
        $statement = "INSERT INTO `queue`(`date`, `time`, `category`, `user`, `doctor`) VALUES ('$date', '{$time}', '{$category}', '{$login}', 'doctorTEST')";
        $res = \lib\DBlink::getInstance()->query($statement);
        if(!empty($res)){
            return true;
        }
        return false;
    }
}
