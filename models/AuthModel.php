<?php

namespace model;

class AuthModel {
    public static function addNewUser($login, $password, $phone, $email)
    {
      if(isset($_REQUEST['registration'])){
            
            require CORE . '/DBconnect.php';
            $date = Date("d-m-y");
    
            //добавление в таблицу Users
        try {
            if(!isset($login) || !isset($password) || !isset($phone) || !isset($email)){
                throw new \exceptions\CannotAddToDBException();
                die();
            }    
            $stmtPhone = $pdo->prepare("INSERT INTO `users`(`login`, `phone`, `email`, `date`) VALUES (:login, :phone, :email, :date)");
             
           
            $stmtPhone->execute(array(
                ':login' => $login,
                ':phone' => $phone,
                ':email' => $email,
                ':date' => $date
            ));            
        } catch (\exceptions\CannotAddToDBException $ex) {
                $ex->showMsg();
                return false;
        }   
            
            
            //Добавление в таблицу passwords
            try {
                $stmt = $pdo->prepare("INSERT INTO `passwords`(`user`, `pass`) VALUES (:login, :password)");
                $pass = md5($password . SECRET_WORD);
                $stmt->execute(array(
                ':login' => $login,
                ':password' => $pass
            ));
            } catch (\exceptions\CannotAddToDBException $ex) {
                $ex->showMsg();
                return false;
            }
        } 
        return true;
    }
    
    public static function verifyEmail($email, $login)
    {       
    $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
    ->setUsername('Kosolapov-r@bk.ru')
    ->setPassword('romul1991')
    ;
    $mailer = new \Swift_Mailer($transport);
    $code = urlencode(self::generateCode());
    $link = "http://blog.loc/verify?code=$code&login_id=$login";
    $message = (new \Swift_Message("Подтверждение регистрации"))
    ->setFrom(['Kosolapov-r@bk.ru' => 'Roman'])
    ->setTo($email)
    ->addPart("<p>Здравсвуйте $login,  в течении 1 дня вы должны пройти по указанной сслыке "
          . "<a href='$link'>$link</a>, иначе ваш аккаунт не будет авторизирован.</p>", 'text/html')  
    ;
    // Send the message
    if($result = $mailer->send($message)){
        return $code;
    }
    
    }
    
    private static function generateCode()
    {    
        $code = "";
        for($i = 1; $i <= 16; $i++){  
            $rand = mt_rand(32,122);
            while($rand == 60){
                $rand = mt_rand(32,122);  
            }
            $code .= chr($rand);
        }
        return $code;
    }
}
