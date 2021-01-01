<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="stylesheet" href="/view/css/header.css">
    <link rel="stylesheet" href="/view/css/photo.css">
    
    <script src="/view/js/transition.js" defer></script>

    <title>Фото</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <div class="photo-wrapper">
        <div class="top">
            <div class="photo-name-button">
                <p class="photo-name">Фотография 1</p>
                <a href="" class="delete">Удалить</a>
            </div>
            <a href="" class="name-album">Альбом 1</a>
        </div>

        <img src="/images/test.png" alt="photo">

        <div class="bottom">
            <p class="date">Дата создания: <span>01.01.2020</span></p>
            <p class="description">Описание: <span>Обычная фотография</span></p>
        </div>
    </div>
</body>
</html>
