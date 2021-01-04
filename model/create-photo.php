<?php

require_once __DIR__ . '/Classes/Database.php';

session_start();

$idUser = (int)$_SESSION['id_user'];
$idAlbum = (int)$_POST['id_album'];
$name = $_POST['name'];
$description = $_POST['description'];
$photo = $_FILES['file']['tmp_name'];

$idPhoto = (int)(\App\Database::select(
    'photos',
    'id',
    'ORDER BY id DESC'
)[0]['id']) + 1;

$isPhotoUploaded = is_uploaded_file($photo);

if (! ($description && $name)) {
    header("Location: /create-photo.php?id_album=$idAlbum&error=Заполните+все+поля");
    die();
}

$errorCode = $_FILES['file']['error'];

if ($errorCode !== UPLOAD_ERR_OK) {
    header("Location: /create-photo.php?id_album=$idAlbum&error=Произошла+ошибка+во+время+загрузки+фотографии");
    die();
}

$mime = (string) finfo_file(finfo_open(FILEINFO_MIME_TYPE), $photo);

if (strpos($mime, 'image') === false) {
    header("Location: /create-photo.php?id_album=$idAlbum&error=Можно+загружать+только+фотографии");
    die();
}

if (filesize($photo) > (1024 * 1024 * 5)) {
    header("Location: /create-photo.php?id_album=$idAlbum&error=Размер+изображения+не+должен+превышать+5+Мбайт");
    die();
}

$photoSize = getimagesize($photo);

$width = $photoSize[0];
$height = $photoSize[1];

if ($width > 700 || $height > 700) {
    header("Location: /create-photo.php?id_album=$idAlbum&error=Высота+и+ширина+изображения+не+должен+превышать+700+пикселей");
    die();
}

$photoName = md5_file($photo);

$photoExtension = image_type_to_extension($photoSize[2]);

if (! move_uploaded_file($photo, __DIR__ . "/../images/$idUser/$idAlbum/$photoName$photoExtension")) {
    die('При записи изображения на диск произошла ошибка.');
}

\App\Database::insert(
    'photos',
    ':id_photo, :id_album, :name, :description, :path, NOW()',
    [
        [':id_photo', $idPhoto],
        [':id_album', $idAlbum],
        [':name', $name],
        [':description', $description],
        [':path', "/images/$idUser/$idAlbum/$photoName$photoExtension"]
    ]
);

header("Location: /photo.php?id_photo=$idPhoto");