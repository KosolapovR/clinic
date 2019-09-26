<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/admin_console.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/admin_users.js"></script>
</head>
<body>
<div class="whrapper">
    <nav class="panel">
        <ul class="menu">
            <li><a href="http://blog.loc/admin/console">Консоль</a></li>
            <li><a href="http://blog.loc/admin/news">Новости</a></li>
            <li><a href="http://blog.loc/admin/users">Пользователи</a></li>
            <li><a href="http://blog.loc/admin/doctors">Доктора</a></li>
            <li><a href="http://blog.loc/admin/schedule">График</a></li>
        </ul>
    </nav>
    <main>
        <div class="console_whrapper">
            <div class="card card-Users">
                <a href="<?=$_SERVER['SERVER_NAME']?>/admin/users">Пользователи: <?=$this->model->getCount('users')?></a>
            </div>
            <div class="card card-Doctors">
                <a href="<?=$_SERVER['SERVER_NAME']?>/admin/doctors">Доктора: <?=$this->model->getCount('doctors')?></a>
            </div>
            <div class="card card-News">
                <a href="<?=$_SERVER['SERVER_NAME']?>/admin/news">Новости: <?=$this->model->getCount('news')?></a>
            </div>
            <div class="card card-ActiveNotes">
                <a href="<?=$_SERVER['SERVER_NAME']?>/admin/schedule">Текущие записи: <?=$this->model->getCount('activeNotes')?></a>
            </div>
            <div class="card card-CompletedNotes">
                <a href="<?=$_SERVER['SERVER_NAME']?>/admin/schedule">Архивные записи: <?=$this->model->getCount('archeveNotes')?></a>
            </div>
        </div>
    </main>