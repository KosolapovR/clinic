<?php
namespace model;

class NewsModel {
    private $pdo;
    private static $pdo_static;
    private $user;
    public function __construct(\PDO $pdo) 
    {
        self::$pdo_static = $pdo;
        $this->pdo = $pdo;
        if(isset($_SESSION[session_id()])){
            $this->user = new \lib\Users($_SESSION[session_id()]);
        }
        
    }

    public function addNews($date, $subject, $text, $img_path) 
    {
        $stmt = $this->pdo->query("INSERT INTO `news` (`date`, `subject`, `text`, `img_path`) VALUES ('{$date}', '{$subject}', '{$text}', '{$img_path}')");
        if($stmt){
            return "Новость добавлена";
        } else{
            return "Не удалось добавить новость";
        }
    }
    public function getNews(int $quantity = 5):array 
    {
        $stmt = $this->pdo->query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT {$quantity}");
        return $stmt->fetchAll();
    }
    public function getOneNews($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM `news` WHERE `id` = {$id}");
        return $stmt->fetch();
    }
    // Обновляем количество просмотров новости с учетом того
    // Что бы один юзер не мог обновлять просмотры чаще чем раз в 60 * 60 сек
    // Создаем сессию с привязкой к конкретной новости и конкретному юзеру
    // Кладем в нее время просмотра нововости
    public function updateViews($id, \lib\Users $user):bool
    { 
        $time = new \DateTime();

        // если сессии еще не существует (юзер первый раз смотрит новость)
        if(!isset($_SESSION['last_view' . $id . "user_id" . $user->getID()])){
            $_SESSION['last_view' . $id . "user_id" . $user->getID()] = $time->getTimestamp();
            $stmt = $this->pdo->query("UPDATE `news` SET  `views` = `views` + 1 WHERE `id` = {$id}");
        }
            try {
                // если сессии уже существует (юзер не первый раз смотрит новость)
                // проверяем на разницу во времени
                if($time->getTimestamp() - $_SESSION['last_view' . $id . "user_id" . $user->getID()] > 60*60){
                    $stmt = $this->pdo->query("UPDATE `news` SET  `views` = `views` + 1 WHERE `id` = {$id}");
                    $_SESSION['last_view' . $id . "user_id" . $user->getID()] = $time->getTimestamp();
                } else{
                return true;
                }      
            } catch (\PDOException $ex) {
                echo 'ошибка подключения к БД <br>';
                echo $ex->getMessage(); 
                die();
            }
            
            // проверка успеха запроса в БД
            if(is_object($stmt)){
                return true;
            } else {
                return false;
            }        
    }
    //Редактирование новостей в админпанеле
    public function updateNews($id, array $data):bool
    {
        $statement = "UPDATE `news` SET";
        //счетчик для определения первой итерации в цикле
        //необходимо правильно расставить запятые
        //нужно добавить проверку типа введенной даты
        $i = 0;
        foreach($data as $key => $value){
            if($key != 'id'){  
                if($i == 0){
                    $statement .= " `$key`='{$value}'";
                } else {
                    $statement .= ", `$key`='{$value}'";
                }
            }
            $i++;
        }
        $statement .= " WHERE `id`={$id}";
        //echo $statement;  
        try {
            $result = $this->pdo->query($statement);
        } catch (\PDOException $exc) {
            echo $exc->getTraceAsString();
            return false;
        }

        return true;
    }
}
