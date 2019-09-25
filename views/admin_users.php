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
    <main>
     <h1>Все пользователи</h1>
     <table class="users">
           <tr class="table_top">
               <th>id</th>
               <th>Дата</th>
               <th>Login</th>
               <th>Имя</th>
               <th>Фамилия</th>
               <th>Bday</th>
               <th>phone</th>
               <th>email</th>
               <th>img</th>
               <th>verifyed</th>
           </tr>
           <?php foreach($users as $col): ?>
               <tr>
                <td class="id"><?=$col['id']?></td>
               <td class="date"><div><?=$col['date']?></div></td>
               <td class="login"><div><?=$col['login']?></div></td>
               <td class="name"><div><?=$col['name']?></div></td>
               <td class="surname"><div><?=$col['surname']?></div></td>
               <td class="bday"><div><?=$col['bday']?></div></td>
               <td class="phone"><div><?=$col['phone']?></div></td>
               <td class="email"><div><?=$col['email']?></div></td>
               <td class="img_path"><div><?=$col['img']?></div></td>
               <td class="verifyed"><div><?=$col['verifyed']?></div></td>     
               <td><div class="delete delete_user"></div></td>
           </tr>
           <?php endforeach;?>
       </table>
    </main>
</body>
