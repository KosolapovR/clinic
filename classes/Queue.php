<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
}
