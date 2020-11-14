<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоальбом</title>
</head>
<body>
    <?php
        view('header');
    ?>
    
    <p>Добро пожаловать, <?=$_SESSION['username']?></p>

    <p>Ваши коллекции:</p>

    <div class="collections">
        <?php
        if (isset($collections)):
        ?>
        <?php
        else:
        ?>
        <p>У вас нет коллекций</p>
        <?php
        endif;
        ?>
    </div>
    
</body>
</html>
