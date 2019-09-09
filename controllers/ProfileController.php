<?php

class ProfileController {
     public function actionIndex(){ 
         
        if (isset($_SESSION[session_id()])){
            
            $model = new model\ProfileModel($_SESSION[session_id()]);
            include_once VIEWS  . "/profile.php";  
        } else {
            echo "Сессия умерла";
        }   
        
            
       
    }
}
