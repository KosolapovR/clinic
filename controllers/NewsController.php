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
    public function actionIndex()
    {
        $this->model = new model\NewsModel();
        $this->news = $this->model->getNews(100);
       //получаем все лайки текущего пользователя
        if($this->user instanceof \lib\Users){
        $this->likes = ((new lib\Like())->getLikesByUser($this->user));
        }
        require_once VIEWS . '/news.php';
    }
    public function actionView(int $id)
    {
        $model = new model\NewsModel();
        $model->updateViews($id, $this->user);
        $news = $model->getOneNews($id);
        $this->likes = new lib\Like();
        $like = $this->likes->getLikesByOneNews($id);
        $likes_current_user = $this->likes->getLikesByUser($this->user);
        require_once VIEWS . '/news_item.php';
    }
}
