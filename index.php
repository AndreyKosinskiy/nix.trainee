<?php
spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/' . str_replace("\\","/",$className) . '.php';
});

$author = new \Models\Users\User('anddrey');
$article = new \Models\Articles\Article($author,'qweqwe','safasfasf');
