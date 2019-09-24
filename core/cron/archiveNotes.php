<?php

session_start();
define("ROOT", dirname(dirname(__DIR__)));

require_once  ROOT . '/config/configuration.php';

$current_date = date('Y-m-d');

try {
 $notes_count = \lib\DBlink::getInstance()->query("SELECT COUNT(*) FROM queue WHERE date < '$current_date'")->fetchColumn(); 
  \lib\DBlink::getInstance()->query("INSERT INTO archeve(queue_id, category, doctor, user, date, time) SELECT id, category, doctor, user, date, time FROM queue WHERE date < '$current_date'");
  \lib\DBlink::getInstance()->query("DELETE FROM queue WHERE date < '$current_date'");  
  $fd = fopen('../cron.txt', 'a+');
  fwrite($fd, date("Y-m-d H:i:s") . " перемещено в архив $notes_count записей из очереди\r\n");
  fclose($fd);
} catch (\PDOException $exc) {
    echo $exc->getTraceAsString();
    die();
}