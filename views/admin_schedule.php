<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/admin_users.css">
    <link rel="stylesheet" href="/css/admin_shedule.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/admin_users.js"></script>
    <script src="/js/admin_shedule.js"></script>
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
     <h1>Все записи</h1>
     <table class="shedule">
           <tr class="table_top">
               <th>id</th>
               <th>Категория</th>
               <th>Доктор</th>
               <th>Пациент</th>
               <th>Дата</th>
               <th>Время</th>
               <th class="csv"></th>
           </tr>
           <tr class="filters">
               <td>Фильтры:</td>
               <td><select class="filter" name="category" id="category_select">
                         <option value="все">все</option>
                          <?php foreach($uniq_category as $val): ?> 
                           <option value="<?=$val?>"><?=$val?></option>
                          <?php endforeach; ?>
                     </select></td>
               <td><select class="filter" name="doctor" id="doctor_select">
                         <option value="все">все</option>
                          <?php foreach($uniq_doctor as $val): ?>
                           <option value="<?=$val?>"><?=$val?></option>
                          <?php endforeach; ?>
                     </select></td>
               <td><select class="filter" name="user" id="user_select">
                          <option value="все">все</option>
                          <?php foreach($uniq_user as $val): ?>
                           <option value="<?=$val?>"><?=$val?></option>
                          <?php endforeach; ?>
                     </select></td>
               <td><select class="filter" name="date" id="date_select">
                         <option value="все">все</option>
                          <?php foreach($uniq_date as $val): ?>
                           <option value="<?=$val?>"><?=$val?></option>
                          <?php endforeach; ?>
                     </select></td>
               <td><select class="filter" name="time" id="time_select">
                         <option value="все">все</option>
                          <?php foreach($uniq_time as $val): ?>
                           <option value="<?=$val?>"><?=$val?></option>
                          <?php endforeach; ?>
                     </select></td>
           </tr>
           <?php foreach($shedule as $col): ?>
               <tr class="rows">
                <td class="id"><?=$col['id']?></td>
               <td class="category"><div><?=$col['category']?></div></td>
               <td class="doctor"><div><?=$col['doctor']?></div></td>
               <td class="user"><div><?=$col['user']?></div></td>
               <td class="date"><div><?=$col['date']?></div></td>
               <td class="time_tb"><div><?=$col['time']?></div></td>
               <td><div class="delete delete_note"></div></td>
           </tr>
           <?php endforeach;?>
       </table>
     <h1>Добавить запись</h1>
     <div class="add_note">
               <ul class="categories">
                  Выберите категорию:
                   <li id="stomatolog">stomatolog</li>
                   <li id="nevrolog">nevrolog</li>
                   <li id="terapevt">terapevt</li>
                   <li id="okulist">okulist</li>
                   <li id="hirurg">hirurg</li>
               </ul>
               <div class="date_select">
               <label for="User_select">Выберите пациента</label>
               <select name="User" id="User_select">
                  <?php foreach($users as $col): ?>
                   <option value="<?=$col['login']?>"><?=$col['login']?></option>
                  <?php endforeach; ?>
               </select>
            <label for="start">Выбрать дату:</label>
            <input type="date" 
                 id="start"
               name="trip-start"
              value="<?=date("Y-m-d")?>"
                min="<?=date("Y-m-d")?>" 
                max="<?=date("Y-m-d", time() + 30 * 24 * 60 * 60);?>">
            </div>
             <div class="times">
             <p id="description">Выберите время:</p>
             
             </div>
        </div>
    
       
    <div class="hidden_popUp">
        <h2>Подтверждение записи:</h2>
        <p>Вы действительно желаете записаться на <span id="date_span"></span> в <span id="time_span"></span>?</p>
        <form class="buttons" action="">
        <button id="no">Нет</button>
        <button id="yes">Да</button>
        </form>
        
    </div>
    <div class="hidden_double_popUp">
       <div id="close">
       </div>
       <p>Вы уже записаны к этому специалисту, отмените ранее сделанную запись или выберите другого специалиста</p>
    </div>
    </main>