<?php

function getCollections(string $username)
{
    @$collections = scandir(__DIR__ . "/../../images/$username/");

    return $collections;
}