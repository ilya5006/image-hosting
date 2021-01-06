<?php
    
session_start();

require_once __DIR__ . '/Classes/Database.php';

$login = $_POST['login'];
$password = $_POST['password'];

$userInfo = \App\Database::select(
    'users',
    'password, id',
    'WHERE login = :login',
    [
        [':login', $login]
    ]
)[0];

if (! password_verify($password, $userInfo['password'])) {
    header('Location: /signin.php?error=Неверный+логин+или+пароль');
    
    die();
}

$_SESSION['id_user'] = $userInfo['id'];
$_SESSION['login'] = $login;

header('Location: /');