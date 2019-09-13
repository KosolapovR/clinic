<?php

class ProfileController {
     public function actionIndex($pdo){ 
         
        if (isset($_SESSION[session_id()])){
            
            $model = new model\ProfileModel($_SESSION[session_id()], $pdo);
            $user = new lib\Users($model->showLogin());
            $notes = $model->showNotes($user, $pdo);
           
            include_once VIEWS  . "/profile.php";  
        } else {
            echo "Сессия умерла";
        }   
        
            
       
    }
}
