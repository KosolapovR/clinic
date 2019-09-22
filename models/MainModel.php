<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of MainModel
 *
 * @author Роман
 */
class MainModel 
{
    private $pdo;
    public function __construct() 
    {
        $this->pdo = \lib\DBlink::getInstance();
    }
    public function getNews($quantity = 5) 
    {
        $news_model = new \model\NewsModel();
        return $news_model->getNews();
    }
}
