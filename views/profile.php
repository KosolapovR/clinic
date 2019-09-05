<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="Wed, 26 Feb 1999 08:21:57 GMT">
    <title>Запись онлайн</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/popUp.js"></script>
    <script src="/js/ajax_update.js"></script>
</head>
<body>
  <header>
      <nav>
         <div class="nav_left">
             <div class="logo">logo</div>
             <div class="sign_up"><a href="">Запись онлайн</a></div>
         </div>
          <ul class="nav_right">
              
              <li><a href="">контакты</a></li>
              <li><a href="">новости</a></li>
              <li><a href="">наши сотрудники</a></li>
              <?php if(isset($_SESSION['user'])):?>
              <li><a href="profile">личный кабинет <?=$_SESSION['user']?></a></li>
              <li><a href="exit">выйти</a></li>
              <?php else: ?>
              <li><a href="login">войти</a></li>
              <?php endif; ?>
          </ul>
      </nav>
  </header>
  <div class="whrapper">
      <section>
          <div id="hidden_block">
             <div class="top">
                Загрузка новой фотографии
                 <div id="close">
                     
                 </div>
             </div>
             <p class="desription">Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
              <form action="profile" method="post" enctype="multipart/form-data">
                  <input id="file" type="file" name="file">
                  <label for="file">Выбрать файл</label>
                  <label id="unload_file_label" for="unload_file">Загрузить фотографию</label>
                  <input id="unload_file" type="submit" name="unload_file" value="Отправить">
                  
              </form>
              <div class="down">
                Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.
             </div>
              
          </div>
          <div class="photo_container">
             <img src=<?=$model->user->getImgPath()?> class="photo" alt="photo">
             <div id="unload" class="change_photo">Редактировать</div> 
              
          </div>
          <div class="info_container">
             <form action="" method="post">
              <table>
                  <tr id="login" class="row">
                      <td>Логин:</td>
                      <td><?=$model->user->getLogin()?></td>
                  </tr>
                  <tr id="pass" class="row">
                      <td>Пароль:</td>
                      <td><?=$model->user->getPass()?></td>
                  </tr>
                  <tr id="name" class="row">
                      <td>Имя:</td>
                      <td><?=$model->user->getName()?></td>
                  </tr>
                  <tr id="surname" class="row">
                      <td>Фамилия:</td>
                      <td><?=$model->user->getSurname()?></td>
                  </tr>
                  <tr id="birthday" class="row">
                      <td>День рождения:</td>
                      <td><?=$model->user->getBDay()?></td>
                  </tr>
                  <tr id="tel" class="row">
                      <td>Телефон:</td>
                      <td><input type="text" name="telephone" value="<?=$model->user->getPhone()?>"></td>
                  </tr>
                  <tr id="email" class="row">
                      <td>Почта:</td>
                      <td><?=$model->user->getEmail()?></td>
                  </tr>
              </table>
              </form>
          </div>
      </section>
  </div>