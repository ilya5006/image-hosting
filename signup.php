<?php

session_start();

if (isset($_SESSION['id_user'])) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="stylesheet" href="/view/css/signin.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <title>Регистрация</title>
</head>
<body>
    <form method="POST" action="/model/signup.php">
        <p>Введите логин:</p>
        <input type="text" name="login">
        <p>Введите пароль:</p>
        <input type="text" name="password">
        <p>Повторите пароль:</p>
        <input type="text" name="password-repeat">
        <input type="submit" value="Зарегистрироваться">

        <p>Уже имеется аккаунт?<a href="/signin.php">Войти</a></p>

    </form>

</body>
</html>