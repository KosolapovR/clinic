<?php

namespace lib;

class DBlink {
    static private $instance;
     
    private function __construct() 
    {
        
    }
    
    public static function getInstance()
    {
        if(empty(self::$instance)){
            try {
        self::$instance = new \PDO(DSN, DB_USER, DB_PASS, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        
        
} catch (\PDOException $ex) {
    echo 'ошибка подключения к БД';
       echo $ex->getMessage(); 
       die();
}
        }
        return self::$instance;
    }
}
