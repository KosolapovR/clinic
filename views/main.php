<?php require_once VIEWS . '/header.php'; ?>
  <main>
    <aside class="left_bar">
      <h3>новости</h3>
      <ul class="news_list">
         <?php foreach($this->news as $col):?>
          <li class="news_item"><a href="http://blog.loc/news/<?=$col['id']?>"><?=$col['subject']?></a></li>
          <?php endforeach;?>
      </ul>
      </aside>
      <section>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quasi.</section>
      <aside class="right_bar">
        <h3>наши врачи</h3>
        <div class="person_container">
            <div class="person_card"></div>
            <div class="person_card"></div>
            <div class="person_card"></div>
            <div class="person_card"></div>
        </div>
        
      </aside>
  </main>
 <?php require_once VIEWS . '/footer.php'; ?>

  
  