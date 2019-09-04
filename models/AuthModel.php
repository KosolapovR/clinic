<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthModel
 *
 * @author Роман
 */
class AuthModel {
    public static function addNewUser($login, $password, $phone, $email){
      if(isset($_REQUEST['registration'])){
            require CORE . '/DBconnect.php';
            $date = Date("d-m-y");

           
            //добавление в таблицу Users
            $stmtPhone = $pdo->prepare("INSERT INTO `users`(`login`, `phone`, `email`, `date`) VALUES (:login, :phone, :email, :date)");
             
           
            $stmtPhone->execute(array(
                ':login' => $login,
                ':phone' => $phone,
                ':email' => $email,
                ':date' => $date
            ));            
            
            //Добавление в таблицу passwords
            $stmt = $pdo->prepare("INSERT INTO `passwords`(`user`, `pass`) VALUES (:login, :password)");
            $stmt->execute(array(
                ':login' => $login,
                ':password' => $password
            ));
            
            
            
        } 
    }
}
