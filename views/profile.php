<?php require_once VIEWS . '/header.php'; ?>
  <div class="whrapper">
      <section id="main_info">
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
                  <tr id="name" class="row">
                      <td>Имя:</td>
                       <td><input type="text" name="Name" value="<?=$model->user->getName()?>"></td>
                  </tr>
                  <tr id="surname" class="row">
                      <td>Фамилия:</td>
                      <td><input type="text" name="Surname" value="<?=$model->user->getSurname()?>"></td>
                  </tr>
                  <tr id="birthday" class="row">
                      <td>День рождения:</td>
                      <td><input type="text" name="BDay" value="<?=$model->user->getBDay()?>"></td>
                  </tr>
                  <tr id="tel" class="row">
                      <td>Телефон:</td>
                      <td><input type="text" name="Phone" value="<?=$model->user->getPhone()?>"></td>
                  </tr>
                  <tr id="email" class="row">
                      <td>Почта:</td>
                      <td><input type="text" name="Email" value="<?=$model->user->getEmail()?>"></td>
                  </tr>    
              </table>
              
                          <label id="changeInfoLabel" for="changeData">Сохранить</label>
                          <input type="submit" id="changeData" value="Отправить">
                       
              </form>
          </div>
      </section>
      <section id="notes_whrapper">
          <div class="top_title">Мои текущие записи:</div>
          <table id="notes">
              <tr>
                  <th>Дата</th>
                  <th>Время</th>
                  <th>Направление</th>
                  <th>Доктор</th>
              </tr>
              <?php foreach ($notes as $col):?>
              <tr>
                  <td><?=$col['date']?></td>
                  <td><?=$col['time']?></td>
                  <td><?=$col['category']?></td>
                  <td><?=$col['doctor']?></td>
              </tr>
              <?php endforeach;?>
          </table>
      </section>
  </div>
 <?php require_once VIEWS . '/footer.php'; ?>