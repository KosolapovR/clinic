<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");//HTTP/1.1
class ProfileController {
     public function actionIndex(){ 
         
        if (isset($_SESSION['user'])){
            
            require_once MODELS . "/ProfileModel.php";
            $model = new ProfileModel($_SESSION['user']);
            include_once VIEWS  . "/profile.php";  
        } else {
            echo "Сессия умерла";
        }   
        
            
       
    }
}
