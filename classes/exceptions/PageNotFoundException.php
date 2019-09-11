<?php

namespace exceptions;

class PageNotFoundException extends \Exception
{
    public function __construct() 
    {
        parent::__construct();
    }
    public function getView() {
        require_once VIEWS . "/404.php";
    }
}
