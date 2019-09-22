<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/admin_users.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/admin_users.js"></script>
</head>
<body>
<div class="blank hidden">
    <div id="popUP">
        <div class="close"></div>
        <div class="inputs">
          <table>
              <tr class="table_top">
               <th>Дата/время</th>
               <th>Заголовок</th>
               <th>Текст</th>
               <th>img</th>
           </tr>
          </table>
           <div class="fields">
           <div class="id"></div>
            <input id="date" type="text">
            <input id="subject" type="text">
            <textarea name="" id="text" cols="5" rows="1"></textarea>
            <input id="img_path" type="text">
            </div>
        </div>
        <div class="save">Cохранить</div>
    </div>
</div>
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
    <main></main>