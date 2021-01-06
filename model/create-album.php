<?php
require_once __DIR__ . '/Classes/Database.php';

session_start();

$name = $_POST['name'];
$description = $_POST['description'];
$idUser = (int) $_SESSION['id_user'];

if (! ($name && $description)) {
    header('Location: /create-album.php?error=Заполните+все+поля');
    die();
}

$idAlbum = (int)(\App\Database::select(
    'albums',
    'id',
    'ORDER BY id DESC'
)[0]['id']) + 1;

\App\Database::insert(
    'albums',
    ":id_album, :id_user, :name, :description, NOW()",
    [
        [':id_album', $idAlbum],
        [':id_user', $idUser],
        [':name', $name],
        [':description', $description],
    ]
);

mkdir(__DIR__ . "/../images/$idUser/$idAlbum");

header("Location: /album.php?id_album=$idAlbum");