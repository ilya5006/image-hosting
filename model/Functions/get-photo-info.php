<?php

function getPhotoInfo(\App\Database $database, int $idPhoto)
{
    return $database::select(
        'photos, albums',
        'photos.*, albums.name AS album_name',
        'WHERE photos.id = :id_photo AND photos.id_album = albums.id',
        [
            [':id_photo', $idPhoto]
        ]
    );
}