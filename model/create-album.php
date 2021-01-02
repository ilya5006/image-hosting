<?php
require_once __DIR__ . '/Classes/Database.php';

session_start();

$name = $_POST['name'];
$description = $_POST['description'];
$idUser = $_SESSION['id_user'];

$idAlbum = (int)(\App\Database::select(
    'album',
    'id',
    'ORDER BY id DESC'
)[0]['id']) + 1;

$isInserted = \App\Database::insert(
    'album',
    ":id_album, :id_user, :name, :description, NOW()",
    [
        [':id_album', $idAlbum],
        [':id_user', $idUser],
        [':name', $name],
        [':description', $description],
    ]
);

if ($isInserted) {
    header("Location: /album.php?id=$idAlbum");
} else {
    header('Location: /create-album.php?error=Произошла+ошибка.+Попробуйте+создать+альбом+заново');
}