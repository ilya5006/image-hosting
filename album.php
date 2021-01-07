<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}

require_once __DIR__ . '/model/Classes/Database.php';
require_once __DIR__ . '/model/Functions/get-album-photos.php';
require_once __DIR__ . '/model/Functions/get-album-info.php';
require_once __DIR__ . '/model/Functions/update-album-last-watch.php';

$idAlbum = (int) $_GET['id_album'];

$albumPhotos = getAlbumPhotos(new \App\Database(), $idAlbum);
$albumInfo = getAlbumInfo(new \App\Database(), $idAlbum);

updateAlbumLastWatch(new \App\Database(), $idAlbum);

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

    <script src="/view/js/functions/get-matched-content.js" defer></script>
    <script src="/view/js/functions/search.js" defer></script>

    <script src="/view/js/album.js" defer></script>

    <title>Фотоальбом</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <div class="top">
        <div class="album-top">
            <p class="album-title"><?=$albumInfo['name']?></p>
            <a href="/create-photo.php?id_album=<?= $idAlbum ?>" class="create">Добавить фото</a>
            <a href="/model/delete-album.php?id_album=<?= $idAlbum ?>" class="delete">Удалить альбом</a>
        </div>

        <input class="search" type="text" placeholder="Поиск фотографии">
    </div>

    <div class="album-wrapper">
        <div class="photos">
            <?php 
            foreach ($albumPhotos as $photo):
            ?>
            <a href="/photo.php?id_photo=<?=$photo['id']?>" class="photo">
                <img src="<?=$photo['path']?>" class="preview">
                <p><?=$photo['name']?></p>            
            </a>
            <?php 
            endforeach;
            ?>
    
        </div>

        <p class="album-description description"><?=$albumInfo['description']?></p>
    </div>
</body>
</html>
