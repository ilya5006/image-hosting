<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    getStyles(['style']);
    getScripts(['script'], 'defer');
    ?>
    <title>Авторизация</title>
</head>
<body>

    <form method="POST" action="/login">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
</body>
</html>