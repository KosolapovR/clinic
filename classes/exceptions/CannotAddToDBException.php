<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace exceptions;

/**
 * Description of CannotAddToDBException
 *
 * @author Роман
 */
class CannotAddToDBException extends \Exception
{
    public function __construct() 
    {
        parent::__construct();
    }
    public function showMsg(){
        echo 'не удалось добавить пользователя в Базу данных';
    }
}
