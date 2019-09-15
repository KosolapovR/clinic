<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsController
 *
 * @author Роман
 */
class NewsController {
    private $model;
    private $user;
    private $news;
    private $likes;
    public function __construct() { 
        $this->user = new lib\Users($_SESSION[session_id()]);
    }
    
    public function actionIndex($pdo)
    {
       
        $this->model = new model\NewsModel($pdo);
        $this->news = $this->model->getNews();
       //получаем все лайки текущего пользователя
        $this->likes = ((new lib\Like($pdo))->getLikesByUser($this->user));
        require_once VIEWS . '/news.php';
    }
    public function actionView($pdo, int $id)
    {
        $model = new model\NewsModel($pdo);
        $news = $model->getOneNews($id);
        $this->likes = new lib\Like($pdo);
        $like = $this->likes->getLikesByOneNews($id);
        $likes_current_user = $this->likes->getLikesByUser($this->user);
        require_once VIEWS . '/news_item.php';
        //echo $id;
    }
}
