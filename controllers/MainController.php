<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainControllers
 *
 * @author Роман
 */
class MainController {
    private $model;
    private $pdo;
    private $news;
    
    public function __construct($pdo) {    
        $this->pdo = $pdo;
        $this->model = new \model\MainModel($this->pdo);
        $this->news = $this->model->getNews();
    }
    public function actionIndex(){
        include_once ROOT . "/views/main.php";
    }
}
