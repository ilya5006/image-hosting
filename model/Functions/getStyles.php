<?php

function getStyles(array $styles)
{
    foreach ($styles as $style) {
        if (! file_exists($_SERVER['DOCUMENT_ROOT'] . "/view/css/$style.css")) {
            throw new Exception("Стиль $style не существует");
        }
        ?>
        <link rel="stylesheet" href="/view/css/<?= $style ?>.css">
        <?php
    }
}
