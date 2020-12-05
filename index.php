<?php

session_start();

if (empty($_SESSION['username'])) {
    header('Location: /signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоальбом</title>
</head>
<body>
    <?php
        include __DIR__ . '/view/index.php';
    ?>
</body>
</html>
