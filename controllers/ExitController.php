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
        session_unset();
        include_once ROOT . "/views/main.php";
    }
}
