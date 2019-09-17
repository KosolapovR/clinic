<?php

namespace model;

class ProfileModel 
{
    public $user;
    
    public function __construct(string $user, \PDO $pdo) 
    {
        $this->user = new \lib\Users($user);
            //динамическое заполнение полей профиля и сохранение
            foreach ($_REQUEST as $key => $val){
                $metod = "set" . $key;
                if (method_exists($this->user, $metod)){       
                    $this->user->$metod($val);
                }
            }
            //отображение фото профиля
        if(isset($_POST['unload_file'])) {         
            move_uploaded_file($_FILES['file']['tmp_name'], ROOT . "/img/profile_photo/" . $_SESSION[session_id()] . ".jpg");
            $this->user->setImgPath();
            header("Location: profile");
        } 
    }
    public function showNotes(\lib\Users $user, \PDO $pdo)
    {
        return \lib\Queue::getNotesByUser($user, $pdo);
    }
    public function showLogin() 
    {
        return $this->user->getLogin();
    }
}
