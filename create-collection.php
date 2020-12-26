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
    
    <title>Авторизация</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/create-collection.php';
    ?>
</body>
</html>