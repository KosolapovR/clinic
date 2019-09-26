<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
     <script src="/js/jQuery.js"></script>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h4><?=$text_info?></h4>
            <div class="inpzone">
            <label for="name">ЛОГИН</label>
            <input id="name"  name="name" type="text">
            </div>
            <div class="inpzone">
               <label for="pass">ПАРОЛЬ</label>
            <input id="pass" name="pass" type="password">
            </div>
            <label for="remember">Запомнить меня</label>
            <input id="remember" name="remember" type="checkbox">
            <input type="submit" name="login" value="Войти">
            
            <a href="auth">Регистрация</a>
            
        </form>
    </div>
</body>
<script>
    $(document).ready(function(){
        $(".inpzone input").on("focus", function(){
            $(this).siblings('label').css('top', '-75%');
            $(this).parent().addClass('focus');
        });
        $(".inpzone input").on("blur", function(){
            if($(this).val() == ''){
                $(this).siblings('label').css('top', '0%');
            }
           
        });
    }
        
            
                   
        
    );
    </script>
</html>