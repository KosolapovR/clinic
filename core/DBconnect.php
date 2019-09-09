<?php

    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
} catch (PDOException $ex) {
       echo $ex->getMessage(); 
}
    
    
    

