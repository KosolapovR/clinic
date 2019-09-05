<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author Роман
 */
class AjaxController {
    public function actionIndex(){
        include_once VIEWS . "/ajax.php";
    }

}
