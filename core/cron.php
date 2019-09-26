<?php

define("DSN", "mysql:host=blog.loc;dbname=blog");
define("DB_USER", "root");
define("DB_PASS", "");
    try {
        $pdo = new PDO(DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);        
} catch (PDOException $ex) {
       echo $ex->getMessage(); 
}
$stmt = $pdo->query("SELECT * FROM users WHERE verifyed='0'");
$count = 0;
while($row = $stmt->fetch()){
    $row['login'];
    $pdo->query("DELETE FROM users WHERE verifyed='0'");
    $pdo->query("DELETE FROM passwords WHERE user='{$row['login']}'");
    $count++;
}

$filename = "../logs/cron.txt";
$fd = fopen($filename, "a+");
fwrite($fd, date("Y-m-d H:i:s") . " удалено $count записи/ей неверифицированных пользователей\r\n");
fclose($fd);