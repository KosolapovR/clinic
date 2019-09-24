<?php

namespace lib;

class Category 
{
    public static function getCountDoctors($category)
    {
        return \lib\DBlink::getInstance()->query("SELECT COUNT(*) FROM doctors WHERE category = '{$category}'")->fetchColumn();;
    }
    
}
