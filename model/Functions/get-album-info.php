<?php 

function getAlbumInfo(\App\Database $database, int $idAlbum)
{
    return $database::select(
        'albums',
        '*',
        'WHERE id = :id_album',
        [
            [':id_album', $idAlbum]
        ]
    )[0];
}
?>