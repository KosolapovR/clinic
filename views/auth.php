<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>auth</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <?= $text_info?>
            <label for="name">Логин: </label>
            
            <input id="name"  name="name" type="text">
            
            <label for="pass">Пароль: </label>
            <input id="pass" name="pass" type="text">
            <label for="tel">Телефон: </label>
            <input id="tel"  name="tel" type="text">
            <label for="email">Email: </label>
            <input id="email"  name="email" type="text">
            <input type="submit" name="registration" value="Подтвердить">
            <a href="main">На стартовую</a>
        </form>
    </div>
</body>
</html>