<?php
if (empty($_SESSION['username'])) {
    header('Location: /signin');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать коллекцию</title>
</head>
<body>
    <?php
    include __DIR__ . '/header.php';
    ?>

    <form action="/model/create-collection.php" method="POST">
        <input type="text" name="name" placeholder="Имя коллекции">
        <input type="text" name="description" placeholder="Описание коллекции">
        <input type="submit" value="Создать">
    </form>
</body>
</html>