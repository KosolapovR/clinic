<?php
require_once 'core/functions.php';

class Router {
    
    public static function run() {
        //Считываем адрес из URI
       $uri = trim($_SERVER['REQUEST_URI'], "/");
       if ($uri == null){
           $uri = "main"; 
       }   
       if ($uri == 'exit'){   
           session_unset();
           $uri = "main"; 
       }

       //Проверяем на наличие в роутах
       $routes = include_once 'core/routes.php';
       
       foreach($routes as $uri_pattern => $path){
           if (preg_match("~$uri_pattern~", $uri)){
               $segments = explode("/", $path);
               
        //выделяем название контроллера и экшина
               $controller = array_shift($segments) . "Controller";
               $action_name = ucfirst(array_shift($segments));    
               if ($action_name != null){
               $action = "action" . $action_name; 
               }     
               $controller_path = "controllers/" . $controller . ".php";
               //echo "<br>" . $controller_path; 
               if(file_exists($controller_path)){
                   require_once $controller_path;
                   $controller_object = new $controller;
                   if(method_exists($controller_object, $action)){
                       $controller_object->$action();
                   
                   } else {
                       $controller_object->$action();
                   }
                   
                   break;
               }
           }
       }
    }
}
