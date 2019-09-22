<?php

class AdminController 
{
    private $model;
    private static $section;
    public function actionIndex(\PDO $pdo)
    {
        $this->model = new model\AdminModel(\lib\DBlink::getInstance());
        require_once VIEWS . '/admin.php';
    }
    public function actionView(\PDO $pdo)
    {
        $this->model = new \model\NewsModel(\lib\DBlink::getInstance());
        $news = $this->model->getNews(15);
        $uri = trim($_SERVER['REQUEST_URI'], "/");
        $segments = explode('/', $uri);
        self::$section = array_pop($segments); 
        
        try {
            if(file_exists(VIEWS . '/admin_' . self::$section . '.php')){
                require_once VIEWS . '/admin_' . self::$section . '.php';
            } else {
                throw new exceptions\PageNotFoundException;
            }
        } catch (exceptions\PageNotFoundException $exc) {
            $exc->getView();
        }      
    }
}
