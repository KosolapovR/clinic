<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExitController
 *
 * @author Роман
 */
class ExitController {
    public function actionIndex()
    {
        die('EXIT');
        //unset($_COOKIE['auth']);
        //setcookie('auth', '', time() - 1000);
       // session_destroy();     
        //header("Location: http://blog.loc");
        //
        
    }
}
