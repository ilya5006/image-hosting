<?php

session_start();

require_once __DIR__ . '/Classes/Database.php';

$login = $_POST['login'];
$password = $_POST['password'];
$username = $_POST['username'];

\App\Database::insert(
    'users',
    'null, :name, :login, :password', 
    [
        [':name', $username],
        [':login', $login],
        [':password', password_hash($password, PASSWORD_DEFAULT)]
    ]
);

$_SESSION['username'] = $username;
$_SESSION['login'] = $login;

header('Location: /');