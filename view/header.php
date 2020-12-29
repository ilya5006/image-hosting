<header>
    <div>
        <?php
        if ($_SERVER['REQUEST_URI'] != '/index.php' && $_SERVER['REQUEST_URI'] != '/'): 
        ?>
        <a class="transform" href="/">На главную</a>
        <?php
        endif
        ?>
        <a class="transform" href="/all-albums.php">Все альбомы</a>
        <a class="transform" href="/create-album.php">Создать альбом</a>
    </div>

    <a class="transform" id="logout" href="/model/logout.php">Выйти</a>
</header>