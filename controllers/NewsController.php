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
    private $model;
    private $user;
    private $news;
    public function __construct() { 
        $this->user = new lib\Users($_SESSION[session_id()]);
    }
    
    public function actionIndex($pdo)
    {
       
        $this->model = new model\NewsModel($pdo);
        $this->news = $this->model->getNews();
        
        require_once VIEWS . '/news.php';
    }
    public function actionView()
    {
        echo "вызван метод " . __METHOD__ . "<br>";
        //echo $id;
    }
}
