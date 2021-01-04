<?php

function getUserAlbums(\App\Database $database, int $idUser)
{
    return $database::select(
        'albums',
        'id, name',
        'WHERE id_user = :id_user',
        [
            [':id_user', $idUser]
        ]
    );
}