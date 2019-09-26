<?php


namespace model;

class LoginModel {
    public static function checkLogin(string $username, string $password): bool
    {
        try{
            $stmt = \lib\DBlink::getInstance()->prepare("SELECT * FROM passwords WHERE pass=:password AND user=:username");
            $stmt->execute(array(
                ':password' => md5($password . SECRET_WORD),
                ':username' => $username));
            $result = $stmt->fetchAll();
            //если логин и пароль есть в базе данных возвращаем true
            if($result) {
                //реализуем запоминание пользователя и запись в куки
                if(!empty($_POST['remember'])){
                    $str = $_POST['name'];
                    $str .= "/////";
                    //генерируем куку
                    for($i = 1; $i <= 16; $i++){
                        $rand = mt_rand(33, 126);
                        while ($rand == 60 || $rand == 43){
                            $rand = mt_rand(33, 126);
                        }
                         $str .= chr($rand);
                    }
                    $str .= $_SERVER['REMOTE_ADDR'];
                    if(setcookie('auth', $str, time() + 60*60*24)){
                        //запись строки куки в БД
                       $stmt = \lib\DBlink::getInstance()->prepare("UPDATE passwords SET cookies=:cookie WHERE user=:user");
                       $stmt->execute(array(
                            ':cookie' => $str,
                           ':user' => $_POST['name']));
                    }          
                    
                }
                return true;
            } else {
                return false;
            } 
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    public static function userExists(string $username): bool
    { 
        try{
           
            $stmt = \lib\DBlink::getInstance()->prepare("SELECT * FROM passwords WHERE user=:username");
            $stmt->execute(array(
                ':username' => $username));
            $result = $stmt->fetchAll();
            if($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }   
    }
}
