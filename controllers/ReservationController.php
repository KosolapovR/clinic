<?php

class ReservationController 
{
    public static $category;
    private $model;
    
    public function actionIndex()
    {
        $this->model = new model\ReservationModel($_SESSION[session_id()]);
        require_once VIEWS . '/reservation.php';
    }
    public function actionCategory()
    {
        $uri = trim($_SERVER['REQUEST_URI'], "/");
        $segments = explode('/', $uri);
        ReservationController::$category = array_pop($segments);       
        require_once VIEWS . '/reservation.php';      
    }
}
