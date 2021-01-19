<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}

require_once __DIR__ . '/model/Classes/Database.php';
require_once __DIR__ . '/model/Functions/get-user-albums.php';
require_once __DIR__ . '/model/Functions/get-album-photos.php';

$albums = getUserAlbums(new \App\Database(), (int) $_SESSION['id_user']);

for ($i = 0; $i < count($albums); $i++) {
    $albums[$i]['photos'] = getAlbumPhotos(new \App\Database(), (int) $albums[$i]['id'], 10);
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

    <script src="/view/js/functions/get-matched-content.js" defer></script>
    <script src="/view/js/functions/search.js" defer></script>

    <script src="/view/js/all-albums.js" defer></script>

    <title>Все альбомы</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <div class="all-albums">
        <h2>Все альбомы</h2>
        <input type="text" class="search" placeholder="Поиск альбома">
    </div>

    <div class="albums-wrapper">
        <?php
        if (empty($albums)):
        ?>
        <p class="no-albums">Альбомы отсутствуют</p>
        <?php 
        endif;
        
        foreach ($albums as $albumInfo):
        ?>
        <div class="album-wrapper">
            <p><a href="/album.php?id_album=<?=$albumInfo['id']?>"><?=$albumInfo['name']?></a></p>

            <div class="photos">
                <?php
                if (empty($albumInfo['photos'])):
                ?>
                <p class="empty">Фотографии отсутствуют</p>
                <?php
                endif;

                foreach ($albumInfo['photos'] as $photoInfo):
                ?>
                <a href="/photo.php?id_photo=<?=$photoInfo['id']?>" class="photo">
                    <img src="<?=$photoInfo['path']?>" class="preview">
                    <p><?=$photoInfo['name']?></p>
                </a>
                <?php
                endforeach;
                ?>
            </div>

            <a href="/album.php?id_album=<?=$albumInfo['id']?>">Все фото</a>
        </div>

        <?php
        endforeach;
        ?>
    </div>
</body>
</html>
