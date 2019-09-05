<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author Роман
 */
class Users {
    private $login;
    private $password;
    private $email;
    private $tel;
    private $status;
    private $name;
    private $surname;
    private $img_path;
    private $pdo;


    public function __construct($login, $password = null, $tel = null, $email = null) {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $this->pdo=$pdo;
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->login = $login;
        $this->password = $password;
        $this->tel = $tel;
        $this->email = $email;
        
        
    }
    
    public function getLogin(): string {
        return $_SESSION['user'];
        
    }
    public function getPass(): string {
        return $this->getData("passwords", "pass", "user");
    }
    public function getName() {
        return $this->getData("users", "name");
    }
    public function getSurname() {
        return $this->getData("users", "surname");
    }
    public function getBDay() {
        return $this->getData("users", "bday");
    }
    public function getPhone() {
        return $this->getData("users", "phone");
    }
    public function setPhone($changed_data) {
        return $this->setData("users", "phone", $changed_data);
    }
    public function getEmail() {
        return $this->getData("users", "email");
    }
    public function getImgPath() {
        return $this->getData("users", "img");
    }
    public function setImgPath() {
  
        if (file_exists(ROOT . "/img/profile_photo/" . $this->login . ".jpg")){
            $this->img_path = "/img/profile_photo/" . $this->login . ".jpg";
        }
        $stmt = $this->pdo->prepare("UPDATE users SET img=:path_to_img WHERE login=:login");
        $res = $stmt->execute(array(
            ":path_to_img" => "$this->img_path",
            ":login" => $this->login
                ));
        return $this->img_path;
    }
    private function getData(string $table, string $select_field, $where_field = "login")
    {
        $stmt = $this->pdo->prepare("SELECT {$select_field} FROM {$table} WHERE {$where_field}=:login");
        $res = $stmt->execute(array(":login" => $this->login));
        $row = $stmt->fetch(PDO::FETCH_LAZY);
        return $row[0];
    }
    private function setData(string $table, string $set_field, $changed_data, $where_field = "login") {
  
        
        $stmt = $this->pdo->prepare("UPDATE {$table} SET {$set_field}=:changed_data WHERE {$where_field}=:login");
        $res = $stmt->execute(array(
            ":changed_data" => "$changed_data",
            ":login" => $this->login
                ));
        return $this->img_path;
    }
}
