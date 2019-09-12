<?php

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        
} catch (PDOException $ex) {
    echo 'ошибка подключения к БД';
       echo $ex->getMessage(); 
       die();
}
    
    
    

