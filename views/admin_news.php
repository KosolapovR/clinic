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
     <h1>Добавить новость</h1>
      <div class="add_news_container">
            <table class="add_news">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>img</th>
                </tr>
                <tr>
                    <td><input id="add_date" type="text"></td>
                    <td><input id="add_subject" type="text"></td>
                    <td><textarea id="add_text" name=""></textarea></td>
                    <td><input id="add_img" type="text"></td>
                    <td id="add_btn">Добавить</td>
                </tr>
            </table>
        </div>
       <h1>Список всех новостей</h1>
       <table class="news">
           <tr class="table_top">
               <th>id</th>
               <th>Дата/время</th>
               <th>Заголовок</th>
               <th>Текст</th>
               <th>img</th>
               <th>like</th>
               <th>view</th>
           </tr>
           <?php foreach($news as $col): ?>
           <tr class="id_<?=$col['id']?>">
               <td class="id"><?=$col['id']?></td>
               <td class="date"><div><?=$col['date']?></div></td>
               <td class="subject"><div><?=$col['subject']?></div></td>
               <td class="text" width="450"><div><?=$col['text']?></div></td>
               <td class="img_path"><div><?=$col['img_path']?></div></td>
               <td><?=$col['love']?></td>
               <td><?=$col['views']?></td>
               <td><div title="Редактировать" class="edit"></div></td>
               <td><div title="Удалить" class="delete delete_news"></div></td>
           </tr>
           <?php endforeach;?>
       </table>
    </main>
</div>
</body>
</html>
