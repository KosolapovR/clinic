<?php

namespace model;

class ProfileModel {
    public $user;
    public function __construct(string $user) {
        
            $this->user = new \lib\Users($user);
            //debugger($_REQUEST);
            foreach ($_REQUEST as $key => $val){
                $metod = "set" . $key;
                if (method_exists($this->user, $metod)){       
                    $this->user->$metod($val);
                }
            }
             //header("Location: profile");
        
        
         
        if(isset($_POST['unload_file'])) {
            
            move_uploaded_file($_FILES['file']['tmp_name'], ROOT . "/img/profile_photo/" . $_SESSION[session_id()] . ".jpg");
            
            $this->user->setImgPath();
            
            header("Location: profile");
        } 
       
    }
    public function showLogin() {
        return $this->user->getLogin();
    }
  
}
