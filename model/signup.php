<?php

session_start();

require_once __DIR__ . '/Classes/Database.php';

$login = $_POST['login'];
$password = $_POST['password'];
$passwordRepeat = $_POST['password-repeat'];

if (! ($login && $password && $passwordRepeat)) {
    header('Location: /signup.php?error=Все+поля+должны+быть+заполнены');
    die();
}

if ($password !== $passwordRepeat) {
    header('Location: /signup.php?error=Пароли+должны+совпадать');
    die();
}

$isUserExists = (bool)\App\Database::select(
    'users', 
    '*', 
    "WHERE login = :login", 
    [
        [':login', $login]
    ]
);

if ($isUserExists) {
    header('Location: /signup.php?error=Такой+пользователь+уже+существует');
    die();
}

$idUser = (int)(\App\Database::select(
    'users',
    'id',
    'ORDER BY id DESC '
)[0]['id']) + 1;

\App\Database::insert(
    'users',
    ':id_user, :login, :password', 
    [
        [':id_user', $idUser],
        [':login', $login],
        [':password', password_hash($password, PASSWORD_DEFAULT)]
    ]
);

@mkdir(__DIR__ . "/../images/$idUser");

$_SESSION['id_user'] = $idUser;
$_SESSION['login'] = $login;

header('Location: /');