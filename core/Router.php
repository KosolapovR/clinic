<?php
require_once 'core/functions.php';

class Router {
    
    public static function run() {
        //Считываем адрес из URI
        $uri = trim($_SERVER['REQUEST_URI'], "/");
      
        //перебрасываем на главную если URI пустой или == exit
        if ($uri == null){
            $uri = "main"; 
        }   
        if ($uri == 'exit'){   
            session_unset();
            $uri = "main"; 
        }

        //Проверяем на наличие в роутах
        $routes = include_once 'core/routes.php';
        try{
            foreach($routes as $uri_pattern => $path){
                if (preg_match("~$uri_pattern~", $uri)){
                    $segments = explode("/", $path);
                    //выделяем название контроллера и экшина
                    $controller = array_shift($segments) . "Controller";
                    $action = "action" . ucfirst(array_shift($segments));
                    
                    //Обработка параметров для страницы новостей
                    if($controller == 'newsController' && count(explode("/", $uri)) == 2){
                        $param = (int)(explode("/", $uri)[1]);            
                    } else {
                        $param = null;
                        if($controller == 'newsController' && count(explode("/", $uri)) > 2){
                            throw new exceptions\PageNotFoundException();
                        }
                    }
                   
                    
                    $controller_path = "controllers/" . $controller . ".php";

                    if(file_exists($controller_path)){
                        require_once $controller_path;
                        $controller_object = new $controller();
                        
                        if(method_exists($controller_object, $action)){ 
                            $controller_object->$action($param);
                        } 
                        break;
                    } 
                }
            }
            //если введеный URI отсутствует в роутах выбрасываем исключение:
            if(!isset($segments)){
                throw new exceptions\PageNotFoundException();
            }  
        } catch (exceptions\PageNotFoundException $ex) {
            $ex->getView();
        }    
    }
}