<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoctorsController
 *
 * @author Роман
 */
class DoctorsController {
    private $model;
    private $pdo;
    public function actionIndex(){
        $this->model = new \model\DoctorsModel();
        $doctors = $this->model->getDoctors();
        require_once VIEWS . "/doctors.php";
    }
}
