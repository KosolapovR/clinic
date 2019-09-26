<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
define("ROOT", dirname(__DIR__));
require_once  ROOT . '/config/configuration.php';

$fd = fopen('data.csv', 'w');
$header = array('id', 'Категория', 'Доктор', 'Дата', 'Время', 'Пациент');
foreach ($header as $key => $value) {
        $header[$key] = iconv(mb_detect_encoding($header[$key]), "windows-1251", $value);  
    }
fputcsv($fd, $header);

//избавляемся от крокозябр в CSV файле, меняем кодировку на windows-1251 
foreach ($_POST['data'] as $id) {
    if($_POST['table'] == 'archeve'){
        $note = lib\Queue::getArcheveNotesByID($id)[0];
    } else{
        $note = lib\Queue::getNotesByID($id)[0];
    }
    
    foreach ($note as $key => $value) {
        $note[$key] = iconv(mb_detect_encoding($note[$key]), "windows-1251", $value);  
    }
    fputcsv($fd, $note);
}
fclose($fd);

print_r($_POST['data']); 
