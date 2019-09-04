<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthConroller
 *
 * @author Роман
 */
class AuthController {
    

    public function actionIndex(){
        if(isset($_REQUEST['registration'])){
            
            //Занят ли Логин
            include_once MODELS . "/LoginModel.php";
            if(LoginModel::userExists($_REQUEST['name'])){ 
             $text_info = "<h4 class=\"text_info\">этот логин уже занят</h4>";
             include_once VIEWS . "/auth.php";
        } else {
            //Если Логин не занят, проводим регистрацию
            include_once MODELS . "/AuthModel.php";
            //проверка на заполненность всех полей
            if($_REQUEST['name'] && $_REQUEST['pass'] && $_REQUEST['tel'] && $_REQUEST['email']){
                if (AuthModel::addNewUser($_REQUEST['name'], $_REQUEST['pass'], $_REQUEST['tel'], $_REQUEST['email'])){
                    header("Location: login");            
                }
            } else {
                $text_info = "<h4 class=\"text_info\"> не все поля заполнены</h4>";
                include_once VIEWS . "/auth.php";
            }
        }
            
        } else {
            $text_info = '';
        include_once VIEWS . "/auth.php";
        }
        
    }
}
