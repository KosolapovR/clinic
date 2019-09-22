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
class MainController 
{
    private $model;
    private $news;
    
    public function __construct() {    
        $this->model = new \model\MainModel();
        $this->news = $this->model->getNews();  
    }
    public function actionIndex(){
        $doctors = new \model\DoctorsModel();
        $doctors = $doctors->getDoctors(2);
        require_once ROOT . "/views/main.php";  
    }
}
