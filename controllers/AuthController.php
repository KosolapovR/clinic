<?php

class AuthController {
    
    public function actionIndex(){
         //исходная страница до введения данных в форму
        if(!isset($_REQUEST['registration'])){
            $text_info = '';
            include_once VIEWS . "/auth.php";
        // обработка введенных данных
        }else{         
            //Занят ли Логин 
            if(model\LoginModel::userExists($_REQUEST['name'])){ 
            //сохранение в переменную информационной строки
             $text_info = "<h4 class=\"text_info\">этот логин уже занят</h4>";
             include_once VIEWS . "/auth.php";
            } else {
            //Если Логин не занят, проводим регистрацию
            //проверка на заполненность всех полей
            if(!filter_has_var(INPUT_POST, 'name') ||
                strlen(trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING))) <= 3) {
                //сохранение в переменную информационной строки
                $text_info = "<h4 class=\"text_info\"> неверный формат логина</h4>";
                include_once VIEWS . "/auth.php";
                } else if (!filter_has_var(INPUT_POST, 'pass') ||
                strlen(trim(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING))) <= 5) {
                //сохранение в переменную информационной строки
                $text_info = "<h4 class=\"text_info\"> неверный формат пароля</h4>";
                include_once VIEWS . "/auth.php";
                } else if (!filter_has_var(INPUT_POST, 'tel') ||
                strlen(trim(filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING))) <= 5) {
                //сохранение в переменную информационной строки
                $text_info = "<h4 class=\"text_info\"> неверный формат телефона</h4>";
                include_once VIEWS . "/auth.php";
                } else if (!filter_has_var(INPUT_POST, 'email') ||
                strlen(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL))) <= 4) {
                //сохранение в переменную информационной строки
                $text_info = "<h4 class=\"text_info\"> неверный формат email</h4>";
                include_once VIEWS . "/auth.php";
                } else {
                    //если все поля заполнены пытаемся добавить пользователя в БД
                        if (model\AuthModel::addNewUser($_REQUEST['name'], $_REQUEST['pass'], $_REQUEST['tel'], $_REQUEST['email'])){

                        $cur_user = new lib\Users($_REQUEST['name'], $_REQUEST['pass'], $_REQUEST['tel'], $_REQUEST['email']);
                        $code = model\AuthModel::verifyEmail($_REQUEST['email'], $_REQUEST['name']);
                        $cur_user->setVerifyCode($code);  
                        header("Location: login");            
                        }
                }
            }       
        }
    }
}
