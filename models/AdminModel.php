<?php

namespace model;

class AdminModel 
{
    private $doctors, $users, $notes, $archiveNotes, $news;
    public function __construct() 
    {
        $this->archiveNotes = \lib\Queue::getArcheveNotes();
        $this->notes = \lib\Queue::getAllNotes();
        $this->doctors = \lib\Doctor::getAllDoctors();
        $this->users = \lib\Users::getAllUsers();
        $this->news = (new NewsModel())->getNews();
    }
    
    public function getCount($param) 
    {
        switch ($param){
            case "doctors":
                return count($this->doctors);             
                break;
            case "news":
                return count($this->news);
                break;
            case "users":
                return count($this->users);
                break;
            case "activeNotes":
                return count($this->notes);
                break;
            case "archeveNotes":
                return count($this->archiveNotes);
                break;
            default:
                throw new \exceptions\PageNotFoundException();
        }
    }
}
