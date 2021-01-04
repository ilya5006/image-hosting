<?php 

function getLastPhotoInAlbum(\App\Database $database, int $idAlbum)
{
    return $database::select(
        'photos',
        '*',
        'WHERE id_album = :id_album ORDER BY id DESC LIMIT 1',
        [
            [':id_album', $idAlbum]
        ]
    )[0];
}
?>