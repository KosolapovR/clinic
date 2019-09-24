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
        
        //поиск количества записей по категории
        //если кочитество записей меньше количества докторов указанной категории
        //которые могу обработать заявку, удаляем из результирующего массива
        $i = 0;
        //ищем количество записей на одну дату и одно время
        foreach(array_count_values($buffer) as $key => $val){
         //если количество записей меньше количества врачей
            if($val < (int)(Category::getCountDoctors($category))){
          
                //в цикле находим индекс элемента по значению в массиве buffer и удаляем его
                while($i < (int)(Category::getCountDoctors($category))){
                    $i++;
                    unset($buffer[array_search($key, $buffer)]);
                }
            }
        }   
        return $buffer; 
    }
    
    public static function addQueue($date, $time, $category, Users $user, $doctor){
        
        $login = $user->getLogin();
        $statement = "INSERT INTO `queue`(`date`, `time`, `category`, `user`, `doctor`) VALUES ('$date', '{$time}', '{$category}', '{$login}', '{$doctor}')";
        $res = \lib\DBlink::getInstance()->query($statement);
        if(!empty($res)){
            return true;
        } else{
            return false;
        }
        
    }
}
