<?php

session_start();

require_once __DIR__ . '/model/Functions/autoload.php';
require_once __DIR__ . '/model/Functions/view.php';
require_once __DIR__ . '/model/Functions/getScripts.php';
require_once __DIR__ . '/model/Functions/getStyles.php';

$router = new \App\Routing\Router(new \App\Routing\Request());

$router->get('/', function() {

    // if (empty($_SESSION['id_user'])) {
    //     header('Location: /login');
    // }
});

$router->get('/login', function() {
    try {
        view('login');
    } catch (Exception $error) {
        echo "Ты думал, здесь что-то будет? Нет, тут {$error->getMessage()}";
    }
});