<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    getStyles(['style']);
    ?>
    <title>Регистрация</title>
</head>
<body>

    <form method="POST" action="/signup">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="username" placeholder="Имя">
        <input type="text" name="password" placeholder="Пароль">
        <input type="text" name="password-repeat" placeholder="Повторите пароль">
        <input type="submit" value="Зарегистрироваться">
    </form>

    <a href="/signin">Войти</a>
</body>
</html>