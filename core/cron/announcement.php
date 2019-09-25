<?php
define("ROOT", dirname(dirname(__DIR__)));
require_once  ROOT . '/config/configuration.php';

//отправляет письма с уведомлением о записи на завтра
function sendAnnouncementMail($login, $date, $time)
{
    $user = new lib\Users($login);
    $email = $user->getEmail();
    
    $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
    ->setUsername('Kosolapov-r@bk.ru')
    ->setPassword('romul1991')
    ;
    $mailer = new \Swift_Mailer($transport);
    $message = (new \Swift_Message("Напоминание о визите"))
    ->setFrom(['Kosolapov-r@bk.ru' => 'Roman'])
    ->setTo($email)
    ->addPart("<p>Здравствуйте $login! Напоминаем Вам, что завтра $date в $time Вы записаны на прием к врачу, пожалуйста не опаздывайте.</p>", 'text/html')  
    ;
    // Send the message
    if($result = $mailer->send($message)){
        $str = 'Отослано напоминание -> ' . $login . ' посещение ' . $date . ' в ' . $time . "\r\n";
        $fd = fopen(ROOT . '/logs/SendedMail.txt', 'a+');
        fwrite($fd, $str);
        fclose($fd);
    }
}
$date = new DateTime();
$date = date_add($date, date_interval_create_from_date_string('1 day'));
$date = $date->format('Y-m-d');

//получаем массив записей с датой исполнения завтра:
$arr = lib\Queue::getNotes($date);



foreach($arr as $notes => $note){
    sendAnnouncementMail($note['user'], $note['date'], $note['time']);
}


