<?php

namespace lib;

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

    public function __construct($login, $password = null, $tel = null, $email = null) 
    {
        $pdo = new \PDO(DSN, DB_USER, DB_PASS);
        $this->pdo=$pdo;
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $this->login = $login;
        $this->password = $password;
        $this->tel = $tel;
        $this->email = $email;
        
        
    }
    public function getLogin(): string 
    {
        return $_SESSION[session_id()];
        
    }
    public function getPass(): string 
    {
        return $this->getData("passwords", "pass", "user");
    }
    public function getName() 
    {
        return $this->getData("users", "name");
    }
    public function setName($changed_data) 
    {
        return $this->setData("users", "name", $changed_data);
    }
    public function getSurname() 
    {
        return $this->getData("users", "surname");
    }
    public function setSurname($changed_data) 
    {
        return $this->setData("users", "surname", $changed_data);
    }
    public function getBDay() 
    {
        return $this->getData("users", "bday");
    }
    public function setBDay($changed_data) 
    {
        return $this->setData("users", "bday", $changed_data);
    }
    public function getPhone() 
    {
        return $this->getData("users", "phone");
    }
    public function setPhone($changed_data) 
    {
        return $this->setData("users", "phone", $changed_data);
    }
    public function getEmail() 
    {
        return $this->getData("users", "email");
    }
    public function setEmail($changed_data) 
    {
        return $this->setData("users", "email", $changed_data);
    }
    public function getImgPath() 
    {
        return $this->getData("users", "img");
    }
    public function setImgPath()
    {
  
        if (file_exists(ROOT . "/img/profile_photo/" . $this->login . ".jpg")){
            $this->img_path = "/img/profile_photo/" . $this->login . ".jpg";
        }
        return $this->setData("users", "img",  $this->img_path);
    }
    public function getVerifyCode() 
    {
        return $this->getData("users", "verifycode");
    }
    public function setVerifyCode($changed_data) 
    {
        $changed_data = urldecode($changed_data);
        return $this->setData("users", "verifycode", $changed_data);
    }
    public function updateVerifyStatus() 
    {
        return $this->setData("users", "verifyed", 1);
    }
    private function getData(string $table, string $select_field = "*", $where_field = "login")
    {
        $stmt = $this->pdo->prepare("SELECT {$select_field} FROM {$table} WHERE {$where_field}=:login");
        $res = $stmt->execute(array(":login" => $this->login));
        $row = $stmt->fetch(\PDO::FETCH_LAZY);
        return $row[0];
    }
    private function setData(string $table, string $set_field, $changed_data, $where_field = "login") 
    { 
        $stmt = $this->pdo->prepare("UPDATE {$table} SET {$set_field}=:changed_data WHERE {$where_field}=:login");
        $res = $stmt->execute(array(
            ":changed_data" => "$changed_data",
            ":login" => $this->login
                ));
        return $changed_data;
    }
}
