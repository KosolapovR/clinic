<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author Роман
 */
class LoginController {
    public function __construct() {
    }
    
    public function actionIndex(){
        //вызов модели   
        if(isset($_REQUEST['login'])) {
           include_once MODELS . "/LoginModel.php";
        
            //проверка наличия пользователя в списке зарегистрированных
            if(LoginModel::checkLogin($_REQUEST['name'], $_REQUEST['pass'])){
                //редирект на главную страницу, ползователь существует
                header("Location: main");
            }  
            
        }
            
        //вызов представления базовый сценарий
        include_once VIEWS . "/login.php";
        
    }
}
