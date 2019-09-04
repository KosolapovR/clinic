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
            include_once MODELS . "/AuthModel.php";
            AuthModel::addNewUser($_REQUEST['name'], $_REQUEST['pass'], $_REQUEST['tel'], $_REQUEST['email']);
            header("Location: login");
        }
        include_once ROOT . "/views/auth.php";
    }
}
