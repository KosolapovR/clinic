<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

/**
 * Description of VerifyModels
 *
 * @author Роман
 */
class VerifyModel {
    public static function changeVerifyStatus($login, $code) {
        $code = urldecode($code);
        $user = new \lib\Users($login);

        if($code == $user->getVerifyCode()){
            $user->updateVerifyStatus();
            header("Location: main");
            exit();
        } else {
            echo 'несовпадение кодов';
        }
        
    }
}
