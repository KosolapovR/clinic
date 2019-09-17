<?php


class LoginController {
    
    public function actionIndex(\PDO $pdo){
        //вызов модели   
        $text_info = "";
        if(isset($_REQUEST['login'])) {
           include_once MODELS . "/LoginModel.php";
        
            //проверка наличия пользователя в списке зарегистрированных
            if(model\LoginModel::checkLogin($_REQUEST['name'], $_REQUEST['pass'], $pdo)){
                //редирект на главную страницу, ползователь существует

                $_SESSION[session_id()] = $_REQUEST['name'];
                
                
                header("Location: main");
            } else {
                $text_info = "некорректный логин и/или пароль";
            }
            
        }
            
        //вызов представления базовый сценарий
        include_once VIEWS . "/login.php";
        
    }
}
