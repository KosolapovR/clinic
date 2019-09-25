<?php

class AdminController 
{
    private $model;
    private static $section;
    public function actionIndex()
    {
        $this->model = new model\AdminModel(\lib\DBlink::getInstance());
        require_once VIEWS . '/admin.php';
    }
    public function actionView()
    {
        $this->model = new \model\NewsModel(\lib\DBlink::getInstance());
        $news = $this->model->getNews(15);
        $users = lib\Users::getAllUsers();
        $doctors = lib\Doctor::getAllDoctors();
        $shedule = lib\Queue::getAllNotes();
        //отбираем уникальные значения таблицы Queue для фильтрации данных
        //в админпанели
        $uniq_user = [];
        $uniq_doctor = [];
        $uniq_date = [];
        $uniq_time = [];
        $uniq_category = [];
        $uniq_arr = ['category', 'doctor', 'user', 'date', 'time'];
        foreach ($shedule as $notes => $note) {
            foreach($note as $col => $val){
                if(in_array($col, $uniq_arr)){
                    switch ($col){
                        case('category'):
                            if(!in_array($val, $uniq_category)){
                                array_push($uniq_category, $val);
                            }
                            break;
                        case('doctor'):
                            if(!in_array($val, $uniq_doctor)){
                                array_push($uniq_doctor, $val);
                            }
                            break;
                        case('user'):
                            if(!in_array($val, $uniq_user)){
                                array_push($uniq_user, $val);
                            }
                            break;
                        case('date'):
                            if(!in_array($val, $uniq_date)){
                                array_push($uniq_date, $val);
                            }
                            break;
                        case('time'):
                            if(!in_array($val, $uniq_time)){
                                array_push($uniq_time, $val);
                            }
                            break;
                    }
                } 
            }
            //
        }
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
