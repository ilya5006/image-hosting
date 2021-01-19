<?php 

session_start();

require_once __DIR__ . '/Classes/Database.php';
require_once __DIR__ . '/Functions/delete-tree.php';

$idAlbum = (int) $_GET['id_album'];
$idUser = (int) $_SESSION['id_user'];

deleteTree(__DIR__ . "/../images/$idUser/$idAlbum");

\App\Database::delete(
    'albums',
    'WHERE id = :id_album',
    [
        [':id_album', $idAlbum]
    ]
);

header('Location: /all-albums.php');
