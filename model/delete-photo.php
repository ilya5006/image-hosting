<?php

require_once __DIR__ . '/Classes/Database.php';

$idPhoto = (int) $_GET['id_photo'];

$photoPathAndIdAlbum = \App\Database::select(
    'photos',
    'path, id_album',
    'WHERE id = :id_photo',
    [
        [':id_photo', $idPhoto]
    ]
)[0];

$photoPath = $photoPathAndIdAlbum['path'];
$idAlbum = $photoPathAndIdAlbum['id_album'];

unlink(__DIR__ . '/..' . $photoPath);

\App\Database::delete(
    'photos',
    'WHERE id = :id_photo',
    [
        [':id_photo', $idPhoto]
    ]
);

header("Location: /album.php?id_album=$idAlbum");
