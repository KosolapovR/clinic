<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Запись онлайн</title>
    <link rel="stylesheet" href="/css/style.css">
    <?php if($_SERVER['REQUEST_URI'] == '/profile'):?>
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/popUp.js"></script>
    <script src="/js/ajax_update.js"></script>
    <?php endif; ?>
    <?php if(preg_match("/news/", $_SERVER['REQUEST_URI'])):?>
    <link rel="stylesheet" href="/css/news.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/like.js"></script>
    <?php endif; ?>
    <?php if(preg_match("#news/[0-9]+#", $_SERVER['REQUEST_URI'])):?>
    <link rel="stylesheet" href="/css/news.css">
    <link rel="stylesheet" href="/css/one_news.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/like.js"></script>
    <?php endif; ?>
    <?php if(preg_match("/doctors/", $_SERVER['REQUEST_URI'])):?>
    <link rel="stylesheet" href="/css/doctors.css">
    <script src="/js/jQuery.js"></script>
    <?php endif; ?>
    <?php if(preg_match("/reservation/", $_SERVER['REQUEST_URI'])):?>
    <link rel="stylesheet" href="/css/reservation.css">
    <script src="/js/jQuery.js"></script>
    <script src="/js/date.js"></script>
    <?php endif; ?>
</head>
<body>
  <header>
      <nav>
         <div class="nav_left">
             <div class="logo">logo</div>
              <?php if(!preg_match("/reservation/", $_SERVER['REQUEST_URI'])):?>
                  <?php if(isset($_SESSION[session_id()])):?>
                      <div class="sign_up"><a href="http://blog.loc/reservation">Запись онлайн</a></div>
                  <?php else: ?>
                       <div class="sign_up"><a href="login">Запись онлайн</a></div>
                  <?php endif; ?>
              <?php endif; ?>
             
         </div>
          <ul class="nav_right">
              <?php if($_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/main' && $_SERVER['REQUEST_URI'] != '/exit'):?>
              <li><a href="/main">главная</a></li>
              <?php endif; ?>
              <li><a href="">контакты</a></li>
              <?php if($_SERVER['REQUEST_URI'] != '/news'):?>
              <li><a href="/news">новости</a></li>
              <?php endif; ?>
              <li><a href="http://blog.loc/doctors">наши сотрудники</a></li>
              <?php if($_SERVER['REQUEST_URI'] != '/profile'):?>
              <?php if(isset($_SESSION[session_id()])):?>
              <li><a href="/profile">личный кабинет <p id="login"><?=$_SESSION[session_id()]?></p></a></li>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(isset($_SESSION[session_id()])):?>
              <li><a href="/exit">выйти</a></li>
              <?php else: ?>
              <li><a href="/login">войти</a></li>
              <?php endif; ?>
          </ul>
      </nav>
  </header>