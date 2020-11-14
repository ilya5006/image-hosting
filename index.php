<?php

session_start();

require_once __DIR__ . '/model/Functions/autoload.php';
require_once __DIR__ . '/model/Functions/view.php';
require_once __DIR__ . '/model/Functions/getScripts.php';
require_once __DIR__ . '/model/Functions/getStyles.php';
require_once __DIR__ . '/model/Functions/getCollections.php';

$router = new \App\Routing\Router(new \App\Routing\Request());

$router->get('/', function() {

    if (empty($_SESSION['username'])) {
        header('Location: /signin');
    }

    $collections = getCollections($_SESSION['username']);

    var_dump($collections);

    view('index');
});

$router->get('/create-collection', function() {
    if (empty($_SESSION['username'])) {
        header('Location: /signin');
    }

    view('create-collection');
});

$router->get('/signin', function() {
    view('signin');
});

$router->get('/signup', function() {
    view('signup');
});

$router->get('/logout', function() {
    session_destroy();

    header('Location: /');
});

$router->post('/signup', function($request) {
    $body = $request->getBody();
    
    $login = $body['login'];
    $password = $body['password'];
    $username = $body['username'];

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
});

$router->post('/signin', function($request) {
    $body = $request->getBody();
    
    $login = $body['login'];
    $password = $body['password'];

    $userInfo = \App\Database::select(
        'users',
        'password, name',
        'login = :login',
        [
            [':login', $login]
        ]
    )[0];

    if (! password_verify($password, $userInfo['password'])) {
        header('Location: /signin?error=Неверный+логин+или+пароль');
        
        die();
    }

    $_SESSION['username'] = $userInfo['name'];
    $_SESSION['login'] = $login;
    header('Location: /');
});