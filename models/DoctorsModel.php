<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of DoctorsModel
 *
 * @author Роман
 */
class DoctorsModel {
    private $pdo;
    public function __construct() {
        $this->pdo = \lib\DBlink::getInstance();
    }

    public function getDoctors($quantity = 10){
       return $this->pdo->query("SELECT * FROM doctors ORDER BY RAND() LIMIT {$quantity}")->fetchAll();
    }
}
