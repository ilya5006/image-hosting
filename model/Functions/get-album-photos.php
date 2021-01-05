<?php 
function getAlbumPhotos(\App\Database $database, int $idAlbum, int $limit = 0)
{
    return $database::select(
        'photos',
        '*',
        'WHERE id_album = :id_album ORDER BY id DESC' . (($limit) ? (' LIMIT ' . $limit) : ''),
        [
            [':id_album', $idAlbum]
        ]
    );
}
?>