<?php

require_once __DIR__ . '/Classes/Database.php';

$idPhoto = (int) $_GET['id_photo'];

$photoPath = \App\Database::select(
    'photos',
    'path',
    'WHERE id = :id_photo',
    [
        [':id_photo', $idPhoto]
    ]
)[0]['path'];

unlink(__DIR__ . '/..' . $photoPath);

\App\Database::delete(
    'photos',
    'WHERE id = :id_photo',
    [
        [':id_photo', $idPhoto]
    ]
);
