<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VerifyController
 *
 * @author Роман
 */
class VerifyController 
{
    public function actionIndex()
    {
        if(!empty($_GET['code'])){
            model\VerifyModel::changeVerifyStatus($_GET['login_id'], $_GET['code']);
        } else {
            echo 'Не определена ссылка';
        }
    }
}
