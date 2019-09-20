<?php

class NewsController 
{
    private $model;
    private $user;
    private $news;
    private $likes;
    
    public function __construct() 
    { 
        if(!empty($_SESSION[session_id()])){
            $this->user = new lib\Users($_SESSION[session_id()]);
        }   
    } 
    public function actionIndex($pdo)
    {
        $this->model = new model\NewsModel($pdo);
        $this->news = $this->model->getNews(100);
       //получаем все лайки текущего пользователя
        if($this->user instanceof \lib\Users){
        $this->likes = ((new lib\Like($pdo))->getLikesByUser($this->user));
        }
        require_once VIEWS . '/news.php';
    }
    public function actionView($pdo, int $id)
    {
        $model = new model\NewsModel($pdo);
        $model->updateViews($id, $this->user);
        $news = $model->getOneNews($id);
        $this->likes = new lib\Like($pdo);
        $like = $this->likes->getLikesByOneNews($id);
        $likes_current_user = $this->likes->getLikesByUser($this->user);
        require_once VIEWS . '/news_item.php';
    }
}
