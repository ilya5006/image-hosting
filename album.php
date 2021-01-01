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
    <link rel="stylesheet" href="/view/css/album.css">

    <script src="/view/js/transition.js" defer></script>

    <title>Фотоальбом</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <div class="top">
        <div class="album-top">
            <p class="album-title">Фотоальбом 1</p>
            <a href="" class="create">Добавить фото</a>
            <a href="" class="delete">Удалить альбом</a>
        </div>

        <input class="search" type="text" placeholder="Поиск фотографии">
    </div>

    <div class="album-wrapper">
        <div class="photos">
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>
            <a href="/photo.php" class="photo">
                <img src="/images/test.png">
                <p>Фото 1</p>            
            </a>

        </div>

        <p class="album-description">Описание альбома</p>
    </div>
</body>
</html>
