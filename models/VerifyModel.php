<?php

namespace model;

class VerifyModel 
{
    public static function changeVerifyStatus($login, $code) 
    {
        $code = urldecode($code);
        $user = new \lib\Users($login);
        
        if($code == $user->getVerifyCode()){
            $user->updateVerifyStatus();
            header("Location: main");
            exit();
        } else {
            echo $user->getVerifyCode();
            echo "<br>";
            echo $code;
            echo 'несовпадение кодов';
        }
  
    }
}
