<?php
function getScripts(array $scripts, string $attribute = '')
{
    foreach ($scripts as $script) {
        if (! file_exists($_SERVER['DOCUMENT_ROOT'] . "/model/js/$script.js")) {
            throw new Exception("Скрипт $script не существует");
        }
        ?>
        <script src="/model/js/<?= $script ?>.js" <?= $attribute ?>></script>
        <?php
    }
}