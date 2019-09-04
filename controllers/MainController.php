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
    public function __construct() {    
    }
    
    public function actionIndex(){
        include_once ROOT . "/views/main.php";
    }
}
