<?php

namespace otherlibs;
class Mailer {
    private $mailer;
    private $message;
    public function __construct() {
$transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
  ->setUsername('Kosolapov-r@bk.ru')
  ->setPassword('romul1991')
;
$this->mailer = new Swift_Mailer($transport);

}
    


public function sendMsg($to, $body = "Базовое сообщение", $subj = "Базовый заголовок") {

    $this->message = (new Swift_Message($subj))
  ->setFrom(['Kosolapov-r@bk.ru' => 'Roman'])
  ->setTo($to)
  ->setBody($body)
  ;

// Send the message
$result = $this->mailer->send($this->message);
}

}
// Create a message
