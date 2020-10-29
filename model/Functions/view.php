<?php

function view(string $view)
{
    $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/view/$view.php";

    if (! file_exists($viewPath)) {
        throw new Exception("Представление $view не существует");
    }

    include $viewPath;
}