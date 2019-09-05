<?php


class ProfileModel {
    public $user;
    public function __construct(string $user) {
        require_once CLASSES . "/Users.php";
            $this->user = new Users($user);
            
        foreach ($_REQUEST as $key => $val){
            $this->user->setPhone($val);
            }
         
        if(isset($_POST['unload_file'])) {
            move_uploaded_file($_FILES['file']['tmp_name'], ROOT . "/img/profile_photo/" . $_SESSION['user'] . ".jpg");
            $this->user->setImgPath();
        } 
    }
    public function showLogin() {
        return $this->user->getLogin();
    }
}
