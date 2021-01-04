<?php 
function getAlbumPhotos(\App\Database $database, int $idAlbum)
{
    return $database::select(
        'photos',
        '*',
        'WHERE id_album = :id_album ORDER BY id DESC',
        [
            [':id_album', $idAlbum]
        ]
    );
}
?>