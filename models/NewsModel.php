<?php

namespace model;

class NewsModel {
   // private $user;
    private $pdo;
    public function __construct(\PDO $pdo) {
       // $this->user = $user;
        $this->pdo = $pdo;
    }
    public function getNews(int $quantity = 5):array {
        $stmt = $this->pdo->query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT {$quantity}");
        return $stmt->fetchAll();
    }
    public function getOneNews($id){
        $stmt = $this->pdo->query("SELECT * FROM `news` WHERE `id` = {$id}");
        return $stmt->fetch();
    }
}
