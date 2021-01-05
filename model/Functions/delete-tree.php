<?php
function deleteTree($dir)
{
    $files = array_diff(scandir($dir), ['.','..']);

    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }

    return rmdir($dir);
}