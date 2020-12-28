<?php

session_start();

require_once __DIR__ . '/Classes/Database.php';

$login = $_POST['login'];
$password = $_POST['password'];

$isUserExists = (bool)\App\Database::select(
    'users', 
    '*', 
    "login = :login", 
    [
        [':login', $login]
    ]
);

if ($isUserExists) {
    header('Location: /signup.php?error=Такой+логин+уже+существует');
    die();
}

\App\Database::insert(
    'users',
    'null, :login, :password', 
    [
        [':login', $login],
        [':password', password_hash($password, PASSWORD_DEFAULT)]
    ]
);

$_SESSION['username'] = $username;
$_SESSION['login'] = $login;

header('Location: /');