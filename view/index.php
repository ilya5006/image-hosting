
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
