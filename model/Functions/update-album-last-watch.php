<?php 

function updateAlbumLastWatch(\App\Database $database, int $idAlbum)
{
    $database::update(
        'albums',
        'last_watch = NOW()',
        'WHERE id = :id_album',
        [
            [':id_album', $idAlbum]
        ]
    );
}
?>