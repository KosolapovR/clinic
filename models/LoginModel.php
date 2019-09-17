<?php


namespace model;

class LoginModel {
    public static function checkLogin(string $username, string $password, \PDO $pdo): bool
    {
        try{
            $stmt = $pdo->prepare("SELECT * FROM passwords WHERE pass=:password AND user=:username");
            $stmt->execute(array(
                ':password' => md5($password . SECRET_WORD),
                ':username' => $username));
            $result = $stmt->fetchAll();
            //если логин и пароль есть в базе данных возвращаем true
            if($result) {
                return true;
            } else {
                return false;
            } 
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
    public static function userExists(string $username, $pdo): bool
    { 
        try{
           
            $stmt = $pdo->prepare("SELECT * FROM passwords WHERE user=:username");
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
