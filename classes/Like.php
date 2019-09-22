<?php

namespace lib;

/**
 * Description of like
 *
 * @author Роман
 */
class Like {
    private $pdo;
    public function __construct() {
        $this->pdo = \lib\DBlink::getInstance();
    }
    public function getLikesByUser(Users $user): array {
        $id = $user->getID();
        $stmt = $this->pdo->query("SELECT * FROM likes WHERE user_id = {$id}");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getLikesByOneNews($news_id){
        $quantity = $this->pdo->query("SELECT * FROM `news` WHERE `id` = '{$news_id}'")->fetch();
        return $quantity;
    }
}
