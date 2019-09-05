<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Запись онлайн</title>
    <link rel="stylesheet" href="/css/style.css">
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
  <main>
    <aside class="left_bar">
      <h3>новости</h3>
      <ul class="news_list">
          <li class="news_item">Lorem ipsum dolor sit.</li>
          <li class="news_item">Lorem ipsum dolor.</li>
          <li class="news_item">Lorem ipsum dolor sit amet.</li>
          <li class="news_item">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
          <li class="news_item">Lorem ipsum dolor sit.</li>
          <li class="news_item">Lorem ipsum dolor.</li>
          <li class="news_item">Lorem ipsum dolor sit amet.</li>
          <li class="news_item">Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
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
  <footer><div class="whrapper">THIS IS FOOTEEEEER!!!</div></footer>
</body>
</html>

  
  