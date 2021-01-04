<?php 

function getLastWatchedAlbums(\App\Database $database, int $idUser)
{
    return $database::select(
        'albums',
        '*',
        'WHERE albums.id_user = :id_user ORDER BY last_watch DESC LIMIT 10',
        [
            [':id_user', $idUser]
        ]
    );
}