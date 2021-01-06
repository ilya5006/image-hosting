<?php

session_start();

if (empty($_SESSION['id_user'])) {
    header('Location: /signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="stylesheet" href="/view/css/header.css">
    <link rel="stylesheet" href="/view/css/create-photo.css">

    <script src="/view/js/error-handler.js" defer></script>

    <title>Создать альбом</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <form method="POST" action="/model/create-album.php">
        <p>Название фотоальбома:</p>
        <input type="text" name="name">
        <p>Описание фотоальбома:</p>
        <textarea name="description"></textarea>
        <input type="submit" class="create" value="Создать">
    </form>
</body>
</html>
