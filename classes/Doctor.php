<?php

namespace lib;

class Doctor 
{
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public static function getAllDoctors()
    {
        return \lib\DBlink::getInstance()->query("SELECT * FROM `doctors`")->fetchAll(); 
    }   
      public static function deleteDoctor($id)
    {
        try {
           \lib\DBlink::getInstance()->query("DELETE FROM `doctors` WHERE `id`='{$id}'"); 
           return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    public static function addDoc($name, $desc, $cat, $img_path)
    {
        try {
            \lib\DBlink::getInstance()->query("INSERT INTO `doctors` (`name`, `description`, `category`, `img_path`) VALUES ('{$name}', '{$desc}', '{$cat}', '{$img_path}')"); 
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return false;
        }
    }
    public function isAvailableTime($date, $time)
    {
        $res = \lib\DBlink::getInstance()->query("SELECT * FROM `queue` WHERE doctor='{$this->name}' AND date='{$date}' AND time='{$time}'")->fetchALL();
        if(empty($res)){
            return true;
        } else{
            return false;
        }
        
    }
}
