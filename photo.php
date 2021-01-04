<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}

require_once __DIR__ . '/model/Classes/Database.php';
require_once __DIR__ . '/model/Functions/get-photo-info.php';

$photoInfo = getPhotoInfo(new \App\Database(),(int) $_GET['id_photo'])[0];

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
                <p class="photo-name"><?=$photoInfo['name']?></p>
                <a href="/model/delete-photo.php?id_photo=<?=$photoInfo['id']?>" class="delete">Удалить</a>
            </div>
            <a href="/album.php?id_album=<?=$photoInfo['id_album']?>" class="name-album"><?=$photoInfo['album_name']?></a>
        </div>

        <img src="<?=$photoInfo['path']?>" alt="photo">

        <div class="bottom">
            <p class="date">Дата создания: <span><?=(new DateTime($photoInfo['date_creation']))->format('d.m.Y')?></span></p>
            <p class="description">Описание: <span><?=$photoInfo['description']?></span></p>
        </div>
    </div>
</body>
</html>
