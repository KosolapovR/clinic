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
        <h1>Добавить доктора</h1>
      <div class="add_news_container">
            <table class="add_news">
                <tr>
                    <th>Имя</th>
                    <th>Категория</th>
                    <th>Описание</th>
                    <th>img</th>
                </tr>
                <tr>
                    <td><input id="add_name" type="text"></td>
                    <td><input id="add_category" type="text"></td>
                    <td><textarea id="add_desctiption" name=""></textarea></td>
                    <td><input id="add_img" type="text"></td>
                    <td id="add_doc_btn">Добавить</td>
                </tr>
            </table>
        </div>
     <h1>Все доктора</h1>
     <table class="users">
           <tr class="table_top">
               <th>id</th>
               <th>Имя</th>
               <th>Описание</th>
               <th>Категория</th>
               <th>img</th>       
           </tr>
           <?php foreach($doctors as $col): ?>
                <td class="id"><?=$col['id']?></td>
               <td class="name"><div><?=$col['name']?></div></td>
               <td class="description"><div><?=$col['description']?></div></td>
               <td class="category"><div><?=$col['category']?></div></td>
               <td class="img_path"><div><?=$col['img_path']?></div></td>       
               <td><div class="delete delete_doctors"></div></td>
           </tr>
           <?php endforeach;?>
       </table>
    </main>
</body>