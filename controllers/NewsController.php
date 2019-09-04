<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsController
 *
 * @author Роман
 */
class NewsController {
    public function __construct() {
        echo "Этот класс: " . __CLASS__ . "<br>";
    }
    
    public function actionIndex()
    {
        echo "вызван метод " . __METHOD__ . "<br>";
        $dsn = 'mysql:host=localhost;dbname=test';
        $user = 'root';
        $pass = '';
        
        $pdo = new PDO('mysql:host=blog.loc;dbname=blog', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $pdo->query("SELECT * FROM news");
        //$row = $stmt->fetchAll();
        while ($row = $stmt->fetch()) {
            debugger($row);
        }
    }
    
    public function actionView()
    {
        echo "вызван метод " . __METHOD__ . "<br>";
        //echo $id;
    }
}
