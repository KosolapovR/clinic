<?php require_once VIEWS . '/header.php'; ?>
  <main>
    <aside class="left_bar">
      <p class="label">Новости</p>
      <ul class="news_list">
         <?php foreach($this->news as $col):?>
          <li class="news_item"><a href="http://blog.loc/news/<?=$col['id']?>"><?=$col['subject']?></a></li>
          <?php endforeach;?>
      </ul>
      </aside>
      <section>
      <p class="label">Наше оборудование</p>
      <div class="slider">
         
      </div>
      </section>
      
      <aside class="right_bar">
        <p class="label">Наши врачи</p>
        <div class="persons">
        <?php foreach($doctors as $col):?>
        <div class="person_container">
            <div class="person_card">
                <div class="photo" style="background: url(<?=$col['img_path']?>)"></div>
                <div class="info_block">
                    <h3 class="name"><a href="/doctors"><?=$col['name']?></a></h3>
                    <p class="category"><?=$col['category']?></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        </div>
      </aside>
  </main>
 <?php require_once VIEWS . '/footer.php'; ?>

  
  