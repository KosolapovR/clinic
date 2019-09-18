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
       <h1>Список всех новостей</h1>
       <table>
           <tr class="table_top">
               <th>id</th>
               <th>Дата/время</th>
               <th>Заголовок</th>
               <th>Текст</th>
               <th>img</th>
               <th>лайки</th>
               <th>просмотры</th>
           </tr>
           <?php foreach($news as $col): ?>
           <tr>
               <td class="id"><?=$col['id']?></td>
               <td class="date redact"><div><?=$col['date']?></div></td>
               <td class="subject redact"><div><?=$col['subject']?></div></td>
               <td class="text redact" width="450"><div><?=$col['text']?></div></td>
               <td class="img_path redact"><div><?=$col['img_path']?></div></td>
               <td><?=$col['love']?></td>
               <td><?=$col['views']?></td>
               <td class="save">Сохранить</td>
               <td class="delete">Удалить</td>
           </tr>
           <?php endforeach;?>
       </table>
    </main>
</div>
</body>
</html>
