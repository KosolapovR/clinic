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
        $pdo = new \PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->query("SELECT * FROM `queue` WHERE `date`='{$date}' AND `time`='{$time}'");
        if ($stmt !== null){
            return false;
        } else {
            return true;
        }
    }
    public static function getNotesByUser(Users $user, \PDO $pdo){
        $stmt = $pdo->query("SELECT * FROM `queue` WHERE `user`='{$user->getLogin()}'");
        return $stmt->fetchAll();
    }
    public static function getNotesByDate($date, $category){
        $buffer = [];
        $pdo = new \PDO(DSN, DB_USER, DB_PASS);
        $stmt = $pdo->query("SELECT * FROM `queue` WHERE `date`='{$date}' AND `category`='{$category}'");
        while($row = $stmt->fetch()){
            $buffer[] = $row['time'];
        }
        sort($buffer);
        return $buffer; 
    }
    
    public static function addQueue($date, $time, $category, Users $user, \PDO $pdo){
        $login = $user->getLogin();
        $statement = "INSERT INTO `queue`(`date`, `time`, `category`, `user`, `doctor`) VALUES ('$date', '{$time}', '{$category}', '{$login}', 'doctorTEST')";
        $res = $pdo->query($statement);
        if(!empty($res)){
            return true;
        }
        return false;
    }
}
