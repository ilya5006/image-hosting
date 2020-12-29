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
    <link rel="stylesheet" href="/view/css/all-albums.css">

    <script src="/view/js/transition.js" defer></script>

    <title>Все альбомы</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <div class="all-albums">
        <h2>Все альбомы</h2>
        <input type="text" placeholder="Поиск альбома">
    </div>

    <div class="albums-wrapper">
        <div class="album-wrapper">
            <p>Альбом 1</p>

            <div class="photos">
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
            </div>

            <a href="">Все фото</a>
        </div>

        <div class="album-wrapper">
            <p>Альбом 2</p>

            <div class="photos">
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
                <a href="" class="photo">
                    <img src="/images/test.png">
                    <p>Фото 1</p>            
                </a>
            </div>

            <a href="">Все фото</a>
        </div>
    </div>
</body>
</html>
