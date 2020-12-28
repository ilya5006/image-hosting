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

    <link rel="stylesheet" href="/view/css/style.css">
    <link rel="stylesheet" href="/view/css/header.css">
    
    <script src="/view/js/transition.js" defer></script>
    
    <title>Авторизация</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/header.php';
    ?>

    <?php
        include __DIR__ . '/view/create-collection.php';
    ?>
</body>
</html>