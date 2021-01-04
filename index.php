<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}

require_once __DIR__ . '/model/Classes/Database.php';
require_once __DIR__ . '/model/Functions/get-last-watched-albums.php';
require_once __DIR__ . '/model/Functions/get-last-photo-in-album.php';

$lastWatchedAlbums = getLastWatchedAlbums(new \App\Database(), (int) $_SESSION['id_user']);

for ($i = 0; $i < count($lastWatchedAlbums); $i++) {
    $lastWatchedAlbums[$i]['last_photo'] = getLastPhotoInAlbum(new \App\Database(), (int) $lastWatchedAlbums[$i]['id']);
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
    <link rel="stylesheet" href="/view/css/index.css">

    <script src="/view/js/transition.js" defer></script>
    <script src="/view/js/times-of-day.js" defer></script>

    <title>Главная страница</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <h2><span id="times_of_day">Добрый вечер</span>, <?=$_SESSION['login']?></h2>

    <div class="albums_wrapper">
        <p>Последние просматриваемые фотоальбомы:</p>
        
        <div class="albums">
            <?php 
            foreach ($lastWatchedAlbums as $album):
            ?>
                <a href="/album.php?id_album=<?=$album['id']?>" class="album">
                    <img src="<?=$album['last_photo']['path'] ?: '/images/noimage.png'?>" class="preview">
                    <p><?=$album['name']?></p>
                </a>
            <?php 
            endforeach;
            ?>
        </a>
    </div>

</body>
</html>
